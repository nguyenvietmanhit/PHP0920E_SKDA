<?php
/**
 * demo_oop.php
 * LẬP TRÌNH HƯỚNG ĐỐI TƯỢNG
 * - OOP - Object Oriented Programming, thay đổi cách
 * tiếp cận -> đối tượng, thay vì chức năng như lập trình
 * có cấu trúc
 * - Khó học vì nhiều thuật ngữ + cách tiếp cận
 */
// - Class - Lớp: khuôn
// + VD: 1 bản vẽ kỹ thuật ngôi nhà -> 1 class, ko phải là
// 1 ngôi nhà (object) thật -> các ngôi nhà đc xây từ
// bản vẽ này -> các object của class đó
// + Class - Object luôn đi kèm nhau
// + Tên class viết hoa các ký tự đầu tiên của từng từ:
// House, CategoryBook
// + Class đặc trưng bởi thuộc tính/đặc điểm và
// phương thức/hành vi
class House {
  // + Khai báo thuộc tính cho class
  // Về bản chất, thuộc tính trong 1 class giống biến
  //trong PHP thuần
  public $name; //thuộc tính tên của bản vẽ kỹ thuật
  public $created_at;
  // + Phương thức, về bản chất chính là 1 hàm của
  //PHP thuần
  public function getName() {
    echo "Phương thức getName";
  }
}
// - Object - Đối tượng, đc tạo ra từ class, đối tượng
//sẽ có tất cả thuộc tính/phương thức của class theo 2
//pham vi truy cập là public và protected
// + Class - Object luôn đi kèm với nhau
// + class House -> object House A, House B
$obj_a = new House();
// Truy cập thuộc tính, giống gán biến
$obj_a->name = 'Ngôi nhà A';
$obj_a->created_at = '3/4/5678';
// Truy cập phương thức, giống gọi hàm
$obj_a->getName();
echo "<pre>";
print_r($obj_a);
echo "</pre>";
// + Tạo bao nhiêu đối tượng từ class cũng đc
$obj_b = new House();
$obj_b->name = 'Ngôi nhà B';
$obj_b->created_at = '12/12/1212';
// - Thuộc tính của class: đặc điểm của class, có phạm vi
//truy cập: private, protected, public
// Class sinh viên: id, name, class_name, age, address
class Student {
  public $id;
  public $name;
  public $class_name;
  public $age;
  public $address;
}
// Tạo đối tượng từ class trên
$student_a = new Student();
$student_a->id = 'SVA';
$student_a->name = 'Nguyễn Văn A';
$student_a->class_name = 'PHP0920E';
$student_a->age = 20;
$student_a->address = 'HN';
echo "Tên sinh viên A = " . $student_a->name;
// - Phương thức của class: là các hàm của PHP thuần khai
//báo bên trong class, gắn thêm phạm vi truy cập: private
//, protected, public
// Class quản lý sách: id,name, - create, edit, delete
class Book {
  public $id;
  public $name;

  public function createBook() {
    echo "Thêm sách";
  }

  public function editBook($id) {
    echo "Sửa sách: $id";
  }
}
$book_a = new Book();
$book_a->name = 'Sách văn';
$book_a->createBook();
$book_a->editBook(12345);

// - Từ khóa this: tham chiếu đến chính đối tượng hiện tại,
//truy cập thuộc tính/phương thức trong chính nó
class TestThis {
  public $id;
  public $name;
  public function getName() {
    // $this tương đương với chính class TestThis
    echo $this->name;
  }
}
$test_this = new TestThis();
$test_this->name = 'Name 1';
$test_this->getName(); // Name 1
// - Phạm vi truy cập: private, protected, public áp dụng
// cho cả thuộc tính và phương thức
// + Private: chỉ nội bộ class mới truy cập
class TestPrivate {
  public $id;
  private $name;
  public function getId() {
    echo "getId";
    // Nội bộ class truy cập private bình thường
    echo $this->name;
  }
  private function getName() {
    echo "getName";
  }
}
$test1 = new TestPrivate();
$test1->id = 'id1';
// Báo lỗi: ko thể truy cập thuộc tính private
//$test1->name = 'name1';
// + Protected: truy cập đc từ nội bộ class và class con
//kế thừa từ nó, đối tượng sinh ra từ class vẫn ko truy
//cập đc
class Person {
  protected $name;
  public function getName() {
    // Nội bộ class truy cập bình thường
    echo $this->name;
  }
}
$person_a = new Person();
// Đối tượng ko thể truy cập protected
//$person_a->name = "Name a";
// + Tính kế thừa thể hiện bởi từ khóa extends, class
//kế thừa từ class khác dùng đc thuộc tính/phương thức của
//class cha có phạm vi truy cập: protected/public
class Engineer extends Person {
  public function showName() {
    // class con truy cập đc protected/public của class
    //cha
    echo $this->name;
  }
}
$engineer = new Engineer();
$engineer->showName();
// + Public: thoải mái nhất, ở đâu cũng truy cập đc
// - Từ khóa static: tĩnh, khai báo trước tên thuộc tính/
//phương thức, sau phạm vi truy cập
// Không khởi tạo tạo đối tượng khi truy cập thuộc tính/
//phương thức static, truy cập thẳng qua tên class
class TestStatic {
  public static $name;

  public static function show() {
    echo "Show";
    // Truy cập tt/pt static bên trong class,
    // ko dùng đc $this, mà dùng self::tt/pt ,
    // tên-class::tt/pt
    self::$name = 'abc';
    TestStatic::$name = 'abc';
  }
}
// Truy cập static bên ngoài class: tên-class::tên_tt/pt
TestStatic::$name = 'Name static 1';
echo TestStatic::$name; // Name static 1
TestStatic::show(); // Show
// - Từ khóa extends
// + Tính kế thừa trong OOP: class con kế thừa/dùng lại
// tt/pt của class cha có access = protected/public
// + PHP hỗ trợ đơn kế thừa
class TestParent {
  public $name;
  public function show() {
    echo "Show";
  }
}
class TestChildren extends TestParent {
  public $age;
}
$children = new TestChildren();
$children->name = 'Name child';
$children->show();
// - Phương thức khởi tạo:
// Phương thức chạy đầu tiên khi khởi tạo đối tượng, ko
//cần gọi, thường dung để khởi tạo giá mặc định cho chính
//thuộc tính của class
class TestConstructor {
  //Phương thức khởi tạo bắt buộc phải theo cú pháp sau
  public function __construct() {
    echo "Code chạy đầu tiên";
  }
  public function show() {
    echo "show";
  }
}
$obj = new TestConstructor();
$obj->show();//show
// - Abstract - Interface


