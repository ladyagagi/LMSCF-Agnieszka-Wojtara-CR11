<?php

require_once 'dbconnect.php';

checkIfAdmin();


if ($_GET["id"]) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM animal WHERE id = $id";
        $result = mysqli_query($conn, $sql); //to run the query
        $row = $result->fetch_assoc();
}
?>


<?php include("header.php"); ?> 
<div class="container">

        <h4 class="mt-4 mb-3">Update item:</h4>
        <form action="actions/a_update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <div class="form-group bg-light rounded p-3">

                        <label for="">name</label>
                        <input type="text required" name="name" class="form-control" value="<?php echo $row['name'] ?>">
                        <br>
                        <label for="">image/url</label>
                        <input type="text" name="image" class="form-control" value="<?php echo $row['image'] ?>">
                        <br>
                        <label for="">age</label>
                        <input type="number required" name="age" class="form-control" value="<?php echo $row['age'] ?>">
                        <br>
                        <label for="">description</label>
                        <input type="textarea" name="description" class="form-control" value="<?php echo $row['description'] ?>">
                        <br>
                        <label for="type">type</label>
                        <div class="input-group-prepend w-25">

                                <label for="type">small</label>
                                <input type="radio" name="type" class="form-control mr-3 btn-sm" value="small" <?php if ($row['type'] == 'small') {
                                                                                                                        echo 'checked="checked"';
                                                                                                                } ?>>

                                <label for="type">middle</label>
                                <input type="radio" name="type" class="form-control mr-3 btn-sm" value="middle" <?php if ($row['type'] == 'middle') {
                                                                                                                        echo 'checked="checked"';
                                                                                                                } ?>>

                                <label for="type">large</label>
                                <input type="radio" name="type" class="form-control mr-3 btn-sm" value="large" <?php if ($row['type'] == 'large') {
                                                                                                                        echo 'checked="checked"';
                                                                                                                } ?>>

                        </div>
                        <br>
                        <label for="">hobbies</label>
                        <input type="text" name="hobbies" class="form-control" value="<?php echo $row['hobbies'] ?>">
                        <br>
                        <label for="">city</label>
                        <input type="text" name="city" class="form-control" value="<?php echo $row['city'] ?>">
                        <br>
                        <label for="">zip</label>
                        <input type="number" name="zip" class="form-control" value="<?php echo $row['zip'] ?>">
                        <br>
                        <label for="">street</label>
                        <input type="text" name="street" class="form-control" value="<?php echo $row['street'] ?>">
                        <br>
                        <p class="text-right">

                                <input type="submit" value="update" name="update" class="btn btn-success">
                        </p>
                </div>
        </form>

</div>
<?php include("footer.php"); ?>
</body>

</html>