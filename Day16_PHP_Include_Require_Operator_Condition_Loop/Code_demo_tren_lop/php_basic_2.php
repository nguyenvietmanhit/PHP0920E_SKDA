<?php
/**
 * php_basic_2.php
 * Created by PhpStorm.
 * User: nvmanh
 * Date: 11/13/2020
 * Time: 6:36 PM
 */
echo "TEST";
// 1 - Hàm trong PHP, tính chất giống hệt hàm trong JS
// Phân loại hàm:
// - Hàm có sẵn: chỉ cần gọi hàm,
// truyền giá trị cho tham số hàm nếu có
// Set về múi giờ Việt Nam
date_default_timezone_set('Asia/Ho_Chi_Minh');
// Hàm hiển thị ngày giờ hiện tại
echo date('d-m-Y H:i:s');
// Sử dụng phím Ctrl + Q tại cuối tên hàm để xem
//giải thích hàm đó
// - Hàm tự định nghĩa: cú pháp giống hệt Javascript
// + Hàm ko có tham số, ko có giá trị trả về
function showInfo() {
  echo "Hàm showInfo";
}
showInfo();
// + Hàm có tham số, ko có giá trị trả về: viết hàm
// hiển thị tên của ai đó
function displayName($name) {
  echo "Tên của bạn là: $name";
}
// Gọi hàm mới là lúc truyền giá trị thật cho tham số
displayName('A'); //Tên của bạn là: A
displayName('B'); //Tên của bạn là: B
// + Hàm có tham số đc khởi tạo giá trị mặc định
function displayAge($age = 10) {
  echo "<br />Tuổi: $age";
}
displayAge(); //Tuổi: 10
displayAge(30); //Tuổi: 30
// + Hàm có giá trị trả về: return
// VD: viết hàm cộng 2 số nào đó
// Theo hướng ko dùng return
function sum($number1, $number2) {
  $result = $number1 + $number2;
  echo "Kết quả: $result";
}
// Theo hướng dùng return: cần xác định giá trị trả về
//của bài toán
function sumReturn($number1, $number2) {
  $result = $number1 + $number2;
  return $result;
  echo "Chạy ko?"; //ko bao giờ chạy
}
$sum = sumReturn(1, 2);
echo "Tổng = $sum"; //Tổng = 3
// Nên tư duy dùng từ khóa return bên trong hàm của bạn

// 2 - Truyền giá trị dạng tham trị , tham chiếu
//cho tham số
// Thử thay đổi giá trị của biến bên trong hàm
$number = 5;
echo "<br /> Ban đầu biến number = $number"; //5
// Viết hàm để thay đổi giá trị của biến $number
function changeNumber($a) {
  $a = 1;
  echo "<br />Biến bên trong hàm = $a"; //1
}
// Gọi hàm
changeNumber($number);
echo "<br />Sau khi gọi hàm, biến number = $number";//5
// Như vậy biến $number ko hề bị thay đổi giá trị
// Bản chất của truyền tham trị: tạo ra bản sao của biến
//ban đầu, và truyền giá trị của bản sao đó vào trong hàm

// + Truyền tham chiếu
$age = 30;
echo "<br />Ban đầu age = $age"; //30
function changeAge(&$a) {
  $a = 1;
  echo "<br /> Bên trong hàm age = $a"; //1
}
changeAge($age);
echo "<br /> Sau  khi gọi hàm, age = $age";//1
// Truyền tham chiếu, sử dụng ký tự & trước tên tham số
//của hàm
// - Truyền tham chiếu sẽ hay gặp ở các CMS: Wordpress,
//Zoomla

// 3 - Các hàm nhúng file trong PHP: tạo 1 file test.php,
//ngang hàng với file php hiện tại
// + 1 website thực tế luôn chia thành các file nhỏ hơn,
//cần cơ chế để nhúng lại các file đó vào chương trình
// + Bản chất của nhúng file: copy nội dung file đặt tại
//vị trí nhúng file
//include 'testdsadsaa.dsadsaphp';
//require 'dsadsadsasadsasadsa.php';

//include_once 'test.php';
//include_once 'test.php';
//include_once 'test.php';
//include_once 'test.php';
//include_once 'test.php';
// Nên dùng hàm require_once để nhúng file, để đảm bảo
// file chỉ đc nhúng 1 lần duy nhất, và nếu đường dẫn file
//nhúng ko tồn tại -> ko thực thi code phía sau
require_once 'test.php';

