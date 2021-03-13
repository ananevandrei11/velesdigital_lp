<?php
use PHPMailer\PHPMailer\PHPMailer;

// Данные
$name=$_POST['nameLetter'];
$mailCustom=$_POST['emailLetter'];
$phone=$_POST['phoneLetter'];
$site=$_POST['siteLetter'];
$messageFromCustom=$_POST['textLetter'];
$accept=$_POST['personDataLetter'];
$mailSeller='mail@mail.ru';

$messageMail='
<html>
    <head>
    <title>ЗАКАЗ УСЛУГИ</title>
    </head>
    <body>
    <table border="1" cellpadding="5" width="100%">
        <thead>
            <tr>
                <th style="text-align:center;">Заказ для <h4>'.$name.'</h4> сформирован</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align:center;">
                Телефон: '.$phone.',
                <br/>
                Электронная почта '.$mailCustom.',
                <br/>
                Сайт '.$site.',
                <br/>
                Согласие на обработку персональных данных дано.
                </td>
            </tr>
            <tr>
                <td style="text-align:center;">
                Сообщение:
                <br/>
                '.$messageFromCustom.'
                </td>
            </tr>
            <tr>
                <td style="text-align:center;">В ближайшее время наш специалист свяжется с вами по телефону или по электронной почте</td>
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
$mail->Username = 'mail@mail.ru';
$mail->Password = 'PASSWORD';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';

// Письмо
$mail->CharSet = 'UTF-8';
$mail->isHTML(true);
$mail->setFrom($mailSeller);
$mail->addAddress($mailCustom);
$mail->addAddress($mailSeller);
$mail->Subject = 'ЗАКАЗ УСЛУГ SEO_LP';
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
        <h3>Email не существует</h3>
        <h4><a href="../index.html">Вернуться на страницу заполенения даннных</a></h4>
    </body>
    </html>';
    echo ($messageError);
}
?>
