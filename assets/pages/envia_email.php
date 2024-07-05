<?php

// require __DIR__.'/../PHPMailer/PHPMailerAutoload.php';
        


// $mail = new PHPMailer;
// $mail ->isSMTP();
// $mail ->charset = "UTF-8";


// //Configurações do servidor de email

// $mail ->Host = "smtp.gmail.com"; //Servidor SMTP do gmail
// $mail ->Port = "587"; //Porta padrão para segurança TLS
// $mail ->SMTPSecure = "tls"; //Método de segurança SMTP
// $mail ->SMTPAuth = "true"; //Para login ser efetivado
// $mail ->Username = "g3art3ch@gmail.com"; //email
// $mail ->Password = "GFBPTlxQJ2chL2d"; //senha

// //Configuração da mensagem

// $mail ->setFrom($mail->Username, 'GearTech'); //Geartech remetente
// $mail->addAdress($email); //Usuário destinatario
// $mail->Subject = $nomeUsuario . ", ativação de cadastro"; //Assunto do email

// $conteudo_email = "

// <style>
// font-family: Calibri;
// </style>

// <body>

// Confirme esse e-mail para ativar seu cadastro em nosso site.<br>

// Clique no Botão abaixo: <br><br>

// <a href='http://localhost/GearTech/ativacao.php?hash' style = '

// background-color: #007bff;
// border: none;
// color: white;
// padding: 10px 30px;
// text-align: center;
// text-decoration: none;
// display: inline-block;
// font-size: 16px;


// '>Confirmar E-mail</a>

// </body>

// ";


// $mail->IsHTML(true);
// $mail->Body = $conteudo_email;

// if($mail->send()){

// echo "<style>#carregando{display:none;}</style>
// <div class='alert alert-primary' role='alert'>

// O link de ativação de cadastro foi enviado para seu e-mail. Favor verificar sua caixa de entrada.

// </div>";

// } else{

//     echo "<style>#carregando{display:none;}</style>
//     <div class='alert alert-danger' role='alert'>
    
//     Falha ao enviar o link de ativação!
    
//     </div>";

// }

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


// Load Composer's autoloader
require __DIR__.'/../PHPMailer/PHPMailerAutoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'g3art3ch@gmail.com';                     // SMTP username
    $mail->Password   = 'GFBPTlxQJ2chL2d';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = '587';                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('g3art3ch@gmail.com', 'GearTech');
    $mail->addAddress($email);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}






