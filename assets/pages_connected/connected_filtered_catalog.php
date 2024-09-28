<?php
include('connection_carsgt.php');
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

if (isset($_GET['Marca'])) {
    $MarcaALL = $_GET['Marca'];
}



$allCars = "SELECT 
    marca.marca,
    marca.idMarca,
    modelo.nomeCarro,
    modelo.CodModelo,
    modelo.idModelo,
    modelo.codigoAno,
    versao.nomeVersao,
    versao.ano
FROM 
    marca
INNER JOIN 
    modelo ON marca.idMarca = modelo.idMarca
INNER JOIN 
    versao ON modelo.idModelo = versao.idVersao
WHERE marca.idMarca = $MarcaALL";
$searchALL = $finalDATA->query($allCars);
$qtdALL = $searchALL->num_rows;



    
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
    <div class="container">
        <header>
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

    <section class="recomendation">
    <div class="container">
        
        <div class="grid-recomendation">
        <?php
                    if ($qtdALL > 0) {
                        if (!isset($_SESSION)) {
                            session_start();
                        }
                        $_SESSION['searchALL'] = array();
                        while ($search = $searchALL->fetch_assoc()) {
                            $_SESSION['searchALL'][] = $search;
                        }
                        foreach ($_SESSION['searchALL'] as $modelo) {

                            echo '<div class="card-recomendation">';
                            echo '<form action="connected_car_specification.php" method="get">';
                            echo '<div class="box-image">';
                            echo '<img src="../car_images/'.$modelo['idModelo'].'.png" alt="">';
                            echo '</div>';
                    
                            echo '<div class="title-card-recomendation">';
                            echo $modelo['nomeCarro'] . '<br>';
                            echo '</div>';
                    
                            $brand = "SELECT marca FROM marca WHERE idMarca = $MarcaALL";
                            $brand = $finalDATA->query($brand);
                            $_SESSION['brand'] = array();
                            while ($brandspec = $brand->fetch_assoc()) {
                                $_SESSION['brand'][] = $brandspec;
                            }
                    

                            echo '<div class="marca-modelo">' .  $modelo['marca'] . '</div>';
                    

                            echo '<div class="saiba-mais-recomendation">';
                    


                            echo '<div class="ano-modelo">Ano: ' . $modelo['ano'] . '</div>'; 
                    

                           
                            echo '<input type="hidden" name="Marca" value="' . $modelo['idMarca'] . '">';
                            echo '<input type="hidden" name="Modelo" value="' . $modelo['idModelo'] . '">';
                            echo '<input type="hidden" name="CodModelo" value="' . $modelo['CodModelo'] . '">';
                            echo '<input type="hidden" name="Ano" value="' . $modelo['ano'] . '">';
                            echo '<input type="hidden" name="codAno" value="' . $modelo['codigoAno'] . '">';
                            echo '<button type="submit" class="btn-catalog">Saiba mais</button>';
                            echo '</div>';
                    
                            echo '</form>';
                            echo '</div>';
                            
                    
                            // $idModelo = $modelo['Id'];
                            // $idMarca = $modelo['codigoMarca'];
                            // $nomeCarro = $modelo['nome'];
                            // $codModelo = $modelo['codigoModelo'];
                            // $codAno  = $modelo['codigoAno'];
                            // $access = "
                            // SET FOREIGN_KEY_CHECKS=1;";
                            //                             $accessQr = $finalDATA->query($access);
                            
                            // $sql_code3 = "INSERT INTO versao (idVersao, idModelo, nomeVersao, ano) VALUES ('$idModelo',$codModelo,'$nomeCarro',$codAno)";
                            // $sql_query4 = $finalDATA->query($sql_code3) or die("Falha na execução do código SQL: " . $finalDATA->error);


                        }
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
            unset($_SESSION['resultados']);
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