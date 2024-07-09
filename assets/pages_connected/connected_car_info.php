<?php
include('connection.php');
include('connection_cars.php');
include('protect.php');
if (isset($_GET["id"])) {
    $carInfo = $_GET["id"];

    $sql_code = "SELECT 
    nc.nome,
    fc.estilo,
    oc.orcamento,
    tc.combustivel,
    cc.capacidade,
    uc.tipoUso,
    iden.idIden,
    iden.urlCarro
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
        WHERE idIden = '$carInfo'";


    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    if ($sql_query->num_rows > 0) {

        $result = $sql_query->fetch_assoc();

        $_SESSION['idIden'] = $result['idIden'];
        $_SESSION['urlCarro'] = $result['urlCarro'];
        $_SESSION['nomeCarro'] = $result['nome'];
        $_SESSION['estilo'] = $result['estilo'];
        $_SESSION['orcamento'] = $result['orcamento'];
        $_SESSION['combustivel'] = $result['combustivel'];
        $_SESSION['capacidade'] = $result['capacidade'];
        $_SESSION['tipoUso'] = $result['tipoUso'];
    }
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
    <link rel="shortcut icon" href="../icons/logo.ico" type="image/x-icon">
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
                            echo '<img src='. $_SESSION['urlCarro'] . $_SESSION['idIden']. '.png alt=>';
                            echo '</div>'; 
                            echo '<div class=desc-recomendation>';
                            echo "<div class=title-card-recomendation>" . $_SESSION['nomeCarro'] . "</div>";
                            // echo "<p>Estilo: " . $_SESSION['estilo'] . "</p>";
                            echo "<div class=price> R$ " . $_SESSION['orcamento'] . "</div>";
                            echo "<div class=info>
                            <p>" ."Combustível: " . $_SESSION['combustivel'] . "</p>
                            <p>" ."Capacidade: ". $_SESSION['capacidade'] . "</p>
                            <p>" ."Uso recomendado: ". $_SESSION['tipoUso'] . "</p>
                            </div>";
                            echo "</div>";
                            echo "</div>";

                            ?>
                        
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