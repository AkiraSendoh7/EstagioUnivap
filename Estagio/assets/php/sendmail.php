<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'C:/xampp/htdocs/Estagio/phpmailer/Exception.php';
require_once 'C:/xampp/htdocs/Estagio/phpmailer/PHPMailer.php';
require_once 'C:/xampp/htdocs/Estagio/phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if (isset($_POST['submit'])) {
  $titulo = $_POST['subject'];
  $email = $_POST['email'];
  $telefone = $_POST['phone'];
  $message = $_POST['message'];

  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'muriloaulasfelises@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = '123456789zorosola'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('muriloaulasfelises@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('muriloaulasfelises@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Mensagem recebida!';
    $mail->Body = "<h3>Título : $titulo <br> Telefone: $telefone <br>Email: $email <br>Message : $message</h3>";

    $mail->send();
    // $alert = '<div class="alert hide"> <i class="bi bi-bookmark-check-fill"></i>
    //     <span class="msg">Mensagem enviada! Obrigado por nos contatar.</span>
    //     <div class="close-btn">
    //        <span class="fas fa-times"></span>
    //     </div></div>';
    $alert = '<div class="alert alert-sucess alert-dismissible fade show">
                <span>Message Sent! Thank you for contacting us.</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
    // $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //               <span aria-hidden="true">&times;</span>
    //             </button>
    //             <strong></strong> 
    //           </div>';
  } catch (Exception $e) {
    // $alert = '<div class="alert hide"> <i class="bi bi-bookmark-check-fill"></i>
    // <span class="msg">Erro no envio!' . $e->getMessage() . '</span>
    // <div class="close-btn">
    //    <span class="fas fa-times"></span>
    // </div></div>';
    $alert = '<div class="alert-error">
                <span>Something went wrong! Please try again.</span>
              </div>';
  }
}
