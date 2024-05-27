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

        //Verificar existencia de usuario
   
            $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
    
            $quantidade = $sql_query->num_rows;
    
            if($quantidade == 1) {
                
                $usuario = $sql_query->fetch_assoc();
    
                if(!isset($_SESSION)) {
                    session_start();
                }   
    
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nomeUsuario'] = $usuario['nomeUsuario'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['senha'] = $usuario['senha'];
    
                header("Location: /GearTech/assets/pages_connected/connected.php");
    
            } else {
                echo "Falha ao logar! E-mail ou senha incorretos";
            }
    
        


    }
    
    
    header("Location: login.php");

