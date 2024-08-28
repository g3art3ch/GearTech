<?php
include('connection.php');
include('connection_cars.php');
include('protect.php');

// Obtém o ID do carro a partir da URL
if (isset($_GET['IdCar'])) {
    $idCarURL = $_GET['IdCar'];
    $idCar = str_replace('_', ' ', $idCarURL);
}
// Inicia a sessão se ainda não estiver iniciada
if (!isset($_SESSION)) {
    session_start();
}
// Consulta as informações do carro
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
WHERE nome = '$idCar'";

$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
$quantidade = $sql_query->num_rows;
$_SESSION['resultados'] = array();
while ($result = $sql_query->fetch_assoc()) {
    $_SESSION['resultados'][] = $result;
}
foreach ($_SESSION['resultados'] as $carro) { 
    $favoriteMARCA = $carro['Marca'];
};

$nomeUSER = $_SESSION['nomeUsuario'];
// Função para adicionar o carro aos favoritos
function FavFunction($idCar, $favoriteMARCA, $nomeUSER) {
    include('connection_favorite.php');
    $FavInsert = "INSERT INTO favorites (favoriteNAME, favoriteMARCA, favoriteUSER ) VALUES('$idCar', '$favoriteMARCA', '$nomeUSER')";
    $sql_query = $favoriteDATA->query($FavInsert) or die("Falha na execução do código SQL: " . $mysqli->error);
}

// Função para remover o carro dos favoritos
function DesfavFunction($idCar) {
    include('connection_favorite.php');
    $UnfavDelete = "DELETE FROM favorites WHERE favoriteNAME = '$idCar'";
    $sql_query = $favoriteDATA->query($UnfavDelete);
}

// Processa as ações de favoritar ou desfavoritar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['IdCar'])) {
    $idCar = $_POST['IdCar'];
    if (isset($_POST['FavButton'])) {
        FavFunction($idCar, $favoriteMARCA, $nomeUSER);
    } elseif (isset($_POST['UnfavButton'])) {
        DesfavFunction($idCar);
    }
    // Após a ação, recarregue a página para atualizar o botão
    header("Location: ".$_SERVER['REQUEST_URI']);
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
                        <li><a href="/GearTech/assets/pages_connected/connected_catalog.php">Catálogo</a></li>
                        <li><a href="">Manutenções</a></li>
                        <li>
                            <div class="user-enter">
                                <a href="../pages/login.php">
                                    <img src="../icons/user.svg" alt="">
                                    <a href="user.php" class="login-account"><?php echo $_SESSION['nomeUsuario']; ?></a>
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
                    foreach ($_SESSION['resultados'] as $carro) { 
                        echo $carro['nome'];
                    };?>
                    </h2>
                </div>

                <div class="FAVORITE_BUTTON">
                    <form method="post">
                        <input type="hidden" name="IdCar" value="<?php echo htmlspecialchars($_GET['IdCar']); ?>">
                        
                            <button type="submit" name="UnfavButton">DESFAVORITAR</button>
                        
                            <button type="submit" name="FavButton">FAVORITAR</button>
                        
                    </form>
                </div>

                <div class="box-car-specification">
                    <div class="left-side-specification">
                        <div class="card-car-specification">
                            <h2><?php echo $carro['nome'];?></h2>
                            <?php 
                            echo '<img src="../car_images/'. $carro['idIden'] . '.png" alt="">';
                            ?>
                        </div>
                        <div class="card-technology-specification none-mobile">
                            <h2>Conforto e tecnologia</h2>
                            <table>
                                <tr>
                                    <td>Ar condicionado</td>
                                    <td><p>...</p></td>
                                </tr>
                                <tr>
                                    <td>Travas Elétricas</td>
                                    <td><p>...</p></td>
                                </tr>
                                <tr>
                                    <td>Freio ABS</td>
                                    <td><p>...</p></td>
                                </tr>
                                <tr>
                                    <td>Multimídia</td>
                                    <td><p>...</p></td>
                                </tr>
                                <tr>
                                    <td>Câmeras de estacionamento</td>
                                    <td><p>...</p></td>
                                </tr>
                                <tr>
                                    <td>Airbags frontais</td>
                                    <td><p>...</p></td>
                                </tr>
                                <tr>
                                    <td>Apoio de braço</td>
                                    <td><p>...</p></td>
                                </tr>
                                <tr>
                                    <td>Retrovisores elétricos</td>
                                    <td><p>...</p></td>
                                </tr>
                                <tr>
                                    <td>Teto Solar</td>
                                    <td><p>...</p></td>
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
                                    <td><p><?php echo $carro['Marca']?></p></td>
                                </tr>
                                <tr>
                                    <td>Modelo</td>
                                    <td><p><?php echo $carro['nome']?></p></td>
                                </tr>
                                <tr>
                                    <td>Tipo de Carroceria</td>
                                    <td><p><?php echo $carro['estilo']?></p></td>
                                </tr>
                                <tr>
                                    <td>Capacidade de passageiros</td>
                                    <td><p><?php echo $carro['capacidade']-1?></p></td>
                                </tr>
                                
                                <tr>
                                    <td>Consumo</td>
                                    <td><p>...</p></td>
                                </tr>
                                <tr>
                                    <td>Motorização</td>
                                    <td><p>...</p></td>
                                </tr>
                                <tr>
                                    <td>Transmissão</td>
                                    <td><p>...</p></td>
                                </tr>
                                <tr>
                                    <td>Tração</td>
                                    <td><p>...</p></td>
                                </tr>
                                <tr>
                                    <td>Quantidade de portas</td>
                                    <td><p>...</p></td>
                                </tr>
                                <tr>
                                    <td>Capacidade de Carga</td>
                                    <td><p>...</p></td>
                                </tr>
                                <tr>
                                    <td>Estilo de Direção</td>
                                    <td><p>...</p></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-technology-specification flex-mobile">
                        <h2>Conforto e tecnologia</h2>
                        <table>
                            <tr>
                                <td>Ar condicionado</td>
                                <td><p>...</p></td>
                            </tr>
                            <tr>
                                <td>Travas Elétricas</td>
                                <td><p>...</p></td>
                            </tr>
                            <tr>
                                <td>Freio ABS</td>
                                <td><p>...</p></td>
                            </tr>
                            <tr>
                                <td>Multimídia</td>
                                <td><p>...</p></td>
                            </tr>
                            <tr>
                                <td>Câmeras de estacionamento</td>
                                <td><p>...</p></td>
                            </tr>
                            <tr>
                                <td>Airbags frontais</td>
                                <td><p>...</p></td>
                            </tr>
                            <tr>
                                <td>Apoio de braço</td>
                                <td><p>...</p></td>
                            </tr>
                            <tr>
                                <td>Retrovisores elétricos</td>
                                <td><p>...</p></td>
                            </tr>
                            <tr>
                                <td>Teto Solar</td>
                                <td><p>...</p></td>
                            </tr>
                        </table>
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
