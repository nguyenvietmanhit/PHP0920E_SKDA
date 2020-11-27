<?php
session_start();
/**
 * logout.php
 * Xử lý đăng xuất user
 * + Xử lý xóa hết các session đã tạo khi đăng nhập thành công
 */
unset($_SESSION['username']);
unset($_SESSION['success']);
$_SESSION['success'] = 'Đăng xuất thành công';
// + Xóa cookie liên quan đến username và password đã lưu cho
//chức năng Ghi nhớ đăng nhập
setcookie('username', 'dsadsa', time() - 1);
setcookie('password', 'sadsasda', time() - 1);

header('Location: form_login.php');
exit();