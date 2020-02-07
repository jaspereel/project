<?php
require_once("sql.php");
$today = date("Y-m-d");
$contact = array(
    "customer_date" => $today,
    "customer_name" => $_POST['customer_name'],
    "customer_email" => $_POST['customer_email'],
    "customer_phone" => $_POST['customer_phone'],
    "customer_require" => $_POST['customer_require'],
    "reply_flag" => "0"
);

//新增
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//設定檔案路徑
require 'plugins/PHPMailer-master/src/Exception.php';
require 'plugins/PHPMailer-master/src/PHPMailer.php';
require 'plugins/PHPMailer-master/src/SMTP.php';

//建立物件                                                                
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Enable verbose debug output
    $mail->SMTPDebug = 0; // DEBUG訊息
    $mail->isSMTP(); // 使用SMTP
    $mail->Host = 'smtp.gmail.com'; // SMTP server 位址
    $mail->SMTPAuth = true;  // 開啟SMTP驗證
    $mail->Username = 'jasper.secom@gmail.com'; // SMTP 帳號
    $mail->Password = 'ZXCVzxcv0101'; // SMTP 密碼
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->SMTPSecure = "ssl"; // Gmail要透過SSL連線
    $mail->Port       = 465; // SMTP TCP port 
    $mail->CharSet = "utf-8";

    //設定收件人資料
    $mail->setFrom($_POST['customer_email'], 'J\'s Hotel 台北傑斯旅店'); // 寄件人(透過Gmail發送會顯示Gmail帳號為寄件者)
    $mail->addAddress($_POST['customer_email'], $_POST['customer_name']); // 收件人會顯示 Apple User<apple@example.com>(*註2)
    // $mail->addAddress('banana@example.com'); // 名字非必填
    // $mail->addReplyTo('info@example.com', 'Information'); //回信的收件人
    // $mail->addCC('cc@example.com'); //副本
    // $mail->addBCC('bcc@example.com'); //密件副本

    // 附件
    // $mail->addAttachment('/var/tmp/file.tar.gz'); // 附件 (*註3) 
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // 插入附件可更改檔名

    // 信件內容
    $mail->isHTML(true); // 設定為HTML格式
    $mail->Subject = '我們已經收到您的來信-J\'s Hotel 台北傑斯旅店'; // 信件標題
    $mail->Body    = '<img src="http://220.128.133.15/s1080406/project/images/icon/logo_customer_service.png" alt="logo_customer_service" />
    <p>親愛的' . $_POST['customer_name'] . '先生/小姐:</p>
    <p>我們已收到您的需求如下:</p>
    <p>' . $_POST['customer_require'] . '</p>
    <p>我們將會盡快的回覆您的訊息，謝謝!</p>
    <p>J\'s Hotel 台北傑斯旅店</p>';
    // 信件內容

    $mail->AltBody = ''; // 對方若不支援HTML的信件內容

    $mail->send();
    insert($contact, "contact");
    header("location:contact.php");
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
