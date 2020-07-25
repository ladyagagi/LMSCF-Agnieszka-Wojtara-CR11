   <?php 
   require_once 'dbconnect.php';

   checkIfAdmin();
   
   include ("header2.php"); ?>
    <div class="container">

        <h4 class="mt-4 mb-3">To insert a new item please fill the following form:</h4>
        <form action="actions/a_create.php" method="post">
            <div class="form-group bg-light rounded p-3">
                

                
                <label for="">name</label>
                <input type="text required" name="name" class="form-control">
                <br>
                <label for="">image</label>
                <input type="text required" name="image" class="form-control">
                <br>
                <label for="">age</label>
                <input type="number" name="age" class="form-control">
                <br>
                <label for="">description</label>
                <input type="textarea" name="description" class="form-control">
                <br>

                <label for="type">type</label>
                <div class="input-group-prepend w-25">
                    <label for="type">small</label>
                    <input type="radio" name="type" class="form-control mr-3 btn-sm radio" value="small">
                    <label for="type">middle</label>
                    <input type="radio" name="type" class="form-control mr-3 btn-sm radio" value="middle">
                    <label for="type">large</label>
                    <input type="radio" name="type" class="form-control mr-3 btn-sm radio" value="large">
                </div>
                <br>

                <label for="">hobbies</label>
                <input type="text" name="hobbies" class="form-control">
                <br>
                <label for="">city</label>
                <input type="text" name="city" class="form-control">
                <br>
                <label for="">zip</label>
                <input type="number" name="zip" class="form-control">
                <br>
                <label for="">street</label>
                <input type="text" name="street" class="form-control">
                <br>
                <p class="text-right">     
                    <input type="submit" value="insert" name="submit" class="btn btn-success">
                </p>
            </div>
        </form>
    </div>
    <?php include ("footer.php"); ?>
