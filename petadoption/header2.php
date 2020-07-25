<?php
 

require_once 'dbconnect.php';

// if session is not set this will redirect to login page
// if (!isset($_SESSION['user'])) {
//     header("Location: index.php");
//     exit;
// }

// if (($_SESSION['role'] == "admin")) {
//     header("Location: admin.php");
//     exit;
// }

if (isset($_SESSION['user'])) {
   
    $res = mysqli_query($conn, "SELECT * FROM user WHERE id=" . $_SESSION['user']);
    $userRow = mysqli_fetch_array($res);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.0/yeti/bootstrap.min.css" integrity="sha384-chJtTd1EMa6hQI40eyJWF6829eEk4oIe7b3nNtUni7VxA3uHc/uIM/8ppyjrggfV" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/17b2af55ff.js"></script>
    <title>header</title>
    <style>
        .input {
            height: 4vh;
        }

        /* .button {
            height: 4.3vh
        } */
    </style>
</head>

<body>
    <div class="d-flex flex-row justify-content-between bg-dark">
        <div>
            <ul class="nav">
                <li class="nav-item">

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">ALL ANIMALS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="general.php">small&large animals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="senior.php">senior animals</a>
                </li>
            </ul>
        </div>

        <!-- ---------------- Logout ----------------------- -->

        <?php 
        if (isset($userRow)) { ?>
        <div class="wrapper d-flex flex-row justify-content-between">

            <div>
                <p class="my-4 text-white">Hi <?php echo $userRow['name']; ?> (<?php echo $userRow['email']; ?>) </p>
            </div>
            <div>
                <button class="btn text-white btn-primary btn-sm" type="submit" name="btn-logout"> <a class="text-white" href="logout.php?logout">Log Out</a></button>
            </div>

        </div>
        <?php } ?>
    </div>