<?php
/**
 * + Tạo file product_detail.php ngang hàng
 * với thư mục mvc_demo của Day33
 * + Với phần nhập nội dung chi tiết của 1 sp, cần thêm
 * ảnh, format text, .... -> các input của form sẽ ko
 * thể xử lý đc
 * -> nhúng trình soạn thảo: soạn thảo văn bản như Word
 * , là CKEditor
 * -> nhúng trình upload ảnh: upload file trực tiếp
 * , là CKFinder
 * + Cách cài đặt CKEditor:
 * a/ TẢi về, bỏ qua bước này vì đã tải về r:
 * mvc_demo/assets/ckeditor
 * b/ Nhúng file jquery, ckeditor.js vào hệ thống
 * c/ Code JS để tích hợp CKEditor vào thẻ textarea, chú
 * ý: CKEditor chỉ áp dụng đc cho textarea thông qua
 * name của textarea
 * + Cách cài đặt CKFinder: do CKEditor mặc định ko hỗ
 * trợ tải ảnh từ máy tính lên -> cài CKFinder để có
 * tính năng này
 * a/ Tải CKFinder
 * b/ Cấu hình CKFinder theo slide
 * c/ Code JS để tích hợp CKFinder vào CKEditor như sau
 *
 */
?>
<script src="mvc_demo/backend/assets/js/jquery.min.js"></script>
<script src="mvc_demo/backend/assets/ckeditor/ckeditor.js"></script>
<script>
 // Code JS để tích hợp CKEditor vào textarea
 $(document).ready(function() {
     var obj_ckfiner = {
         //đường dẫn tới file ckfinder.html
         filebrowserBrowseUrl: 'mvc_demo/backend/assets/ckfinder/ckfinder.html',
         //đường dẫn tới file connector.php
         filebrowserUploadUrl: 'mvc_demo/backend/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
     };
     CKEDITOR.replace('detail', obj_ckfiner);
 });
// có thể cần xóa cache trình duyệt để nhận code js mới
  // -> Ctrl + Shift + R
</script>
<form action="" method="post">
  Nhập tên sp:
  <input type="text" name="name" value="" />
  <br />
  Nhập chi tiết sản phẩm:
  <textarea name="detail"></textarea>
  <br />
  <input type="submit" name="submit" value="Lưu" />
</form>

