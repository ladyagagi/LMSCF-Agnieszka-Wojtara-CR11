<?php
require_once '../dbconnect.php';

checkIfAdmin();

if($_POST){
    $id = $_POST["id"];
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

    $sql = "
        UPDATE 
            animal 
        SET 
            name= '$name',image='$image' ,age = '$age', description = '$description',
            type = '$type', hobbies = '$hobbies', city='$city', zip = '$zip', street='$street'
        WHERE 
            id = '$id'
        ";

// echo $sql; die;

   mysqli_query($conn, $sql); //run the query
   header("Location: ../admin.php");

?>