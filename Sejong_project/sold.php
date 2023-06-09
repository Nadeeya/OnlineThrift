<?php
include 'database.php';
$buyer = $_GET['buyer'];
$today = date("Y-m-d");

$sql = "UPDATE items SET item_status='sold', bought_on='$today' WHERE buyer='$buyer' AND item_status='selling'";

if (mysqli_query($conn, $sql)) {
    echo "Item has successfully bought";
    header('refresh: 3; url=index.php?username=' . $buyer);

} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
