<?php

require_once 'dbconnect.php';

$passError = "";
$emailError = "";
$error = false;

if (isset($_POST['btn-login'])) {

    $email = sanitizeInput($_POST['email']);
    $pass = sanitizeInput($_POST['pass']);

    if (empty($email)) {
        $error = true;
        setErrorMessage("Please enter your email address.");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        setErrorMessage("Please enter valid email address.");
    }

    if (empty($pass)) {
        $error = true;
        setErrorMessage("Please enter your password.");
    }

    // if there's no error, continue to login
    if (!$error) {

        $password = hash('sha256', $pass); // password hashing

        $res = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
        $row = mysqli_fetch_array($res);

        $count = mysqli_num_rows($res); // 0 oder 1 wenn user mit eingegebener email existiert

        if ($count == 1 && $password == $row['password']) { // wenn genau 1 user im result zurück geliefert wird und das verschlüsselte passwort übereinstimmt dann erst einloggen


            $_SESSION['user'] = $row['id'];
            $_SESSION['role'] = $row["role"];

            if ($row["role"] == "admin") {
                header("Location: admin.php");
            } else if ($row["role"] == "superadmin") {
                header("Location: user.php");
            } else {
                header("Location: home.php");
            }
            // print_r($row); 
            die;
        } else {
            setErrorMessage("Incorrect Credentials, try again...");
        }
    }
}

header("Location: index.php");
