<?php
include('connection.php');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "<script> window.alert('Preencha seu email!');</script>";
    } else if (strlen($_POST['senha']) == 0) {
        echo "<script> window.alert('Preencha sua senha!');</script>";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;


        if ($quantidade != 1) {
            echo "<script type='text/javascript'>
        Swal.fire({
             position: 'top',
        icon: 'error',
        iconColor: '#C23A42',
        title: 'Falha no login',
        html: `<p style='font-size: 17px; margin='0px''>Seu email ou senha estão incorretos.</p>`,
            showConfirmButton: false,
        width: '27rem',
        showCloseButton: true,
        background: '#fafafa',
        color: '#000',
        customClass: {
            title: 'custom-title',
        }
        });
    </script>";
        } 
        else {
        $usuario = $sql_query->fetch_assoc();
        
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nomeUsuario'] = $usuario['nomeUsuario'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['senha'] = $usuario['senha'];
        $_SESSION['status'] = $usuario['status'];
        if ($_SESSION['status'] == 2) {
            header("Location: /GearTech/assets/pages_connected/connected.php");
        } else {
            echo 'Confirme seu email!';
        }
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
    <link rel="stylesheet" href="../css/main/footer.css">
    <link rel="shortcut icon" href="../icons/logo.ico" type="image/x-icon">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Faça seu login</title>
    <style>
        .swal2-popup {
            border-radius: 15px;
            
        }

        .custom-title {
            font-size: 24px;
            font-weight: 600;
        }

    </style>
</head>

<body>
    <main>
        <div class="container">
            <header>
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
                                    <a href="/GearTech/index.php" class="login-account">Voltar à página inicial</a>
                                </a>
                            </div>

                        </li>
                    </ul>
                </nav>
            </header>
        </div>

        <div style="display: flex; flex-direction:column; width:180px;gap: 10px;" >
            <button onclick="popup()">Verificação</button>
            <button onclick="errorLogin()">Falha ao logar</button>
            <button onclick="senhasNaoCoincidem()">Email Cadastrado</button>
            <button onclick="senhaAtualIncorreta()">Senha atual incorreta</button>
        </div>
      

        <div>
            <?php
            if (isset($_GET['message'])) {
                $message = $_GET['message'];
                echo "<script type='text/javascript'>alert('$message');</script>";
            } ?>
        </div>


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
    </main>
    <footer>
        <div class="container">
            <div class="box-footer">
                <div class="left-side-footer">
                    <div class="links">
                        <a href="">Termos de uso</a>
                        <a href="">Catálogo</a>
                        <a href="">Manutenções</a>
                    </div>
                    <div class="social-icons-footer">
                        <a href=""><img src="/GearTech/assets/icons/instagram-footer.svg" alt=""></a>
                        <a href=""><img src="/GearTech/assets/icons/email-footer.svg" alt=""></a>
                    </div>
                    <div class="mail-footer">
                        Email: suporte.geartech@gmail.com
                    </div>
                </div>
                <div class="right-side-footer">
                    <h2>Sobre nós</h2>
                    <p>Nós da GearTech compartilhamos nosso gosto por carros e somos dedicados a simplificar sua jornada de compra. Valorizamos a transparência e a confiabilidade, proporcionando a você a melhor escolha da sua vida.
                    </p>
                </div>
            </div>
            <div class="copy">
                <a href="">© GearTech - Todos os direitos reservados</a>
            </div>
        </div>
    </footer>

    <script src="../js/script.js"></script>

    <script type='text/javascript'>
        
    </script>

</body>

</html>