echo "<br />Code sau liệu có chạy khi đường dẫn file
 nhúng ko tồn tại?";

// 4 - TOÁN TỬ:
// + Toán tử số học:
$number1 = 5;
$number2 = 2;
echo $number1 + $number2; //7
echo $number1 - $number2; //3
echo $number1 * $number2; //10
echo $number1 / $number2; //2.5
echo $number1 % $number2; //1
$number1++;
echo $number1;//6
$number2--;
echo $number2;//1
// + Toán tử so sánh
$number1 = 5;
$number2 = 2;
echo $number1 == $number2; //false
echo $number1 > $number2; //true
echo $number1 >= $number2;//true
echo $number1 < $number2; //false
echo $number1 <= $number2; //false
echo $number1 != $number2; //true
// + Toán tử logic
$number1 = 5;
$number2 = 2;
echo ($number1 > 0) && ($number2 < 0); //false
echo ($number1 > 0) || ($number2 < 0); //true
echo !($number1 > 0); //false
// + Toán tử gán:
$number = 5;
$number += 2; //7
$number -= 3; //4
$number *= 2; //8
$number /= 2; //4
$number %= 2; //0

//4 - CÂU LỆNH ĐIỀU KIỆN
// If: 1 trường hợp duy nhất
$number = 5;
if ($number > 0) {
  echo "Number > 0";
}
// If else:  2 trường hợp
$number = 6;
if ($number > 0) {
  echo 'Number > 0';
} else {
  echo 'Number <= 0';
}
// Toán tử điều kiện viết tắt của if else nếu như logic
//ngắn ? :
echo ($number > 0) ? 'Number > 0' : 'Number <= 0';
// If elseif else: 3 trường hợp trở lên
$number = 10;
if ($number >= 8) {
  echo "Giỏi";
} elseif ($number >= 6.5) {
  echo "Khá";
} elseif ($number >= 5) {
  echo "Trung bình";
} else {
  echo "Yếu";
}
// Switch case: dùng thay thê if elseif, chỉ dùng khi
//biểu thức so sánh là so sánh bằng
$day = 3;
switch ($day) {
  case 1: echo "Chủ nhật";break;
  case 2: echo "Thứ 2";break;
  case 3: echo "Thứ 3";break;
  default: echo "Không phải cn, thứ 2, thứ 3";
}
// - Demo dùng biểu thức điều kiện để hiển thị 1 đoạn HTML
// nào đó
// - Không nên echo cả 1 đoạn HTML phức tạp bằng PHP,
// mà cần sử dụng cú pháp viết tắt của câu lệnh điều kiện
// để tách biệt code PHP và HTML
$is_login = FALSE;
if ($is_login == FALSE) {
  echo "<form><input type='text' name='username' /></form>";
}
?>
<!--Cú pháp viết tắt của if, else, elseif-->
<?php if ($is_login == FALSE): ?>
  <form action="" method="post">
    <input type="text" placeholder="Nhập username" />
    <br />
    <input type="submit" value="Login" />
  </form>
<?php endif; ?>
<?php
$point = 10;
?>
<?php if ($point >= 8): ?>
  <h1 style="color: green">Giỏi</h1>
<?php elseif ($point >= 6.5): ?>
  <h1 style="color: red">Khá</h1>
<?php elseif ($point >= 5): ?>
  <h1 style="color: yellow">Trung bình</h1>
<?php else: ?>
  <h1>Yếu</h1>
<?php endif; ?>

<?php
// 6 - VÒNG LẶP: PHP rất hiếm khi sử dụng 3 vòng lặp
//for, while, do while
// - For:
for($i = 1; $i <= 10; $i++) {
  echo $i;
}
//12345678910
// - While
$j = 1;
while($j <= 10) {
  echo $j;
  $j++;
}
//12345678910
// - Do while
$k = 1;
do {
  echo $k;
  $k++;
} while ($k <= 10);
// 7 - Từ khóa break-continue
// Break: thoát hẳn vòng lặp
echo "<br />";
for ($i = 1; $i <= 10; $i++) {
  if ($i == 2) {
    break;
  }
  echo $i;

}
//1
// Continue: bỏ qua lần lặp hiện tại - sẽ ko chạy code
//phía sau continue, nhảy tới lần lặp kế tiếp
for ($j = 1; $j <= 10; $j++) {
  if ($j <= 1) {
    continue;
  }
  echo $j;
}
//2345678910





//123

//345678910
//12345678910
//123
?>