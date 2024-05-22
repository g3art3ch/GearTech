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
    <title>Seu carro ideal</title>
</head>


<body>
    <header>

        <div class="container">
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
                                <a href="user.php"><?php echo $_SESSION['nomeUsuario']; ?></a>
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="recomendation">
        <div class="container">
            <div class="title-recomendation">

                <?php

                echo "<div class = CarFY><h2>" . $_SESSION['nomeUsuario'] . " - Marcas para você!</h2></div>";

                ?>

            </div>
            <section class="recomendation">
        <div class="container">
            <div class="logotypes">



                <a href="connected_filtered_catalog.php?Marca=Bmw"><img src="/GearTech/assets/logo_images/bmw.png" alt=""></a>
                <a href="connected_filtered_catalog.php?Marca=Chevrolet"><img src="/GearTech/assets/logo_images/chevrolet.png" alt=""></a>
                <a href="connected_filtered_catalog.php?Marca=Fiat"><img src="/GearTech/assets/logo_images/fiat.png" alt=""></a>
                <a href="connected_filtered_catalog.php?Marca=Ford"><img src="/GearTech/assets/logo_images/ford.png" alt=""></a>
                <a href="connected_filtered_catalog.php?Marca=Honda"><img src="/GearTech/assets/logo_images/honda.png" alt=""></a>
                <a href="connected_filtered_catalog.php?Marca=Hyundai"> <img src="/GearTech/assets/logo_images/hyundai.png" alt=""></a>
                <a href="connected_filtered_catalog.php?Marca=Renault"><img src="/GearTech/assets/logo_images/renault.png" alt=""></a>
                <a href="connected_filtered_catalog.php?Marca=Renault"><img src="/GearTech/assets/logo_images/volksvagen.png" alt=""></a>
            </div>
        </div>
    </section>




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