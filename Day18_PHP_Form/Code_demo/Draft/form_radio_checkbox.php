<?php
/**
 * form_radio_checkbox.php
 * Demo xử lý form với radio và checkbox
 */
//BẮT ĐẦU XỬ LÝ SUBMIT FORM
// + Debug
echo "<pre>";
print_r($_GET);
echo "</pre>";
//+ Tạo biến chứa lỗi và thành công
$error = '';
$result = '';
// + Kiểm tra nếu user submit thì mới xử lý form, isset
if (isset($_GET['submit'])) {
  // + Gán biến trung gian
  $email = $_GET['email'];
  //với radio/checkbox sẽ có trường hợp ko chọn radio hoặc ko
  //chọn checkbox nào, khi đó mang $_GET/$_POST sẽ ko bắt dc
  //các dữ liệu này, đến đến việc 2 khai báo sau sẽ báo lỗi
  //ko tìm thấy key
  //Như vậy luôn cần kiểm tra nếu tồn tại key tương ứng của
  //radio/checkbox thì mới thao tác đc
//  $gender = $_GET['gender'];
//  $jobs = $_GET['jobs'];
  // + Validate form:
  // - Email phải có định dạng email, sử dụng hàm filter_var
  // - Radio/checkbox bắt buộc phải chọn, isset
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Email chưa đúng định dạng';
  } elseif (!isset($_GET['gender'])) {
    $error = 'Phải chọn giới tính';
  } elseif (!isset($_GET['jobs'])) {
    $error = 'Phải chọn ít nhất 1 job';
  }
  // + Xử lý logic form chỉ khi ko có lỗi xảy ra
  if (empty($error)) {
    $result .= "Email: $email <br />";
    //Hiển thị giới tính:
    $gender = $_GET['gender'];
    $gender_text = 'Nam';
    if ($gender == 1) {
      $gender_text = 'Nữ';
    }
    $result .= "Giới tính: $gender_text <br />";
    //Hiển thị jobs
    $jobs = $_GET['jobs'];
    $job_text = '';
    //Lặp mảng để hiển thị các giá trị tương ứng
    foreach($jobs AS $job) {
      if ($job == 1) {
        $job_text .= "Dev ";
      } elseif ($job == 2) {
        $job_text .= "Tester";
      }
    }
    $result .= "Jobs: $job_text <br />";
  }
}
?>
<!--Hiển thị thông báo ra màn hình-->
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="GET">
  Email:
  <input type="text" name="email" value="" />
  <br />
  Giới tính:
<!-- sử dụng checked cho radio/checkbox nếu muốn check mặc
 định, còn với thẻ <select> sử dụng selected trên option muốn
  chọn mặc định-->
  <input type="radio" name="gender" value="1" /> Nữ
  <input type="radio" name="gender" value="2" /> Nam
  <br />
  Jobs:
  <input type="checkbox" name="jobs[]" value="1" /> Dev
  <input type="checkbox" name="jobs[]" value="2" /> Tester
  <br />
  <input type="submit" name="submit" value="Show thông tin" />
</form>
