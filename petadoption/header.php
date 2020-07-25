<?php
/*
TODO wenn eingeloggt include("header_loggedin.php");
else 
include("header_not_loggedin.php");
*/
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

        .button {
            height: 4.3vh
        }
        .error-box{
            text-align: center;
            margin: 0 0 0 0;
            padding: 10px;
            color: red;
            background: #faa;
        }
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

        <!-- ---------------- Login ----------------------- -->

        <div class="wrapper text-white">
            <form method="post" action="login.php" > <!---- autocomplete="off" login.php--->
                <p>Member's login</p>
                <div class="form-row mt-0">

                    <div class="col-6">

                        <input type="email" name="email" class="form-control input" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                       
                    </div>

                    <div class="col-4">


                        <input type="password" name="pass" class="form-control input" placeholder="Your Password" maxlength="15" />
                        
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit" name="btn-login">Login</button>
                </div>
            </form>
            
            <p>still not a member? join us! <a class="text-danger" href="register.php">register now</a></p>
        </div>
    </div>
    <?php if (hasError()) { ?>
            <p class="error-box"><?php printError(); ?> </p>
<?php } ?>