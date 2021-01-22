<?php
/**
 * build_website_from_scratch.php
 * Hướng dẫn code 1 website bán hàng đơn giản
 * + Chuẩn bị giao diện tĩnh (HTML/CSS/JS) của tất cả
 * các trang, frontend + backend -> tìm template free
 * Làm sao xác định đc các chức năng có thể có của 1
 * trang bán hàng ? -> trải nghiệm các website thực tế
 * + Liệt kê 1 số chức năng đặc trưng của 1 trang bán
 * hàng bên frontend
 * 1/ Giỏ hàng: như 1 giỏ đi chợ -> ưng mới thanh toán
 * Code: để lưu thông tin -> cookie/session/CSDL -> nên
 * dùng session để lưu
 * 2/ Lọc sản phẩm: tìm kiếm -> WHERE LIKE
 * 3/ So sánh sản phẩm: select ra 2 sp -> hiển thị theo
 * cấu trúc đối xứng
 * 4/ Login/Register
 * 5/ Thanh toán: form nhập thông tin user, sản phẩm trong
 * giỏ hàng
 * 6/ Phân trang: giúp SELECT ko bị die khi SELECT nhiều
 * bản ghi -> SELECT kết hợp LIMIT
 * 7/ Liên hệ: form + map
 * 8/ Tích hợp chat trực tuyến: Messager, talkto ..
 * 9 / Tích hợp comment FB, tự dựng comment
 * 10/ Đánh giá/Vote sp:
 *11/  Sản phẩm yêu thích: session/cookie/CSDL -> cookie
 * hoặc CSDL
 * 12/ Danh sách sp top, bán chạy nhất, ..., Ds tin tức
 * 13/ Chi tiết sp, tin tức ...
 * 14/ Nhập mã giảm giá
 * 15 / Tích điểm khi mua hàng
 * 16 / Tin tức/Sp liên quan
 * 17 / Quên mật khẩu
 * + Backend:
 * 1/CRUD theo từng chức năng: sp, tin tức, đơn hàng,
 * user
 * 2/ Login/Resgister
 * 3 / Phân quyền: Super Admin, Admin, Sales, Editor
 * 4 / Thống kê: đơn hàng bán chạy nhất, thống kê
 * doanh thu theo ngày, tháng ...
 * 5 / Thay đổi trạng thái đơn hàng
 * .....
 *
 * + Phân tích CSDL từ giao diện có sẵn, dựa vào frontend
 * a/ Cần chạy từng trang .html, nhìn từ trên xuống dưới
 * của trang .html này
 * + Bảng menus: quản lý menu
 * id
 * name: tên menu, VARCHAR
 * link: VARCHAR
 * status: TINYINT, 0 - Ẩn, 1 - Hiện
 * created_at
 * + Bảng products: qly thông tin sản phẩm
 * id
 * avatar: tên file ảnh sp, VARCHAR
 * name: tên sp
 * price: giá sp
 * summary: mô tả ngắn của sp
 * content: mô tả chi tiết
 * amount: số lượng sp
 * category_id: khóa ngoại, liên kết với bảng categories
 * seo_title: VARCHAR
 * seo_description:VARCHAR
 * seo_keywords:VARCHAR
 * status: 0 - ẩn, 1 - Hiện
 * created_at
 * + Bảng news: qly thông tin tin tức
 * id
 * name
 * avatar
 * summary
 * content
 * seo_title
 * seo_description
 * seo_keywords
 * status
 * created_at
 * + Bảng categories: qly các danh mục
 * id
 * name
 * avatar
 * description
 * status
 * created_at
 * + Bảng orders: quản lý đơn hàng
 * id
 * fullname: tên ng mua hàng
 * address: địa chỉ ng mua
 * mobile: sdt ng mua
 * email: email ng mua
 * note: ghi chú từ ng mua
 * price_total: tổng giá trị đơn hàng
 * payment_status: trạng thái đơn hàng: TINYINT: 0 - Chưa
 * thanh toán, 1 - Đã thanh toán
 * user_id: khóa ngoại, liên kết với bảng user
 * created_at
 * + Bảng order_details: chi tiết đơn hàng
 * id
 * order_id: khóa ngoại, liên kết với bảng orders
 * product_name: tên sp tại thời điểm mua hàng
 * product_price: giá sp tại thời điểm mua hàng
 * quantity: số lượng sp tại thời điểm mua
 *+ Bảng users: qly thông tin user
 * THam khảo file file_create_db.html để tạo các bảng
 * bằng cách chạy câu truy vấn -> càn tạo CSDL trc, r
 * chạy câu truy vấn trong file file_create_db.html để
 * tạo bảng
 * + Xây dựng cấu trúc file/thư mục cho project theo
 * MVC
 *
 * 3/ Tạo CSDL:
CREATE DATABASE IF NOT EXISTS php0920e_project
CHARACTER SET utf8 COLLATE utf8_general_ci;
 * 4/ Tạo các bảng: copy nội dung file file_create_db.html
 * ,chạy trên tab SQL của PHPMyAdmin
 *
 * 5/ Tạo cấu trúc thư mục cho project theo MVC đã học
 * mvc_project
             /backend: quản trị trang
                     /assets/
 *                          /css
 *                          /js
 *                          /images
 *                          /webfonts
 *                          /ckeditor: trình soạn thảo
 *                          /ckfinder: trình upload ảnh
 *                   /configs
 *                          /Database.php
 *                   /controllers
 *                          /Controller.php
 *                          /CategoryController.php
 *                   /models
 *                          /Model.php
 *                          /Category.php
 *                   /views/
 *                         /layouts
 *                                 /main.php
 *                         /categories/
 *                                    /index.php
 *                                    /create.php
 *                                    /update.php
 *                                    /detail.php
 *                  /index.php: file index gốc
 *                  /.htaccess:
 *           /frontend: user thực tế
 *           cấu trúc file/thư mục giống hệt backend
 * 6 / Code Backend trước
 * - Nhúng trình soạn thảo CKEditor
 * - Nhúng trình upload ảnh CKFinder
 * + Tạo file product_detail.php ngang hàng
 * với thư mục mvc_demo của Day33
 *
 *
 * - Công việc cần làm:
 * + Chuẩn bị tên đề tài, cbi giao diện tĩnh frontend
 * và backend
 * + Cbi nhóm code, độc lập hoặc nhóm tối đa 3 người
 */