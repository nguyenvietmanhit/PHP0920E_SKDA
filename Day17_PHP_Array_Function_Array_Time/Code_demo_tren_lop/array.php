<?php
/**
 * array.php
 * MẢNG trong PHP
 * - Các kiểu dữ liệu nguyên thủy: integer, float, string
 * , boolean chỉ có thể lưu đc 1 giá trị tại 1 thời điểm
 * - Kiểu mảng có thể lưu nhiều giá trị tại 1 thời điểm
 * - Mảng có thể lưu đc bất cứ kiểu dữ liệu nào, kể cả
 * 1 mảng con
 */
// VD: Lưu tên của 500 ae -> tạo 500 biến lưu 500 tên
$name1 = 'a';
$name2 = 'b';
//...
// Thay vì phải tạo 500 biến -> dùng 1 biến có kiểu dữ
// liệu mảng để lưu 500 giá trị trên
// 2 - Cú pháp khai báo mảng
// + Sử dụng từ khóa array, php <= 5.4
$arr1 = array(1, 'string', true);
$arr2 = array(1, array(), array(1, 2));
// + Sử dụng [], đây là cách thông dụng
$arr3 = [1, 'string', true];
$arr4 = [1, [], [1, 2]];
// Hàm kiểm tra kiểu dữ liệu phải mảng ko hay ko?
$check = is_array($arr4);
var_dump($check);
// - Xem cấu trúc của mảng arr3
// echo 1 mảng sẽ báo lỗi vì mảng ko phải là kiểu dữ liệu
// nguyên thủy mà 1 kiểu dữ liệu có cấu trúc
// echo $arr3;
// - Dùng hàm var_dump
var_dump($arr3);
// - Dùng hàm sau để debug mảng dễ hơn
echo "<pre>";
print_r($arr3);
echo "</pre>";
// 3 - Key-value của phần tử mảng
$arr = [1, 2, 3, 4, 5, 6];
// + Key của phần tử: là giá trị dùng để xác định vị trí
//của phần tử
// + Value là giá trị tương ứng của phần tử theo key
// - Debug thông tin mảng để nhìn key-value cho dễ:
echo "<pre>";
print_r($arr);
echo "</pre>";
// - Mảng tuần tự key bắt đầu = 0, ko phải = 1
// - Lấy giá trị của từng phần tử mảng theo cách thủ công,
// luôn phải theo quy tắc: phải biết key của phần tử đó
echo $arr[0]; //1
echo $arr[3]; //4
echo $arr[5]; //6
// echo $arr[6]; //báo lỗi vì ko có key nào = 6
// 4 - Vòng lặp foreach
// + Demo dùng vòng lặp for lặp mảng
$arr = [1, 'string', 'abc', 2, 3];
// Hàm lấy số phần tử của mảng
$count = count($arr);
// var_dump($count); //5
for ($i = 0; $i < 5; $i++) {
  echo $arr[$i]; //1stringabc23
}
// + Vòng lặp for chỉ dùng cho mảng tuần tự, thực tế ít
//dùng vòng lặp for, while, do while để lặp mảng
// + THay vào đó, luôn dùng vòng lặp foreach để lặp mảng
// + Foreach có 2 dạng:
// Dạng đầy đủ cả key và value
$arr = ['a', 'b', 'c', 1, 2, 3];
foreach ($arr AS $key => $value) {
  echo "Phần tử mảng có key: $key, 
  value tương ứng = $value <br />";
}
// + Bản chất: foreach lặp qua từng phần tử mảng, tại
//mỗi phần tử mảng biết đc luôn key và value tương ứng
//của phần tử đó
// + Có thể thay đổi cú pháp key => value tùy ý
$arr1 = [6, 5, 4, 3, 2, 1];
foreach ($arr1 AS $k => $v) {
  echo "<br />Key: $k, Value: $v";
}
// Foreach dạng khuyết key
$arr2 = ['a', 'b', 'c'];
foreach ($arr2 AS $value) {
  echo "<br /> Value: $value";
}
// + Cú pháp viết tắt của foreach khi lồng với HTML
$arr3 = ['A', 'B', 'C', 'D'];
foreach ($arr3 AS $name) {
  echo "<h1 style='color: red;border: 1px solid #000'>$name</h1>";
}
?>

<?php foreach ($arr3 AS $name): ?>
  <h1 style="color: green; border: 2px solid red">
    <?php echo $name; ?>
  </h1>
<?php endforeach; ?>

