<?php
include('connection_temp.php');
include('connection_carsgt.php');
require("../fipeIN/vendor/autoload.php");

use DeividFortuna\Fipe\FipeCarros;
session_start();

if (isset($_GET['Marca'])) {
    $Marca = $_GET['Marca'];
    $Modelo = $_GET['Modelo'];
    $Ano = $_GET['Ano'];
    $CodModelo = $_GET['CodModelo'];
    $CodAno = $_GET['codAno'];
}
$setVehicle = FipeCarros::getVeiculo($Marca, $CodModelo, $CodAno);



$carSpecConsult = "SELECT 
    marca.marca,
    marca.idMarca,
    modelo.nomeCarro,
    modelo.CodModelo,
    modelo.codigoAno,
    modelo.idModelo,
    versao.ano
FROM 
    marca
INNER JOIN 
    modelo ON marca.idMarca = modelo.idMarca
INNER JOIN 
    versao ON modelo.idModelo = versao.idVersao
WHERE marca.idMarca = $Marca and modelo.idModelo = $Modelo and versao.ano = $Ano";
    
$carSpec = $finalDATA->query($carSpecConsult);


if (!isset($_SESSION)) {
    session_start();
}
$_SESSION['carSpec'] = array();
while ($searchf = $carSpec->fetch_assoc()) {
    $_SESSION['carSpec'][] = $searchf;
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
    <link rel="stylesheet" href="../css/catalog.css">
    <link rel="stylesheet" href="../css/car-specification.css">
    <link rel="shortcut icon" href="../icons/logo.ico" type="image/x-icon">
    <title>Seu carro ideal</title>
</head>

<body>
    <main>
        <div class="container">
            <header>
                <div class="area">
                    <div class="logo">
                        <a href="/GearTech/index.php">
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
                        <li><a href="./catalog.php">Catálogo</a></li>
                        <li><a href="">Manutenções</a></li>
                        <li>
                            <div class="user-enter">
                                <a href="../pages/login.php">
                                    <img src="../icons/user.svg" alt="">
                                    <a href="../pages/login.php" class="login-account">Entre em sua conta</a>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>

        <section class="car-specification">
            <div class="container">
                <div class="title-car-title-specification">
                    <h2>Mais informações sobre - <?php
                    foreach ($_SESSION['carSpec'] as $final) {
                        echo $final['marca'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $final['nomeCarro']. "<br><br>";

                        ?>
                        </h2>
                    </div>
                    <div class="box-car-specification">
                        <div class="left-side-specification">
                            <div class="card-car-specification">
                                <h2><?php echo  $setVehicle['Valor']; ?></h2>
                                <?php
                                // echo '<img src="../car_images/'. $carro['idIden'] . '.png" alt="">';
                                ?>
                            </div>
                            <div class="card-technology-specification none-mobile">
                                <h2>Conforto e tecnologia</h2>
                                <table>
                                    <tr>
                                        <td>Ar condicionado</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Travas Elétricas</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Freio ABS</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Multimídia</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Câmeras de estacionamento</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Airbags frontais</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Apoio de braço</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Retrovisores elétricos</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Teto Solar</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="right-side-specification">
                            <div class="card-mecanic-specification">
                                <h2>Especificações Gerais</h2>
                                <table>
                                    <tr>
                                        <td>Marca</td>
                                        <td>
                                            <p><?php echo $final['marca'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Modelo</td>
                                        <td>
                                            <p><?php echo $final['nomeCarro'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tipo de Carroceria</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Capacidade de passageiros</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Consumo</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Motorização</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Transmissão</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tração</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Quantidade de portas</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Capacidade de Carga</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Estilo de Direção</td>
                                        <td>
                                            <p>...</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card-technology-specification flex-mobile">
                            <h2>Conforto e tecnologia</h2>
                            <table>
                                <tr>
                                    <td>Ar condicionado</td>
                                    <td>
                                        <p>...</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Travas Elétricas</td>
                                    <td>
                                        <p>...</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Freio ABS</td>
                                    <td>
                                        <p>...</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Multimídia</td>
                                    <td>
                                        <p>...</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Câmeras de estacionamento</td>
                                    <td>
                                        <p>...</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Airbags frontais</td>
                                    <td>
                                        <p>...</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apoio de braço</td>
                                    <td>
                                        <p>...</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Retrovisores elétricos</td>
                                    <td>
                                        <p>...</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Teto Solar</td>
                                    <td>
                                        <p>...</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </main>

    <?php
                    }
                    ?>



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
    <script src="../js/script.js"></script>


</body>

</html>