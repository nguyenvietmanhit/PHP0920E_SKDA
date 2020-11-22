<?php
/**
 * Demo upload file với PHP
 * - Sử dụng input type=file để cho phép upload file
 * - Khi form có input file bắt buộc:
 * + Method của form phải là POST
 * + Phải khai báo thêm 1 thuộc tính cho form:
 * enctype='multipart/form-data'
 * + $_POST/$_GET của PHP sẽ ko bắt đc dữ liệu của input file,
 * mà cần dùng biến $_FILES - là 1 mảng 2 chiều
 */

//Xử lý form
// + Debug thông tin biến, do $_POST/$_GET ko thể
//bắt đc dữ liệu từ input file, nên cần debug
//thêm biến mảng $_FILES
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
// Giải thích các thông tin trong mảng $_FILES:
// - name: tên file upload
// - type: kiểu file (đuôi file)
// - tmp_name: thư mục tạm đang lưu file upload,
//sẽ đc sử dụng khi upload sang thư mục do bạn
//chỉ định
// - error: trạng thái lỗi khi upload file:
// 0: ko có lỗi
// 1: file upload vượt quá dụng lượng cho phép
//bởi hệ thống
// 2: file upload vượt quá số lượng file cho phép
//upload trong form
// Chỉ cần quan tâm đến giá trị error = 0, nếu = 0
//thì file đc tải lên, nếu khác 0 thì ko tải lên
//đc
// - size: dung lượng file upload, đơn vị Byte (B)
// 1Mb = 1024 Kb = 1024 * 1024 B
// + Tạo biến chứa lỗi và kết quả
$error = '';
$result = '';
// + Kiểm tra nếu submit form thì mới xử lý
if (isset($_POST['submit'])) {
    // + Gán biến trung gian cho dễ thao tác
    $fullname = $_POST['fullname'];
    //Gán lại thành mảng 1 chiều
    $avatars = $_FILES['avatar'];
    // + Validate form:
    // - Fullname ko đc để trống
    // - File upload phải là ảnh
    // - File upload dung lượng ko đc vượt quá 2Mb
    if (empty($fullname)) {
        $error = 'Fullname ko đc để trống';
    }
    //Cần kiểm tra nếu có file upload lên thì mới
   //xử lý validate file, luôn dựa vào key=error
  // nếu error = 0 -> có file upload thì mới xử lý
   elseif ($avatars['error'] == 0) {
        //Validate phải là ảnh: lấy ra đuôi file
     //, kiểm tra đuôi file này có nằm trong mảng
     //các đuôi file là ảnh hay ko: in_array
     $extension = pathinfo($avatars['name'],
         PATHINFO_EXTENSION);
//     var_dump($extension);
     $extension_allowed = ['jpg', 'jpeg', 'png', 'gif'];
     // Lấy dung lượng file tính theo đơn vị Mb
     $size_mb = $avatars['size'] / 1024 / 1024;
     // Chỉ giữ lại 2 số thập phân để nhìn cho đẹp
     $size_mb = round($size_mb, 2);
     if (!in_array($extension, $extension_allowed)) {
         $error = 'Phải upload ảnh';
     } elseif ($size_mb > 2) {
         $error = 'Dung lượng ko đc vượt quá 2Mb';
     }
   }

   // + Xử lý logic bài toán chỉ khi nào ko có lỗi
  // xảy ra
  if (empty($error)) {
      // - Xử lý Upload file vào thư mục chỉ định
    // - Đẩy file upload vào thư mục uploads ngang
    //hàng với file hiện tại, lưu ý ko tạo thư
    //mục uploads này bằng tay, mà sẽ xử lý bằng
    //code
    // - Chỉ xử lý upload file khi có file tải lên
    //, dựa vào error = 0
    if ($avatars['error'] == 0) {
        $dir_uploads = 'uploads';
        // Tạo thư mục uploads trên, cần kiểm tra nếu
      //chưa tồn tại đường dẫn thư mục trên thì mới
      //tạo: file_exists: kiểm tra đường dẫn đến
      //file/thư mục có tồn tại hay ko
      if (!file_exists($dir_uploads)) {
          // Tạo mới thư mục: mkdir
        mkdir($dir_uploads);
      }
      // Cần xử lý tạo ra tên file ảnh có tính duy
      //nhất, để tránh trường hợp upload nhiều lần
      //cùng 1 file trùng tên -> ghi đè ảnh
      $filename = time() . $avatars['name'];
      var_dump($filename);
      // Upload file vào thư mục uploads bằng cách
      //chuyển file từ thư mục tạm sang thư mục
      //uploads: move_uploaded_file
      move_uploaded_file($avatars['tmp_name'],
          $dir_uploads . "/$filename");
      // Hiển thị các thông tin của ảnh ra
      $result .= "Tên file: $filename <br />";
      $result .= "Đuôi file: $extension <br />";
      $result .= "Dung lượng file: $size_mb Mb <br />";
      $result .= "Ảnh đại diện: ";
      $result .= "<img src='$dir_uploads/$filename' 
            width='80px' />";
    }
  }
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post"
      enctype="multipart/form-data">
    Fullname:
    <input type="text" name="fullname" />
    <br />
  Avatar
  <input type="file" name="avatar" />
    <br />
    <input type="submit"
           name="submit" value="Upload"/>
</form>
