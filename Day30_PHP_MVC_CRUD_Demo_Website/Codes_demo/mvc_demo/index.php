<?php
session_start();
// Set múi giờ Việt Nam, search Timezone PHP
date_default_timezone_set
('Asia/Ho_Chi_Minh');
//echo date('d-m-Y H:i:s');
/**
 * mvc_demo/index.php
 * - File index gốc của ứng dụng MVC, code đầu tiên
 * - Tên file luôn là index.php
 * - Là nơi đầu tiên nhận request từ user gửi lên, điều
 * hướng request tới controller tương ứng
 * - Dựa vào url để phân tích, gọi controller và action
 * tương ứng -> Url trong MVC cần tuân theo chuẩn của
 * MVC đó, với MVC hiện tại url có dạng sau:
 * index.php
 * ?controller=<tên-controller>&action=<tên-phương-thức>
 * - CÁc tên file controller cũng phải theo chuẩn, với
 * mô hình MVC này: ProductController.php,
 * UserController.php, BookController.php ...
 * - LÀ file code đầu tiên của ứng dụng MVC
 * - Url mẫu của MVC: thêm mới sản phẩm
 * index.php?controller=product&action=create
 * index.php?controller=product&action=delete&id=1
 */
//index.php?controller=product&action=create
// - Phân tích URL để lấy ra controller và action tương
//ứng
// Lấy ra controller, set controller mặc định đối với
//trang chủ
$controller = isset($_GET['controller']) ?
    $_GET['controller'] : 'home'; //product
// Lấy ra action/phương thức tương ứng của controller
$action = isset($_GET['action']) ? $_GET['action'] :
    'index'; //create
// - Chuyển đổi controller vừa lấy được thành tên file
//controller tương ứng -> nhúng đc controller đó
//-> cần nhúng file ProductController.php vào
// + Chuyển ký từ đầu tiên thành ký tự hoa
$controller = ucfirst($controller); //Product
$controller .= "Controller"; //ProductController
// Url: index.php?controller=product&action=create
$controller_path = "controllers/$controller.php";
// controllers/ProductController.php
//var_dump($controller_path);
// + Nhúng file, cần kiểm tra nếu ko tồn tại file thì
// báo lỗi
if (!file_exists($controller_path)) {
  die('Trang bạn tìm ko tồn tại');
}
require_once "$controller_path";
// - Khởi tạo đối tượng từ class controller sau khi nhúng
//file controller đó
$obj = new $controller();
// - Dùng đối tượng truy cập phương thức tương ứng đến
//từ tham số action trên url
// Cần check tồn tại phương thức thì mới cho truy cập
if (!method_exists($obj, $action)) {
  die("Phương thức $action ko tồn tại trong controller
  $controller");
}
// Url: index.php?controller=product&action=create
$obj->$action();
//index.php?controller=product&action=create

