<?php
$d_id = $_GET['sid'];

require_once("connect.php");

$sql_delete_cat = "DELETE FROM category WHERE id = $d_id ";
$sql_delete_food = "DELETE FROM food WHERE food_id = $d_id ";

mysqli_query($conn, $sql_delete_cat);
mysqli_query($conn, $sql_delete_food);
$conn->close();
?>
<script>
    history.back();
</script>