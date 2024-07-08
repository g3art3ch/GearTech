<?php
include('connection_cars.php');
include('protect.php');

if (isset($_GET['pag'])) {
    $pagina = $_GET['pag'];
} else {
    $pagina = 1;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $width = isset($_POST['width']) ? intval($_POST['width']) : 0;
    if ($width < 480) {
        $_SESSION['limite'] = 4;
    } else if ($width < 770) {
        $_SESSION['limite'] = 6;
    } else
        $_SESSION['limite'] = 9;
}

$limite = isset($_SESSION['limite']) ? $_SESSION['limite'] : 9; // Se Session não está setado, o valor atribuido a ele será 9

$inicio = ($pagina * $limite) - $limite;

if (isset($_GET["Marca"])) {
    $marca = $_GET["Marca"];
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
WHERE Marca = '$marca'
    LIMIT $inicio, $limite";


    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
    $quantidade = $sql_query->num_rows;


    if ($quantidade > 0) {
        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['resultados'] = array();
        while ($result = $sql_query->fetch_assoc()) {
            $_SESSION['resultados'][] = $result;
        }

        // $_SESSION['idIden'] = $result['idIden'];
        // $_SESSION['urlCarro'] = $result['urlCarro'];
        // $_SESSION['nomeCarro'] = $result['nomeCarro'];
        // $_SESSION['estilo'] = $result['estilo'];
        // $_SESSION['orcamento'] = $result['orcamento'];
        // $_SESSION['combustivel'] = $result['combustivel'];
        // $_SESSION['capacidade'] = $result['capacidade'];
        // $_SESSION['tipoUso'] = $result['tipoUso'];


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
            if (isset($_SESSION['resultados']) && !empty($_SESSION['resultados'])) {
                // Loop através dos resultados e exibe as informações de cada carro
                foreach ($_SESSION['resultados'] as $carro) {
                    echo '<div class="card-recomendation">';
                    echo '<div class="box-image">';
                    echo '<img src="' . $carro['urlCarro'] . $carro['idIden'] . '.png" alt="">';
                    echo '</div>';
                    echo '<div class="title-card-recomendation">' . $carro['nome'] . '</div>';
                    echo '<div class="price">R$ ' . $carro['orcamento'] . '</div>';
                    echo '<div class="box-info">';
                    echo '<div class="info">';
                    echo '<img src="../icons/fuel-recomendation.svg" alt="">';
                    echo '<p>' . $carro['combustivel'] . '</p>';
                    echo '</div>';
                    echo '<div class="info">';
                    echo '<img src="../icons/passenger-recomendation.svg" alt="">';
                    echo '<p>' . $carro['capacidade'] . ' Passageiros</p>';
                    echo '</div>';
                    echo '<div class="info">';
                    echo '<img src="../icons/use-recomendation.svg" alt="">';
                    echo '<p>' . $carro['tipoUso'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="saiba-mais-recomendation">';
                    echo '<a href="car_info.php?id=' . $carro['idIden'] . '">Saiba mais</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '
                <div class="NoCar">
                    <h1>Nenhum carro encontrado</h1>
                </div>
                ';
            }
            ?>
        </div>
    </div>
</section>


        <div class="pagination">
            <div class="box-pagination">
                <?php
                $lim_pag = 4;
                $consulta = "SELECT * FROM identificador WHERE Marca = '$marca'";
                $result = $mysqli->query($consulta);
                $total_registros = $result->num_rows;
                $total_paginas = Ceil($total_registros / $limite);
                $inicio = ((($pagina - $lim_pag) > 1) ? $pagina - $lim_pag : 1);
                $fim = ((($pagina + $lim_pag) < $total_paginas) ? $pagina + $lim_pag : $total_paginas);

                echo '<p align="center">';


                if ($total_registros >= $limite) {
                    if ($pagina > 1) {
                        echo '<a href="filtered_catalog.php">Página Inicial</a> ';
                        echo "\t";
                    }
                    if ($total_paginas > 1 && $pagina <= $total_paginas) {
                        for ($i = $inicio; $i <= $fim; $i++) {
                            if ($pagina == $i) {
                                echo " " . $i . " ";
                            } else {
                                echo '<a href="filtered_catalog.php?pag=' . $i . '"> ' . $i . '</a>';
                            }
                        }
                    }
                    if ($pagina != $total_paginas) {
                        echo "\t";
                        echo '<a href="filtered_catalog.php?pag=' . $total_paginas . '"> Última página</a>';
                    }
                } else




                    echo '</p>';
                session_destroy();
                ?>
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
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book.
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