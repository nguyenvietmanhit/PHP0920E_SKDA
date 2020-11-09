<?php
/**
 * php_basic_1.php
 * Khái niệm cơ bản của PHP
 */
// 1 - Biến
// Sử dụng ký tự $ trước tên biến
//khai báo biến name có giá trị = chuỗi Mạnh
$name = 'Mạnh';
//khai báo biến age có giá trị = số 30
$age = 30;
// Khai báo nhiều biến tại 1 thời điểm
$number1 = $number2 = $number3 = 3;
// - Quy tắc đặt tên biến trong PHP: giống hệt Javascript
//$1abc = 1;
//$%name = 'Mạnh';
// - PHP phân biệt hoa thường như JS
$name = 'Mạnh';
$namE = 'Mạnh';
echo "Tên của bạn: " . $name;
// 2 - Các kiểu dữ liệu trong PHP
// Với JS và PHP, để nhận biết biến có kiểu dữ liệu gì,
//sẽ nhìn vào giá trị đc gán cho biến đó
// - Integer: kiểu số nguyên, từ -2 tỷ -> +2 tỷ
$number1 = 2;
$number2 = -3;
// Kiểm tra biến có phải là kiểu số nguyên hay ko
$is_integer = is_int($number1);
var_dump($is_integer); //
// - Float/double: kiểu số thực: số thập phân hoặc các
//số nguyên nằm ngoài pham vi integer
$number1 = 1.2;
$is_float = is_float($number1);
var_dump($is_float); //true
// - String: kiểu chuỗi
$str1 = "String 1";
$str2 = 'String 2';
$str3 = "Hello 'Mạnh' ";
$is_string = is_string($str1);
var_dump($is_string);//true
// Có thể hiển thị luôn giá trị của biến trong 1 chuỗi
// mà ko cần nối chuỗi sử dụng . với điều kiện chuỗi
// được bao bởi "
$age = 30;
echo "Tuổi của bạn: " . $age;
// Viết thay thế
echo "Tuổi của bạn: $age";
// Thử  hiển thị giá trị biến mà dùng nháy đơn
echo 'Tuổi của bạn: $age';
// - Boolean, có 2 giá trị true và false, với PHP viết
//hoa thường thoải mái
$bool1 = true;
$bool2 = false;
$bool3 = TRue;
$bool4 = FaLSe;
$check = is_bool($bool1);
var_dump($check);//true
// - NULL: kiểu dữ liệu đặc biệt, 1 giá trị duy nhất
// = NULL, hoa thường thoải mái
$null1 = NULL;
//is_null($null1)
// - Array - Kiểu mảng
$arr1 = [1, 2, 3 ,4];
$arr2 = array(1, 2, 3, 4);
//is_array($arr1);
// - Object - Đối tượng: học ở phần OOP

// 3 - Ép kiểu dữ liệu trong PHP
// Sử dụng từ khóa là tên kiểu dữ liệu
// trước biến muốn ép kiểu
$number = 11.2; //float
// Ép về số nguyên
$number1 = (integer) $number; // 11
// Ép về chuỗi
$string1 = (string) $number; // "11.2"
// Ép về kiểu boolean, chú ý kiểu boolean có 2 giá trị
//số nguyên thể hiện cho true và false: 1 và 0
$boolean1 = (boolean) $number; // 1

// 4 - Hằng, có 2 cách khai báo hằng trong PHP
define('PI', 3.14);
echo "Hằng PI = " . PI; // Hằng PI = 3.14
const MAX = 10;
echo "Max = " . MAX; //Max = 10
// nên dùng từ khóa const để khai báo hằng
// Cố tình gán lại giá trị cho hằng sẽ báo lỗi
//MAX = 11;
// - Một số hằng định nghĩa sẵn trong PHP
// + Số dòng hiện tại đang gọi hằng này
echo __LINE__;
echo "<br />";
// + Đường dẫn tuyệt đối/vật lý đến file đang gọi hằng
echo __FILE__;
echo "<br />";
// + Đường dẫn tuyệt đối/vật lý đến thư mục cha trực tiếp
//của file đang gọi hằng này
echo __DIR__;