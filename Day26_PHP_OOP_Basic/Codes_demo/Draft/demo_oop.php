<?php
/**
 * demo_oop.php
 * Lập trình hướng đối tượng - Object Oriented Programming
 * 1 - Các phương pháp lập trình truyền thống
 * + Lập trình tuyến tính: nghĩ gì viết nấy
 */
// Tính tổng 2 số và hiển thị kết quả
$number1 = 5;
$number2 = 6;
$sum = $number1 + $number2;
echo $sum;
// 2 - Lập trình có cấu trúc: biết cách viết hàm
function sum($number1, $number2) {
  return $number1 + $number2;
}
// Gọi hàm ..
// 3 - Lập trình hướng đối tượng
// + Gần gũi với thực tế , lấy đối tượng làm trung tâm để phân
//tích
// + Học PHP bắt buộc phải biết về OOP
// + PHP có mô hình MVC, dựa trên mô hình này để tạo ra website
// MVC đc viết dựa trên OOP
// + OOP khá khó vì nhiều thuật ngữ
// 4 - Các thuật ngữ cơ bản của lập trình hướng đối tượng
// + Class: khuôn mẫu của các đối tượng. VD: bản thiết kế 1 ngôi
//nhà chính là 1 Class, và các ngôi nhà đc xây từ bản vẽ này
//chính là các Object - đối tượng của class đó
// Tên class viết hoa các ký tự đầu tiên cuả mỗi tự
class HomeClass {

}

class Person {

}

// + Object: đối tượng, thực tế đối tượng có trạng thái và hành
//vi, còn về mặt lập trình thuộc tính và phương thức
// Đối tượng đc khởi tạo từ 1 class
class Book1 {
  // Khai báo 2 thuộc tính của class
  public $name;
  public $price;
  //Khai báo 1 phương thức thêm sách
  public function addBook() {
    echo "addBook";
  }
}
// Khởi tạo các đối tượng từ class Book1, dùng từ khóa new
$book1 = new Book1();
// Sau khi tạo dối tượng, có thể truy cập đc thuộc tính/phương
//thức của class đó, sử dụng cú pháp: ->
$book1->name = 'Sách văn học';
$book1->price = 100;
$book1->addBook();

// Tạo thêm 1 đối tượng từ class trên
$book2 = new Book1();
$book2->name = 'Book 2';
$book2->price = 200;
$book2->addBook();

// + Thuộc tính của lớp: về bản chất chính là các biến, nhưng
//đc gắn thêm phạm vi truy cập phía trước khai báo:
class Student {
  // Khai báo các thuộc tính
  public $name;
  public $age;
  public $id;
  public $birthday;
}

// + Phương thức của lớp: chính là các hàm của PHP, đc gắn
//thêm phạm vi truy cập phía trước khai báo
class Product {
  public function addProduct(){
    echo "addProduct";
  }
  public function editProduct($id) {
    echo "editProduct $id";
  }
  public function deleteProduct($id) {
    echo "deleteProduct $id";
  }
  public function listProduct() {
    echo "listProduct";
  }
}
$product = new Product();
$product->addProduct();
$product->editProduct(5);
$product->deleteProduct(8);
$product->listProduct();

// + Phương thức khởi tạo:
// Dc dùng để khởi tạo giá trị mặc đinh
//cho chính thuộc tính của class đó
// Phương thức này đc gọi ngầm đầu tiên khi 1 đối tượng đc
// khởi tạo từ class của nó
class TestConstructor {
  public $name;
  //Cú pháp khai báo cố định của phương thức khởi tạo
  public function __construct($name_param) {
    echo "construct";
    $this->name = $name_param;
  }
  public function test() {
    echo "test";
  }
}
// Do phương thức khởi tao có tham số nên lúc khởi tạo đối
//tượng cũng phải truyền giá trị vào
$test = new TestConstructor('Mạnh 123');
$test->test(); //test
echo $test->name; // Mạnh 123

