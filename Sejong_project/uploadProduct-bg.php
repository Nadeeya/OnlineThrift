<?php
include 'database.php';

$username = $_GET['username'];
$prodName = $_POST['prodName'];
$category = $_POST['category'];
$size = $_POST['size'];
$gender = $_POST['gender'];
$price = $_POST['price'];
$description = $_POST['description'];
$status = 'selling';

$message = [];

$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');



if (isset($_POST['upload_product']) && $_POST['upload_product'] == 'Submit') {
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into items (prodName,image, upload_date, category, size, gender, price, description, item_status, seller) 
            VALUES ('$prodName','$fileName', NOW(), '$category','$size', '$gender', '$price', '$description', '$status' ,'$username')");
            if($insert){
                $update = $conn->query("UPDATE seller SET no_selling=no_selling + 1 WHERE username='".$username."'");
                $statusMsg = "The file ".$fileName. " has been uploaded successfully. This page will redirect you to your home page shortly";
                header('refresh: 5; url=sellerHomePage.php?username='.$username);

            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
    






?>