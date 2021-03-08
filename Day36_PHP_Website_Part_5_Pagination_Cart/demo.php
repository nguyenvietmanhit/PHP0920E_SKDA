<?php
//demo.php
?>
<!--Tạo link, sử dụng mobile truy cập,
 click vào SĐT tự gọi-->
<a href="tel:0987599921">0987599921</a>
<!--https://dakim.vn/-->
<!--Click email tự động mở trình gửi mail của window-->
<a href="mailto:nguyenvietmanhit@gmail.com">
  nguyenvietmanhit@gmail.com
</a>

<!--
Tích hợp Messenger vào website
- Cần có quyền quản trị 1 Fanpage
- Truy cập fanpage -> Page Settings -> Messaging
-> Add Messager to Website
- Chú ý: chỉ tích hợp đc message khi trang web có giao
thức https
- Do đang test trên localhost nên bắt buộc phải cấu
hình XAMPP để bật https cho localhost
Tham khảo link sau:
https://stackoverflow.com/questions/5801425/enabling-ssl-with-xampp
-->
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v10.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution="setup_tool"
     page_id="100462768276073">
</div>