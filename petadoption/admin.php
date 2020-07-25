<?php
 
require_once ('dbconnect.php');

checkIfAdmin();

include ('header2.php');
$result = mysqli_query($conn, "SELECT * FROM animal");
$conn->close(); 
?>
<div class="container">
    <h1 class="mt-4">Hello Admin</h1>
    <hr>
    <a href="create.php">create>>></a>
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
                    <div class="card-body">
                        <a href="#" class="card-link"><?php echo "<a href='update.php?id=".$value["id"]."'>>>edit</a>"?>
                        <a class="card-link"><?php echo "<a href='actions/a_delete.php?id=".$value["id"]."'>>>delete</a>" ?>

                    </div>

                </div>
        <?php }
        } ?>
    </div>
    <?php include('footer.php');
    
