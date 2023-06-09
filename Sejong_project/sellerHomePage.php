<?php
include "database.php";
$username = $_GET['username'];
$selectQuery = "SELECT * FROM items WHERE seller='" . $username . "' ORDER BY item_status, upload_date DESC";
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
  </head>
<body>
    <!--Navigation bar--->
    <nav class="navbar navbar-expand-lg navbar-custom" >
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="sellerProfile.php?username=<?php echo $username?>">My profile</a>
        <a href="uploadProduct.php?username=<?php echo $username?>">Upload new item</a>
        <a href="soldPage.php?username=<?php echo $username?>">Sold items</a>
        <a href="index.php">Logout</a>
      </div>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Local Thrifts Co.</span>   
    </nav>

    <section style="text-align:center">
      <p>Hello! Welcome to your very own online thrift store page! </p>
      <p>Below are the items you are currently selling</p>
    </section>

    
    <section class="display">
    <?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
                      <div class="card">
                        ';
        if ($row['item_status'] == "sold") {
            echo '
                          <img src="uploads/' . $row['image'] . '" alt="product" style="width:100%;filter:grayscale(90%)">
                          <div class="container">
                              <h4 style="text-align: center"><b>' . $row['prodName'] . ' (SOLD OUT)</b></h4>
                              <p><b>Size:</b> ' . $row['size'] . '</p>
                              <p><b>Price:</b> ' . $row['price'] . ' won.</p>
                              <p><b>Description:</b> ' . $row['description'] . '</p>
                              <p><b>Seller:</b> ' . $row['seller'] . '</p>
                              <p><b>Upload Date:</b> ' . $row['upload_date'] . '</p>
                          </div style="margin: bottom 20px;">
                      </div>';
        } else {
            echo '
                        <img src="uploads/' . $row['image'] . '" alt="product" style="width:100%">
                          <div class="container">
                              <h4 style="text-align: center"><b>' . $row['prodName'] . '</b></h4>
                              <p><b>Size:</b> ' . $row['size'] . '</p>
                              <p><b>Price:</b> ' . $row['price'] . ' won.</p>
                              <p><b>Description:</b> ' . $row['description'] . '</p>
                              <p><b>Seller:</b> ' . $row['seller'] . '</p>
                              <p><b>Upload Date:</b> ' . $row['upload_date'] . '</p>
                          </div style="margin: bottom 20px;">
                      </div>';
        }
    }
} else {
    echo '<p style="text-align:center;">There are currently no item selling in this category.</p>';
}
?>
           
    </section>

    

        <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
    
    
</body>
</html>