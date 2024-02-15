<?php

require_once("connect.php");

if (isset($_POST["submit"]) ) {

    $food_name = $_POST["food_name"];
    $cat_id = $_POST["cat_id"];
    $thumnail = $_POST["thumnail"];
    $price = $_POST["price"];
    $origin = $_POST["origin"];
    $note = $_POST["note"];
    $add_food_sql = "INSERT INTO food (food_id, food_name, cat_id, thumnail, price, origin, note ) 
                    VALUES ('', '$food_name', '$cat_id', './img/$thumnail', '$price' , '$origin', '$note')";
    mysqli_query($conn, $add_food_sql);
    header("location: food.php");
} else {
    header("location: food.php");
}
$conn->close();
?>