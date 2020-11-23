<?php
/**
 * read_write_file.php
 * Đọc ghi file với PHP
 */
// 1/ Đọc file: tạo 1 file test.txt, ngang hàng với
//file hiện tại, set nội dung trên nhiều dòng cho file
//này
// + Đọc từng dòng: file, trả về 1 mảng, mỗi 1 phần tử
//là 1 hàng dữ liệu
$reads = file('test.txt');
echo "<pre>";
print_r($reads);
echo "</pre>";
foreach ($reads AS $read) {
  echo $read . "<br />";
}
// + Đọc toàn bộ file, ko phân biệt dòng:
// file_get_contents
echo file_get_contents('test.txt');

// 2 / Ghi file: sử dụng hàm file_put_contents cho cả
//2 trường hợp: ghi nối và ghi đè file
// + Ghi đè nội dung file có sẵn
file_put_contents('test.txt', 'Nội dung mới');
// + Ghi nối tiếp vào file:
file_put_contents('test.txt',
    'Nội dung ghi nối tiếp', FILE_APPEND);