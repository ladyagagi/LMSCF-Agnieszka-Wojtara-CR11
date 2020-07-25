<?php
require_once '../dbconnect.php';

checkIfAdmin();

if($_GET["id"]) {
    $id = $_GET["id"];

    $sql = "DELETE FROM animal WHERE id = $id";

    if(mysqli_query($conn, $sql)) {
        echo "the pet was sussccesfully deleted<br> <a href='../admin.php'>back to homepage </a>";
    } else {
        echo "error.";
    }
    $conn->close();
}