<?php
session_start();
/**
 * demo_session.php
 * Cơ bản về session trong PHP
 * - Tạo thêm 1 file test_session.php,
 * ngang hàng với file hiện tại
 * + Biến đc lưu bởi session có thể đc truy cập
 * từ bất cứ đâu trên hệ thống
 * + PHP có sẵn biến mảng $_SESSION lưu toàn bộ
 * thông tin của các session trên hệ thống
 * + Session sẽ mất đi khi bị xóa hoặc đóng trình
 * duyệt
 * + Việc thao tác với session chính là thao tác
 * với mảng
 */
// - Luôn phải khởi tạo session thì mới sử dụng
// đc biến $_SESSION, sử dụng hàm session_start,
//luôn khai báo trên cùng file
// - Thêm phần tử cho session
$_SESSION['fullname'] = 'nvmanh';
$_SESSION['age'] = 30;
$_SESSION['address'] = 'Hoài Đức - Hà Nội';
$_SESSION['class']['amount'] = 40;

// - Lấy giá trị của session
echo $_SESSION['age']; //30
// - Xóa session: xóa phần tử theo key, xóa tất
//luôn
// + Xóa phần tử theo key: unset
unset($_SESSION['address']);
// + Xóa hết toàn bộ session đang có trên hệ thống:
// session_destroy();
// DEbug mảng $_SESSION
echo "<pre>";
print_r($_SESSION);
echo "</pre>";