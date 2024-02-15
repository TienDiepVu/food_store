<?php
session_start();
require "connect.php";
if (isset($_POST['login'])) {
    $mail = $_POST['email'];
    $pw = $_POST['password'];
    $sql_usr = "SELECT * FROM admin WHERE email = '$mail' AND password = '$pw'";
    $user = mysqli_query($conn, $sql_usr);
    if (mysqli_num_rows($user) > 0) {
       $_SESSION["email"] = $mail;
       header("location: admin.php");
    }
     
    else {
?>

        <script>
            var x = confirm("Email hoặc mật khẩu không đúng!!!!!");
            if (x) {
                history.back();
            }
        </script>

<?php
    }
}
$conn->close();
?>