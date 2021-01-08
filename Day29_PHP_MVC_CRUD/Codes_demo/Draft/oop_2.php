<?php
/**
 * oop_2.php
 *
 */
// - Từ khóa abstract
// + Thể hiện cho tính trừu tượng của OOP
// + Dùng cho khai báo class
// + Ko thể khởi tạo đối tượng từ 1 class abstract
// + Class abstract giống 1 class bình thường, có phương
//thức abstract -> ko có nội dung
// + Chỉ dùng cho mục đích kế thừa
abstract class TestAbstract {
  public $name;
  public $age;
  public function showAll() {
    echo "Show all";
  }
  abstract public function test();
}
class A extends TestAbstract {
  // Bắt buộc phải khai báo lại phương thức trừu tượng
  //của class cha, viết code cho nó
  public function test() {
    echo "test class A";
  }
}
class B extends TestAbstract {
  public function test() {
    echo "test class B";
  }
}
// - Từ khóa implements
// + Thực thi các interface - giống như 1 bộ khung
// + Interface: ko thể khai báo thuộc tính, phương thức
// đều phải public, ko có nội dung
// + Class implement từ interface bắt buộc phải viết lại
//các phương thức đã khai báo trong interface
// + 1 class có thể implements nhiều interface
interface ConfigTest {
//  public $name;
  public function configMail();
  public function sendMail();
}
class Gmail implements ConfigTest {
  public function configMail() {
    echo "Gmail configMail";
  }
  public function sendMail() {
    echo "Gmail sendMail";
  }
}
class Yahoo implements ConfigTest {
  public function configMail() {
    echo "Yahoo configMail";
  }
  public function sendMail() {
    echo "Yahoo sendMail";
  }
}

// - 4 tính chất của OOP (tuyển dụng rất hay hỏi)
// + Tính trừu tượng: từ khóa abstract, trừu tượng hóa
//từ các đối tượng giống nhau
//vd: có các đối tượng như Xe Toyota, Mazda, Vinfast ->
//trừu tượng hóa -> abstract class XeHoi
// + Tính đóng gói: thể hiện qua phạm vi truy cập:
//private, protected, public -> che giấu thông tin của
// 1 class đối với bên ngoài
// + Tính kế thừa: từ khóa extends, cho phép tạo class mới
//dựa trên class đã có
// + Tính đa hình: từ khóa implements -> từ 1 bộ khung
//chung (interface), class con có thể triển khai theo
//mục đích riêng của nó