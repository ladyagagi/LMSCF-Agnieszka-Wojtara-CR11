<?php
require_once ('../dbconnect.php');

checkIfAdmin();

if ($_POST) {
    $name = $_POST["name"];
    $image = $_POST["image"];
    $age = $_POST["age"];
    $description = $_POST["description"];
    $type = $_POST["type"];
    $hobbies = $_POST["hobbies"];
    $city = $_POST["city"];
    $zip = $_POST["zip"];
    $street = $_POST["street"];
}

$sql = "INSERT INTO animal 
            (name, image, age, description, type, hobbies, city, zip, street) 
        VALUES 
            ('$name','$image','$age', '$description', '$type','$hobbies','$city','$zip','$street')";
 


if (mysqli_query($conn, $sql)) {
    echo "Pet created.<br>
    <a href='../admin.php'>Back to the admin page</a>";
} else {
    echo "error".$sql;
}

//header("Location: ../admin.php");
