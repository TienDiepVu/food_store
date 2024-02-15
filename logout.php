<?php
// Xóa tất cả các biến session
session_destroy();

// Chuyển hướng người dùng đến trang đăng nhập
header("Location: login.html");
?>
