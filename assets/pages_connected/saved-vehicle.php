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


    <link rel="shortcut icon" href="../icons/logo.ico" type="image/x-icon">
    <title>Seus salvos</title>
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
                            if ($quantidade > 1) {
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





                                echo '</div>';




                                echo ' </div>
                    </div>
                    <div class="right-side-saved">
                        <div class="card-comparative-saved">
                            <div class="title-comparative-saved">
                                <h2>Faça uma comparação de seus veículos</h2>
                                <p>Para tomar uma decisão melhor, faça uma comparação entre <span> componentes
                                        mecânicos, recursos tecnológicos e custos de manutenção<span></p>
                            </div>
                            <div class="button-comparative-saved">
                                <a href="./comparative.php">Comparar</a>
                            </div>

                       ';
                            } else if($quantidade <=1) {

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

                                

                                echo '</div>';




                                echo ' </div>
                    </div>
                    <div class="right-side-saved">
                        <div class="card-comparative-saved">
                            <div class="title-comparative-saved">
                                <h2>Faça uma comparação de seus veículos</h2>
                                <p>Para tomar uma decisão melhor, faça uma comparação entre <span> componentes
                                        mecânicos, recursos tecnológicos e custos de manutenção<span></p>
                            </div>
                            <div class="button-comparative-saved">
                                <a href="connected_catalog.php">Adicionar mais veículos</a>
                            </div>

                       ';
                            }
                            ?>

                        </div>
                    </div>
                    <script>
                        document.getElementById('compareForm').addEventListener('submit', function (event) {
                            event.preventDefault(); // Evita o envio padrão do formulário

                            const carroceria = document.getElementById('carroceria').value;
                            const marca = document.getElementById('marca').value;
                            const modelo = document.getElementById('modelo').value;

                            const xhr = new XMLHttpRequest();
                            xhr.open('POST', '', true); // O mesmo arquivo PHP processará o formulário
                            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    console.log(xhr.responseText);
                                }
                            };
                            xhr.send('carroceria=' + carroceria + '&marca=' + marca + '&modelo=' + modelo);
                        });
                    </script>
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

        $(document).ready(function () {
            $('.option-slides').slick({
                vertical: true,
                verticalSwiping: true,
                slidesToShow: 1,
                nextArrow: '<div class="center-next"><button type="button" class="custom-next"><img src="../icons/seta-down.svg"></img></button></div>',
                prevArrow: '<div class="center-next"><button type="button" class="custom-next"><img src="../icons/seta-up.svg"></img></button></div>'

            });
        });
    </script>

</body>