<?php
// 5 - Phân loại mảng:
// + Mảng tuần tự - Mảng số nguyên: key của từng phần tử
// đều là số -> để nhìn rõ key, value -> echo <pre>
$arr1 = [1, 2, 3, 'a'];
echo "<pre>";
print_r($arr1);
echo "</pre>";
// LẤy giá trị theo kiểu thủ công
echo $arr1[0]; //1
// Sử dụng foreach
foreach ($arr1 AS $value) {
  echo $value;
}
// + Mảng kết hợp: key của phần tử mảng có cả dạng string
$person = [
    'name' => 'Mạnh',
    'age' => 30,
    'address' => 'Hoài Đức - Hà Nội',
    4 => 'ABCDEF'
];
// Debug
echo "<pre>";
print_r($person);
echo "</pre>";
// LẤy giá trị theo kiểu thủ công:
echo $person['name']; //Mạnh
echo $person['age']; //30
echo $person['address']; //
echo $person[4]; //ABCDEF
// Dùng foreach
foreach ($person AS $key => $value) {
  echo "<br /> Key: $key, Value: $value";
}
// - Mảng đa chiều: Mảng trong mảng
$arr = [
    'name' => 'Mạnh',
    'info' => [
        'class' => 'PHP0920E',
        'amount' => 20
    ],
    'address' => 'HN'
];
// Lấy giá trị theo kiểu thủ công, cần chú ý khi echo vì
//sẽ gặp phần tử mảng có giá trị lại là 1 mảng
echo $arr['name'];
var_dump($arr['info']);
echo $arr['address'];
// Khi thao tác với mảng đã chiều, cần đi theo các key
//để lấy giá trị tương ứng
echo $arr['info']['amount']; //20
// Nếu mảng là do bạn từ định nghĩa ra, thì nên dừng
//ở tối đa 3 chiều để thao tác cho đơn giản

// 6 - Thực hành
// - Tính tổng và tích
$sum = 0;
$multiple = 1;
$arr = [12, 50, 60, 90, 12, 25, 60];
foreach ($arr AS $value) {
  $sum += $value; // $sum = $sum + $value
  $multiple *= $value;
}
echo "Tổng: $sum";
echo "Tích: $multiple";
// - Hiển thị các giá trị trong 1 cấu trúc bảng
$arrs = ['PHP', 'HTML', 'CSS', 'JS'];
// Cần tạo ra cấu trúc HTML tĩnh trước
?>
<table border="1" cellspacing="0" cellpadding="6">
  <tr>
    <th>Tên khóa học</th>
  </tr>
  <?php foreach ($arrs AS $course): ?>
    <tr>
      <td><?php echo $course; ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<?php
// 7 - Một số hàm có sẵn của PHP xử lý mảng
// + Tính tổng các phần tử trong mảng
$arr = [1, 2, 3];
$sum = array_sum($arr);
echo $sum; //6
// + Kiểm tra key có tồn tại trong mảng hay ko
$arr = [
    'name' => 'Mạnh',
    'age' => 30
];
$is_exists = array_key_exists('sadsasda', $arr);
var_dump($is_exists); //false
//  + Kiểm tra giá trị có tồn tại trong mảng hay ko, trả
//về key của phần tử tương ứng nếu thấy
$search = array_search(30, $arr);
var_dump($search); //age
// + Loại bỏ giá trị trùng lặp
$arr = [1, 1, 1, 2];
$arr_new = array_unique($arr);
echo "<pre>";
print_r($arr_new);
echo "</pre>";
// + Trả về mảng mới có giá trị lấy từ giá trị của mảng
//ban đầu
$arr = [
    'name' => 'Manh',
    'age' => 30
];
$arr_new = array_values($arr);
echo "<pre>";
print_r($arr_new);
echo "</pre>";
// array_keys -> tạo mảng mới có giá trị lấy từ key của
//mảng ban đầu
$arr_new = array_keys($arr);
// $arr_new = ['name', 'age']
// - Đếm số phần tử mảng:
echo count($arr); //2
// - Chuyển từ chuỗi thành mảng dựa vào ký tự phân tách
$string = "Hello Mạnh abc def";
$arr = explode(' ', $string);
echo "<pre>";
print_r($arr);
echo "</pre>";
// - Chuyển từ mảng về chuỗi ngăn cách bởi ký tự phân tách
$arr = ['Hello', 'Mạnh', 'abc', 'def'];
$string = implode('-', $arr);
echo $string;//Hello-Mạnh-abc-def
// - LẤy giá trị cuối cùng của mảng
$arr = [1, 2, 3, 4];
echo $arr[3];
echo end($arr); //4
// - Lấy giá trị đầu tiên của mảng
echo $arr[0]; //1
echo reset($arr); //1
// - Xóa phần tử mảng theo key
$arr = [
    'name' => 'Mạnh',
    'age' => 30,
    3 => 'abc',
    'address' => 'HN'
];
echo "<pre>";
print_r($arr);
echo "</pre>";

unset($arr['age']);

echo "<pre>";
print_r($arr);
echo "</pre>";
// - Kiểm tra giá trị có phải mảng hay ko: is_array
// - LẤy giá trị nhỏ nhất, lớn nhất từ mảng
$arr = [3, 2, 4];
echo min($arr); //2
echo max($arr); //4
// - Sắp xếp tăng dần theo giá trị mảng
$arr = [4, 2, 4, 5, 1, 7];
sort($arr);
echo "<pre>";
print_r($arr);
echo "</pre>";
//rsort: sắp xếp giảm dần theo giá trị
//ksort: sắp xếp tăng dần theo key
//krsort: sắp xếp giảm dần theo key
//// + THam khảo thêm slide Các hàm thao tác với String,
/// Number, Time
?>
