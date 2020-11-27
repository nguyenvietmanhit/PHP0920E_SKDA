<?php
/**
 * cookie.php
 * Cookie trong PHP
 * + Là biến dạng mảng như session
 * + PHP có sẵn biến $_COOKIE lưu toàn bộ thông tin
 * cookie
 * + cookie ko tự động mất đi khi close trình duyệt,
 * để xóa: code, xóa bằng inspect HTML
 * + cookie lưu trên trình duyệt của bạn
 * + Ứng dụng: quảng cáo theo hành vi người dùng
 * + Xem cookie trên trình duyệt: Inspect HTML ->
 * Application -> Cookies
 */
//+  Khởi tạo, set giá trị cho cookie, ko dùng cách như
//thêm mới mảng thông thường
// Set thời gian sống = 300s tính từ thời điểm hiện tại
setcookie('username',
    'nvmanh', time() + 3);
//+ LẤy giá trị cookie: giống mảng
//echo $_COOKIE['username'] ;//nvmanh
echo isset($_COOKIE['username']) ? $_COOKIE['username']
    : '';
// + Xóa cookie: set lại thời gian sống là giá trị âm
setcookie('username', '', time() - 1);