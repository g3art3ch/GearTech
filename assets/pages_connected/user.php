<?php
include('connection.php');
include('protect.php');
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
    <link rel="stylesheet" href="../css/user.css">
    <link rel="shortcut icon" href="../icons/logo.ico" type="image/x-icon">
    <title>Minha conta</title>
</head>

<body>
    <main>
    <div class="container">
        <header>
            <div class="area">
                <div class="logo">
                    <a href="/Geartech/assets/pages_connected/connected.php">
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
                    <li>
                        <a href="/GearTech/index.php" class="logout-area">
                            <img src="../icons/logout.svg" alt="">
                            <p>Encerrar sessão</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>


    <section class="user">
        <div class="container">
            <div class="title-user">
                <h2>Minha Conta</h2>
            </div>
            <div class="box-user">
                <div class="card-user pessoal">
                    <div class="title-card-user">
                        <img src="../icons/user.svg" alt="">
                        <h2>Informações Pessoais</h2>
                    </div>
                    
                    <div class="user-data">
                        <label for="">Nome completo</label>
                        <input type="text" value="<?php echo $_SESSION['nomeUsuario']; ?>" readonly>
                        <label for="" id="email">Email</label>
                        <input type="email" value="<?php echo $_SESSION['email']; ?>" readonly>
                    </div>
                </div>
                <div class="card-user">
                    <div class="title-card-user">
                        <img src="../icons/key.svg" alt="">
                        <h2>Senha</h2>
                    </div>
                    
                    <div class="user-data">
                        <label for="">Sua Senha</label>
                        <?php
                        $senha = $_SESSION['senha'];
                        $asterisks = str_repeat('*', strlen($senha));
                        echo '<input type=text  value=' . $asterisks . ' readonly>';
                        ?>
                        <label for="">Confirme sua senha</label>
                        <input type="text" placeholder="Insira sua senha">
                        <label for="">Edite sua senha</label>
                        <input type="text" placeholder="Nova senha">
                        <a href="#"><button>Confirmar alteração</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </main>

    <script src="../js/script.js"></script>
</body>

</html>