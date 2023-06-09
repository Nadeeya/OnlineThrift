<?php
include 'database.php';
$username = $_GET['username'];
$selectQuery = "SELECT * FROM items WHERE buyer='". $username."' AND item_status='selling'" ;
$result = $conn->query($selectQuery);
$num_rows = mysqli_num_rows($result);
$qty =0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="sellerHomePage.css" rel="stylesheet" >
    <link href="nav.css" rel="stylesheet" >
    <link href="footer.css" rel="stylesheet" >
    <style>
      @media (min-width: 1025px) {
        .h-custom {
        height: 100vh !important;
        }
        }
    </style>
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
            echo '<a href="boughtItems.php?username='.$username.'">Bought Items</a>';
            echo '<a href="myCart.php?username='.$username.'">My cart</a>';
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


    <section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="index.php?username=<?php echo $username?>" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                    <p class="mb-0">You have <?php echo $num_rows?> items in your cart</p>
                  </div>
                  
                </div>
                <?php 
                if ($num_rows > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo'
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <div class="d-flex flex-row align-items-center">
                            <div>
                              <img
                                src="uploads/' . $row['image'] . '"
                                class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                            </div>
                            <div class="ms-3">
                              <h5>'.$row['prodName'].'</h5>
                              <p class="small mb-0">'.$row['category'].'</p>
                            </div>
                          </div>
                          <div class="d-flex flex-row align-items-center">
                            <div style="width: 50px;">
                              <h5 class="fw-normal mb-0">1</h5>
                            </div>
                            <div style="width: 80px;">
                              <h5 class="mb-0">'.$row['price'].'₩</h5>
                            </div>
                            <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>';
                    $qty += $row['price'];

                  }
                }
                ?>


              </div>
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3" style="background-color:pink!important">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Shopping details</h5>
                      <img src="userIcon.jpg"
                        class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                    </div>                    

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2"><?php echo $qty?>₩</p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Shipping</p>
                      <p class="mb-2">5000₩</p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total(Incl. taxes)</p>
                      <?php if ($qty==0){
                        echo '<p class="mb-2">0₩</p>';
                      } else{
                        $qty +=5000;
                        echo'<p class="mb-2">'.$qty.'₩</p>';
                      }?>
                      
                    </div>

                    <button type="button" class="btn btn-info btn-block btn-lg" onclick="location.href='sold.php?buyer=<?php echo $username?>';">
                      <div class="d-flex justify-content-between">
                        <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                      </div>
                    </button>

                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <script src="nav.js"></script>
</body>
</html>