<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->IsHTML(true);

$mail->setFrom('robert.papyan@gmail.com');
$mail->addAddress('robert.papyan2003@yandex.ru');
$mail->Subject = 'Contact form';

$body = '<h1>Contact form</h1>';

if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Լրատվամիջոցի անվանումը</strong> '.$_POST['name'].'</p>';
}

 $body.='<p><strong>Լրատվամիջոցի տեսակը</strong> '.$_POST['tv']. .$_POST['radio']. .$_POST['newspaper']. .$_POST['web'].'</p>';

if(trim(!empty($_POST['address']))){
    $body.='<p><strong>Հասցե</strong> '.$_POST['address'].'</p>';
}
if(trim(!empty($_POST['phone']))){
    $body.='<p><strong>Հեռախոսահամար</strong> '.$_POST['phone'].'</p>';
}
if(trim(!empty($_POST['email']))){
    $body.='<p><strong>Էլ-փոստ</strong> '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['webPage']))){
    $body.='<p><strong>Վեբ կայք</strong> '.$_POST['webPage'].'</p>';
}
if(trim(!empty($_POST['B1']))){
    $body.='<p><strong>Արդյոք լրատվամիջոցը ունի 
    ինքնակարգավորման մեխանիզմ և/կամ անդամակցում է 
    Դիտորդ մարմնին</strong> '.$_POST['B1'].'</p>';
}
if(trim(!empty($_POST['B2']))){
    $body.='<p><strong>Լրատվամիջոցի նույնականացման 
    տվյալները հայտնի են և հրապարակային</strong> '.$_POST['B2'].'</p>';
}
if(trim(!empty($_POST['B3']))){
    $body.='<p><strong>Խմբագրակազմը հայտնի է և հրապարակային</strong> '.$_POST['B3'].'</p>';
}
if(trim(!empty($_POST['B4']))){
    $body.='<p><strong>Նյութերի հեղինակների անունները հրապարակվում են</strong> '.$_POST['B4'].'</p>';
}
$mail->Body = $body;

if(!$mail->send()){
    $message = 'Error';
}else{
    $message = 'Done';
}

$response = ['message' => $message];
header('Content-type:application/json');
echo json_encode($response);
?>