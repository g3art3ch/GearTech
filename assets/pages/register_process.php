<?php 

    include('connection.php');

    if (isset($_POST["submit"])) {

        $nomeUsuario = $_POST['nomeUsuario'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senhaC = $_POST['senhaC'];
        
        if($nomeUsuario == null) {
            header("Location:  /GearTech/assets/pages/register.php?error=Insira seu nome.");
            exit();
        }else if($email == null) {
            header("Location:  /GearTech/assets/pages/register.php?error=Insira seu email.");
            exit();
        } else if($senha  == null) {
            header("Location:  /GearTech/assets/pages/register.php?error=Insira sua senha.");
            exit();
        }else if ($senha !== $senhaC) {
            header("Location:  /GearTech/assets/pages/register.php?error=As senhas não coincidem.");
            exit();
        }
    
        if ($nomeUsuario != null) {
            $result = "INSERT INTO usuarios(nomeUsuario, email, senha) VALUES ('$nomeUsuario', '$email', '$senha')";
    
            if ($mysqli->query($result) === TRUE) {
                echo "Usuário cadastrado com sucesso.";
            } else {
                echo "Erro ao cadastrar usuário: " . $mysqli->error;
            }
    
        } 
    }
    
    
    header("Location: login.php");

