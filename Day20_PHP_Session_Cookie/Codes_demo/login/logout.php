<?php
session_start();
/**
 * logout.php
 * Xử lý logout
 * Xóa các session đã tạo lúc login thành công
 *
 */
  unset($_SESSION['username']);
  $_SESSION['success'] = 'Đăng xuất thành công';
  header('Location: form_login.php');
  exit();