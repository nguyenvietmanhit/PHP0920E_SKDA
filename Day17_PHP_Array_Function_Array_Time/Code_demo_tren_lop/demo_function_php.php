<?php
/**
 * demo_function_php.php
 * DEMO 1 SỐ HÀM THÔNG DÙNG XỬ LÝ MẢNG, SỐ, CHUỖI, THỜI GIAN
 *
 *
 */
//1 - Thao tác với mảng
//+ Tính tổng các phần tử trong mảng: array_sum
$arr = [1, 2, 3];
echo array_sum($arr); //6
// + Kiểm tra key có tồn tại trong mảng hay ko:
//array_key_exists
$arr = [
    'name' => 'MAnh',
    'age' => 30,
];
$check = array_key_exists('abc', $arr);
var_dump($check);//false
// + Loại bỏ các giá trị trùng lặp trong 1 mảng
// array_unique
$arr = [1, 1, 1, 2, 3];
$arr = array_unique($arr);
var_dump($arr); // [1, 2, 3]
// + Đếm số phần tử mảng: count()
$arr = [1, 2, 3];
echo count($arr); //3
// + Tách 1 chuỗi thành mảng dựa vào ký tự phân tách: explode
$str = '1,2,3,4,5,6';
$arr = explode(',', $str);
var_dump($arr);
// + Chuyển mảng thành chuỗi: implode
$arr = [1, 2, 3];
$str = implode('-', $arr);
echo $str; //1-2-3
// + LẤy giá trị cuối cùng của 1 mảng: end
$arr = [1, 2, 3];
echo $arr[2];//3
echo end($arr); //3
// + LẤy giá trị đầu tiên của mảng: reset
$arr = [1, 2, 3];
echo reset($arr); //1
// + Xóa phần tử mảng theo key: unset
$arr = [1, 2, 3];
unset($arr[2]);
var_dump($arr); //[1, 2]
// + Kiểm tra biến có phải kiểu mảng hay ko: is_array
$arr = [1, 2, 3];
var_dump(is_array($arr)); //true
// + Lấy giá trị nhỏ nhất của mảng: min
echo min($arr); //1
// + Max
// + print_r: xem cấu trúc mảng, nên kết hợp với thẻ <pre>
//dể nhìn cho dễ
// + Sắp xếp mảng: sort - sắp xếp mảng theo value tăng dần
$arr = [4, 2, 1, 3];
sort($arr);
var_dump($arr); //[1, 2, 3, 4]

