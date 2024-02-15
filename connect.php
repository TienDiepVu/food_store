<?php
    $conn = mysqli_connect("localhost","root","", "btl" );
    if ($conn ->connect_error){
        die("connection failed: " . $conn -> connect_error);
    }
?>