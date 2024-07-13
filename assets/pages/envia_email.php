<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


// Carrega o Composer's autoloader
require __DIR__.'/../PHPMailer/PHPMailerAutoload.php';

// Instantiation and passing `true` enables exceptions 
$mail = new PHPMailer(true);
$mail ->CharSet="UTF-8";
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

    $mail->setFrom('g3art3ch@gmail.com', 'GearTech'); //Enviador
    $mail->addAddress($email);     //Destinatário

    //Conteúdo
    $mail->isHTML(true);                                  //Seta formato do email para HTML
    $mail->Subject = 'Confirme seu e-mail';
    $mail->Body    = $conteudo_email = "

    <style>
    font-family: Calibri;
    </style>
    
    <body>
    
    Confirme esse e-mail para ativar seu cadastro em nosso site.<br>
    
    Clique no Botão abaixo: <br><br>
    
    <a href='http://localhost:8080/GearTech/assets/pages/ativacao.php?hash=$hash' style = '
    
    background-color: #007bff;
    border: none;
    color: white;
    padding: 10px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    
    
    '>Confirmar E-mail</a>
    
    </body>
    
    ";
    $mail->send();
} catch (Exception $e) {
    echo "Falha ao enviar o link de ativação! Error: {$mail->ErrorInfo}";
}

header("Location: login.php?message=O link de ativação de cadastro foi enviado para seu e-mail. Favor verificar sua caixa de entrada.");





