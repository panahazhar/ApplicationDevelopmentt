<?php
 require 'connection.php';
if(isset($_POST["delete"]) && isset($_POST["deleteId"])){
  foreach($_POST["deleteId"] as $deleteId){
    $delete = "DELETE FROM products WHERE prId = $deleteId";
    mysqli_query($con, $delete);
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>SHOP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
     
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>

        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
     
        <link rel="stylesheet" href="css/style.css" type="text/css">
      
     
  </head>
  <body>
    <?php require 'header.php';?>
    <table class="table" >
      <form class="" action="" method="post">
        <tr>
          <th class="col"> <button type="submit" name="delete">Delete</button> </th>
          <th class="col">#</th>
          <th class="col">PRoduct Name</th>
          <th class="col">Product ID</th>
        </tr>
        <?php
        $rows = mysqli_query($con, "SELECT * FROM products");
        $i = 1;
        foreach($rows as $row) :
        ?>
        <tr>
          <td class="row" align = center> <input type="checkbox" name="deleteId[]" value="<?php echo $row['prId']; ?>"> </td>
          <td class="row"><?php echo $i++; ?></td>
          <td class="row"><?php echo $row["ProductName"]; ?></td>
          <td class="row"><?php echo $row["prId"]; ?></td>
        </tr>
        <?php endforeach; ?>
      </form>
    </table>
  </body>
</html>
