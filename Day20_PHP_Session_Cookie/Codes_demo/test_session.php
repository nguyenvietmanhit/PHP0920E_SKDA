<?php
session_start();
/**
 * test_session.php
 *
 */
//Có thể nhúng file demo_session vào để sử dụng
//đc biến $fullname
// + Tuy nhiên cách này sẽ ko linh hoạt trong
//trường hợp cần phải gọi ở nhiều file
//require_once 'demo_session.php';
//echo $fullname;

// + Thử trình duyệt ẩn, chạy lại file này,
// Ctrl + Shift + N sẽ gặp lỗi: ko biết key=fullname
// + Khi thao tác với session, luôn phải kiểm soát
//đc session sinh ra từ đâu
//echo $_SESSION['fullname'];//nvmanh
echo isset($_SESSION['fullname']) ?
    $_SESSION['fullname'] : '';