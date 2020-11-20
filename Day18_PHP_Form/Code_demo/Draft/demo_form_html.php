<?php
/**
 * demo_form.php
 */
?>
<!--
Form có 2 thuộc tính cơ bản:
- action: url sẽ xử lý dữ liệu khi submit form, nếu
set = "" nghĩa là chính url hiện tại (file hiện tại)
mà khai báo form này sẽ xử lý submit form luôn
- method: phương thức gửi dữ liệu lên server PHP, có 2 phương
thức cơ bản là GET và POST
-->
<!--Khai báo 1 form với đầy đủ các input thông dụng-->
<!--Khi khai báo các input trong form, bắt buộc phải khai báo
thuộc tính name cho input, vì PHP sẽ dựa vào name để biết đc
dữ liệu từ input nào gửi lên-->
<!--Lưu ý cách set giá trị cho thuộc tính name cho các input
+ Nếu input chỉ cho phép nhập/chọn 1 giá trị duy nhất tại 1
thời điểm -> name ở dạng biến đơn
+ Nếu input cho phép chọn nhiều -> name ở dạng mảng,
vd: checkbox, select ở dạng multiple, input file ở dạng multiple
name=jobs[]
-->
<form action="" method="post">
  Fullname:
  <input type="text" name="fullname" />
  <br />
  Age:
  <input type="number" name="age" />
  <br />
  Password:
  <input type="password" name="password" />
  <br />
  Jobs:
  <input type="checkbox" name="jobs[]" value="0" /> Dev
  <input type="checkbox" name="jobs[]" value="1" /> Tester
  <br />
  Gender:
  <input type="radio" name="gender" value="0" /> Male
  <input type="radio" name="gender" value="1" /> Female
  <br />
  Email:
  <input type="email" name="email" />
  <br />
  Upload avatar:
  <input type="file" name="avatar" />
  <br />
<!-- Input file ở dạng chọn nhiều -->
  File multiple
  <input type="file" multiple name="files[]" />
  <br />
  Country:
  <select name="country">
    <option value="0">VN</option>
    <option value="1">USA</option>
  </select>
  <br />
  Select multiple:
  <select multiple name="selects[]">
    <option value="0">Select 0</option>
    <option value="1">Select 1</option>
    <option value="2">Select 2</option>
  </select>
  <br />
  Note:
  <textarea name="note"></textarea>
  <br />
  <input type="submit" name="submit" value="Submit" />
  <input type="reset" name="reset" value="Reset" />
</form>
