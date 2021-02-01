<?php
//views/users/register.php
// Form đăng ký tài khoản
?>
<div class="container">
  <h1>Form thêm mới tài khoản</h1>
  <form action="" method="post">
    <div class="form-group">
<!--   Thẻ label chỉ có tác dụng khi đi kèm với input:
   click vào label trỏ chuột vào input tương ứng
   for trùng với id của input
   -->
      <label for="username">Nhập username</label>
      <input type="text" name="username" id="username"
      class="form-control" />
    </div>
    <div class="form-group">
      <label for="password">Nhập password</label>
      <input type="password" name="password" id="password"
             class="form-control" />
    </div>
    <div class="form-group">
      <label for="password_confirm">Nhập lại password</label>
      <input type="password" name="password_confirm"
             id="password_confirm" class="form-control" />
    </div>
    <div class="form-group">
      <input type="submit" name="register" value="Đăng ký"
             class="btn btn-primary" />
      <p>
        Nếu đã có tài khoản, đăng nhập tại
        <a href="index.php?controller=user&action=login">đây</a>
      </p>
    </div>

  </form>
</div>

