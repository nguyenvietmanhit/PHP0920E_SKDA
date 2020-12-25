<?php
session_start();
require_once 'database.php';
/**
 * crud/delete.php
 * Xóa bản ghi theo id truyền từ url
 */
// + LẤy giá trị id từ trình duyệt
// + Xử lý validate giống hệt như chức năng update
$id = $_GET['id'];
// - Tạo truy vấn xóa
$sql_delete = "DELETE FROM products WHERE id = $id";
// - Thực thi truy vấn vừa tạo
$is_delete = mysqli_query($connection, $sql_delete);
if ($is_delete) {
    $_SESSION['success'] = "Xóa bản ghi $id thành công";
} else {
    $_SESSION['error'] = "Xóa bản ghi $id thất bại";
}
header('Location: index.php');
exit();
