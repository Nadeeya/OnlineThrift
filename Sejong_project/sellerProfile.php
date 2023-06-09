<?php
include "database.php";
$username = $_GET['username'];
$selectQuery = "SELECT * FROM seller WHERE username='" . $username . "'";
$result = $conn->query($selectQuery);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="nav.css" rel="stylesheet" >
    <title>My profile</title>
    <style>
        body{
            background-color: beige;
        }

        .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width:70%;
        background-color: whitesmoke;
        border-radius: 5px;
        margin-left:auto;
        margin-right:auto;
        margin-top:10px;
        
      }

      /* On mouse-over, add a deeper shadow */
      .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
      }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom" >
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
         <a href="sellerHomePage.php?username=<?php echo $username ?>">My Store</a>
        <a href="uploadProduct.php?username=<?php echo $username?>">Upload new item</a>
        <a href="soldPage.php?username=<?php echo $username?>">Sold items</a>
        <a href="sellerSignUpPage.html">Logout</a>
      </div>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Local Thrifts Co. </span>
       
    </nav>

    <div class="container">
        <div class="row">
            <div class="card">
            <div style="width: 100%; background-color: white; opacity: 0.925; margin: 40px auto auto auto; border-radius: 10px; padding-bottom:30px;">
                <div style="width: 70%; margin: 20px auto;">
                    <br><h2 style="text-align: center">My profile </h2><br>
                    <img src="profile.jpg" alt="profile" style="width: 18%;margin-left:40%; margin-right: 50%"><br>
                    <p>
                        <h4>Personal details:</h4>
                        <span style="font-weight:bold;">Username : </span> <?php echo $row['username'] ?> </br>
                        <span style="font-weight:bold;">Email : </span> <?php echo $row['email'] ?>  </br>
                        <span style="font-weight:bold;">Starting Date : </span><?php echo $row['start_date'] ?> </br>
                        <span style="font-weight:bold;">Number of items selling : </span><?php echo $row['no_selling'] ?> </br>
                        <span style="font-weight:bold;">Number of items sold : </span> <?php echo $row['no_sold'] ?> </br>
                    </p>
                </div>
            </div>
            </div>
        </div>
    </div>

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