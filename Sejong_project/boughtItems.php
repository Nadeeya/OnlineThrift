<?php
include 'database.php';
$username = $_GET['username'];
$selectQuery = "SELECT * FROM items WHERE buyer='" . $username . "' AND item_status='sold' ORDER BY bought_on DESC";
$result = $conn->query($selectQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bought items</title>
    <link href="nav.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom" >
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </br>
        <h3 style="text-align:center"><b>Menu</b></h3>
        <?php if (!$_GET) {
    echo '
              <button class="accordion">Shop for Women:</button>
              <div class="panel">
                  <a href="categoryPage.php?category=top&gender=female">Tops</a>
                  <a href="categoryPage.php?category=bottom&gender=female">Bottoms</a>
                  <a href="categoryPage.php?category=shoes&gender=female">Shoes</a>
                  <a href="categoryPage.php?category=bag&gender=female">Bags</a>
                  <a href="categoryPage.php?category=accessories&gender=female">Accessories</a>
                  <a href="categoryPage.php?category=others&gender=female">Others</a>
              </div>
              <button class="accordion">Shop for Men:</button>
              <div class="panel">
                  <a href="categoryPage.php?category=top&gender=male">Tops</a>
                  <a href="categoryPage.php?category=bottom&gender=male">Bottoms</a>
                  <a href="categoryPage.php?category=shoes&gender=male">Shoes</a>
                  <a href="categoryPage.php?category=bag&gender=male">Bags</a>
                  <a href="categoryPage.php?category=accessories&gender=male">Accessories</a>
                  <a href="categoryPage.php?category=others&gender=male">Others</a>
              </div>
        ';}

if ($_GET) {
    $username = $_GET['username'];
    echo '
              <button class="accordion">Shop for Women:</button>
              <div class="panel">
                  <a href="categoryPage.php?category=top&gender=female&username=' . $username . '">Tops</a>
                  <a href="categoryPage.php?category=bottom&gender=female&username=' . $username . '">Bottoms</a>
                  <a href="categoryPage.php?category=shoes&gender=female&username=' . $username . '">Shoes</a>
                  <a href="categoryPage.php?category=bag&gender=female&username=' . $username . '">Bags</a>
                  <a href="categoryPage.php?category=accessories&gender=female&username=' . $username . '">Accessories</a>
                  <a href="categoryPage.php?category=others&gender=female&username=' . $username . '">Others</a>
              </div>
              <button class="accordion">Shop for Men:</button>
              <div class="panel">
                  <a href="categoryPage.php?category=top&gender=male&username=' . $username . '">Tops</a>
                  <a href="categoryPage.php?category=bottom&gender=male&username=' . $username . '">Bottoms</a>
                  <a href="categoryPage.php?category=shoes&gender=male&username=' . $username . '">Shoes</a>
                  <a href="categoryPage.php?category=bag&gender=male&username=' . $username . '">Bags</a>
                  <a href="categoryPage.php?category=accessories&gender=male&username=' . $username . '">Accessories</a>
                  <a href="categoryPage.php?category=others&gender=male&username=' . $username . '">Others</a>
              </div>
        ';

}
?>

      <hr style="border-top:5px solid black">
        <?php if (!$_GET){
          echo '<a href="thrifterLoginPage.html">Login</a>';
          }

          if ($_GET){
            echo '<a href="myCart.php?username='.$_GET['username'].'">My cart</a>';
          }
          ?>
        
        <a href="sellerLogInPage.html">Seller's page</a>
        <?php
        if ($_GET) {
            echo '<a href="index.php">Logout</a>';
        }
        ?>
      </div>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Local Thrifts Co.</span>
    </nav>

     <?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        ?>
      <table class="table table-bordered">
        <tr>
            <td>
        <div class="container">
            <div class="row">
                <div class="col-11"><h3> <?php echo $row["prodName"]; ?></h3></div>
                <div class="col-2"><img src="uploads/<?php echo $row["image"] ?>" alt="sold product" style="width:100%;height:100%"></div>
                <div class="col-4">
                    <span style="font-weight: bold;">Bought from : </span><?php echo $row['seller']; ?><br>
                    <?php
                            $secondQuery = "SELECT * FROM seller WHERE username='" . $row['seller'] . "'";
                            $result2 = $conn->query($secondQuery);
                            $row2 = mysqli_fetch_array($result2)
                    ?>
                    <span style="font-weight: bold;">Seller's email: </span><?php echo $row2['email']; ?> <br>
                    <span style="font-weight: bold;">Bought on:</span> <?php echo $row['bought_on']; ?> <br>
                </div>
                <div class="col-4">
                    <span style="font-weight: bold;">Price:</span> <?php echo $row['price']; ?> won.<br>
                    <span style="font-weight: bold;">Category:</span> <?php echo $row['category']; ?><br>
                    <span style="font-weight: bold;">Description :</span> <?php echo $row['description']; ?><br>
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
} else {
    echo "There is no jobs available at the moment. Please come back again!";
}
?>

<script src="nav.js"></script>

</body>
</html>