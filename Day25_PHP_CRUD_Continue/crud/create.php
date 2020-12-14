<?php
session_start();
require_once 'database.php';
/**
 * create.php
 * Thêm mới sản phẩm
 * products: id, name, avatar, price, created_at
 */
// Xử lý submit form
// + Debug các biến liên quan: $_POST, $_FILES
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
// + Khai báo biến chữa thông tin lỗi/kết quả
$error = '';
// + Xử lý submit form
if (isset($_POST['submit'])) {
  // + Gán biến trung gian
  $name = $_POST['name'];
  $price = $_POST['price'];
  $avatar_arr = $_FILES['avatar'];
  // + Validate form:
  // Tên, giá ko đc để trống: empty
  // Giá phải là số: is_numeric
  // File upload phải là ảnh, dung lượng max = 2Mb
  if (empty($name) || empty($price)) {
    $error = 'Phải nhập tên hoặc giá';
  } elseif (!is_numeric($price)) {
    $error = 'Giá phải là số';
  } elseif ($avatar_arr['error'] == 0) {
    // File phải là ảnh, dựa vào đuôi file
    $extension = pathinfo($avatar_arr['name'],
        PATHINFO_EXTENSION);
    $extension = strtolower($extension);
    $extension_allow = ['jpeg', 'png', 'gif', 'jpg'];
    if (!in_array($extension, $extension_allow)) {
      $error = 'File phải là dạng ảnh';
    }
    // File <= 2Mb
    //1Mb = 1024Kb = 1024 * 1024B;
    $size_b = $avatar_arr['size'];
    $size_mb = $size_b / (1024 * 1024);
    // Làm tròn, giữ lại số phần thập phân
    $size_mb = round($size_mb, 1);
    if ($size_mb > 2) {
      $error = 'File upload max = 2Mb';
    }
  }
  // + Xử lý logic bài toán chỉ khi ko có lỗi
  // - Xử lý upload file nếu có file đc tải lên
  $avatar = '';
  if ($avatar_arr['error'] == 0) {
    $dir_upload = 'uploads';
    // NẾu chưa tồn tại thì mới tạo thư mục:
    if (!file_exists($dir_upload)) {
      mkdir($dir_upload);
    }
    // Tạo tên file mang tính duy nhất, tránh ghi đè
    //file khi tải file trùng lên
    $avatar = time() . '-' . $avatar_arr['name'];
    // Upload file
    move_uploaded_file($avatar_arr['tmp_name'],
        $dir_upload . "/" . $avatar);
  }
  // - Lưu vào bảng products: id, name, avatar,
  // price, created_at
  // + Tạo câu truy vấn:
$sql_insert = "INSERT INTO products(name, avatar, price)
VALUES('$name', '$avatar', $price)";
  // + Thực thi truy vấn
  $is_insert = mysqli_query($connection, $sql_insert);
//  var_dump($is_insert);
  if ($is_insert) {
    $_SESSION['success'] = 'Thêm mới thành công';
    header('Location: index.php');
    exit();
  } else {
    $error = 'Thêm mới thất bại';
  }
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h2>Form thêm mới sp</h2>
<form action="" method="post"
      enctype="multipart/form-data">
  Nhập tên:
  <input type="text" name="name"
value="<?php echo isset($_POST['name']) ?
    $_POST['name'] : ''; ?>" />
  <br />
  Ảnh sản phẩm
  <input type="file" name="avatar" />
  <br />
  Giá
  <input type="text" name="price"
value="<?php echo isset($_POST['price']) ?
$_POST['price'] : ''; ?>" />
  <br />
  <input type="submit" name="submit" value="Lưu sp" />
</form>
