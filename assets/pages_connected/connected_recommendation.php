<?php
include('connection.php');
if (!isset($_SESSION['nome'])) {
    session_start();
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
    <link rel="stylesheet" href="../css/main/footer.css">
    <link rel="stylesheet" href="../css/recomendation.css">
    <link rel="shortcut icon" href="../icons/logo.ico" type="image/x-icon">
    <title>Seu carro ideal</title>
</head>


<body>
    <main>
        <div class="container">
            <header>
            <div class="area">
                <div class="logo">
                    <a href="/GearTech/assets/pages_connected/connected.php">
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
                    <li><a href="/GearTech/assets/pages_connected/connected_catalog.php">Catálogo</a></li>
                    <li><a href="">Manutenções</a></li>
                    <li>
                        <div class="user-enter">
                            <a href="/Geartech/assets/pages_connected/connected.php">
                                <img src="/Geartech/assets/icons/user.svg" alt="">
                                <a href="user.php" class="login-account"><?php echo $_SESSION['nomeUsuario']; ?></a>
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        </div>
    

        <section class="recomendation">
    <div class="container">
        <div class="title-recomendation">
            <?php
                echo "<h2>" . $_SESSION['nomeUsuario'] . " - Carros que são feitos para você!</h2>";
            ?>
        </div>
        <div class="grid-recomendation">
            <?php
            if (isset($_SESSION['resultados']) && !empty($_SESSION['resultados'])) {
                foreach ($_SESSION['resultados'] as $carro) {
                    echo '<div class="card-recomendation">';
                    echo '<div class="box-image">';
                    echo '<img src="' . $carro['urlCarro'] . $carro['idIden'] . '.png" alt="">';
                    echo '</div>';
                    echo '<div class="title-card-recomendation">' . $carro['nome'] . '</div>';
                    echo '<div class="price">R$ ' . $carro['orcamento'] . '</div>';
                    echo '<div class="box-info">';
                    echo '<div class="info">';
                    echo '<img src="../icons/fuel-recomendation.svg" alt="">';
                    echo '<p>' . $carro['combustivel'] . '</p>';
                    echo '</div>';
                    echo '<div class="info">';
                    echo '<img src="../icons/passenger-recomendation.svg" alt="">';
                    echo '<p>' . $carro['capacidade'] . ' Passageiros</p>';
                    echo '</div>';
                    echo '<div class="info">';
                    echo '<img src="../icons/use-recomendation.svg" alt="">';
                    echo '<p>' . $carro['tipoUso'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="saiba-mais-recomendation">';
                    echo '<a href="#">Saiba mais</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>Nenhuma recomendação disponível.</p>';
            }
            ?>
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
                        <a href=""><img src="../icons/instagram-footer.svg" alt=""></a>
                        <a href=""><img src="../icons/email-footer.svg" alt=""></a>
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

</body>

</html>