<?php
    include "config.php";
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
    $stm = $pdo->query("SELECT * FROM cars");
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <button class="btn btn-primary" onclick="location.assign('add-car.php')" >Add a New Car</button>
    <div class="row">
        <?php foreach ($data as $car):?>
            <div class="col-3">
                <h2><?php echo $car["make"] ?>&nbsp;<?php echo $car["model"] ?></h2>
                <h3><?php echo $car["year"] ?></h3>
            </div>
        <?php endforeach; ?>
    </div>
</div> 