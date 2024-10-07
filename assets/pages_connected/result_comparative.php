<?php
include('connection.php');
include('protect.php');
include('connection_favorite.php');
include('connection_carsgt.php');

$nomeUSER = $_SESSION['nomeUsuario'];


function searchRECS($marca, $modelo, $ano)
{
    include('connection_carsgt.php');
    $searchQUERY = "SELECT 
    marca.marca,
    marca.idMarca,
    modelo.nomeCarro,
    modelo.CodModelo,
    modelo.codigoAno,
    modelo.idModelo,
    recursos.ano,
    recursos.propulsao,
    recursos.combustivel,
    recursos.preco,
    recursos.desvalorizacao,
    recursos.garantia,
    recursos.seguro,
    recursos.ipva,
    recursos.vendas_outubro,
    recursos.revisoes_ate_60k,
    recursos.indice_cnw,
    recursos.ranking_cnw,
    recursos.velocidade_maxima,
    recursos.aceleracao_0_100,
    recursos.potencia_maxima,
    recursos.torque_maximo,
    recursos.regime_potencia_maxima,
    recursos.regime_torque_maximo,
    recursos.peso_potencia,
    recursos.potencia_especifica,
    recursos.peso_torque,
    recursos.torque_especifico,
    recursos.consumo_urbano,
    recursos.consumo_rodoviario,
    recursos.tanque_combustivel,
    recursos.autonomia_urbana,
    recursos.autonomia_rodoviaria,
    recursos.comprimento,
    recursos.largura,
    recursos.altura,
    recursos.distancia_entre_eixos,
    recursos.bitola_dianteira,
    recursos.bitola_traseira,
    recursos.flanco_pneu_dianteiro,
    recursos.flanco_pneu_traseiro,
    recursos.altura_minima_solo,
    recursos.porta_malas,
    recursos.diametro_minimo_giro,
    recursos.coeficiente_arrasto,
    recursos.area_frontal,
    recursos.area_frontal_corrigida,
    recursos.carga_util,
    recursos.reboque_sem_freio,
    recursos.reboque_com_freio,
    recursos.peso,
    recursos.instalacao_motor,
    recursos.disposicao_motor,
    recursos.codigo_motor,
    recursos.cilindros,
    recursos.tuchos,
    recursos.diametro_cilindro,
    recursos.curso_pistao,
    recursos.cilindrada_unitaria,
    recursos.deslocamento,
    recursos.razao_compressao,
    recursos.rotacao_maxima,
    recursos.viscosidade_oleo_motor,
    recursos.valvulas_por_cilindro,
    recursos.comando_valvulas,
    recursos.acionamento_comando,
    recursos.variacao_comando,
    recursos.aspiracao,
    recursos.alimentacao,
    recursos.cambio,
    recursos.marchas,
    recursos.codigo_cambio,
    recursos.acoplamento,
    recursos.tracao,
    recursos.suspensao_dianteira,
    recursos.elemento_elastico_dianteiro,
    recursos.suspensao_traseira,
    recursos.elemento_elastico_traseiro,
    recursos.freios_dianteiros,
    recursos.freios_traseiros,
    recursos.direcao,
    recursos.pneus_dianteiros,
    recursos.pneus_traseiros,
    recursos.estepe,
    recursos.procedencia,
    recursos.configuracao,
    recursos.geracao,
    recursos.plataforma,
    recursos.serie,
    recursos.porte,
    recursos.lugares,
    recursos.portas
FROM 
    marca
LEFT JOIN 
    modelo ON marca.idMarca = modelo.idMarca
LEFT JOIN 
    versao ON modelo.idModelo = versao.idModelo
LEFT JOIN 
    recursos ON modelo.idModelo = recursos.idModelo
WHERE 
	marca.marca = ? and modelo.nomeCarro= ? and modelo.codigoAno = ?;";

    $stmt = $finalDATA->prepare($searchQUERY);
    $stmt->bind_param("ssi", $marca, $modelo, $ano);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();
    $finalDATA->close();

    return $data;

}




$url_atual = $_SERVER['REQUEST_URI'];
$palavra = 'marca_';
$palavraMODE = 'modelo_';
$contagem = substr_count($url_atual, $palavra);
$contagemMODE = substr_count($url_atual, $palavraMODE);


