<?php 
require "./bibliotecas/phpmailer/Exception.php";
require "./bibliotecas/phpmailer/OAuth.php";
require "./bibliotecas/phpmailer/PHPMailer.php";
require "./bibliotecas/phpmailer/POP3.php";
require "./bibliotecas/phpmailer/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

print_r($_POST);
class Mensagem {
    private $para = null;
    private $assunto = null;
    private $mensagem = null;
    public function __get($atributo) {
        return $this->$atributo;
    }
    public function __set($atributo,$valor) {
        $this->$atributo = $valor;
    }
    public function mensagemValida() {
        //empty verifica se algo ta vazio e caso sim retorna true
   if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)  ) {
       return false;
   }
   else {
       return true;
   }
    }
}
$mensagem = new Mensagem();
$mensagem->__set('para',$_POST['para']);
$mensagem->__set('assunto',$_POST['assunto']);
$mensagem->__set('mensagem',$_POST['mensagem']);
//print_r($mensagem);
if(!$mensagem->mensagemValida()) {
    echo "<br/>";
    echo "mensagem invalida";
    die();
}
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'kevenescovedo1916@gmail.com';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('kevenescovedo1916@gmail.com', 'Keven Escovedo remetente');
    $mail->addAddress($mensagem->__get("para"), 'Keven');     // Add a recipient
   // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
  //  $mail->addBCC('bcc@example.com');

    // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $mensagem->__get("assunto");
    $mail->Body    = $mensagem->__get("mensagem");
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Email enviado com sucesso!!!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
