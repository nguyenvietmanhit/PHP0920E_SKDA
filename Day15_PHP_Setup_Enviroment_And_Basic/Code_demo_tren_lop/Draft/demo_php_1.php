<?php
/**
 * 1 - Biến trong PHP
 * Khái niệm giống hệt như đã học về Javascript
 * + Để khai báo biến trong PHP sử dụng ký tự $ trước tên biến
 * + PHP phân biệt hoa thường, giống Javascript
 */
$name = 'Mạnh';
$age = 30;
$address = 'Hoài Đức - Hà Nội';
$Address = '';
// 2 - Quy tắc đặt tên biến, giống hệt Javascipt
// + VD 1 số tên biến ko hợp lệ
//$1abc = 5;
//$%name = 'Mạnh';
// + 1 số biến hợp lệ:
$_name = 'Mạnh';
$name_123 = 'Mạnh';
$first_name = 'Nguyễn';
//3  - Các kiểu dữ liệu của biến trong PHP
// + Kiểu integer: kiểu số nguyên, phạm vi ~ -2 tỷ -> 2 tỷ
$number1 = 123;
$number2 = -123;
//Sử dụng hàm PHP cung cấp sẵn để kiểm tra giá trị có phải
//số nguyên hay ko: is_int(variable);
$check = is_int($number1);
//Dùng hàm sau để debug thông tin biến: var_dump(variable)
var_dump($check);
// + Kiểu float/double: kiểu số thực, là số thập phân(float)
// hoặc là các số dạng số nguyên nhưng phạm vi nằm ngoài
// -2 tỷ -> 2 tỷ (double)
$number1 = 1.23;
$number2 = -1.23;
//is_float , is_double
var_dump(is_float($number1)); //bool(true)
// + Kiểu string: kiểu chuỗi, đặc trưng bởi ký tự ' hoặc " bao
// lấy chuỗi
$string1 = 'String 1';
$string2 = "String 2";
$string3 = "Hello 'Mạnh'";
echo $string3; //Hello 'Mạnh'
// Sử dụng hàm is_string để kiểm tra kiểu dữ liệu string hay ko
// Để nối chuỗi trong PHP, sử dụng ký tự .
$string4 = "Nối chuỗi: " . $string1 . ", " . $string2;
echo $string4;
// Có thể hiển thị giá trị của biến ngay trong chuỗi mà ko cần
//sử dụng ký tự . để nối chuỗi, với điều kiện chuỗi phải đc khai
//báo sử dụng dấu nháy kép "
$string5 = "Nối chuỗi: $string1, $string2";
$string6 = 'Nối chuỗi: $string1, $string2';
echo "<br />$string5";
echo "<br />$string6";
// + Kiểu boolean, có 2 giá trị là true và false, viết hoa
//thường thoải mái cho 2 giá trị này
$boolean1 = true;
$boolean2 = TRue;
$boolean3 = false;
$boolean4 = FAlse;
//Hàm is_bool kiểm tra kiểu dữ liệu có phải là kiểu boolean hay ko
// 4 kiểu dữ liệu integer, float, string, boolean là 4 kiểu
// dữ liệu nguyên thủy
// + Kiểu NULL: có 1 giá trị duy nhất là null, viết hoa thường
//thoải mái cho giá trị này. Biến bị null khi nó ko tồn tại
$null = NULL;
//Hàm is_null
// + Kiểu array: kiểu mảng, là danh sách chứa nhiều phần tử
//bên trong nó. Kiểu mảng là kiểu dữ liệu sẽ thao tác nhiều
//nhất trong PHP. KHai báo:
// Dùng từ khóa array, cách này dùng cho các phiên bản cũ
$arr1 = array(1, 2, 'string1', 1.23, true, null, array());
// Dùng cú pháp [], luôn ưu tiên dùng cú pháp này để khai báo
//mảng
$arr2 = [1, 2, 3];
// Để debug mảng, hay dùng cú pháp như sau
echo "<pre>";
print_r($arr1);
echo "</pre>";
// Để kiểm tra kiểu dữ liệu mảng: is_array(arr)
// + Kiểu object - kiểu đối tượng, sẽ học trong phần Lập trình
//hướng đối tượng

// 4 - Ép kiểu dữ liệu trong PHP
// Sử dụng từ khóa là tên kiểu dữ liệu trước tên biến muốn ép
//kiểu: int - integer - bool - boolean - float - double - string
// - array -object
$number = 11.2;
var_dump(is_float($number)); //true
$number1 = (int) $number;
echo $number1; //11
$string1 = (string) $number;
echo $string1; //"11.2"
$boolean = (bool) $number;
echo $boolean; //1

//5 - Hằng
// Hằng ko thể gán lại giá trị 1 khi đã gán từ trước đó
// Có 2 cú pháp khai báo:
// Dùng từ khóa const
const PI = 3.14;
// Dùng hàm define
define('MAX', 15);
// Nên sử dụng từ khóa const để khai báo hằng để tiện cho viec
//khai báo trong class sau này
echo PI; //3.14
//Thử gán lại giá trị khác cho hằng PI đã khai báo phía trên
//PI = 123456;
// + Một số hằng có sẵn trong PHP
// Hiển thị số dòng trong code hiện tại đang gọi hằng này
echo __LINE__; //109
// Hiện thị đường dẫn vật lý tới file hiện tại đang gọi hằng
//này
echo __FILE__;
// Hiển thị đường dẫn vật lý tới thư mục gần nhất chứa file
//hiện tại đang gọi hằng này
echo __DIR__;

// 6 - Hàm trong PHP
// Cú pháp khai báo hàm trong PHP thì giống hệt Javascript
function showInfo() {
  echo "Hàm showInfo";
}
//Gọi hàm:
showInfo(); //Hàm showInfo
// + Các biến thể của hàm
// - Hàm không có tham số, ko có giá trị trả về
// - Hàm có tham số và có giá trị trả về, sử dụng từ khóa return
// Viết 1 hàm tính tổng 2 số
function sum($number1, $number2) {
  $sum = $number1 + $number2;
  //thay vì echo trong hàm, return về kết quả đó
  //từ khóa return làm cho hàm mang 1 giá trị nào đó
  //, kết thúc hàm -> ko chạy code phía sau return nữa
  return $sum;
  echo "Tổng = $sum";
}
//sum(1, 2); //Tổng = 3
$sum = sum(3, 4);
echo $sum; //Tổng = 7
// Khi khai báo hàm luôn cố gắng sử dụng từ khóa return bên
//trong hàm, phải xác định đc trước giá trị trả về của hàm, hạn
//chế echo trong hàm



?>