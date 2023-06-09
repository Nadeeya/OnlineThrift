<?php
$username = $_GET['username'];
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
    <link href="footer.css" rel="stylesheet" >
    <title>Upload product</title>
    <style>
        .uploadform {
            width: 70%;
            margin:auto;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <!--Navigation bar--->
    <nav class="navbar navbar-expand-lg navbar-custom" >
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="sellerHomePage.php?username=<?php echo $username?>">My home page</a>
        <a href="sellerProfile.php?username=<?php echo $username?>">My profile</a>
        <a href="soldPage.php?username=<?php echo $username?>">Sold items</a>
        <a href="index.php">Logout</a>
      </div>
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Local Thrifts Co.</span>
      
    </nav>


    <div style="text-align: center;">
    <div class="card" style="width:80%; margin:auto auto; margin-top:20px;">
    <h2>Please fill in the details for the new product</h2>
    <form role="form" name="newJobForm" method="POST" class="main-form needs-validation" action="uploadProduct-bg.php?username=<?php echo $username ?>" enctype="multipart/form-data">
        <div class="uploadform">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Name of product</span>
                <input type="text" class="form-control" id="prodName" name="prodName" 
                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">     
                <div class="invalid-feedback">Please enter the product name.</div>       
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text" >Category:</span>
                        <select name="category" id="category" class="form-control">
                            <option value="top">Top</option>
                            <option value="bottom">Bottom</option>
                            <option value="shoes">Shoes</option>
                            <option value="bag">Bag</option>
                            <option value="accessories">Accessories</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text" >Size</span>
                        <select name="size" id="size" class="form-control">
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="free-size">Free size</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text" >Gender:</span>
                        <select name="gender" id="gender" class="form-control">
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                            <option value="both">Both</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Price in won</span>
                        <input class="form-control" type="number" id="price" name="price" required>
                        <div class="invalid-feedback">Please enter the price of the item in won only.</div>
                    </div>
                </div>
                
            </div>
    </br>
            <h5>Product image</h5>
            <p>Please make sure the chosen file is in the .img, .jpg or .png format</p>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="file" name="file" 
                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >     
                <div class="invalid-feedback">Please enter the product image.</div>       
            </div>

            <p>Please enter the product details such as the size, material, condition and flaws</p>
            <div class="input-group">
                <span class="input-group-text">Product Details:</span>
                <textarea class="form-control" aria-label="With textarea" id="description" name="description" 
                rows="5" cols="40" required></textarea>
            </div><br/>
            <div class="form-group" style="float:right;">
                <input type="submit" name="upload_product" class="btn btn-lg btn-success btn-block" value=Submit>
            </div>
        </div>
    </div>
    </div>
    </form>    
    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <footer class="footer" style="margin-top:100px;">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer>
</body>
</html>