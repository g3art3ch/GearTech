<?php
include('connection.php');
include('connection_carsgt.php');
require("../fipeIN/vendor/autoload.php");

use DeividFortuna\Fipe\FipeCarros;
session_start();
// Obtém o ID do carro a partir da URL
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
foreach ($_SESSION['carSpec'] as $final) {
    $nomeCarro = $final['nomeCarro'];
    $MarcaCarro = $final['marca'];
    $CodModelo = $final['CodModelo'];
    $codigoAno = $final['codigoAno'];
    $idModelo = $final['idModelo'];
}


if (!isset($_SESSION)) {
    session_start();
}
$_SESSION['carSpec'] = array();
while ($searchf = $carSpec->fetch_assoc()) {
    $_SESSION['carSpec'][] = $searchf;
}

$nomeUSER = $_SESSION['nomeUsuario'];
// Função para adicionar o carro aos favoritos





function FavFunction($idModelo, $nomeCarro, $MarcaCarro, $nomeUSER, $CodModelo, $codigoAno)
{
    // Inclui as conexões ao banco de dados
    include('connection_favorite.php');
    include('connection_carsgt.php');

    // Verifica se as variáveis GET estão definidas
    if (isset($_GET['Marca'], $_GET['Modelo'], $_GET['Ano'], $_GET['CodModelo'], $_GET['codAno'])) {
        $Marca = $_GET['Marca'];
        $Modelo = $_GET['Modelo'];
        $Ano = $_GET['Ano'];
        $CodModelo = $_GET['CodModelo'];
        $CodAno = $_GET['codAno'];
    } else {
        echo "Dados do carro incompletos.";
        return; // Para a execução se os dados estiverem incompletos
    }

    // Consulta para obter as especificações do carro
    $stmt = $finalDATA->prepare("
        SELECT 
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
        WHERE 
            marca.idMarca = ? AND modelo.idModelo = ? AND versao.ano = ?
    ");

    // Prepara e executa a consulta
    $stmt->bind_param("iii", $Marca, $Modelo, $Ano); // "iii" significa 3 inteiros
    $stmt->execute();
    $carSpec = $stmt->get_result();

    if ($carSpec->num_rows > 0) {
        while ($final = $carSpec->fetch_assoc()) {
            $nomeCarro = $final['nomeCarro'];
            $MarcaCarro = $final['idMarca'];
            $CodModelo = $final['CodModelo'];
            $codigoAno = $final['codigoAno'];
            $idModelo = $final['idModelo'];
            $CodModelo = $final['CodModelo'];
            $CodAno = $final['codigoAno'];
            $AnoFav = $final['ano'];
            $nomeMarca = $final['marca'];

        }
    } else {
        echo "Especificações do carro não encontradas.";
        return; // Para a execução se não houver resultados
    }

    // Verifica se o carro já foi favoritado
    $chkFAV = $favoriteDATA->prepare("SELECT * FROM favorites WHERE favoriteNAME = ?");
    $chkFAV->bind_param("s", $nomeCarro); // "s" para string
    $chkFAV->execute();
    $execCHK = $chkFAV->get_result();
    $qtdchk = $execCHK->num_rows;



    if ($qtdchk == 0) {
        // Insere o carro nos favoritos
        $FavInsert = $favoriteDATA->prepare("
            INSERT INTO favorites (idfavorite, favoriteNAME, favoriteMARCA, favoriteUSER, CodModelo, CodAno, Ano, nomeMarca) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $FavInsert->bind_param("isssisis", $idModelo, $nomeCarro, $MarcaCarro, $nomeUSER, $CodModelo, $CodAno, $AnoFav, $nomeMarca);
        $FavInsert->execute();

        var_dump($qtdchk);

    } else {
        // Se o carro já estiver favoritado
        echo "<script>alert('Carro já inserido nos favoritos.');</script>";
    }
}











// Função para remover o carro dos favoritos
function DesfavFunction($idCar)
{
    include('connection_favorite.php');
    $UnfavDelete = "DELETE FROM favorites WHERE idfavorite = $idCar";
    $sql_query = $favoriteDATA->query($UnfavDelete);
}

// Processa as ações de favoritar ou desfavoritar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['IdCar'])) {
    $idCar = $_POST['IdCar'];
    if (isset($_POST['FavButton'])) {
        FavFunction($idModelo, $nomeCarro, $MarcaCarro, $nomeUSER, $CodModelo, $codigoAno);
    } elseif (isset($_POST['UnfavButton'])) {
        DesfavFunction($idCar);
    }
    // Após a ação, recarregue a página para atualizar o botão
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                                <li><a href="./saved-vehicle.php">Seus salvos</a></li>
                                <li><a href="/GearTech/index.php">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>



        <section class="image-spec">
            <!-- <div class="container">
                <div class="title-car-title-specification">
                    <?php echo '<img src="../car_images/' . $Modelo . '.png" alt="">';
                    ?>
                </div>
            </div> -->





        </section>

        <section class="car-specification">
            <div class="container">
                <div class="title-car-title-specification">
                    <h2>Mais informações sobre - <?php
                    foreach ($_SESSION['carSpec'] as $final) {
                        echo $final['marca'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $final['nomeCarro'] . "<br><br>";

                        ?>
                    </h2>
                </div>
                <div class="FAVORITE_BUTTON">
                    <form method="POST" action="">
                        <!-- ID do carro e outros dados importantes -->
                        <input type="hidden" name="IdCar" value="<?php echo $idModelo; ?>">
                        <input type="hidden" name="nomeCarro" value="<?php echo $nomeCarro; ?>">
                        <input type="hidden" name="MarcaCarro" value="<?php echo $MarcaCarro; ?>">
                        <input type="hidden" name="nomeUSER" value="<?php echo $nomeUSER; ?>">
                        <input type="hidden" name="CodModelo" value="<?php echo $CodModelo; ?>">
                        <input type="hidden" name="codigoAno" value="<?php echo $codigoAno; ?>">

                        <!-- Botão de Favoritar -->
                        <button type="submit" name="FavButton" class="FavButton">Salvar veículo</button>
                    </form>

                    <!-- Formulário de Desfavoritar -->
                    <form method="POST" action="">
                        <!-- ID do carro para desfavoritar -->
                        <input type="hidden" name="IdCar" value="<?php echo $idModelo; ?>">

                        <!-- Botão de Desfavoritar -->
                        <button type="submit" name="UnfavButton" class="UnfavButton">Remover veículo</button>
                    </form>
                </div>
                <div class="box-car-specification">
                    <div class="left-side-specification">
                        <div class="card-car-specification">
                            <div class="title-car-title-specification">
                                <?php echo '<img src="../car_images/' . $Modelo . '.png" alt="">';
                    ?>
                            </div>
                            <div class="box-button-simulation">
                                <h2><?php echo $setVehicle['Valor']; ?></h2>
                                <a href="../pages/financiamento.html">Simular financiamento</a>
                            </div>
                            
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