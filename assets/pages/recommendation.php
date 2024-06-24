<?php
include('connection_cars.php');
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
                    <a href="../pages_connected/logout.php">
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


    <section class="recomendation">
        <div class="container">
            <div class="title-recomendation">
                <div class=box-recomendation>

                    <?php


                    if (isset($_SESSION['resultados']) && !empty($_SESSION['resultados'])) {
                        // Loop através dos resultados e exibe as informações de cada carro
                        foreach ($_SESSION['resultados'] as $carro) {

                            echo '<div class=card-recomentadion>';
                            echo '<div class=box-image-card-recomendation>';
                    ?>

                            <img src="<?php
                                        echo $carro['urlCarro'] . $carro['idIden'];
                                        ?>.png" alt=>

                    <?php
                            echo '</div>';
                            echo '<div class=desc-recomendation>';
                            echo "<div class=title-card-recomendation>" . $carro['nome'] . "</div>";
                            // echo "<p>Estilo: " . $carro['estilo'] . "</p>";
                            echo "<div class=price> R$ " . $carro['orcamento'] . "</div>";
                            echo "<div class=info>
                            <p>Combusível: " . $carro['combustivel'] . "</p>
                            <p>Passageiros: " . $carro['capacidade'] . "</p>
                            <p>Uso: " . $carro['tipoUso'] . "</p>
                </div>";
                            echo '<div class="box-saiba-mais">';
                            echo '<a href="#">Saiba mais</a>';
                            echo '</div>';  
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>Nenhuma recomendação disponível.</p>";
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
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book.
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