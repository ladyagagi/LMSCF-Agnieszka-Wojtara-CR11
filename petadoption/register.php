<?php

// if( isset($_SESSION['user'])!="" ){
//  header("Location: register.php" ); // redirects to home.php
// }
include_once 'dbconnect.php';
$error = false;
if (isset($_POST['btn-register'])) {

    // sanitize user input to prevent sql injection
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $pass = sanitizeInput($_POST['pass']);
   
    //-----------------------------------------Validation PART ------------------------------
    // basic name validation
    if (empty($name)) {
        $error = true;
        $nameError = "Please enter your full name.";
    } else if (strlen($name) < 3) {
        $error = true;
        $nameError = "Name must have at least 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error = true;
        $nameError = "Name must contain alphabets and space.";
    }

    //basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    } else {
        // checks whether the email exists or not
        $query = "SELECT email FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if ($count != 0) {
            $error = true;
            $emailError = "Provided Email is already in use.";
        }
    }
    // password validation
    if (empty($pass)) {
        $error = true;
        $passError = "Please enter password.";
    } else if (strlen($pass) < 6) {
        $error = true;
        $passError = "Password must have atleast 6 characters.";
    }

    // password hashing for security
    $password = hash('sha256', $pass);

    // if there's no error, continue to signup 
    if (!$error) {

        $query = "INSERT INTO user(name,email,password) VALUES('$name','$email','$password')";
        $res = mysqli_query($conn, $query);

        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
            unset($name);
            unset($email);
            unset($pass);
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";
        }
    }
}
?>

<?php
include 'header.php' ?>
<div class="container">


    <form class="bg-light rounded p-3 mt-4 shadow p-3 mb-5 bg-white rounded" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <h2>registration's form</h2>
        <?php if (isset($errMSG)) { ?>
            <div class="alert alert-<?php echo $errTyp ?> ">
                <?php echo  $errMSG; ?>
            </div>
        <?php } ?>


        <!-- name -->
        <div class="form-group mt-2">
            <label for="exampleInputName">Name:</label>
            <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>">
            <span class="text-danger"> <?php echo  $nameError; ?> </span>
        </div>

        <!-- email -->
        <div class="form-group mt-2">
            <label for="exampleInputEmail1">Email address:</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>">
            <span class="text-danger"> <?php echo  $emailError; ?> </span>
        </div>

        <!-- passwort -->
        <div class="form-group mt-2">
            <label for="exampleInputPassword1">Password:</label>
            <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" maxlength="15">
            <span class="text-danger"> <?php echo  $passError; ?> </span>
        </div>
        <!-- buton  -->
        <button type="submit" name="btn-register" class="btn btn-primary">register</button>

    </form>

</div>






<?php include 'footer.php' ?>