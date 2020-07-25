<?php
// ob_start();
// session_start();
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

// select logged-in users details
$res = mysqli_query($conn, "SELECT * FROM user WHERE id=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

$result = mysqli_query($conn, "SELECT * FROM animal");



include('header2.php')
?>

<div class="container">
    <h3 class="text-center m-4">hier you can choose a pet to adopt</h3>


    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-secondary">all</button>
        <button type="button" class="btn btn-secondary">small</button>
        <button type="button" class="btn btn-secondary">middle</button>
        <button type="button" class="btn btn-secondary">large</button>
    </div>
    <div class="row row-cols-sm-2 row-cols-md-4 m-4">
        <?php
        if ($result->num_rows == 0) {
            echo "no result";
        } else {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $key => $value) { ?>

                <div class="col card shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                    <img src="<?php echo $value["image"] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><b><?php echo $value["name"] ?></b></h5>
                        <p class="card-text"><small><?php echo $value["description"] ?></small></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">age: <?php echo $value["age"] ?></li>
                        <li class="list-group-item">type: <?php echo $value["type"] ?></li>
                        <li class="list-group-item">hobbies: <?php echo $value["hobbies"] ?></li>
                        <li class="list-group-item"><?php echo $value["zip"] ?> <?php echo $value["city"] ?>, <?php echo $value["street"] ?></li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Contact the animal owner</a>

                    </div>

                </div>
        <?php }
        } ?>


    </div>
    <?php include('footer.php');
    ?>
