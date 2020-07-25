<?php

require_once 'dbconnect.php';

checkIfSuperAdmin();

$result = mysqli_query($conn, "SELECT * FROM user");


include('header2.php');
?>

<div class="container"></div>
<div class="row row-cols-sm-2 row-cols-md-4 m-4">
    <?php
    if ($result->num_rows == 0) {
        echo "no result";
    } else {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($rows as $key => $value) { ?>

            <div class="col card shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><b><?php echo $value["name"] ?></b></h5>
                    <p class="card-text"><small><?php echo $value["email"] ?></small></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">age: <?php echo $value["role"] ?></li>
                </ul>
                <div class="card-body">
                    <a class="card-link"><?php echo "<a href='delete.php?id=" . $value["id"] . "'>>>delete</a>" ?>

                </div>

            </div>
    <?php }
    } ?>
</div>
<?php include('footer.php');
?>