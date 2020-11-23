<?php
/**
 * form_upload.php
 * Xử lý form có input type=file
 */
// Xử lý submit form
// - Debug mảng chứa dữ liệu từ form gửi lên:
// Mặc dù $_POST/$_GET bắt đc tên file gửi lên, nhưng ko
//thể upload đc file này nếu chỉ dựa vào mỗi tên file
// + 2 biến này chỉ bắt đc dữ liệu dạng cơ bản - dạng
// nhìn thấy đc
// + Dữ liệu dạng file là nhị phân nên ko thể đọc bằng
//$_POST/$_GET đc
// + Sử dụng biến mảng $_FILES (2 chiều)
// để đọc dữ liệu file

// + 2 ĐIỀU KIỆN BẮT BUỘC KHI FORM CÓ INPUT FILE:
// a/ Method form bắt buộc là POST
// b/ Thêm thuộc tính sau cho form:
// enctype=multipart/form-data
// + Các thuộc tính của $_FILES:
// name
// type
// tmp_name: đường dẫn tạm thời mà server (XAMPP) đã
//upload tạm
// error: = 0 -> có file dc upload, nếu != 0 -> có lỗi
// size: dung lượng file, tính bằng Byte
// 1MB = 1024KB = 1024 * 1024B, 1B = 8 Bit


// XỬ LÝ FORM
// - Debug 2 mảng $_POST, $_FILES
echo "<pre>";
print_r($_POST);
echo "</pre>";
// DEbug mảng $_FILES
echo "<pre>";
print_r($_FILES);
echo "</pre>";
// - Khai báo biến chứa lỗi và kết quả
$error = '';
$result = '';
// - Kiểm tra nếu user form submit thì mới lấy đc thông
//tin từ form
if (isset($_POST['upload'])) {
  // - Tạo và gán biến trung gian để thao tác cho dễ
  $fullname = $_POST['fullname'];
  // Gán lại $_FILES về mảng 1 chiều có 5 phần tử
  $uploads = $_FILES['avatar'];
  // - Validate form:
  // + Tên ko đc để trống: empty
  // + Tên phải ít nhất 3 ký tự: strlen
  // + Tên phải có định dạng email: filter_var
  // + File upload phải là ảnh
  // + File upload dung lượng ko vượt quá 2Mb
  if (empty($fullname)) {
    $error = 'Phải nhập tên';
  } elseif (strlen($fullname) < 3) {
    $error = 'Tên ít nhất 3 ký tự';
  } elseif (!filter_var($fullname,
      FILTER_VALIDATE_EMAIL)) {
    $error = 'Tên phải có định dạng email';
  }
  // Luôn phải check nếu có file tải lên thì mới xử lý đc
  //, dựa vào error của $_FILES, nếu = 0 -> sẽ xử lý
  elseif ($uploads['error'] == 0) {
    // + Valiate file phải là ảnh, dựa vào đuôi ảnh: jpg,
    //png, jpeg, gif
    // Lấy đuôi file dựa vào tên file upload: pathinfo
    $extension = pathinfo($uploads['name'],
        PATHINFO_EXTENSION);
    $extension = strtolower($extension);
    // Tạo mảng chứa các đuôi file là ảnh
    $allowed = ['png', 'jpg', 'jpeg', 'gif'];
    if (!in_array($extension, $allowed)) {
      $error = 'Phải upload file ảnh';
    }
    // + Validate dung lượng file <= 2Mb
    $size_b = $uploads['size']; // đơn vị Byte
    $size_mb = $size_b / 1024 / 1024;
//    var_dump($size_mb);
    // 1Mb = 1024Kb = 1024 * 1024B
    // Do phép chia có thể là ko hết -> số thập phân
    //đuôi rất dài, cần format lại
    $size_mb = round($size_mb, 2);
//    var_dump($size_mb);
    if ($size_mb > 2) {
      $error = 'File upload phải < 2Mb';
    }
  }

  // - Xử lý logic bài toán chỉ khi ko có lỗi xảy ra
  if (empty($error)) {
    $result .= "Tên của bạn: $fullname <br />";
    // + Xử lý upload ảnh vào vị trí mong muốn
    // Luôn phải có điều kiện nếu như có file tải lên và
    // ko bị lỗi thì mới xử lý upload file đc
    if ($uploads['error'] == 0) {
      // Tạo đường dẫn thư mục sẽ file upload, sủ dụng
      //đường dẫn tương đối cho thư mục này
      $dir_upload = 'uploads';
      // Ko tạo thư mục trên bằng tay, cần tạo bằng code
      //: mkdir
      // Hàm kiểm tra đường dẫn tồn tại hay chưa:
      //file_exists
      if (!file_exists($dir_upload)) {
        mkdir($dir_upload);
      }
      // Cần phải tạo ra các file có tên ở dạng duy nhất
      // để tránh trường hợp upload đè file cùng tên
      //: time(): trả về số giây tính từ thời điểm hiện
      //tại so với thời điểm 01-01-1970
      $filename = time() . '-' . $uploads['name'];
      var_dump($filename);

      // Bê file từ thư mục tạm -> thư mục đích đã tạo:
      //move_uploaded_file
      $is_upload =
      move_uploaded_file($uploads['tmp_name'],
          $dir_upload . '/'. $filename);
//      var_dump($is_upload);
      // Hiển thị thông tin ảnh:
      $result .=
      "Ảnh đại diện: 
      <img src='$dir_upload/$filename' height='100' />";
      $result .= "<br />";
      $result .= "Tên file: $filename <br />";
      $result .= "Đường dẫn ảnh: $dir_upload/$filename <br />";
      $result .= "Dung lượng file: $size_mb MB";

    }
  }
}
?>
<h3 style="color: red;"><?php echo $error; ?></h3>
<h3 style="color: green;"><?php echo $result; ?></h3>
<form action="" method="post"
      enctype="multipart/form-data">
  Nhập tên:
  <input type="text" name="fullname" value="" />
  <br />
  Chọn ảnh đại diện:
  <input type="file" name="avatar" />
  <br />
  <input type="submit" value="Show thông tin"
         name="upload" />
</form>
