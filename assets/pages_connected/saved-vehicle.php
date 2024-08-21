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
    <link rel="stylesheet" href="../css/saved-vehicle.css">
    <link rel="stylesheet" href="../css/main/footer.css">
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
                        <li><a href="./connected_catalog.php">Catálogo</a></li>
                        <li><a href="">Manutenções</a></li>
                        <li class="dropdown">
                            <div class="user-enter">
                                <img src="/GearTech/assets/icons/user.svg" alt="" class="user-photo">
                                <a href="#" class="login-account"><?php echo $_SESSION['nomeUsuario']; ?></a>
                                <img src="/GearTech/assets/icons/dowm-arrow.svg" alt="" onclick="toggleDropdown()">
                            </div>
                            <ul class="dropdown-menu">
                                <li><a href="./user.php">Dados pessoais</a></li>
                                <li><a href="/GearTech/index.php">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- <ul>
                        <li>
                            <a href="/GearTech/index.php" class="logout-area">
                                <img src="../icons/logout.svg" alt="">
                                <p>Encerrar sessão</p>
                            </a>
                        </li>
                    </ul> -->
                </nav>
            </header>
        </div>

        
        <section class="saved-vehicle">
            <div class="container">
                <div class="title-saved-vehicle">
                    <h2>Seus salvos</h2>
                </div>

                <div class="box-saved">
                    <div class="left-side-saved">
                        <div class="card-saved-vehicle">
                            <div class="title-card-saved">
                                <img src="../icons/saved.svg" alt="">
                                <h2>Veículos salvos</h2>
                            </div>
                                <div class="item-saved">
                                    <div class="box-image-saved">
                                        <img src="../car_images/Chevrolet_Tracker_1.0_Turbo_(Aut)_2024.png" alt="">
                                    </div>
                                    <div class="info-saved-vehicle">
                                        <h2>Chevrolet Tracker 1.0 Turbo (Aut)</h2>
                                        <div class="price">R$ 121.000,00</div>
                                        <div class="desc-saved-vehicle">
                                            <p>Gasolina</p>
                                            <p>4 passageiros</p>
                                            <p>Consumo baixo</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-saved">
                                    <div class="box-image-saved">
                                        <img src="../car_images/Chevrolet_Tracker_1.0_Turbo_(Aut)_2024.png" alt="">
                                    </div>
                                    <div class="info-saved-vehicle">
                                        <h2>Chevrolet Tracker 1.0 Turbo (Aut)</h2>
                                        <div class="price">R$ 121.000,00</div>
                                        <div class="desc-saved-vehicle">
                                            <p>Gasolina</p>
                                            <p>4 passageiros</p>
                                            <p>Consumo baixo</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-saved">
                                    <div class="box-image-saved">
                                        <img src="../car_images/Chevrolet_Tracker_1.0_Turbo_(Aut)_2024.png" alt="">
                                    </div>
                                    <div class="info-saved-vehicle">
                                        <h2>Chevrolet Tracker 1.0 Turbo (Aut)</h2>
                                        <div class="price">R$ 121.000,00</div>
                                        <div class="desc-saved-vehicle">
                                            <p>Gasolina</p>
                                            <p>4 passageiros</p>
                                            <p>Consumo baixo</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="scroll-slide">
                                    <img src="../icons/slider.svg" alt="">
                                </div>
                        </div>
                    </div>
                    <div class="right-side-saved">
                        <div class="card-questionnaire">
                            <h2>Continua incerto para tomar sua decisão?</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus pariatur, assumenda odit quasi impedit non necessitatibus </p>
                            <button type="submit">Compare</button>
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