if (isset($_GET['marca_1'])) {
    $car1 = $_GET['marca_1'];
    $car1MODELO = $_GET['modelo_1'];
    $car1ANO = $_GET['ano_1'];
    $resultadosCar1 = searchRECS($car1, $car1MODELO, $car1ANO);
    if (count($resultadosCar1) === 0) {
        $resultadosCar1 = 0;
    }

}


if (isset($_GET['marca_2'])) {

    $car2 = $_GET['marca_2'];
    $car2MODELO = $_GET['modelo_2'];
    $car2ANO = $_GET['ano_2'];

    $resultadosCar2 = searchRECS($car2, $car2MODELO, $car2ANO);
    if (count($resultadosCar2) === 0) {
        $resultadosCar2 = 0;
    }
}


if (isset($_GET['marca_3'])) {
    $car3 = $_GET['marca_3'];
    $car3MODELO = $_GET['modelo_3'];
    $car3ANO = $_GET['ano_3'];
    $resultadosCar3 = searchRECS($car3, $car3MODELO, $car3ANO);
    if (count($resultadosCar3) === 0) {
        $resultadosCar3 = 0;
    }
}



if (isset($_GET['marca_4'])) {
    $car4 = $_GET['marca_4'];
    $car4MODELO = $_GET['modelo_4'];
    $car4ANO = $_GET['ano_4'];

    $resultadosCar4 = searchRECS($car4, $car4MODELO, $car4ANO);
    if (count($resultadosCar4) === 0) {
        $resultadosCar4 = 0;
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/main/main.css">
    <link rel="stylesheet" href="../css/main/header.css">
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/result-comparative.css">
    <link rel="stylesheet" href="../css/main/footer.css">
    <link rel="shortcut icon" href="/GearTech/assets/icons/logo.ico" type="image/x-icon">
    <title>Resultado do comparativo</title>
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

        <div class="result-comparative">
            <div class="container">
                <div class="title-result-comparative">
                    <h2>Comparativo dos veículos salvos</h2>
                </div>

                <div class="box-result-comparative">
                    <div class="grid-result-comparative">
                        <?php

                        for ($i = 1; $i <= $contagem; $i++) {

                            
                            if (isset(${'resultadosCar' . $i})) {
                                $resultadosCar = ${'resultadosCar' . $i};
                                if ($resultadosCar == 0) {
                                    ${'car' . $i . 'MODELO'} = $_GET['modelo_' . $i];
                                    echo '<div class="item-result-comparative">
                            <div class="card-image-result-comparative">
                                <div class="box-image-result-comparative">
                                    <img src="../car_images/35196.png" alt="">
                                    <h2>'.${'car' . $i . 'MODELO'}.'</h2>
                                    <h2>Sinto muito, ainda não temos informações sobre esse carro</h2>
                                </div>
                            </div>

                            <div class="card-table-result-comparative">
                                        <h2>Componentes mecânicos</h2>
                                        <div class="componentes-table-result-comparative">
                                            <label for="">Marca</label>
                                            <input type="text">
                                            <label for="">Modelo</label>
                                            <input type="text">
                                            <label for="">Carroceria</label>
                                            <input type="text">
                                            <label for="">Ano</label>
                                            <input type="text">
                                            <label for="">Preço</label>
                                            <input type="text">
                                            <label for="">Combustível</label>
                                            <input type="text">
                                            <label for="">Direção</label>
                                            <input type="text">
                                            <label for="">Câmbio</label>
                                            <input type="text">
                                            <label for="">Marchas</label>
                                            <input type="text">
                                            <label for="">Cilindros</label>
                                            <input type="text">
                                            <label for="">Peso/Potência</label>
                                            <input type="text">
                                            <label for="">Velocidade máxima</label>
                                            <input type="text">
                                            <label for="">Porta-malas</label>
                                            <input type="text">
                                            <label for="">Tração</label>
                                            <input type="text">
                                            <label for="">Lugares</label>
                                            <input type="text">
                                            <label for="">Portas</label>
                                            <input type="text">
                                        </div>
                                    </div>
        
                                    <div class="card-table-result-comparative">
                                        <h2>Manutenções e revisões</h2>
                                        <div class="componentes-table-result-comparative">
                                            <label for="">Seguro</label>
                                            <input type="text">
                                            <label for="">IPVA</label>
                                            <input type="text">
                                            <label for="">Desvalorização</label>
                                            <input type="text">
                                            <label for="">Garantia</label>
                                            <input type="text">
                                            <label for="">Revisões até 60.000 km</label>
                                            <input type="text">
                                            <label for="">Consumo urbano (Gasolina)</label>
                                            <input type="text">
                                            <label for="">Consumo rodoviário (Gasolina)</label>
                                            <input type="text">
                                            <label for="">Consumo urbano (Álcool)</label>
                                            <input type="text">
                                            <label for="">Consumo rodoviário (Álcool)</label>
                                            <input type="text">
                                        </div>
                                    </div>
                                </div>

                           ';
                                
                                } else {
                                    foreach ($resultadosCar as $resc) {
                                        echo '<div class="item-result-comparative">
                                    <div class="card-image-result-comparative">
                                        <div class="box-image-result-comparative">
                                            <img src="../car_images/35196.png" alt="">
                                            <h2>' . $resc['nomeCarro'] . '</h2>
                                        </div>
                                    </div>
        
                                    <div class="card-table-result-comparative">
                                        <h2>Componentes mecânicos</h2>
                                        <div class="componentes-table-result-comparative">
                                            <label for="">Marca</label>
                                            <input type="text" value="'.$resc['marca'].'">
                                            <label for="">Modelo</label>
                                            <input type="text" value="'.$resc['nomeCarro'].'">
                                            <label for="">Carroceria</label>
                                            <input type="text" value="'.$resc['configuracao'].'">
                                            <label for="">Ano</label>
                                            <input type="text" value="'.$resc['ano'].'">
                                            <label for="">Preço</label>
                                            <input type="text" value="R$ '.$resc['preco'].'">
                                            <label for="">Combustível</label>
                                            <input type="text" value="'.$resc['combustivel'].'">
                                            <label for="">Direção</label>
                                            <input type="text" value="'.$resc['direcao'].'">
                                            <label for="">Câmbio</label>
                                            <input type="text" value="'.$resc['cambio'].'">
                                            <label for="">Marchas</label>
                                            <input type="text" value="'.$resc['marchas'].'">
                                            <label for="">Cilindros</label>
                                            <input type="text" value="'.$resc['cilindros'].'">
                                            <label for="">Peso/Potência</label>
                                            <input type="text" value="'.$resc['peso_potencia'].' Kg/Hp">
                                            <label for="">Velocidade máxima</label>
                                            <input type="text" value="'.$resc['velocidade_maxima'].' Km/h">
                                            <label for="">Porta-malas</label>
                                            <input type="text" value="'.$resc['porta_malas'].' L">
                                            <label for="">Tração</label>
                                            <input type="text" value="'.$resc['tracao'].'">
                                            <label for="">Lugares</label>
                                            <input type="text" value="'.$resc['lugares'].'">
                                            <label for="">Portas</label>
                                            <input type="text" value="'.$resc['portas'].'">
                                        </div>
                                    </div>
        
                                    <div class="card-table-result-comparative">
                                        <h2>Manutenções e revisões</h2>
                                        <div class="componentes-table-result-comparative">
                                            <label for="">Seguro</label>
                                            <input type="text" value="R$ '.$resc['seguro'].'">
                                            <label for="">IPVA</label>
                                            <input type="text" value="R$ '.$resc['ipva'].'">
                                            <label for="">Desvalorização</label>
                                            <input type="text" value="'.$resc['desvalorizacao'].'">
                                            <label for="">Garantia</label>
                                            <input type="text" value="'.$resc['garantia'].' anos">
                                            <label for="">Revisões até 60.000 km</label>
                                            <input type="text" value="'.$resc['revisoes_ate_60k'].'">
                                            <label for="">Consumo urbano (Gasolina)</label>
                                            <input type="text" value="'.$resc['consumo_urbano'].'">
                                            <label for="">Consumo rodoviário (Gasolina)</label>
                                            <input type="text" value="'.$resc['consumo_rodoviario'].'">
                                            <label for="">Consumo urbano (Álcool)</label>
                                            <input type="text" value="'.$resc['consumo_urbano'].'">
                                            <label for="">Consumo rodoviário (Álcool)</label>
                                            <input type="text" value="'.$resc['consumo_rodoviario'].'">
                                        </div>
                                    </div>
                                </div>';
                                    }
                                }
                            }
                        }

                        ?>
                    </div>
                </div>
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
</body>

</html>