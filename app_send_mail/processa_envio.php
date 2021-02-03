<?php 
require "./bibliotecas/phpmailer/Exception.php";
require "./bibliotecas/phpmailer/OAuth.php";
require "./bibliotecas/phpmailer/PHPMailer.php";
require "./bibliotecas/phpmailer/POP3.php";
require "./bibliotecas/phpmailer/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


class Mensagem {
    private $para = null;
    private $assunto = null;
    private $mensagem = null;
    public $status = ['codigo_status'=> null, 'descricao_status' => ''];
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
   
    header("Location: index.php");
}
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false;                      // Enable verbose debug output
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
   // echo 'Email enviado com sucesso!!!';
    $mensagem->status['codigo_status'] = 1;
    $mensagem->status['descricao_status'] = 'Email enviado com sucesso!!!' ;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    $mensagem->status['codigo_status'] = '2';
    $mensagem->status['descricao_status'] = "Não foi possivel enviar esta mensagem por favor tente novamente: {$mail->ErrorInfo}";

}
?>
<html>
	<head>
		<meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>

	<body>
    <div class="container">  

<div class="py-3 text-center">
    <img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
    <h2>Send Mail</h2>
    <p class="lead">Seu app de envio de e-mails particular!</p>
</div>
 <div class='row'>
 <div class="col-md-12">
 <?php if($mensagem->status["codigo_status"] == 1) { ?>
  <div class="container">
  <h1 class="display-4 text-success">Sucesso!!!</h1>
  <p><?php echo $mensagem->status["descricao_status"] ?></p>
  <a href="index.php" class="btn btn-success btn-lg mt-5 text-write">Voltar</a>
  </div>
<?php } ?>
<?php if($mensagem->status["codigo_status"] == 2) { ?>
    <h1 class="display-4 text-danger">OPPS!!!</h1>
    <p><?php echo $mensagem->status["descricao_status"] ?></p>
    <a href="index.php" class="btn btn-danger btn-lg mt-5 text-write">Voltar</a>
    <? } ?>
 
 </div>

 </div>
</div>
	
	</body>
	
</html>
