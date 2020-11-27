<?php
// Khởi tạo session
session_start();
/**
 * session.php
 * Session trong PHP
 * - Là biến trong PHP, array
 * - PHP tạo ra biến $_SESSION, chứa tất cả session đang
 * có trên hệ thống
 * - Biến dạng session lưu trên server
 * - session mất đi khi: dùng code xóa, close trình duyệt
 * - session và cookie lưu các giá trị, và ở các file
 * khác đều có thể truy cập đc
 * - Ứng dụng: đăng nhập, giỏ hàng
 * + Thao tác với session: giống hệt như thao tác với
 * 1 mảng thông thường
 */
// + Debug biến $_SESSION, luôn cần có bước khởi tạo
//session để có thể thao tác dc, khởi tạo trên đầu file
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
// + Thêm dữ liệu: giống hệt thao tác với mảng, thêm
//phần tử mảng như lúc lấy giá trị theo key
$_SESSION['name'] = 'Mạnh';
$_SESSION['age'] = 30;
// + Lấy giá trị:
echo $_SESSION['name']; //Mạnh
echo $_SESSION['age']; //30
// + Xóa phần tử mảng:
$_SESSION['address'] = 'HN';
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//Xóa 1 phần tử mảng có key=age
unset($_SESSION['age']);
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
// Xóa tất cả session trên hệ thống, tuy nhiên hàm này
//sẽ chạy theo logic hơi phức tạp
//session_destroy();
// Nên xóa session mà mình biết, để tránh phạm vi ảnh
//hưởng tới các chức năng khác
// + Tạo 1 file test_session.php để test: khai báo 1 nơi
//các nơi khác hoàn toàn có thể sử dụng đc

