<?php 
include('protect.php');
include('connection_favorite.php');
include('connection_cars.php');

$sql_code1 = "SELECT * FROM favorites";
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
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/comparative.css">
    <link rel="stylesheet" href="../css/main/footer.css">
    <link rel="shortcut icon" href="/GearTech/assets/icons/logo.ico" type="image/x-icon">
    <title>Comparativo</title>
</head>
<body>
<main>
    <div class="container">
        <header>
        <div class="area">
            <div class="logo">
                <a href="/GearTech/assets/pages_connected/connected.php">
                    <img src="/GearTech/assets/images/logo.svg" alt="Logo" />    
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
                        <a href="user.php">
                            <img src="/GearTech/assets/icons/user.svg" alt="Usuário">
                            <a href="user.php" class="login-account"><?php echo $_SESSION['nomeUsuario']; ?></a>
                        </a>
                    </div>
    
                </li>
            </ul>
        </nav>
    </header>
    </div>

    <section class="comparative">
        <div class="container">
            <div class="title-comparative">
                <h2>Comparativo de seus favoritos</h2>
            </div>

            <div class="card-comparative">
                <div class="grid-comparative">
                    <?php
                    
                if ($quantidade > 1) {
                                if (!isset($_SESSION)) {
                                    session_start();
                                }
                                $_SESSION['resultados'] = array();
                                while ($result = $sql_query2->fetch_assoc()) {
                                    $_SESSION['resultados'][] = $result;
                                }


                                $carCOUNT = 1;

                                foreach ($_SESSION['resultados'] as $results) {
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
$quantidade1 = $sql_query->num_rows;
$_SESSION['FAVORITES'] = array();
while ($resultFAVORITES = $sql_query->fetch_assoc()) {
    $_SESSION['FAVORITES'][] = $resultFAVORITES;
}


echo '<div class="item-comparative">';
                foreach ($_SESSION['FAVORITES'] as $fav) {
                    
                    echo '    <h2>'. $carCOUNT .'</h2>';
                    $carCOUNT++;

                    //add foreach com opcoes de marca
                    echo '    <label for="">Marca</label>';
                    foreach($_SESSION['resultados'] as $resultados){
                    echo '    <select name="" id="">';
                    echo '        <option value="">'. $resultados['marca'] .'</option>';
                    echo '    </select>';
                    }

                    //add foreach com opcoes de modelo
                    echo '    <label for="">Modelo</label>';
                //     foreach(){
                //     echo '    <select name="" id="">';
                //     echo '        <option value=""></option>';
                //     echo '    </select>';
                // }


                    //add foreach com opcoes de ano
                    // foreach(){
                    // echo '    <label for="">Ano</label>';
                    // echo '    <select name="" id="">';
                    // echo '    <option value=""></option>';
                    // echo '</select>';
                    // }

                    echo '</div>';
                                }
                            }

                        }else


                        //formatar a informação abaixo com os padroes ZNfront
                        echo 'adicione pelo menos mais um carro';

                            ?>
                    
                        
                    <!--formar de forma que o botão tenha a posição fixa embaixo, ou fixa em outro lugar, se a qtd de carros < 4, a disposicao do botao fica perereca feia -->
                <div class="button-comparative">
                    <a href="./result_comparative.php"><button>Comparar</button></a>
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
                    <p>Nós da GearTech compartilhamos nosso gosto por carros e somos dedicados a simplificar sua jornada de compra. Valorizamos a transparência e a confiabilidade, proporcionando a você a melhor escolha da sua vida.
                    </p>
                </div>
            </div>
            <div class="copy">
                <a href="">© GearTech - Todos os direitos reservados</a>
            </div>
        </div>
    </footer>

<script src="/GearTech/assets/js/script.js"></script>
</body>
</html>