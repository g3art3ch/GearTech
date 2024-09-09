<?php
include('connection.php');
include('protect.php');
include('connection_favorite.php');
include('connection_cars.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/main/main.css">
    <link rel="stylesheet" href="../css/main/header.css">
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/result-comparative.css">
    <link rel="stylesheet" href="../css/main/footer.css">
    <link rel="shortcut icon" href="/GearTech/assets/icons/logo.ico" type="image/x-icon">
</head>

<body>
    <main>
        <div class="container">
            <header>
                <div class="area">
                    <div class="logo">
                        <a href="/GearTech/assets/pages_connected/connected.php">
                            <img src="/GearTech/assets/images/logo.svg" alt="Logo" />
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
                        <li><a href="./connected_maintenance.php">Manutenções</a></li>
                        <li class="dropdown">
                            <div class="user-enter">
                                <img src="/GearTech/assets/icons/user.svg" alt="" class="user-photo">
                                <a href="#" class="login-account"><?php echo $_SESSION['nomeUsuario']; ?></a>
                                <img src="/GearTech/assets/icons/dowm-arrow.svg" alt="" onclick="toggleDropdown()">
                            </div>
                            <ul class="dropdown-menu">
                                <li><a href="./user.php">Dados pessoais</a></li>
                                <li><a href="./saved-vehicle.php">Seus salvos</a></li>
                                <li><a href="/GearTech/index.php">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>

        <div class="result-comparative">
            <div class="container">
                <div class="title-result-comparative">
                    <h2>Comparativo dos veículos salvos</h2>
                </div>

                <div class="box-result-comparative">
                    <div class="grid-result-comparative">
                        <div class="item-result-comparative">
                            <div class="card-image-result-comparative">
                                <div class="box-image-result-comparative">
                                    <img src="../car_images/Chevrolet_Tracker_1.0_Turbo_(Aut)_2024.png" alt="">
                                </div>
                            </div>

                            <div class="card-table-result-comparative">
                                <h2>Componentes mecânicos</h2>
                                <div class="componentes-table-result-comparative">
                                    <label for="">Marca</label>
                                    <input type="text">
                                    <label for="">Modelo</label>
                                    <input type="text">
                                    <label for="">Tipo de carroceria</label>
                                    <input type="text">
                                    <label for="">Consumo</label>
                                    <input type="text">
                                    <label for="">Motorização</label>
                                    <input type="text">
                                    <label for="">Transmissão</label>
                                    <input type="text">
                                    <label for="">Tração</label>
                                    <input type="text">
                                    <label for="">Capacidade de carga</label>
                                    <input type="text">
                                    <label for="">Estilo de direção</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="card-table-result-comparative">
                                <h2>Conforto e tecnologia</h2>
                                <div class="componentes-table-result-comparative">
                                    <label for="">Ar-condicionado</label>
                                    <input type="text">
                                    <label for="">Travas Elétricas</label>
                                    <input type="text">
                                    <label for="">Freio ABS</label>
                                    <input type="text">
                                    <label for="">Multimídia</label>
                                    <input type="text">
                                    <label for="">Câmeras de estacionamento</label>
                                    <input type="text">
                                    <label for="">Airbags frontais</label>
                                    <input type="text">
                                    <label for="">Apoio de braço</label>
                                    <input type="text">
                                    <label for="">Retrovisores elétricos</label>
                                    <input type="text">
                                    <label for="">Teto solar</label>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                        <div class="item-result-comparative">
                            <div class="card-image-result-comparative">
                                <div class="box-image-result-comparative">
                                    <img src="../car_images/Chevrolet_Tracker_1.0_Turbo_(Aut)_2024.png" alt="">
                                </div>
                            </div>

                            <div class="card-table-result-comparative">
                                <h2>Componentes mecânicos</h2>
                                <div class="componentes-table-result-comparative">
                                    <label for="">Marca</label>
                                    <input type="text">
                                    <label for="">Modelo</label>
                                    <input type="text">
                                    <label for="">Tipo de carroceria</label>
                                    <input type="text">
                                    <label for="">Consumo</label>
                                    <input type="text">
                                    <label for="">Motorização</label>
                                    <input type="text">
                                    <label for="">Transmissão</label>
                                    <input type="text">
                                    <label for="">Tração</label>
                                    <input type="text">
                                    <label for="">Capacidade de carga</label>
                                    <input type="text">
                                    <label for="">Estilo de direção</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="card-table-result-comparative">
                                <h2>Conforto e tecnologia</h2>
                                <div class="componentes-table-result-comparative">
                                    <label for="">Ar-condicionado</label>
                                    <input type="text">
                                    <label for="">Travas Elétricas</label>
                                    <input type="text">
                                    <label for="">Freio ABS</label>
                                    <input type="text">
                                    <label for="">Multimídia</label>
                                    <input type="text">
                                    <label for="">Câmeras de estacionamento</label>
                                    <input type="text">
                                    <label for="">Airbags frontais</label>
                                    <input type="text">
                                    <label for="">Apoio de braço</label>
                                    <input type="text">
                                    <label for="">Retrovisores elétricos</label>
                                    <input type="text">
                                    <label for="">Teto solar</label>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                        <div class="item-result-comparative">
                            <div class="card-image-result-comparative">
                                <div class="box-image-result-comparative">
                                    <img src="../car_images/Chevrolet_Tracker_1.0_Turbo_(Aut)_2024.png" alt="">
                                </div>
                            </div>

                            <div class="card-table-result-comparative">
                                <h2>Componentes mecânicos</h2>
                                <div class="componentes-table-result-comparative">
                                    <label for="">Marca</label>
                                    <input type="text">
                                    <label for="">Modelo</label>
                                    <input type="text">
                                    <label for="">Tipo de carroceria</label>
                                    <input type="text">
                                    <label for="">Consumo</label>
                                    <input type="text">
                                    <label for="">Motorização</label>
                                    <input type="text">
                                    <label for="">Transmissão</label>
                                    <input type="text">
                                    <label for="">Tração</label>
                                    <input type="text">
                                    <label for="">Capacidade de carga</label>
                                    <input type="text">
                                    <label for="">Estilo de direção</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="card-table-result-comparative">
                                <h2>Conforto e tecnologia</h2>
                                <div class="componentes-table-result-comparative">
                                    <label for="">Ar-condicionado</label>
                                    <input type="text">
                                    <label for="">Travas Elétricas</label>
                                    <input type="text">
                                    <label for="">Freio ABS</label>
                                    <input type="text">
                                    <label for="">Multimídia</label>
                                    <input type="text">
                                    <label for="">Câmeras de estacionamento</label>
                                    <input type="text">
                                    <label for="">Airbags frontais</label>
                                    <input type="text">
                                    <label for="">Apoio de braço</label>
                                    <input type="text">
                                    <label for="">Retrovisores elétricos</label>
                                    <input type="text">
                                    <label for="">Teto solar</label>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                        <div class="item-result-comparative">
                            <div class="card-image-result-comparative">
                                <div class="box-image-result-comparative">
                                    <img src="../car_images/Chevrolet_Tracker_1.0_Turbo_(Aut)_2024.png" alt="">
                                </div>
                            </div>

                            <div class="card-table-result-comparative">
                                <h2>Componentes mecânicos</h2>
                                <div class="componentes-table-result-comparative">
                                    <label for="">Marca</label>
                                    <input type="text">
                                    <label for="">Modelo</label>
                                    <input type="text">
                                    <label for="">Tipo de carroceria</label>
                                    <input type="text">
                                    <label for="">Consumo</label>
                                    <input type="text">
                                    <label for="">Motorização</label>
                                    <input type="text">
                                    <label for="">Transmissão</label>
                                    <input type="text">
                                    <label for="">Tração</label>
                                    <input type="text">
                                    <label for="">Capacidade de carga</label>
                                    <input type="text">
                                    <label for="">Estilo de direção</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="card-table-result-comparative">
                                <h2>Conforto e tecnologia</h2>
                                <div class="componentes-table-result-comparative">
                                    <label for="">Ar-condicionado</label>
                                    <input type="text">
                                    <label for="">Travas Elétricas</label>
                                    <input type="text">
                                    <label for="">Freio ABS</label>
                                    <input type="text">
                                    <label for="">Multimídia</label>
                                    <input type="text">
                                    <label for="">Câmeras de estacionamento</label>
                                    <input type="text">
                                    <label for="">Airbags frontais</label>
                                    <input type="text">
                                    <label for="">Apoio de braço</label>
                                    <input type="text">
                                    <label for="">Retrovisores elétricos</label>
                                    <input type="text">
                                    <label for="">Teto solar</label>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
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
</body>

</html>