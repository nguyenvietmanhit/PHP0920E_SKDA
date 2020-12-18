<?php
session_start();
require_once 'database.php';
/**
 * crud/delete.php
 * Xóa bản ghi theo id bắt từ url
 */
//- Lấy giá trị của tham số id từ url:
// - Xử lý validate cho id giống như lúc cập nhật
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  $_SESSION['error'] = "Id ko hợp lệ";
  header('Location: index.php');
  exit();
}
$id = $_GET['id'];
// Tương tác với CSDL để thực hiện xóa bản ghi theo id
// + Viết truy vấn
$sql_delete = "DELETE FROM products WHERE id = $id";
// + Thực thi truy vấn
$is_delete = mysqli_query($connection, $sql_delete);
if ($is_delete) {
  $_SESSION['success'] = 'Xóa thành công';
} else {
  $_SESSION['error'] = 'Xóa thất bại';
}
header('Location: index.php');
exit();