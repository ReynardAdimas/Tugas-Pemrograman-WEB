<?php 
    include "service/database.php"; 
    if(isset($_GET['id_order'])) // ngambil dari url
    {
        $id = $_GET['id_order'];  
        $sql = "SELECT * FROM `order` WHERE `id_order` = '$id'"; 
        $result = $db->query($sql); 
        if($result->num_rows > 0)
        {
            $data  = $result->fetch_assoc();
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./styles/style2.php">
</head>
<body>
    <?= include "layout/nav.html"?>
    <div class="container rounded title ">
        <?php
            $hargaMenu;
            $tax;
            $hargaSize;
            $hargaDairy = 0;
            $hargaTopping = 0;
        ?>
        <h1>Result Page</h1>
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Menu</th>
                        <td><?= $data["Menu"]?></td>
                            <!-- <?php
                                    if($data["Menu"]=="Americano")
                                    {
                                        $hargaMenu = 12000;
                                            $tax = 0.1;
                                    }
                                    else if($data["Menu"]== "Mochaccino")
                                    {
                                        $hargaMenu = 15000;
                                        $tax = 0.1;
                                    }
                                    else if($data["Menu"]== "Hazelnut Latte")
                                    {
                                        $hargaMenu = 20000;
                                            $tax = 0.15;
                                    }
                                    else if($data["Menu"]== "Vanilla Latte")
                                    {
                                        $hargaMenu = 17000;
                                            $tax = 0.15;
                                    }
                                    else if($data["Menu"]== "Salted Caramel")
                                    {
                                        $hargaMenu = 18000; 
                                            $tax = 0.15;
                                    }
                                    else 
                                    {
                                        $hargaMenu = 0;
                                        $tax = 0;
                                    } 
                            ?> -->
                        
                    </tr>
                    <tr>
                        <th scope="row">Hot/Ice</th>
                        <td><?= $data["hotIce"]?></td>
                            
                    </tr>
                    <tr>
                        <th scope="row">Size</th>
                        <td><?= $data["size"]?></td>
                            <?php
                                if($data["size"]=="Large")
                                {
                                    $hargaSize = 5000;
                                }
                                else if($data["size"]== "Reguler")
                                {
                                    $hargaSize = 0;
                                }
                                else 
                                {
                                    $hargaSize = "Undefined";
                                }
                            ?>
                        
                    </tr>
                    <tr>
                        <th scope="row">Sweetness Level</th>
                        <td><?= $data["sweetness"]?></td>
                    </tr>
                    <tr>
                        <th scope="row">Dairy</th>
                        <td><?= $data["dairy"]?></td>
                            <?php 
                                if($data["dairy"]=="Milk")
                                {
                                    $hargaDairy = 5000;
                                }
                                else if($data["dairy"]== "Oat Milk")
                                {
                                    $hargaDairy = 6000;
                                }
                                else if($data["dairy"]=="Almond Milk")
                                {
                                    $hargaDairy = 7000;
                                }
                            ?>
                        
                    </tr>
                    <tr>
                        <th scope="row">Topping</th>
                        <td><?= $data["topping"]?></td>
                            <?php 
                                $hargaTopping = 0;
                                $data_array = explode(",", $data["topping"]); // funsgi explode merubah string jadi array
                                foreach($data_array as $a)
                                {
                                    $a = trim($a); // memotong spasi tiap elemen
                                    if($a== "Caramel Sauce")
                                    {
                                        $ta = 3000;
                                        $hargaTopping += 3000;
                                    }
                                    else if($a == "Caramel Crumble")
                                    {
                                        $tb = 4000;
                                        $hargaTopping += 4000;
                                    }
                                    else if($a== "Choco Granola")
                                    {
                                        $tc = 4000;
                                        $hargaTopping += 4000;
                                    }
                                    else if($a== "Sea Salt Cream")
                                    {
                                        $td = 5000;
                                        $hargaTopping += 5000;
                                    }
                                            
                                }
                            
                            ?>
                        
                    </tr>
                    <tr>
                        <th scope="row">Note</th>
                        <td><?= $data["note"]?></td>
                    </tr>
                    <tr>
                        <th scope="row">Total Harga</th>
                        <td>
                            <?php 
                                // harga menu
                                $hargaTotal=0;
                                if($hargaMenu==0)
                                {
                                    echo "Default Rp. " . $hargaMenu;
                                }
                                else 
                                {
                                    echo "Default Rp. " . $hargaMenu;
                                    $hargaTotal+=$hargaMenu;
                                } 
                                // harga size
                                echo "<br>";
                                if($hargaSize=="Undefined")
                                {
                                    echo "Size   Rp.0";
                                }
                                else 
                                {
                                    echo "Size   Rp. " . $hargaSize; 
                                    $hargaTotal+=$hargaSize;
                                }
                                // harga dairy
                                echo "<br>";
                                if($hargaDairy==0)
                                {
                                    echo "Dairy   Rp.0";
                                }
                                else 
                                {
                                    echo "Dairy   Rp. " . $hargaDairy;
                                    $hargaTotal+=$hargaDairy;
                                }
                                // harga topping
                                echo "<br>";
                                if($hargaTopping==0)
                                {
                                    echo "Topping   Rp.0";
                                }
                                else 
                                {
                                    echo "Topping   Rp. ". $hargaTopping;
                                    $hargaTotal+=$hargaTopping;
                                }
                                // tax
                                echo "<br>";
                                if($tax==0)
                                {
                                    echo "Tax Rp. " . $tax;
                                }
                                else 
                                {
                                    echo "Tax Rp. " . $tax*$hargaTotal;
                                }
                                echo "<br>";
                                echo "Harga total Rp. " . $hargaTotal+($hargaTotal*$tax); 
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>  
            <a href="index.php"><button class="tombol">Back</button></a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>