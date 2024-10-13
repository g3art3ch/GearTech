<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            <h1>Geartech</h1>
                        </a>

                    </div>
                    <!-- <div class="menu-opener">
                        <div class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="close-icon">
                            <span></span>
                            <span></span>
                        </div>
                    </div> -->
                </div>
                <!-- <nav>
                    <ul>
                        <li><a href="./catalog.php">Catálogo</a></li>
                        <li><a href="">Manutenções</a></li>
                        <li>
                            <div class="user-enter">
                                <a href="/GearTech/assets/pages/login.php">
                                    <img src="/GearTech/assets/icons/user.svg" alt="">
                                    <a href="/GearTech/assets/pages/login.php" class="login-account">Entre em sua
                                        conta</a>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav> -->
            </header>
        </div>
        <?php

        if (isset($_GET['error'])) {

            if ($_GET['error'] == 'RegisteredEmail'){
                echo '<script type="text/javascript">
         
                Swal.fire({
                    position: "top",
                    icon: "error",
                    iconColor: "#C23A42",
                    title: "Falha no login",
                    html: `<p style="font-size: 17px; margin="0px"">E-mail já cadastrado</p>`,
                        showConfirmButton: false,
                    width: "27rem",
                    showCloseButton: true,
                    background: "#fafafa",
                    color: "#000",
                    customClass: {
                        title: "custom-title",
                    }
                });
            
                </script>';
            }else

            echo '<script type="text/javascript">
         
    Swal.fire({
        position: "top",
        icon: "error",
        iconColor: "#C23A42",
        title: "Falha no login",
        html: `<p style="font-size: 17px; margin="0px"">Preencha todas as informações</p>`,
            showConfirmButton: false,
        width: "27rem",
        showCloseButton: true,
        background: "#fafafa",
        color: "#000",
        customClass: {
            title: "custom-title",
        }
    });

    </script>';
        }

        ?>


        <section class="register">
            <div class="container">
                <div class="box-login">
                    <div class="card">
                        <h2><span>Seja bem vindo!</span><br>Ainda não tem uma conta?</h2>


                        <form action="register_process.php" method="post">
                            <label for="nome">Nome completo</label>
                            <input type="text" name="nomeUsuario" id="nome" placeholder="Digite seu nome completo">

                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Digite seu email">

                            <label for="password">Senha</label>
                            <input type="password" name="senha" id="password" placeholder="Digite sua senha"
                                onkeyup="validatePassword()">

                            <label for="passwordConfirm">Confirme a senha</label>
                            <input type="password" name="senhaC" id="passwordConfirm"
                                placeholder="Digite sua senha novamente" onkeyup="validatePassword()">

                            <button type="submit" name="submit" class="account btn-register">Cadastrar</button>
                        </form>






                    </div>
                    <div class="card-error">
                        <div class="error-register">
                            <div class="title-validacao">
                            <h2>Sua senha precisa de:</h2>
                            </div>
                            
                            <div class="error-message">

                                <!-- <img src="/GearTech/assets/icons/check-register-none.svg"> </img> -->
                                <p id="length" class="invalid">Pelo menos 8 caracteres.</p><br>
                                <p id="uppercase" class="invalid">Pelo menos uma letra maiúscula.</p><br>
                                <p id="number" class="invalid">Pelo menos um número.</p><br>
                                <p id="special" class="invalid">Pelo menos um caractere especial.</p><br>
                                <p id="match" class="invalid">As senhas não coincidem.</p>
                            </div>
                        </div>
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
                    <p>Nós da GearTech compartilhamos nosso gosto por carros e somos dedicados a simplificar sua jornada
                        de compra. Valorizamos a transparência e a confiabilidade, proporcionando a você a melhor
                        escolha da sua vida.
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
    function popup() {
        Swal.fire({
            position: "top",
            icon: "success",
            title: "Verifique sua caixa de entrada",
            text: " o link de ativação de cadastro foi enviado para seu e-mail.",
            showConfirmButton: false,
            width: "30rem",
            showCloseButton: true,
            background: "#fafafa",
        });

    }

    function validatePassword() {
        var password = document.getElementById("password").value;
        var passwordConfirm = document.getElementById("passwordConfirm").value;
        var length = document.getElementById("length");
        var uppercase = document.getElementById("uppercase");
        var number = document.getElementById("number");
        var special = document.getElementById("special");
        var match = document.getElementById("match");

        // Verificação de comprimento
        if (password.length >= 8) {
            length.className = "valid";
        } else {
            length.className = "invalid";
        }

        // Verificação de letra maiúscula
        if (/[A-Z]/.test(password)) {
            uppercase.className = "valid";
        } else {
            uppercase.className = "invalid";
        }

        // Verificação de número
        if (/[0-9]/.test(password)) {
            number.className = "valid";
        } else {
            number.className = "invalid";
        }

        // Verificação de caractere especial
        if (/[\W_]/.test(password)) {
            special.className = "valid";
        } else {
            special.className = "invalid";
        }

        // Verificação de correspondência das senhas
        if (password === passwordConfirm && password.length > 0) {
            match.className = "valid";
            match.textContent = "As senhas coincidem.";
        } else {
            match.className = "invalid";
            match.textContent = "As senhas não coincidem.";
        }
    }
    </script>

</body>

<style>
.valid {
    color: green;
}

.invalid {
    color: red;
}

.error-message {
    display: flex;
    width: 100%;
    flex-direction: column;
    font-size: 1px;
}
</style>

</html>