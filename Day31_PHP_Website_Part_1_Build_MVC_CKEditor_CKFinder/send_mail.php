<?php
/**
 * send_mail.php
 * - Tạo file này ngang hàng với thư mục
 * PHPMailer
 * - Demo gửi mail với PHP
 * - Website ko thể thiếu chức năng gửi mail: xác nhận
 * đơn hàng, mail đăng ký ...
 * - PHP có 1 hàm gửi mail
 */
// + Gửi mail bằng hàm mail có sẵn của PHP, ko phải lúc
//nào cũng gửi đc mail với hàm này, vì cần phải cấu hình
//hệ thống thì mới gửi mail đc
//mail('nguyenvietmanhit@gmail.com', 'Tiêu đề mail',
//    'Nội dung mail');
// + Nên dùng thư viện từ bên ngoài để gửi mail -
// PHPMailer -> đọc doc của thư viện đó -> search
// PHPMailer PHP
?>





<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
// Comment lại vì chưa dùng composer
//require 'vendor/autoload.php';
// + Nhúng các file cần thiết theo đúng thứ tự sau, do
// chưa áp dụng cơ chế namespace của OOP
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
// + Cần có các thông tin cấu hình để có thể gửi mail
try {
  //Server settings
  // + Cấu hình gửi mail có dấu
  $mail->CharSet = 'UTF-8';
  // + Bật/tắt debug khi gửi mail
  $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
  $mail->isSMTP();
  // Send using SMTP, server của gmail
  $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
  $mail->SMTPAuth   = true;
  // Enable SMTP authentication
  // Username chính là tên đăng nhập gmail của bạn
  // SMTP username
  $mail->Username   = 'nguyenvietmanhit@gmail.com';
  // SMTP password, ko phải là mật khẩu gmail, là mật
  //khẩu ứng dụng của Gmail
  // -> https://myaccount.google.com/ -> Bảo mật -> Mật
  //khẩu ứng dụng
  $mail->Password   = 'vwqcennkiaqhpmjd';

  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
  $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

  //Recipients
  // + Email đc gửi từ ai
  $mail->setFrom('abc@gmail.com', 'NVMANH');
  // + THêm các email người nhận
  $mail->addAddress('nguyenvietmanhit@gmail.com');     // Add a recipient
//  $mail->addAddress('ellen@example.com');               // Name is optional
//  $mail->addReplyTo('info@example.com', 'Information');
//  $mail->addCC('cc@example.com');
//  $mail->addBCC('bcc@example.com');

  // Attachments
  // + Comment 2 dòng sau do là demo
//  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

  // Content
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = 'Tiêu đề mail của tôi';
  $mail->Body    = '<h1>Thẻ h1</h1> <b>in bold!</b>';
//  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  echo 'Message has been sent';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

