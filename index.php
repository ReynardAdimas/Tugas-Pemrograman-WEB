<?php 
  include "service/database.php"; 
  $message = "";
  if(isset($_GET['id_order']))
  {
    $id = $_GET['id_order'];  
    $sql = "DELETE FROM `order` WHERE `id_order` = '$id'"; 
    //$delete = mysqli_query($db, $sql);
    if($db->query($sql))
    {
      $message = "Data berhasil dihapus";
    }
    else 
    {
      $message = "Data gagal dihapus";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css"  href="./styles/style.php">
    <link rel="stylesheet" href="./styles/dashboard.php" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #ECDFCC;">
    <?php include "layout/nav.html"?>
    <div class="d-flex mb-3">
        <h3 class="me-auto p-1 " style="margin-left: 67px;">All Orders</h3>
        <a href="order.php"><button type="button" class="btn btn-light" style="margin-right: 67px; background-color:#697565; color:#ECDFCC;">Add Order</button></a>
    </div> 
    <div class="rounded title table-responsive">
      <table class="table table-hover mt-3">
      <thead >
        <tr>
          <th scope="col" style="background-color:#697565; color:#ECDFCC;">No</th>
          <th scope="col" style="background-color:#697565; color:#ECDFCC;">Menu</th>
          <th scope="col" style="background-color:#697565; color:#ECDFCC;">Hot/Ice</th>
          <th scope="col" style="background-color:#697565; color:#ECDFCC;">Size</th>
          <th scope="col" style="background-color:#697565; color:#ECDFCC;">Sweetness Level</th>
          <th scope="col" style="background-color:#697565; color:#ECDFCC;">Dairy</th>
          <th scope="col" style="background-color:#697565; color:#ECDFCC;">Topping</th>
          <th scope="col" style="background-color:#697565; color:#ECDFCC;">Note</th>
          <th scope="col" style="background-color:#697565; color:#ECDFCC;">Action</th>
      </tr>
    </thead>
    <tbody>
      <i><?= $message ?></i>
    <?php 
        include "service/database.php"; 
        $sql = "SELECT * FROM `order`"; 
        $result = $db->query($sql); 
        $nomer = 1;
        while($row = $result->fetch_assoc())
        {?>
          <tr>
            <th scope="row" style="background-color:#697565;"><?= $nomer?></th>
            <td style="background-color:#697565; color:#ECDFCC;"><?= $row["Menu"] ?></td>
            <td style="background-color:#697565; color:#ECDFCC;"><?= $row["hotIce"] ?></td>
            <td style="background-color:#697565; color:#ECDFCC;"><?= $row["size"] ?></td>
            <td style="background-color:#697565; color:#ECDFCC;"><?= $row["sweetness"] ?></td>
            <td style="background-color:#697565; color:#ECDFCC;"><?= $row["dairy"] ?></td>
            <td style="background-color:#697565; color:#ECDFCC;"><?= $row["topping"] ?></td>
            <td style="background-color:#697565; color:#ECDFCC;"><?= $row["note"] ?></td>
            <td style="background-color:#697565; ">
            <a href="resultPage.php?id_order=<?= $row['id_order']?>"><i class="bi bi-eye-fill m-1" style="color:black;"></i></a>
            <a href="editPage.php?id_order=<?= $row['id_order']?>"><i class="bi bi-pen-fill m-1 " style="color:black;"></i></a>
            <a href="index.php?id_order=<?= $row['id_order'] ?>"><i class="bi bi-trash3-fill m-1" style="color:black;" name="delete"></i></a>
          </td>
          </tr>
        <?php 
        $nomer++;
        }
      ?>
      </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>