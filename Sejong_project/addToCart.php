<?php
include 'database.php';
$username = $_GET['username'];
$id = $_GET['id'];


$sql = "UPDATE items SET buyer='$username' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Your item has succesfully added")</script>';
    #echo "Item successfully added to cart";
    header('refresh: 0; url=index.php?username=' . $username);


} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);




?>
