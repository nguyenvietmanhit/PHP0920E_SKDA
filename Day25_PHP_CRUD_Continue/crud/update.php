<?php
session_start();
require_once 'database.php';
/**
 * crud/update.php
 * + Form cập nhật rất giống form thêm mới,
 * mặc định đc đổ dữ liệu vào các input
 * + Copy form HTML từ file create.php ->
 * file hiện tại
 */
// - Lấy thông tin sản phẩm dựa vào tham số id từ url
// ...update.php?id=sadsa
// Cần phải check user sửa url như xóa tham số id hoặc
//set id ko phải số
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  $_SESSION['error'] = "Id ko hợp lệ";
  header('Location: index.php');
  exit();
}

$id = $_GET['id'];
// - Tương tác với CSDL -> lấy sp theo id -> đổ dữ liệu
//ra form
// + Viết truy vấn lấy dữ liệu SELECT
$sql_select_one = "SELECT * FROM products
 WHERE id = $id";
// + Thưc thi truy vấn -> obj trung gian
$result_one = mysqli_query($connection, $sql_select_one);
// + Lấy mảng kết hợp từ obj trung gian trên
$product = mysqli_fetch_assoc($result_one);
echo "<pre>";
print_r($product);
echo "</pre>";
// - XỬ LÝ SUBMIT FORM: rất giống form thêm mới
// + Debug: $_POST, $_FILES
// + KHai báo biến chứa lỗi
$error = '';
// + Nếu user submit form thì mới xử lý
if (isset($_POST['submit'])) {
  // + Gán biến trung gian
  $name = $_POST['name'];
  $price = $_POST['price'];
  $avatar_arr = $_FILES['avatar'];
  // + Validate form: giống hệt như thêm mới
  // + Xử lý logic bài toán chỉ khi ko có lỗi xảy ra
  if (empty($error)) {
    //Nếu user ko upload đè ảnh, thì vẫn phải giữ nguyên
    //tên file ảnh cũ
    $avatar = $product['avatar'];
    // Nếu upload đè file thì xử lý upload file mới và
    // phải xóa file cũ để tránh rác hệ thống : unlink
    if ($avatar_arr['error'] == 0) {
      $dir_upload = 'uploads';
      if (!file_exists($dir_upload)) {
        mkdir($dir_upload);
      }
      // Xóa file cũ đi
      unlink("uploads/$avatar");
      // Tạo tên file có tính duy nhất
      $avatar = time() . '-' . $avatar_arr['name'];
      move_uploaded_file($avatar_arr['tmp_name'],
          $dir_upload . "/" . $avatar);
    }
    // + Tương tác với CSDL để cập nhật bản ghi
    // - Viết truy vấn:
    $sql_update = "UPDATE products 
SET name = '$name', avatar = '$avatar', price = $price
WHERE id = $id";
    // - Thực thi truy vấn
    $is_update = mysqli_query($connection, $sql_update);
    if ($is_update) {
      $_SESSION['success'] = "Update thành công";
      header('Location: index.php');
      exit();
    } else {
      $error = 'Update thất bại';
    }
    //wow js
  }
}


?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h2>Form cập nhật sp</h2>
<!--
Đổ dữ liệu ra input form
-->
<form action="" method="post"
      enctype="multipart/form-data">
  Nhập tên:
  <input type="text" name="name"
         value="<?php echo isset($_POST['name']) ?
             $_POST['name'] : $product['name']; ?>" />
  <br />
  Ảnh sản phẩm
  <input type="file" name="avatar" />
  <img src="uploads/<?php echo $product['avatar']?>"
  height="100px" alt="Image" />
  <br />
  Giá
  <input type="text" name="price"
         value="<?php echo isset($_POST['price']) ?
             $_POST['price'] : $product['price']; ?>" />
  <br />
  <input type="submit" name="submit" value="Lưu sp" />
</form>
