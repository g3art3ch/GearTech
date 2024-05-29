<?php 

    include('connection.php');

    if(isset($_POST['email']) || isset($_POST['senha'])) {

        if(strlen($_POST['email']) == 0) {
            echo "<script> window.alert('Preencha seu email!');</script>";
        } else if(strlen($_POST['senha']) == 0) {
            echo "<script> window.alert('Preencha sua senha!');</script>";
        } else {
    
            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);
    
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
    
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/main/main.css">
    <link rel="stylesheet" href="../css/main/header.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="shortcut icon" href="../icons/logo.ico" type="image/x-icon">
    <title>Faça seu login</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="area">
                <div class="logo">
                    <a href="/GearTech/index.php">
                        <img src="../images/logo.svg" alt="" />
                    </a>
                </div>
                <div class="menu-opener">
                    <div class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="close-icon">
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="catalog.php">Catálogo</a></li>
                    <li><a href="">Manutenções</a></li>
                    <li>
                        <div class="user-enter">
                            <a href="/GearTech/index.php">
                                <img src="/GearTech/assets/icons/user.svg" alt="">
                                <a href="/GearTech/index.php" class="red">Voltar à página inicial</a>
                            </a>
                        </div>
                        
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="login">
        <div class="container">
            <div class="box-login">
                <div class="card">
                   <h2><span>Seja bem vindo!</span><br>Acesse sua conta</h2>
                    <form action="" method="post">
                        <label for="">Email</label>
                        <input type="mail" name="email" placeholder="Digite seu email">
                        <label for="">Senha</label>
                        <input type="password" name="senha" id="password" placeholder="Digite sua senha">
                        <div class="forgot-password">
                            <img src="../icons/lock.svg" alt="">
                            <a href="">Esqueceu sua senha</a>
                        </div>
                        <button type="submit" class="account">Entrar</button>
                        <div class="create-an-account">
                            <p>Ainda não tem uma conta?<a href="register.php">Crie uma</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    

    <script src="../js/script.js"></script>
</body>
</html>