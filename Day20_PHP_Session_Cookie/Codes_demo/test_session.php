<?php
session_start();
//test_session.php
//echo $_SESSION['name']; // Mạnh
echo isset($_SESSION['name']) ? $_SESSION['name'] : '';
// Tuy nhiên cần chú ý trường hợp : session mất đi
//khi đóng trình duyệt h oặc vào bằng trình duyệt ẩn
// Copy url của file test_session.php -> paste vào
//trình duyệt ẩn
?>