<?php
use PHPMailer\PHPMailer\PHPMailer;

// Данные
$name=$_POST['nameCall'];
$phone=$_POST['phoneCall'];
$accept=$_POST['personDataOrder'];
$mailSeller='my_test_localhost@mail.ru';

$messageMail='
<html>
    <head>
    <title>ЗАКАЗ УСЛУГИ</title>
    </head>
    <body>
    <table border="1" cellpadding="5" width="100%">
        <thead>
            <tr>
                <th style="text-align:center;">Заказ звонка сформирован</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align:center;">
                Телефон: '.$phone.',
                <br/>
                Согласие на обработку персональных данных дано.
                </td>
            </tr>
        </tbody>
    </table>
    </body>
</html>
';

// Настройки
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';
require_once 'PHPMailer/Exception.php';

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->Host = 'smtp.mail.ru'; 
$mail->SMTPAuth = true; 
$mail->Username = 'my_test_localhost@mail.ru';
$mail->Password = '5^bG6w3o';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';

// Письмо
$mail->CharSet = 'UTF-8';
$mail->isHTML(true);
$mail->setFrom($mailSeller);
$mail->addAddress($mailSeller);
$mail->Subject = 'ЗАКАЗ ЗВОНКА SEO_LP';
$mail->Body = $messageMail;

if ($mail->send()) {
    header("location: ../index.html");
} else {
    $messageError = '<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Error</title>
    </head>
    <body>
        <h3>Возникли технические проблемы</h3>
        <h4><a href="../index.html">Вернуться на страницу заполенения даннных</a></h4>
    </body>
    </html>';
    echo ($messageError);
}
?>