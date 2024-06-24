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
    <link rel="stylesheet" href="../css/main/footer.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="shortcut icon" href="../icons/logo.ico" type="image/x-icon">
    <title>Crie sua conta</title>
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
                    <li><a href="./catalog.php">Catálogo</a></li>
                    <li><a href="">Manutenções</a></li>
                    <li>
                        <div class="user-enter">
                            <a href="/GearTech/assets/pages/login.php">
                                <img src="/GearTech/assets/icons/user.svg" alt="">
                                <a href="/GearTech/assets/pages/login.php" class="login-account">Entre em sua conta</a>
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
    </div>


    <section class="register">
        <div class="container">
            <div class="box-login">
                <div class="card">
                    <h2><span>Seja bem vindo!</span><br>Ainda não tem uma conta?</h2>

                    <div class="error-register">
                        <?php
                        // Exibir mensagens de erro, se houver
                        if (isset($_GET['error'])) {

                            echo "<p style='color:red;'>" . $_GET['error'] . "</p>";
                        }
                        ?>

                    </div>

                    <form action="register_process.php" method="post">
                        <label for="">Nome completo</label>
                        <input type="text" name="nomeUsuario" placeholder="Digite seu nome completo">
                        <label for="">Email</label>
                        <input type="mail" name="email" placeholder="Digite seu email">
                        <label for="">Senha</label>
                        <input type="password" name="senha" id="password" placeholder="Digite sua senha">
                        <label for="">Confirme a senha</label>
                        <input type="password" name="senhaC" id="password" placeholder="Digite sua senha novamente">
                        <button type="submit" name="submit" class="account btn-register">Entrar</button>
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
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                </div>
            </div>
            <div class="copy">
                <a href="">© GearTech - Todos os direitos reservados</a>
            </div>
        </div>
    </footer>

    <script src="../js/script.js"></script>
</body>

</html>