<?php
include('dbconnect.php');
include('header.php');

$sql = "SELECT * FROM animal WHERE NOT age <= 8";
$result = mysqli_query($conn, $sql);
$conn->close();
?>

<div class="container"> 
<h3 class="text-center m-4">our golden age pets to adopt</h3>
    <div class="row row-cols-sm-2 row-cols-md-4 mt-4">
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
                
  </div>
  <?php } } ?>
  </div>