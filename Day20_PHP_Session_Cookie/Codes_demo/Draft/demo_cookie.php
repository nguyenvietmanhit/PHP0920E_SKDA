<?php
/**
 * demo_cookie.php
 * Cơ bản về cookie
 * + Cookie lưu thông tin ngay trên trình duyệt
 * của  bạn, trong khi session lưu trên server ->
 * có thể biết đc các trang web khi mà truy cập
 * đang lưu cookie gì trên trình duyệt của bạn,
 * trong khi session thì ko thể biết
 * + Cookie thường dùng cho mục đích quảng cáo
 * + PHP tạo ra sẵn 1 biến mảng là $_COOKIE chứa
 * toàn bộ cookie đang lưu trên trình duyệt
 * + Cookie sẽ ko mất đi khi đóng trình duyệt,
 * cookie phụ thuộc vào thời gian sống mà nó
 * đc set
 * + Cách xem cookie trên Chrome:
 * Bật Inspect HTML -> tab Application ->
 * Storage -> Cookies
 */
// - KHởi tạo cookie: ko giống như thêm phần tử
//cho mảng
// Thời gian sống của cookie tính bằng giây tính
//từ thời gian hiện tại
setcookie('age', 30, time() + 3600);
setcookie('test', 'abc', time() + 10);

// - Lấy giá trị cookie: thao tác giống mảng
//echo $_COOKIE['test'];
echo isset($_COOKIE['test']) ? $_COOKIE['test'] :
    '';
// - Xóa cookie: xóa ko giống xóa session
// Vẫn dùng hàm setcookie, set thời gian sống là
//giá trị âm
setcookie('age', 'abc', time() - 1);
// Debug mảng $_COOKIE
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";

