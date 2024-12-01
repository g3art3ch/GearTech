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
    versao.ano,
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
marca.idMarca = $Marca and modelo.idModelo = $Modelo and (recursos.ano = $Ano or (versao.ano = $Ano) or modelo.codigoAno = '$CodAno')";

$carSpec = $finalDATA->query($carSpecConsult);
foreach ($_SESSION['carSpec'] as $final) {
    $marcaMarca = $final['marca'];
    $idMarca = $final['idMarca'];
    $nomeCarro = $final['nomeCarro'];
    $CodModelo = $final['CodModelo'];
    $codigoAno = $final['codigoAno'];
    $idModelo = $final['idModelo'];
    $anoVersao = $final['ano'];
    $anoRecursos = $final['ano'];
    $propulsao = $final['propulsao'];
    $combustivel = $final['combustivel'];
    $preco = $final['preco'];
    $desvalorizacao = $final['desvalorizacao'];
    $garantia = $final['garantia'];
    $seguro = $final['seguro'];
    $ipva = $final['ipva'];
    $vendasOutubro = $final['vendas_outubro'];
    $revisoesAte60k = $final['revisoes_ate_60k'];
    $indiceCnw = $final['indice_cnw'];
    $rankingCnw = $final['ranking_cnw'];
    $velocidadeMaxima = $final['velocidade_maxima'];
    $aceleracao0100 = $final['aceleracao_0_100'];
    $potenciaMaxima = $final['potencia_maxima'];
    $torqueMaximo = $final['torque_maximo'];
    $regimePotenciaMaxima = $final['regime_potencia_maxima'];
    $regimeTorqueMaximo = $final['regime_torque_maximo'];
    $pesoPotencia = $final['peso_potencia'];
    $potenciaEspecifica = $final['potencia_especifica'];
    $pesoTorque = $final['peso_torque'];
    $torqueEspecifico = $final['torque_especifico'];
    $consumoUrbano = $final['consumo_urbano'];
    $consumoRodoviario = $final['consumo_rodoviario'];
    $tanqueCombustivel = $final['tanque_combustivel'];
    $autonomiaUrbana = $final['autonomia_urbana'];
    $autonomiaRodoviaria = $final['autonomia_rodoviaria'];
    $comprimento = $final['comprimento'];
    $largura = $final['largura'];
    $altura = $final['altura'];
    $distanciaEntreEixos = $final['distancia_entre_eixos'];
    $bitolaDianteira = $final['bitola_dianteira'];
    $bitolaTraseira = $final['bitola_traseira'];
    $flancoPneuDianteiro = $final['flanco_pneu_dianteiro'];
    $flancoPneuTraseiro = $final['flanco_pneu_traseiro'];
    $alturaMinimaSolo = $final['altura_minima_solo'];
    $portaMalas = $final['porta_malas'];
    $diametroMinimoGiro = $final['diametro_minimo_giro'];
    $coeficienteArrasto = $final['coeficiente_arrasto'];
    $areaFrontal = $final['area_frontal'];
    $areaFrontalCorrigida = $final['area_frontal_corrigida'];
    $cargaUtil = $final['carga_util'];
    $reboqueSemFreio = $final['reboque_sem_freio'];
    $reboqueComFreio = $final['reboque_com_freio'];
    $peso = $final['peso'];
    $instalacaoMotor = $final['instalacao_motor'];
    $disposicaoMotor = $final['disposicao_motor'];
    $codigoMotor = $final['codigo_motor'];
    $cilindros = $final['cilindros'];
    $tuchos = $final['tuchos'];
    $diametroCilindro = $final['diametro_cilindro'];
    $cursoPistao = $final['curso_pistao'];
    $cilindradaUnitaria = $final['cilindrada_unitaria'];
    $deslocamento = $final['deslocamento'];
    $razaoCompressao = $final['razao_compressao'];
    $rotacaoMaxima = $final['rotacao_maxima'];
    $viscosidadeOleoMotor = $final['viscosidade_oleo_motor'];
    $valvulasPorCilindro = $final['valvulas_por_cilindro'];
    $comandoValvulas = $final['comando_valvulas'];
    $acionamentoComando = $final['acionamento_comando'];
    $variacaoComando = $final['variacao_comando'];
    $aspiracao = $final['aspiracao'];
    $alimentacao = $final['alimentacao'];
    $cambio = $final['cambio'];
    $marchas = $final['marchas'];
    $codigoCambio = $final['codigo_cambio'];
    $acoplamento = $final['acoplamento'];
    $tracao = $final['tracao'];
    $suspensaoDianteira = $final['suspensao_dianteira'];
    $elementoElasticoDianteiro = $final['elemento_elastico_dianteiro'];
    $suspensaoTraseira = $final['suspensao_traseira'];
    $elementoElasticoTraseiro = $final['elemento_elastico_traseiro'];
    $freiosDianteiros = $final['freios_dianteiros'];
    $freiosTraseiros = $final['freios_traseiros'];
    $direcao = $final['direcao'];
    $pneusDianteiros = $final['pneus_dianteiros'];
    $pneusTraseiros = $final['pneus_traseiros'];
    $estepe = $final['estepe'];
    $procedencia = $final['procedencia'];
    $configuracao = $final['configuracao'];
    $geracao = $final['geracao'];
    $plataforma = $final['plataforma'];
    $serie = $final['serie'];
    $porte = $final['porte'];
    $lugares = $final['lugares'];
    $portas = $final['portas'];
}


