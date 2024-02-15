<?php
$uid = $_GET["sid"];
$food_name = $_GET["food_name"];
$cat_id = $_GET["cat_id"];
$thumnail = $_GET["thumnail"];
$price = $_GET["price"];
$origin = $_GET["origin"];
$note = $_GET["note"];
require_once("connect.php");
$update_food_sql = "UPDATE food SET food_name = '$food_name' , cat_id= '$cat_id',  thumnail= './img/$thumnail', price= '$price', origin= '$origin', note= '$note' WHERE food_id=$uid";
mysqli_query($conn, $update_food_sql);
header("location: food.php");
$conn->close();
?>