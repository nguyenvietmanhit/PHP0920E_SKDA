<?php
/**
 * mvc.php
 * + Mô hình MVC trong PHP
 * - Mô hình kiến trúc phần mềm 3 lớp: Model - View -
 * Controller
 * - Phổ biến trong Framework và CMS PHP
 * - Dựa hoàn toàn trên OOP
 * + Giải thích MVC
 * - M: Model: là class chịu trách nhiệm tương tác với
 * CSDL
 * - V: View: hiển thị giao diện tới user
 * - C: Controller: trung gian, luân chuyển dữ liệu giữa
 * Model và View
 * + Luồng xử lý dữ liệu của MVC
 * + Cấu trúc thư mục MVC: tùy thuộc vào người nghĩ
 * ra MVC đó
 * + Demo Code Ứng dụng CRUD products theo mô hình MVC
 * - Dựng cấu trúc thư mục MVC
 * mvc_demo/
          /assets: chứa các file css, js, images...
 *               /css: chứa tất cả file css hệ thống
 *                   /style.css
 *               /images: chứa các ảnh tĩnh của hệ thống
 *               /js: chứa file js của hệ thống
 *                  /main.js
 *               /webfonts: fontawesome ...
 *       /configs: chứa cấu hình hệ thống như CSDL
 *               /Database.php: class chứa các hằng số
 *                              kết nối CSDL theo PDO
 *       /controllers: chứa class Controller của MVC
 *                   /Controller.php: controller cha
 *                   /ProductController.php: controller
 *                   quản lý product
 *      /models: chứa class model của MVC
 *                  /Model.php: model cha
 *                  /Product.php: model quản lý sp
 *      /views: chứa các view của MVC
 *            /layouts: chứa view bố cục của trang
 *                    /main.php: file layout chính của
 *                               của ứng dụng
 *            /products: chứa các view như CRUD
 *                     /index.php: view liệt kê sp
 *                     /create.php: view thêm mới sp
 *                     /update.php: view sửa sp
 *                     /detail.php: view chi tiết sp
 *      /index.php: index gốc của ứng dụng
 *      /.htaccess: rewrite URL -> url dạng thân thiện
 */