if (!isset($_SESSION)) {
    session_start();
}
$_SESSION['carSpec'] = array();
while ($searchf = $carSpec->fetch_assoc()) {
    $_SESSION['carSpec'][] = $searchf;
}

$nomeUSER = $_SESSION['nomeUsuario'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/main/main.css">
    <link rel="stylesheet" href="../css/main/header.css">
    <link rel="stylesheet" href="../css/main/footer.css">
    <link rel="stylesheet" href="../css/recomendation.css">
    <link rel="stylesheet" href="../css/catalog.css">
    <link rel="stylesheet" href="../css/car-specification.css">
    <link rel="shortcut icon" href="../icons/logo.ico" type="image/x-icon">
    <title>Especificações</title>

    <style>
        .swal2-popup {
            border-radius: 15x;

        }

        .custom-title {
            font-size: 24px;
            font-weight: 600;
        }
    </style>
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

        <?php 
        if(isset($_GET['insert'])){
            echo '<script type="text/javascript">
             
        Swal.fire({
            position: "top",
            icon: "warning",
            iconColor: "#C23A42",
            title: "Carro já inserido",
            html: `<p style="font-size: 17px; margin="0px"">Este carro já está na sua lista de salvos.</p>`,
                showConfirmButton: false,
            width: "27rem",
            showCloseButton: true,
            background: "#fafafa",
            color: "#000",
            customClass: {
                title: "custom-title",
            }
        });
    
        </script>';
    }
        ?>



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
                        echo "<span>" . $final['marca'] . "&nbsp;&nbsp;" . $final['nomeCarro'] . "</span><br><br>";



                        ?>
                        </h2>
                    </div>
                    <div class="FAVORITE_BUTTON">
                        <form method="post" action="insert.php">
                            <!-- ID do carro e outros dados importantes -->
                            <input type="hidden" name="IdModelo" value="<?php echo $final['idModelo'] ; ?>">
                            <input type="hidden" name="nomeCarro" value="<?php echo $final['nomeCarro']; ?>">
                            <input type="hidden" name="MarcaCarro" value="<?php echo $final['idMarca']; ?>">
                            <input type="hidden" name="CodModelo" value="<?php echo $final['CodModelo']; ?>">
                            <input type="hidden" name="codigoAno" value="<?php echo $final['codigoAno']; ?>">
                            <input type="hidden" name="ano" value="<?php echo $Ano; ?>">


                            <!-- Botão de Favoritar -->
                            <button type="submit" name="FavButton" class="FavButton">Salvar veículo</button>
                        </form>

                        <!-- Formulário de Desfavoritar -->
                        <form method="GET" action="remove.php">
                            <!-- ID do carro para desfavoritar -->
                            <input type="hidden" name="Marca" value="<?php echo $_GET['Marca']; ?>">
                            <input type="hidden" name="Modelo" value="<?php echo $_GET['Modelo']; ?>">
                            <input type="hidden" name="CodModelo" value="<?php echo $_GET['CodModelo']; ?>">
                            <input type="hidden" name="Ano" value="<?php echo $_GET['Ano']; ?>">
                            <input type="hidden" name="codAno" value="<?php echo $_GET['codAno']; ?>">

                            <!-- Botão de Desfavoritar -->
                            <button type="submit" class="UnfavButton">Remover veículo</button>
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
                                    <a href="financiamento.php?Val='<?php echo $setVehicle['Valor']; ?>'">Simular
                                        financiamento</a>
                                </div>

                            </div>

                            <div class="card-technology-specification none-mobile">
                                <h2>Manutenções e revisões</h2>
                                <table>
                                    <tr>
                                        <td>Seguro</td>
                                        <td>
                                            <p>R$ <?php echo $final['seguro'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>IPVA</td>
                                        <td>
                                            <p>R$ <?php echo $final['ipva'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Desvalorização</td>
                                        <td>
                                            <p><?php echo $final['desvalorizacao'] ?>%</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Garantia</td>
                                        <td>
                                            <p><?php echo $final['garantia'] ?> anos</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Revisões até 60.000 km</td>
                                        <td>
                                            <p><?php echo $final['revisoes_ate_60k'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Consumo urbano (Gasolina)</td>
                                        <td>
                                            <p><?php echo $final['consumo_urbano'] ?> Km/L</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Consumo rodoviário (Gasolina)</td>
                                        <td>
                                            <p><?php echo $final['consumo_rodoviario'] ?> Km/L</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Consumo urbano (Álcool)</td>
                                        <td>
                                            <p><?php echo $final['consumo_urbano'] ?> Km/L</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Consumo rodoviário (Álcool)</td>
                                        <td>
                                            <p><?php echo $final['consumo_rodoviario'] ?> Km/L</p>
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
                                        <td>Carroceria</td>
                                        <td>
                                            <p><?php echo $final['configuracao'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ano</td>
                                        <td>
                                            <p><?php echo $final['ano'] ?></p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Preço</td>
                                        <td>
                                            <p><?php echo $setVehicle['Valor']; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Combustível</td>
                                        <td>
                                            <p><?php echo $final['combustivel'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Direção </td>
                                        <td>
                                            <p><?php echo $final['direcao'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Câmbio</td>
                                        <td>
                                            <p><?php echo $final['cambio'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Marchas</td>
                                        <td>
                                            <p><?php echo $final['marchas'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cilindros</td>
                                        <td>
                                            <p><?php echo $final['cilindros'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Peso/Potência</td>
                                        <td>
                                            <p><?php echo $final['peso_potencia'] ?> Kg/Hp</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Velocidade máxima</td>
                                        <td>
                                            <p><?php echo $final['velocidade_maxima'] ?> Km/h</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Porta-malas</td>
                                        <td>
                                            <p><?php echo $final['porta_malas'] ?> L</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tração</td>
                                        <td>
                                            <p><?php echo $final['tracao'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lugares</td>
                                        <td>
                                            <p><?php echo $final['lugares'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Portas</td>
                                        <td>
                                            <p><?php echo $final['portas'] ?></p>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        <div class="card-technology-specification flex-mobile">
                        <h2>Manutenções e revisões</h2>
                        <table>
                                    <tr>
                                        <td>Seguro</td>
                                        <td>
                                            <p>R$ <?php echo $final['seguro'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>IPVA</td>
                                        <td>
                                            <p>R$ <?php echo $final['ipva'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Desvalorização</td>
                                        <td>
                                            <p><?php echo $final['desvalorizacao'] ?>%</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Garantia</td>
                                        <td>
                                            <p><?php echo $final['garantia'] ?> anos</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Revisões até 60.000 km</td>
                                        <td>
                                            <p><?php echo $final['revisoes_ate_60k'] ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Consumo urbano (Gasolina)</td>
                                        <td>
                                            <p><?php echo $final['consumo_urbano'] ?> Km/L</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Consumo rodoviário (Gasolina)</td>
                                        <td>
                                            <p><?php echo $final['consumo_rodoviario'] ?> Km/L</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Consumo urbano (Álcool)</td>
                                        <td>
                                            <p><?php echo $final['consumo_urbano'] ?> Km/L</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Consumo rodoviário (Álcool)</td>
                                        <td>
                                            <p><?php echo $final['consumo_rodoviario'] ?> Km/L</p>
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