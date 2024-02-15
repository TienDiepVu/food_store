<?php

require_once("connect.php");

if (isset($_POST["submit"]) && $_POST["name"] != '' && $_POST["description"] != '') {

    $name = $_POST["name"];
    $description = $_POST["description"];
    $add_cat_sql = "INSERT INTO category (id, name, description) VALUES ('', '$name', '$description')";
    mysqli_query($conn, $add_cat_sql);

    header("location: category.php");
} else {
?>
    <script>
        var x = confirm("Không hợp lệ!!!!!");
        if (x) {
            history.back();
        }
    </script>
<?php
}
$conn->close();
?>


