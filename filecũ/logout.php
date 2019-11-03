<?php session_start();

if (isset($_SESSION['login'])){
    unset($_SESSION['login']); // xóa session login
}
<a href="DangNhap.php">HOME</a>
?>