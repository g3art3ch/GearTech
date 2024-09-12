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

                                // Defina o limite de carros a serem exibidos
                                $limite = 10;
                                $minimo = 3;
                                $contador = 0;

                                foreach ($_SESSION['resultados'] as $results) {
                                    if ($contador >= $limite)
                                        break;

                                    $consultNAME = $results['favoriteNAME'];
                                    $sql_code = "SELECT 
                                        nc.nome,
                                        fc.estilo,
                                        oc.orcamento,
                                        tc.combustivel,
                                        cc.capacidade,
                                        uc.tipoUso,
                                        iden.idIden,
                                        iden.urlCarro,
                                        iden.Marca
                                        FROM 
                                        nomeCarro nc
                                        INNER JOIN 
                                        filtroCarros fc ON nc.idFiltro = fc.idFiltro
                                        INNER JOIN 
                                        orcamentoCarro oc ON nc.idNome = oc.idNome
                                        INNER JOIN 
                                        tipoCombustivel tc ON nc.idNome = tc.idNome
                                        INNER JOIN 
                                        capacidadeCarro cc ON nc.idNome = cc.idNome
                                        INNER JOIN 
                                        usoCarro uc ON nc.idNome = uc.idNome
                                        INNER JOIN 
                                        identificador iden ON nc.idNome = iden.idNome  
                                        WHERE nome = '$consultNAME'";

                                    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
                                    $_SESSION['FAVORITES'] = array();
                                    while ($resultFAVORITES = $sql_query->fetch_assoc()) {
                                        $_SESSION['FAVORITES'][] = $resultFAVORITES;
                                    }

                                    

                                    foreach ($_SESSION['FAVORITES'] as $fav) {

                                        echo '<div class="swiper-slide">';
                                        echo '    <div class="item-saved">';
                                        echo '        <div class="box-image-saved">';
                                        echo '            <img src="../car_images/' . $fav['idIden'] . '.png" alt="">';
                                        echo '        </div>';
                                        echo '        <div class="info-saved-vehicle">';
                                        echo '            <h2>' . $fav['nome'] . '</h2>';
                                        echo '            <div class="price">' . $fav['orcamento'] . '</div>';
                                        echo '            <div class="desc-saved-vehicle">';
                                        echo '            </div>';
                                        echo '            <a class="CheckCarInfo" href="/GearTech/assets/pages_connected/connected_car_specification.php?IdCar=' . $fav['nome'] . '">Ver detalhes</a>';
                                        echo '        </div>';
                                        echo '    </div>';
                                        echo '</div>';
                                        
                                    }


                                }

                            }
                            echo '</div>';
                            ?>

                            

                        </div>
                    </div>
                    <div class="right-side-saved">
                    <div class="card-questionnaire">
                        <h2>Continua incerto para tomar sua decisão?</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus pariatur, assumenda odit
                            quasi impedit non necessitatibus </p>
                        <button type="submit"><a href="comparative.php">Compare</a></button>
                      
                    </div>  <a href="./questionary.php">Questionario de perfil</a>
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



    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="../js/slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.save-slides').slick({
                vertical: true,
                verticalSwiping: true,
                slidesToShow: 3,
                prevArrow: '<button type="button" class="custom-prev">Previous</button>',
                nextArrow: '<button type="button" class="custom-next">Next</button>'

            });
        });
    </script>
    <style>
        .custom-prev, .custom-next {
    background: #ccc;
    border: none;
    color: #000;
    font-size: 16px;
    padding: 10px;
    cursor: pointer;
}


    </style>
</body>