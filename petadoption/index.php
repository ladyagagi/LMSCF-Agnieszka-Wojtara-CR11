<?php
include('dbconnect.php');
include('header.php');

$sql = "SELECT * FROM animal";
$result = mysqli_query($conn, $sql);
$conn->close();
?>

<div class="jumbotron main">
    <h1 class="display-4 text-info">Don't dream! Adopt an animal</h1>
    <p class="lead text-info">make your life great again!</p>
    <hr class="my-4">
    <p></p>
    <a class="btn btn-primary btn-lg" href="register.php" role="button">register now!</a>
</div>

<div class="container">
    <h3 class="text-center m-4">our all pets to adopt</h3>
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
                    </ul>

                </div>
        <?php }
        } ?>


    </div>



</div>

<?php
include('footer.php');
