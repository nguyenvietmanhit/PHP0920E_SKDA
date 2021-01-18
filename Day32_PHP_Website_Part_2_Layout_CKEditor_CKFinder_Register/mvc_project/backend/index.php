<?php
session_start();
date_default_timezone_set(
    'Asia/Ho_Chi_Minh');
/**
 * mvc_project/backend/index.php
 * File index gốc của ứng dụng: tiếp nhận request từ
 * user -> gọi controller tương ứng xử lý
 */
// Demo URL thêm mới danh mục:
// index.php?controller=category&action=create
// - Lấy các giá trị controller, action từ url
$controller = isset($_GET['controller']) ?
    $_GET['controller'] : 'home'; //HomeController
$action = isset($_GET['action']) ? $_GET['action']
    : 'index';
// - Thao tác để nhúng file controller tương ứng:
//-> CategoryController
$controller = ucfirst($controller); //Category
$controller .= "Controller"; //CategoryController
// - Tạo biến chưa đường dẫn tới file controller
$controller_path = "controllers/$controller.php";
// - Nhúng file
if (!file_exists($controller_path)) {
  die('Trang bạn tìm ko tồn tại');
}
require_once "$controller_path";
$obj = new $controller();
if (!method_exists($obj, $action)) {
die("Ko tồn tại phương thức $action của class $controller");
}
$obj->$action();