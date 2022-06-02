<?php include "./partials/header.php"; ?>
<?php include "./config.php"; ?>
<?php include "./functions.php"; ?>

<?php
    $make = "";
    $model = "";
    $year = "";
    $body_style = "";
    $drive_type = "";
    $doors = "";
    $price = "";
    $instock = "";
    
    if( $_SERVER["REQUEST_METHOD"] == "POST" ){
        $errors = [];
        // Taking valid inputs
        $make = sanitized_input($_POST["make"]);
        $model = sanitized_input($_POST["model"]);
        $year = sanitized_input($_POST["year"]);
        $body_style = sanitized_input($_POST["body_style"]);
        $drive_type = sanitized_input($_POST["drive_type"]);
        $doors = sanitized_input($_POST["doors"]);
        $price = sanitized_input($_POST["price"]);
        $instock = sanitized_input($_POST["instock"]);

        $pdo = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
        $stm = $pdo->prepare("INSERT INTO cars (make,model,year,body_style,drive_type,doors,price, instock) VALUES (:make,:model,:year,:body_style,:drive_type,:doors,:price,:instock)");
        if(empty($errors)){
            $stm->bindParam(":make",$make);
            $stm->bindParam(":model",$model);
            $stm->bindParam(":year",$year);
            $stm->bindParam(":body_style",$body_style);
            $stm->bindParam(":drive_type",$drive_type);
            $stm->bindParam(":doors",$doors);
            $stm->bindParam(":price",$price);
            $stm->bindParam(":instock",$instock);
            
            $stm->execute();
            header("Location: index.php");
        } else {
            echo "some kind of error";
        }

    }else {
    }

?>


<div class="container">
    <form method="POST">
        <div class="row mb-3">
            <div class="col">
                Make
                <input class="form-control" type="text" name="make" placeholder="Make" value="<?php echo $make ?>">
            </div>
            <div class="col">
                <input class="form-control" type="text" name="model" placeholder="Model" value="<?php echo $model ?>">
            </div> 
        </div>
        <div class="row mb-3">
            <div class="col">
                <input class="form-control" type="text" name="year" placeholder="Year" value="<?php echo $year ?>">
            </div>
            <div class="col">
                <input class="form-control" type="text" name="body_style" placeholder="Body Style" value="<?php echo $body_style?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input class="form-control" type="text" name="drive_type" placeholder="Drive Type" value="<?php echo $drive_type ?>">
            </div>
            <div class="col">
                <input class="form-control" type="text" name="doors" placeholder="doors" value="<?php echo $doors ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input class="form-control" type="text" name="price" placeholder="Price" value="<?php echo $price ?>">
            </div>
            <div class="col">
                <input class="form-control" type="text" name="instock" placeholder="Status" value="<?php echo $instock ?>">
            </div>
        </div>
        <button class="btn w-100 btn-primary">Add Car</button>
    </form>
</div>
<?php include "./partials/footer.php"; ?>