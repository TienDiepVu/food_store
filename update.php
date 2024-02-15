<?php
$uid = $_GET["sid"];
$name = $_GET["name"];
$description = $_GET["description"];
require_once("connect.php");
$update_sql = "UPDATE category SET name = '$name' , description= '$description' WHERE id=$uid";
mysqli_query($conn, $update_sql);
header("location: category.php");
$conn->close();
?>