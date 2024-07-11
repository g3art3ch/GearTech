<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


// Carrega o Composer's autoloader
require __DIR__.'/../PHPMailer/PHPMailerAutoload.php';

// Instantiation and passing `true` enables exceptions 
$mail = new PHPMailer(true);

try {

    //Configurações de servidor

$mail->SMTPDebug = 0;                      
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'g3art3ch@gmail.com';
$mail->Password = 'hbho wlln srug gpha'; 
$mail->SMTPSecure = 'tls'; 
$mail->Port = 587;                                  

    $mail->setFrom( $email, $nomeUsuario);       //Enviador
    $mail->addAddress('g3art3ch@gmail.com');     //Destinatário

    //Conteúdo
    $mail->isHTML(true);                                  //Seta formato do email para HTML
    $mail->Subject = 
    $mail->Body    = 








    $mail->send();
} catch (Exception $e) {
    echo "Falha ao enviar o seu email! Error: {$mail->ErrorInfo}";
}

header("Location: login.php?message=Seu e-mail foi mandado com sucesso, em breve retornaremos.");