// + Từ khóa this: chính là đối tượng hiện tại
class TestThis {
  public $name;
  public $age;
  public function show() {
    echo $this->name;
  }
}
// Việc dùng $this bên trong class giống hệt như dùng đối tương
//của class đó
$obj = new TestThis();
$obj->name = '123';
$obj->show(); //123

// + Phạm vi truy cập: private, protected, public
// Private: chỉ nội bộ class truy cập đc, các class kế thừa
//hoặc ngay cả đối tượng sinh ra từ class đó cũng ko truy cập đc
class TestPrivate {
  private $name;
  public $age;
  private function hide() {
    echo "Hide";
    //Bên trong class truy cập private bình thường
    $this->name = 'bac';
  }
  public function show() {
    echo "Show";
  }
}
$obj = new TestPrivate();
//Không thể truy cập đc private từ bên ngoài
//$obj->name = '123';
//$obj->hide();
// Protected: ngoài nội bộ class, class con kế thừa từ class cha
// cũng có thể truy cập, đối tượng khởi tạo class đó vẫn ko
//truy cập dc
class TestProtected {
  protected $address;

  protected function add() {
    $this->address = 'àdsfsdfsd';
  }
}
// Tính kế thừa: extends, 1 class kế thừa từ class cha có thể
//truy cập đc tất cả phương thức/thuộc tính của class cha
//mà có phạm vi truy cập là protected/public
class Children extends TestProtected {
  public function testChildren() {
    $this->address = 'abc';
    $this->add();
  }
}
$children = new Children();
$children->testChildren();
// PHP chỉ hỗ trợ đơn kế thừa, 1 class chỉ kế thừa đc 1 class
//khác tại 1 thời điểm
// - Public: có thể truy cập đc bất cứ nơi đâu
// Để đơn giản, demo luôn dùng public

// + Từ khóa static: truy cập thuộc tính/phương thức static mà
// ko cần khởi tạo đối tượng, ->, ::
class TestStatic {
  // KHai báo hằng trong 1 class
  const PI = 3.14;
  public static $title;

  public static function showTitle() {
    echo "showTitle";
//    TestStatic::$title = 'abc';
    //nội bộ class ->self thay cho tên class
    self::$title = 'abc';
  }
}
//Cú pháp truy cập static: <tên-class>::<tên TT/PT>
TestStatic::$title = 'New tittle';
TestStatic::showTitle(); //showTitle
// cú pháp truy cập hằng trong class giống hệt static
echo TestStatic::PI; //3.14
// + Từ khóa extends: dùng cho kế thừa
// + Từ khóa abstract: tính trừu tượng trong OOP, dùng cho mục
//đích kế thừa
abstract class PersonAbs {
  public $name;
  public function show() {
    echo "show";
  }
  //Class Abstract đặc trưng bởi các phương thức abstract,
  //là phương thức ko có nội dung gì cả
  abstract public function testAbs();
}
//Tạo class con kế thừa từ class abstract trên
class A extends PersonAbs {

  //Bắt buộc phải override các phương thức trừu tượng
  public function testAbs() {
    echo "testabs1";
  }
}
// + Từ khóa implement: triển khai các interface
interface Config {
  //Interface ko thể khai báo đc thuộc tính
//  public $name;
// Phương thức trong interface bắt buộc là public, ko phương
//thức nào đc có nội dung
  public function sendMail();
  public function getMail();
//  public function check() {
//    echo "abc";
//  };
}
interface Mail {
  public function configMail();
}
//1 class có thể triển khai nhiều interface
class B implements Config, Mail {

  public function test()
  {
    // TODO: Implement test() method.
  }

  public function configMail()
  {
    // TODO: Implement configMail() method.
  }

  public function sendMail()
  {
    // TODO: Implement sendMail() method.
  }

  public function getMail()
  {
    // TODO: Implement getMail() method.
  }
}

