<?php
/**
 * demo_array.php
 * MẢNG
 * - Các kiểu dữ liệu nguyên thủy: integer, float, string,
 * boolean có đặc trưng là chỉ có thể lưu đc 1 giá trị duy nhất
 * tại 1 thời điểm
 * - Có nhu cầu muốn thể hiện các thông tin theo tính trực
 * quan hơn. Vd muốn khai báo 1 biến mà lưu đc cả tên, tuổi,
 * địa chỉ thì nghĩ đến kiểu dữ liệu mảng
 * - Mảng: là 1 kiểu dữ liệu trong PHP cho phép lưu nhiều giá
 * trị tại 1 thời điểm, và các giá trị đó có thể là bất cứ
 * kiểu dữ liệu nào, ngay cả 1 mảng
 * - Về thuật ngữ, mảng sẽ có 2 thuật ngữ chính: key và value
 * Key: dùng để xác định phần tử
 * Value: giá trị của phần tử tương ứng dựa theo key tương ứng
 * Để lấy đc chính xác thông tin của phần tử, cần biết key
 * của nó
 */
// Cú pháp khai báo mảng: có 2 cách khai báo
// + Dùng từ khóa array, dùng từ các phiên bản PHP < 5.4
$arr1 = array('manh', 1, 1.5, true, array());
// + Dùng []
$arr2 = ['manh', 1, 1.5, true, []];
// Ưu tiên sử dụng cách [] để khai báo mảng
// - Đọc thông tin mảng arr2:
// MẢng này có 5 phần tử:
// Phần tử đầu tiên: key = 0, value = manh
// Phần tử thứ 2: key = 1, value = 1
// Phần tử thứ 3: key = 2, value = 1.5
// ...
// + Giá trị của phần tử mảng luôn được xác định dựa vào
// key của nó
// + Xem thông tin mảng (debug)
var_dump($arr2);
// + Việc debug mảng sử dụng var_dump hơi khó nhìn với các mảng
//mà có nhiều chiều, nên dùng cấu trúc để debug mảng/đối tượng
echo "<pre>";
print_r($arr2);
echo "</pre>";
// + Mảng là kiểu dữ liệu gặp nhiều nhất trong PHP

// - Hiển thị giá trị của kiểu dữ liệu mảng
$arr2 = ['manh', 1, 1.5, true, []];
// echo 1 mảng sẽ báo lỗi
//echo $arr2;
// - Vòng lặp foreach
// + Để hiển thị đc các giá trị của mảng, sẽ cần sử dụng vòng
//lặp
// + Demo sử dụng vòng lặp for để hiển thị giá trị của các phần
//tử mảng
$arr = [1, 2, 3];
//Lấy tổng số phần tử đang có trong mảng, = hàm count của PHP
$count = count($arr); //3
for ($key = 0; $key < 3; $key++) {
  //Luôn nhớ: để lấy giá trị của 1 phần tử mảng
  //luôn phải biết key tương ứng của phần tử đó
  echo $arr[$key];
}
//123
// + Thực tế ko nên sử dụng for, while, do...while để lặp mảng
//vì nếu mảng là nhiều chiều thì sẽ rất phức tạp
//+ Thực tế luôn dùng vòng lặp foreach để lặp mảng
$arr = [1, 2, 3];
echo "<br />";
// + Cơ chế của foreach: tự động lặp qua từng phần tử mảng, tại
//mỗi phần tử biết đc luôn key và và value tương ứng
// + Foreach có 2 cú pháp khai báo như sau:
// - Foreach khuyết key, đc dùng khi ko cần thao tác với key của
//phần tử
foreach ($arr AS $value) {
  echo $value;
}
// - Foreach đầy đủ cả key và value: dùng khi muốn thao tác với
//cả key và value của phần tử
foreach ($arr AS $key => $value) {
  echo "Phần tử có key = $key đang có giá trị = $value";
  echo "<br />";
}

// + Lấy giá trị thủ công, không dùng vòng lặp
$arr = ['manh', 123, 'abc'];
echo $arr[2];//abc
echo $arr[0];//manh

// Phân loại mảng trong PHP:
// Chia làm 3 loại chính:
// + Mảng tuần tự/Mảng số nguyên: tất cả key của mảng ở dạng
// số nguyên, là mảng đơn giản nhất
// Mặc định, key của mảng số nguyên bắt đầu từ 0
// VD:
$arr = [1, 'abc', 456];
foreach ($arr AS $k => $v) {
  echo "<br /> Key: $k => Value: $v";
}
// + Mảng kết hợp: mảng có key ở dạng string, mảng này thể hiển
//thông tin tốt hơn so với mảng số nguyên, mảng này rất thông
//dụng trong PHP
$arr = [
    'name' => 'Mạnh',
    'age' => 30,
    'address' => 'Hoài Đức, Hà Nội',
  //do các phần tử trước nó các key đều là string, nên các phần
  //tử ko khai báo tường minh key thì key sẽ bắt đầu từ 0
    'abc',
    5 => 'def'
];
// DEbug thông tin mảng trên
echo "<pre>";
print_r($arr);
echo "</pre>";
// Lặp mảng để hiển thị key và value tương ứng của từng phần
//tử mảng
foreach ($arr AS $key => $value) {
  echo "<br /> Phần tử có key = $key, có giá trị là $value";
}
// Lấy giá trị thủ công dựa theo key tương ứng
$arr = [
    'name' => 'Mạnh',
    'age' => 30,
    'address' => 'Hoài Đức, Hà Nội',
    'abc',
    5 => 'def'
];
echo $arr['address'];//Hoài Đức, Hà Nội
echo $arr[0]; //abc
// + Mảng đa chiều:
// - Là mảng bao gồm 1 hoặc nhiều mảng bên trong nó
// - Thao tác phức tạp nhất trong số 3 loại mảng
// - NẾu mảng tự định nghĩa, chỉ nên tạo ra mảng tối đa có
//3 chiều
$arr = [
    'age' => 30,
    'info' => [
        'name' => 'Mạnh',
        'address' => 'HN'
    ]
];
//như trên là mảng 2 chiều
$arr = [
    'info' => [
        'class' => [
            'name' => 'PHP0720E',
            'amount' => 27
        ]
    ],
    'age' => 30
];
// Như trên là mảng 3 chiều
// Với các mảng đa chiều, vẫn dùng foreach để lặp mảng, tuy nhiên
//cần chú ý logic khi xử lý các phần tử mảng
foreach ($arr AS $key => $value) {
  echo "<br /> Key = $key, Value = $value";
}

// Lấy giá trị theo kiểu thủ công từ mảng đa chiều
$arr = [
    'info' => [
        'class' => [
            'name' => 'PHP0720E',
            'amount' => 27
        ]
    ],
    'age' => 30
];
echo $arr['info']['class']['amount']; //27
echo $arr['age']; //30
// Debug mảng đa chiều trên
echo "<pre>";
print_r($arr);
echo "</pre>";

//  - Cú pháp viết tắt của foreach khi viết chung với HTML
// Sử dụng thẻ mở foreach, thẻ đóng endforeach
?>

<?php
$arr = ['PHP', 'HTML', 'CSS', 'JS'];
?>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Tên khóa học</th>
    </tr>
  <?php foreach ($arr AS $key => $value): ?>
      <tr>
          <td><?php echo $value; ?></td>
      </tr>
  <?php endforeach; ?>
</table>

