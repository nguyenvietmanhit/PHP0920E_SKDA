<?php
/**
 * demo_read_write_file.php
 * Đọc ghi 1 file có sẵn với PHP
 * - Đọc nội dung file
 * + Tạo 1 file read.txt ngang hàng với file hiện
 * tại, viết nội dung tùy ý, viết trên nhiều dòng
 * + Có 2 kiểu đọc nội dung file:
 * - Đọc theo từng hàng: file
 * - Đọc 1 phát hết luôn: file_get_contents
 * + Có 1 số hàm khác cũng có thể đọc file: fread
 */
// Đọc file theo từng hàng: trả về 1 mảng
$reads = file('read.txt');
echo "<pre>";
print_r($reads);
echo "</pre>";
foreach ($reads AS $read) {
  echo $read . "<br />";
}
// Đọc toàn bộ nội dung file: trả 1 string
//mất hết format của file
$content = file_get_contents('read.txt');
echo $content;
//Ngoài ra có thể lấy đc nội dung từ 1 url
//echo file_get_contents
//('https://vnexpress.net/the-thao');

// + Ghi file trong PHP:
// Có 2 chế độ ghi file: ghi đè file hoặc ghi tiếp
// vào cuối file: file_put_contents
// - Ghi đè file
//file_put_contents
//('read.txt', 'abc def');
// - Ghi nối vào cuối file
file_put_contents('read.txt', 'ghi',
    FILE_APPEND);
// - Một số hàm khác về file
// + Xóa file/thư mục: unlink, thêm @ để ko báo lỗi
//warning khi xóa file mà đường dẫn ko tồn tại
@unlink('read.txt');
// + Kiểm tra file/thư mục có tồn tại hay ko:
//file_exists
