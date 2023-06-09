<?php
include 'database.php';
$username = $_GET['username'];
$selectQuery = "SELECT * FROM items WHERE seller='" . $username . "' AND item_status='sold' ORDER BY bought_on DESC";
$result = $conn->query($selectQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sold items</title>
    <link href="nav.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom" >
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="sellerHomePage.php?username=<?php echo $username?>">Home</a>
        <a href="sellerProfile.php?username=<?php echo $username?>">My profile</a>
        <a href="uploadProduct.php?username=<?php echo $username?>">Upload new item</a>
        <a href="index.php">Logout</a>
      </div>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Local Thrifts Co.</span>   
    </nav>

     <?php
      if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
      ?>
      <table class="table table-bordered">
        <tr>
            <td>
        <div class="container">
            <div class="row">
                <div class="col-11"><h3> <?php echo $row["prodName"];?></h3></div>
                <div class="col-2"><img src="uploads/<?php echo $row["image"]?>" alt="sold product" style="width:100%;height:100%"></div>
                <div class="col-4">
                    <span style="font-weight: bold;">Sold to : </span><?php echo $row['buyer'];?><br>
                    <?php 
                    $secondQuery = "SELECT * FROM buyer WHERE username='".$row['buyer']."'";
                    $result2 = $conn->query($secondQuery);
                    $row2 = mysqli_fetch_array($result2)
                     ?>
                    <span style="font-weight: bold;">Customer Phone number :</span><?php echo $row2['phone'];?> <br>
                    <span style="font-weight: bold;">Customer's email: </span><?php echo $row2['email'];?> <br>
                    <span style="font-weight: bold;">Bought on:</span> <?php echo $row['bought_on'];?> <br>
                </div>
                <div class="col-4">
                    <span style="font-weight: bold;">Price:</span> <?php echo $row['price'];?> won.<br>
                    <span style="font-weight: bold;">Category:</span> <?php echo $row['category'];?><br>
                    <span style="font-weight: bold;">Description :</span> <?php echo $row['description'];?><br>
                    <br>
                </div>
            </div>
        </div>
      </td>
      </tr>
      
      <?php
      }
      ?>
      </table>
    
      <?php
      }
      else{
      echo "</br>
      <p style='text-align:center'>You have not sold anything yet, come back again! :)</p>";
      }
      ?>

<script src="nav.js"></script>
    
</body>
</html>