<?php
/**
 * views/layouts/main.php
 * File layout/bố cục chính của trang
 */
?>
<!DOCTYPE html>
<html>
<head>
    <!--   File layout này luôn đc gọi trong phương thức
    của controller tương ứng  -->
    <!--   Do tiêu đề trang là nội dung, nên khai
       báo trong controller cha-->
    <title><?php echo $this->page_title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <script src="assets/js/main.js"></script>
<!--  Khai báo SEO bằng các thẻ meta, sử dụng cơ chế
  động cho các nội dung SEO này-->
</head>
<body>
    <div class="header">
        <h1>Đây là header</h1>
    </div>
    <div class="main">
<!--    Do file layout là file đc gọi ở bất cứ 1 chức
    năng/phương thức nào, nên hiển thị các thông báo
    lỗi/thành công tại file này
-->
       <h3 style="color: red">
           <?php echo $this->error; ?>
           <?php
           if (isset($_SESSION['error'])) {
               echo $_SESSION['error'];
               unset($_SESSION['error']);
           }
           ?>
       </h3>
        <h3 style="color: green">
          <?php
          if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
          }
          ?>
        </h3>

       <?php echo $this->content; ?>
    </div>
    <div class="footer">
        <h1>Đây là footer</h1>
    </div>
</body>
</html>

