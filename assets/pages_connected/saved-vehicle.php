<?php
include('connection.php');
include('protect.php');
include('connection_favorite.php');
include('connection_cars.php');

$nomeUSER = $_SESSION['nomeUsuario'];

$sql_code1 = "SELECT * FROM favorites WHERE favoriteUSER = '$nomeUSER'";
$sql_query2 = $favoriteDATA->query($sql_code1);
$quantidade = $sql_query2->num_rows;



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
    <link rel="stylesheet" href="../css/profile-result.css">
    <link rel="stylesheet" href="../css/main/footer.css">
    <link rel="stylesheet" href="../js/slick/slick.css">
    <link rel="stylesheet" href="../js/slick/slick-theme.css">
    <script src="../js/script.js"></script>


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
                        <li><a href="./connected_maintenance.php">Manutenções</a></li>
                        <li><a href="./calculadora_tco.php">Calculadora TCO</a></li>
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

                            <?php
                            echo '<div class="save-slides">';
                            if ($quantidade > 0) {
                                if (!isset($_SESSION)) {
                                    session_start();
                                }
                                $_SESSION['resultados'] = array();
                                while ($result = $sql_query2->fetch_assoc()) {
                                    $_SESSION['resultados'][] = $result;
                                }







                                foreach ($_SESSION['resultados'] as $fav) {

                                    echo '<div class="swiper-slide">';
                                    echo '    <div class="item-saved">';
                                    echo '        <div class="box-image-saved">';
                                    echo '            <img src="../car_images/' . $fav['idfavorite'] . '.png" alt="">';
                                    echo '        </div>';
                                    echo '        <div class="info-saved-vehicle">';
                                    echo '            <h2>' . $fav['favoriteNAME'] . '</h2>';
                                    echo '            <div class="desc-saved-vehicle">';
                                    echo '            </div>';
                                    echo '            <a class="CheckCarInfo" href="/GearTech/assets/pages_connected/connected_car_specification.php?Marca=' . $fav['favoriteMARCA'] . '&Modelo=' . $fav['idfavorite'] . '&CodModelo=' . $fav['CodModelo'] . '&Ano=' . $fav['Ano'] . '&codAno=' . $fav['CodAno'] . '">Ver detalhes</a>';
                                    echo '        </div>';
                                    echo '    </div>';
                                    echo '</div>';

                                }




                            }
                            echo '</div>';
                            ?>



                        </div>
                    </div>
                    <div class="right-side-saved">


                        <?php

                        $sql_code = "SELECT * FROM usuarios WHERE nomeUsuario= '$nomeUSER'";
                        $sql_query = $userDATA->query($sql_code) or die("Falha na execução do código SQL: " . $userDATA->error);

                        $quantidadeUSER = $sql_query->num_rows;


                        if ($quantidadeUSER == 1) {
                            $_SESSION['usuarios'] = array();
                            while ($resultuser = $sql_query->fetch_assoc()) {
                                $_SESSION['usuarios'][] = $resultuser;
                            }
                            foreach ($_SESSION['usuarios'] as $userch) {
                                $tipoUSER = $userch['usuario'];
                            }
                            if (empty($tipoUSER)) {
                                echo '
                                <div class="card-questionnaire">
                            <h2>Continua confuso para tomar sua decisão?</h2>
                            <p>Responder a algumas perguntas rápidas pode mudar isso! Nosso questionário foi projetado
                                para entender suas preferências e necessidades.</p>
                            <a href="./questionary.php"><button>Questionario de perfil</button></a>

                        </div>
                                ';
                            } else {
                                echo '
                            <div class="profile-result">
                        <div class="card-profile-result">
                            <div class="headline-profile-result">
                                <div class="category-profile">
                                    <img src="../icons/icon-family.svg" alt="">
                                    <p>' . $tipoUSER . '</p>
                                </div>
                                <a href="./questionary.php">Editar perfil</a>
                            </div>
                            <div class="fixed-text-profile-result">
                                <p>Identificamos que você possui um perfil ' . $tipoUSER . '! <br>
                                Esses são os veículos que mais combiam com você</p>
                            </div>';
                                echo '   
                            <div class="area-car-result-profile">
                                <div class="box-image-result-profile">
                                    <img src="../car_images/Chevrolet_Tracker_1.0_Turbo_(Aut)_2024.png" alt="">
                                </div>
                                <div class="desc-car-result-profile">
                                    <h2>Chevrolet Tracker 1.0 Turbo (A</h2>
                                    <div class="price">R$ 128.000</div>
                                    <a href="">Ver detalhes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                            ';
                            }
                        }

                        ?>






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


    <script src="/GearTech/assets/js/script.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="../js/slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.save-slides').slick({
                vertical: true,
                verticalSwiping: true,
                slidesToShow: 3,
                nextArrow: '<div class="center-next"><button type="button" class="custom-next"><img src="../icons/seta-down.svg"></img></button></div>',
                prevArrow: '<div class="center-next"><button type="button" class="custom-next"><img src="../icons/seta-up.svg"></img></button></div>'

            });
        });
    </script>

</body>