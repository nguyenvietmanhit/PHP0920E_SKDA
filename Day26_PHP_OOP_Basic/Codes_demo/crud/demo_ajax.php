<?php
/**
 * crud/demo_ajax.php
 * Demo về chức năng lấy danh sách sản phẩm sử dụng cơ chế Ajax
 * - Cơ chế bất đồng bộ : ko cần qtam đến chức năng khác chạy xong hay chưa
 * - Nên dùng jQuery để gọi ajax thay vì dùng Javascript thuần
 */
?>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    // Code ajax inline trong file
    $(document).ready(function () {
       // Gọi ajax sử dụng cú pháp jQuery
        var obj_ajax = {
          // Url php sẽ xử lý ajax
            url: 'get_product.php',
          // Phương thức gửi dữ liệu
            method: 'POST',
          // Danh sách các tham số và giá trị gửi lên url nếu có
            data: {
                is_update: true,
                info: 'ABC'
            },
            // Nơi nhận kết quả trả về từ url
            // Tham số data chứa kết quả trả về
            success: function(data) {
                console.log(data);
                // Hiển thị kết quả trả về trên ra màn hình
                $('#result-ajax').html(data);
            }
        };
        // Khi click thẻ a thì mới gọi ajax
        $('#ajax-click').click(function () {
            $.ajax(obj_ajax);
        });

        //Debug ajax như sau: mở Inspect HTML -> Network , click vào link ->
        // thấy url ajax xuất hiện -> click url này
    });
</script>

<a href="#" id="ajax-click">
    Click để lấy danh sách sản phẩm
</a>
<!--Khai báo 1 khối để chờ hiển thị nội dung trả về từ ajax-->
<div id="result-ajax" style="color: green"></div>
