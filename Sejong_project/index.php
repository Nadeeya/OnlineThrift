<?php
include "database.php";

$selectQuery = "SELECT * FROM items ORDER BY item_status, upload_date DESC";

$result = $conn->query($selectQuery);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="sellerHomePage.css" rel="stylesheet" >
    <link href="nav.css" rel="stylesheet" >
    <link href="footer.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="nav.js"></script>
  </head>
<body>
    <!--Navigation bar--->
    <nav class="navbar navbar-expand-lg navbar-custom" >
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </br>
        <h3 style="text-align:center"><b>Menu</b></h3>
        <?php if (!$_GET){
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
                  <a href="categoryPage.php?category=top&gender=female&username='.$username.'">Tops</a>
                  <a href="categoryPage.php?category=bottom&gender=female&username='.$username.'">Bottoms</a>
                  <a href="categoryPage.php?category=shoes&gender=female&username='.$username.'">Shoes</a>
                  <a href="categoryPage.php?category=bag&gender=female&username='.$username.'">Bags</a>
                  <a href="categoryPage.php?category=accessories&gender=female&username='.$username.'">Accessories</a>
                  <a href="categoryPage.php?category=others&gender=female&username='.$username.'">Others</a>
              </div>
              <button class="accordion">Shop for Men:</button>
              <div class="panel">
                  <a href="categoryPage.php?category=top&gender=male&username='.$username.'">Tops</a>
                  <a href="categoryPage.php?category=bottom&gender=male&username='.$username.'">Bottoms</a>
                  <a href="categoryPage.php?category=shoes&gender=male&username='.$username.'">Shoes</a>
                  <a href="categoryPage.php?category=bag&gender=male&username='.$username.'">Bags</a>
                  <a href="categoryPage.php?category=accessories&gender=male&username='.$username.'">Accessories</a>
                  <a href="categoryPage.php?category=others&gender=male&username='.$username.'">Others</a>
              </div>
        ';


        }
        
        ?>
        <hr style="border-top:5px solid black">
        <?php if (!$_GET){
          echo '<a href="thrifterLoginPage.html">Login</a>';
          }

          if ($_GET){
            echo '<a href="boughtItems.php?username='.$_GET['username'].'">Bought Items</a>';
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
</br>

    <p style="text-align:center">Welcome to <b>Local Thrifts Co.</b>. We believe in sustainable shopping, reducing waste and going green. </br>
    Join us and become one of our green sellers by clicking 'Seller's page' in the side menu. 
    </p>

    <section class="display">
    <?php
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              echo '
              <div class="card">
                        ';
                        if ($row['item_status']=="sold"){
                            echo'
                          <img src="uploads/' . $row['image'] . '" alt="product" style="width:100%;filter:grayscale(90%)">
                          <div class="container">
                              <h4 style="text-align: center"><b>' . $row['prodName'] .' (SOLD OUT)</b></h4>
                              <p><b>Size:</b> '.$row['size'].'</p>
                              <p><b>Price:</b> ' . $row['price'] . ' won.</p>
                              <p><b>Description:</b> ' . $row['description'] . '</p>
                              <p><b>Seller:</b> ' . $row['seller'] . '</p>
                              <p><b>Upload Date:</b> ' . $row['upload_date'] . '</p>
                          </div style="margin: bottom 20px;">
                      </div>';
                        } else{
                        echo'
                        <img src="uploads/' . $row['image'] . '" alt="product" style="width:100%">
                          <div class="container">
                              <h4 style="text-align: center"><b>' . $row['prodName'] . '</b></h4>
                              <p><b>Size:</b> '.$row['size'].'</p>
                              <p><b>Price:</b> ' . $row['price'] . ' won.</p>
                              <p><b>Description:</b> ' . $row['description'] . '</p>
                              <p><b>Seller:</b> ' . $row['seller'] . '</p>
                              <p><b>Upload Date:</b> ' . $row['upload_date'] . '</p>';
                              if (!$_GET){
                                echo'
                              <a onclick="noAccount()" class="btn btn-primary" >Add to cart</a>
                              ';
                              }
                              else{
                                echo'
                                <a href="addToCart.php?username='.$username.'&id='.$row['id'].'" class="btn btn-primary" >Add to cart</a>
                                ';
                              }echo'
                              </div style="margin: bottom 20px;">
                      </div>';
                        }
          }
      } else {
          echo '<p style="text-align:center;">You currently not selling any item.</p>';
      }

      ?>
    </section>
    <script src="nav.js"></script>
    <script>
      function noAccount(){
        var r = confirm("You are not logged in. Please click on 'ok' to log in");
            if (r == true) {
                location.href = 'thrifterLogInPage.html';
            } 

      }
    </script>
    

</body>
</html>