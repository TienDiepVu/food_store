
<?php
    require "connect.php";

    if (isset($_POST['submit']) && $_POST['email'] != '' && $_POST['phone_number'] != '' && $_POST['password'] != '') {
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        
        $sql_e = "SELECT * FROM admin WHERE email = '$email' ";
        $result = mysqli_query ($conn , $sql_e);
        if (mysqli_num_rows($result) > 0 ) {
            header ("location: register.html");
        }
        $sql = "INSERT INTO admin (email , phone , password) VALUES ('$email' , '$phone_number' , '$password')" ;
        $success = mysqli_query( $conn , $sql);
        if ($success) {
?>

            <script>
                alert("Đăng ký thành công!!!!!!!!!!");
                window.location.href = "login.html" ;       
            </script> 
        
<?php
        }
    }
    else {
        header("location: register.html");
    }
    $conn->close();
?>