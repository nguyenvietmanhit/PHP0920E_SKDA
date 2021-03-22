<?php
//gio-hang.php
// - Giỏ hàng:
// + Giống đi siêu thị
// + Cơ chế lưu giỏ hàng: dùng cookie, session, CSDL ...
// + Demo dùng session
// + Cấu trúc giỏ hàng có dạng sau: với mỗi phần tử mảng
// key = id của sp, value = các thông tin lưu trong giỏ
$carts = [
    5 => [
        'title' => 'Điện thoại S9',
        'price' => 3000,
        'avatar' => 's9.png',
        'quantity' => 6
    ],
    6 => [
        'title' => 'Điện thoại S9',
        'price' => 3000,
        'avatar' => 's9.png',
        'quantity' => 6
    ],
];
// + Demo code Giỏ hàng theo cơ chế Ajax, khi click Thêm
//vào giỏ -> trang ko tải lại