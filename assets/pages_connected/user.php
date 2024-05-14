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
    <title>Minha conta</title>
</head>
<body>
    <header>
        <div class="container">
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
                    <li><a href="">Catálogo</a></li>
                    <li><a href="">Manutenções</a></li>
                    <li>
                        <div class="user-enter">
                            <a href="/GearTech/index.php">                                
                                <img src="/GearTech/assets/icons/logout.svg" alt="">
                                <a href="logout.php" class="red">Encerrar sessão</a>
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    
    <section class="user">
        <div class="container">
                <div class="title-user">
                    <h2>Minha Conta</h2>
                </div>
                <div class="box-user">
                <div class="card-user">
                    <h2>Informações Pessoais</h2>
                    <div class="user-data">
                        <label for="">Nome completo</label>
                        <input type="text" value="<?php echo $_SESSION['nomeUsuario'];?>" readonly>
                        <label for="" id="email">Email</label>
                        <input type="email" value="<?php echo $_SESSION['email'];?>" readonly>
                    </div>
                </div>
                <div class="card-user">
                    <h2>Senha</h2>
                    <div class="user-data">
                        <label for="">Sua Senha</label>
                        <input type="text">
                        <label for="" id="email">Edite sua senha <span>*</span></label>
                        <input type="text">
                        <button>Salvar alterações</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <script src="../js/script.js"></script>
</body>
</html>