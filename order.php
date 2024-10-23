<?php
    include "service/database.php"; 
    $message = "";
    if(isset($_POST["tombol"])){
        
            foreach($_POST['menu'] as $a ){
                $menu = $a;
            }
            foreach($_POST['size'] as $a ){
                $size = $a;
            }
            foreach($_POST['hotIce'] as $a ){
                $hotIce = $a;
            }
            foreach($_POST['sweet'] as $a ){
                $sweet = $a;
            }
            $dairy = isset($_POST["dairy"]) ? implode(", ", $_POST["dairy"]) : 'None'; // funsgi implode merubah array jadi string
            $topping = isset($_POST["topping"]) ? implode(", ", $_POST["topping"]) : 'None';
            $note = isset($_POST["note"]) ? $_POST["note"] : 'None';
            $sql = "INSERT INTO `order` (`Menu`, `hotIce`, `size`, `sweetness`, `dairy`, `topping`, `note`) 
                    VALUES ('$menu', '$hotIce','$size','$sweet','$dairy','$topping','$note')"; 
            if($db->query($sql)){
                $message = "Order Berhasil Dibuat";
                sleep(2);
                header("location: index.php");
            } else {
                $message = "Order gagal dibuat";
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="./styles/style.php">
    <title>Order Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #ECDFCC;"> 
    <?php include "layout/nav.html"?>
    <form action="order.php" method="post">
        <div class="container rounded title ">
            <h1>Input Your Order</h1>
            <!-- Menu -->
            <div class="menu">
                <label for="menu" class="tulisan">Menu</label>
                <br>
                <select class="form-select" aria-label="Small select example" name="menu[]">
                    <option selected disabled>Menu</option>
                    <option name="menu[]" value="Americano" >Americano</option>
                    <option name="menu[]" value="Mochaccino">Mochaccino</option>
                    <option name="menu[]" value="Hazelnut Latte">Hazelnut Latte</option>
                    <option name="menu[]" value="Vanilla Latte">Vanilla Latte</option>
                    <option name="menu[]" value="Salted Caramel">Salted Caramel</option>
                  </select>
            </div>
            <!-- Hot/Ice --> 
            <div class="hot-ice">
                <label for="hotIce" class="tulisan" >Hot/Ice</label>
                <br>
                <input type="radio" id="hot" name="hotIce[]" value="Hot"> 
                <label for="hot" class="pilihan">Hot</label>
                <input type="radio" id="ice" name="hotIce[]" value="Ice" checked> 
                <label for="ice" class="pilihan">Ice</label>
            </div>
            <!-- Size -->
            <div class="size">
                <label for="size" class="tulisan">Size</label>
                <br>
                <input type="radio" id="regular" name="size[]" value="Regular" checked> 
                <label for="regular" class="pilihan">Regular</label>
                <input type="radio" id="large" name="size[]" value="Large"> 
                <label for="large" class="pilihan">Large</label>
            </div> 
            <!-- Sweetness Level --> 
            <div class="sweet">
                <label for="sweet" class="tulisan">Sweetness Level</label>
                <br>
                <input type="radio" id="normal" name="sweet[]" value="Normal" checked> 
                <label for="normal" class="pilihan">Normal Sweet</label>
                <input type="radio" id="less" name="sweet[]" value="Less"> 
                <label for="less" class="pilihan">Less Sweet</label>
            </div>
            <!-- Dairy -->
            <div class="dairy" >
                <label for="dairy" class="tulisan">Dairy <span>optional</span></label> 
                <br>
                <input type="radio" id="milk" name="dairy[]" value="Milk"> 
                <label for="milk" class="pilihan">Milk</label>
                <input type="radio" id="oat" name="dairy[]" value="Oat Milk"> 
                <label for="oat" class="pilihan">Oat Milk</label>
                <input type="radio" id="almond" name="dairy[]" value="Almond Milk"> 
                <label for="almond" class="pilihan">Almond Milk</label>
            </div>
            <!-- Topping -->
            <div class="topping">
                <label for="topping" class="tulisan">Topping</label>
                <br>
                <input type="checkbox" id="caramel" name="topping[]" value="Caramel Sauce"> 
                <label for="caramel" class="pilihan">Caramel Sauce</label>
                <input type="checkbox" id="crumble" name="topping[]" value="Caramel Crumble"> 
                <label for="crumble" class="pilihan">Caramel Crumble</label>
                <input type="checkbox" id="choco" name="topping[]" value="Choco Granola"> 
                <label for="choco" class="pilihan">Choco Granola</label>
                <input type="checkbox" id="sea" name="topping[]" value="Sea Salt Cream"> 
                <label for="sea" class="pilihan">Sea Salt Cream</label>
            </div>
            <!-- Note -->
            <div class="note">
                <label for="note" class="tulisan">Note</label>
                <br>
                <textarea class="form-control" placeholder="Write additional note here" id="note" name="note"></textarea>
            </div>
            <br>
            <!-- button submit -->
            <input type="submit" value="Submit" class="tombol" name="tombol">
            <!-- button reset -->
            <input type="reset" value="Reset" class="tombol">
            <i><?= $message?></i>
        </div>
    </form> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</body>
</html>