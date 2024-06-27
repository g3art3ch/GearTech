<?php

require('./PHPMailerAutoload');



$mail = new PHPMailer;
$mail ->isSMTP();
$mail ->charset = "UTF-8";


//Configurações do servidor de email

$mail ->Host = "smtp.gmail.com"; //Servidor SMTP do gmail
$mail ->Port = "587"; //Porta padrão para segurança TLS
$mail ->SMTPSecure = "tls"; //Método de segurança SMTP
$mail ->SMTPAuth = "true"; //Para login ser efetivado
$mail ->Username = "g3art3ch@gmail.com"; //email
$mail ->Password = "GFBPTlxQJ2chL2d"; //senha

//Configuração da mensagem

$mail ->setFrom($mail->Username, 'GearTech'); //Geartech remetente
$mail->addAdress($email); //Usuário destinatario
$mail->Subject = $nomeUsuario . ", ativação de cadastro"; //Assunto do email

$conteudo_email = "

<style>
font-family: Calibri;
</style>

<body>

Confirme esse e-mail para ativar seu cadastro em nosso site.<br>

Clique no Botão abaixo: <br><br>

<a href='http://localhost/GearTech/ativacao.php?hash' style = '

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


$mail->IsHTML(true);
$mail->Body = $conteudo_email;

if($mail->send()){

echo "<style>#carregando{display:none;}</style>
<div class='alert alert-primary' role='alert'>

O link de ativação de cadastro foi enviado para seu e-mail. Favor verificar sua caixa de entrada.

</div>";

} else{

    echo "<style>#carregando{display:none;}</style>
    <div class='alert alert-danger' role='alert'>
    
    Falha ao enviar o link de ativação!
    
    </div>";

}








