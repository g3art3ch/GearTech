<?php
require("../fipeIN/vendor/autoload.php");

use DeividFortuna\Fipe\FipeCarros;

session_start();

$pagina = isset($_GET['pag']) ? intval($_GET['pag']) : 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $width = isset($_POST['width']) ? intval($_POST['width']) : 0;
    $_SESSION['limite'] = ($width < 480) ? 4 : (($width < 770) ? 6 : 9);
}

$limite = isset($_SESSION['limite']) ? $_SESSION['limite'] : 9;
$inicio = ($pagina * $limite) - $limite;

if (isset($_GET["Marca"])) {
    $marcaURL = $_GET["Marca"];
    $modelos = FipeCarros::getModelos($marcaURL);


    if (is_array($modelos) && isset($modelos['modelos'])) {
        $modelos = $modelos['modelos'];
    } else {
        // Defina $modelos como um array vazio ou trate o erro conforme necessário
        $modelos = [];
        echo '<br>';
        echo 'Erro ao obter modelos. Tente novamente mais tarde.';
        echo  '<br>';
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
    <script>
        function sendWidth() {
            var width = window.innerWidth;
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("width=" + width);
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("result").innerHTML = this.responseText;
                }
            };
        }
        window.onload = sendWidth;
        window.onresize = sendWidth;
    </script>
</head>

<body>
    <main>
        <header>
            <div class="container">
                <div class="area">
                    <div class="logo">
                        <a href="../pages_connected/logout.php">
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
                        <li><a href="catalog.php">Catálogo</a></li>
                        <li><a href="">Manutenções</a></li>
                        <li>
                            <div class="user-enter">
                                <a href="/GearTech/assets/pages/login.php">
                                    <img src="/GearTech/assets/icons/user.svg" alt="">
                                    <a href="/GearTech/assets/pages/login.php" class="login-account">Entre em sua conta</a>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <section class="recomendation">
            <div class="container">
                <div class="grid-recomendation">
                    <?php
                    foreach ($modelos as $modelo) {
                    $years = FipeCarros::getAnos($marcaURL, $modelo['codigo']);
                    foreach ($years as $year) {
                        if ($year['codigo'] >=   2019  ) {
                        echo '<div class="card-recomendation">';
                        echo '<form action="car-specification.php" method="get">';
                        echo '<div class="box-image">';
                        echo '<img src=".png" alt="">';
                        echo '</div>';

                        echo '<div class="title-card-recomendation">';
                        echo $modelo['nome'] . '<br>';
                        echo '</div>';

                        echo '<div class="title-card-recomendation">' . $modelo['codigo'] . '</div>';

                        echo '<div class="saiba-mais-recomendation">';
                        echo '<label for="options">Escolha uma opção:</label>';
                        echo '<select name="Ano" id="options">';

                        
                            echo '<option value="' . $year['codigo'] . '">' . $year['codigo'] . '</option>';
                       

                        echo '</select>';
                        echo '<br><br>';
                        echo '<input type="hidden" name="Marca" value="' . $marcaURL . '">';
                        echo '<input type="hidden" name="Modelo" value="' . $modelo['codigo'] . '">';
                        echo '<button type="submit">Enviar</button>';
                        echo '</div>';

                        echo '</form>';
                        echo '</div>';
                    }
                }
            }
                    ?>
                </div>
            </div>
        </section>

        <div class="pagination">
            <div class="box-pagination">

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