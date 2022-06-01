<?php include "./partials/header.php"; ?>
<div class="container">
    <form action="/" method="POST">
        <input type="text" name="make" placeholder="Make" id="">
        <input type="text" name="model" placeholder="Model" id="">
        <input type="text" name="year" placeholder="Year" id="">
        <input type="text" name="body_style" placeholder="Body Style" id="">
        <input type="text" name="drive_type" placeholder="Drive Type" id="">
        <input type="text" name="doors" placeholder="doors" id="">
        <input type="text" name="price" placeholder="Price" id="">
        <input type="text" name="instock" placeholder="Status" id="">
        <button class="btn btn-block btn-primary">Add Car</button>
    </form>
</div>
<?php include "./partials/footer.php"; ?>