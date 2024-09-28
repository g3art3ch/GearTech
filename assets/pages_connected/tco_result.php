<?php
// Recebendo os dados do formulário
$valor_aquisicao = $_POST['valor_aquisicao'];
$valor_hoje = $_POST['valor_hoje'];
$seguro_valor = $_POST['seguro_valor'];
$seguro_periodo = $_POST['seguro_periodo'];

$credito = $_POST['credito'];
$valor_prestacao = $credito == 'sim' ? $_POST['valor_prestacao'] : 0;

$vistoria_num = $_POST['vistoria_num'];
$vistoria_custo = $vistoria_num > 0 ? $_POST['vistoria_num'] : 0;

$ipva_total = $_POST['ipva_total'];
$manutencao_preventiva = $_POST['manutencao_preventiva'];

$combustivel_valor = $_POST['combustivel_valor'];
$combustivel_periodo = $_POST['combustivel_periodo'];

$reparacoes = $_POST['reparacoes'];
$estacionamento = $_POST['estacionamento'];

$pedagio_valor = $_POST['pedagio_valor'];
$pedagio_periodo = $_POST['pedagio_periodo'];

$multas_valor = $_POST['multas_valor'];
$multas_periodo = $_POST['multas_periodo'];

$lavagem_valor = $_POST['lavagem_valor'];
$lavagem_periodo = $_POST['lavagem_periodo'];

$transporte_publico = $_POST['transporte_publico'];
$rendimento_anual = $_POST['rendimento_anual'];
$km_mes = $_POST['km_mes'];

// Cálculo da depreciação mensal
// Supondo que 'data_aquisicao' está no formato 'YYYY-MM'
$data_aquisicao = $_POST['data_aquisicao'];

// Pega o mês atual e o ano atual
$data_atual = new DateTime(); // Pega a data atual (hoje)
$data_aquisicao = new DateTime($data_aquisicao . '-01'); // Cria um objeto de data a partir da data de aquisição (dia 1 do mês)

// Calcula a diferença entre as datas em meses
$intervalo = $data_aquisicao->diff($data_atual);
$meses_passados = ($intervalo->y * 12) + $intervalo->m; // Converte a diferença em anos para meses e soma com os meses de diferença

// Verifica se os meses são maiores que 0 para evitar divisão por zero
if ($meses_passados > 0) {
    // Cálculo da depreciação mensal
    $depreciacao = ($valor_aquisicao - $valor_hoje) / $meses_passados;
} else {
    $depreciacao = 0; // Caso a aquisição seja no mesmo mês, a depreciação é zero
}

// Agora você tem a depreciação correta calculada em $depreciacao



// Cálculo do seguro mensal
switch ($seguro_periodo) {
    case 'mensal':
        $seguro_mensal = $seguro_valor;
        break;
    case 'trimestral':
        $seguro_mensal = $seguro_valor / 3;
        break;
    case 'semestral':
        $seguro_mensal = $seguro_valor / 6;
        break;
    case 'anual':
        $seguro_mensal = $seguro_valor / 12;
        break;
}

// Cálculo do tempo desde a aquisição (usando o cálculo dos meses passados)
$data_aquisicao = $_POST['data_aquisicao']; // Exemplo: "09-2020"

$data_atual = new DateTime(); // Data atual
$data_aquisicao = new DateTime($data_aquisicao . '-01');
$intervalo = $data_aquisicao->diff($data_atual);
$meses_passados = ($intervalo->y * 12) + $intervalo->m; // Converte anos para meses e soma os meses

// Verifica se meses_passados é maior que 0
if ($meses_passados > 0) {
    // Cálculo da vistoria proporcional ao tempo de aquisição
    $vistoria_total = ($vistoria_custo * $vistoria_num) / $meses_passados;
} else {
    $vistoria_total = 0; // Caso seja o mesmo mês de aquisição, o custo da vistoria é zero
}

// Cálculo dos custos fixos
$custos_fixos = $depreciacao + $seguro_mensal + $valor_prestacao + $vistoria_total + ($ipva_total / 12) + ($manutencao_preventiva / 24);


// Conversão do combustível para mensal
switch ($combustivel_periodo) {
    case 'mes':
        $combustivel_mes = $combustivel_valor;
        break;
    case 'trimestre':
        $combustivel_mes = $combustivel_valor / 3;
        break;
    case 'semestre':
        $combustivel_mes = $combustivel_valor / 6;
        break;
    case 'ano':
        $combustivel_mes = $combustivel_valor / 12;
        break;
}

// Conversão do pedágio para mensal
switch ($pedagio_periodo) {
    case 'dia':
        $pedagio_mes = $pedagio_valor * 30;
        break;
    case 'mes':
        $pedagio_mes = $pedagio_valor;
        break;
    case 'trimestre':
        $pedagio_mes = $pedagio_valor / 3;
        break;
    case 'semestre':
        $pedagio_mes = $pedagio_valor / 6;
        break;
    case 'ano':
        $pedagio_mes = $pedagio_valor / 12;
        break;
}

// Conversão das multas para mensal
switch ($multas_periodo) {
    case 'mes':
        $multas_mes = $multas_valor;
        break;
    case 'trimestre':
        $multas_mes = $multas_valor / 3;
        break;
    case 'semestre':
        $multas_mes = $multas_valor / 6;
        break;
    case 'ano':
        $multas_mes = $multas_valor / 12;
        break;
}

// Conversão das lavagens para mensal
switch ($lavagem_periodo) {
    case 'mes':
        $lavagem_mes = $lavagem_valor;
        break;
    case 'trimestre':
        $lavagem_mes = $lavagem_valor / 3;
        break;
    case 'semestre':
        $lavagem_mes = $lavagem_valor / 6;
        break;
    case 'ano':
        $lavagem_mes = $lavagem_valor / 12;
        break;
}

// Cálculo dos custos variáveis
$custos_variaveis = $combustivel_mes + ($manutencao_preventiva / 24) + ($reparacoes / 12) + $estacionamento + $pedagio_mes + $multas_mes + $lavagem_mes;

// Cálculo do TCO total
$total_tco = $custos_fixos + $custos_variaveis;

?>

<?php
include('connection.php');
include('protect.php');
include('connection_favorite.php');
include('connection_cars.php');

$nomeUSER = $_SESSION['nomeUsuario'];

$sql_code1 = "SELECT * FROM favorites WHERE favoriteUSER = '$nomeUSER'";
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
    <link rel="stylesheet" href="../css/saved-vehicle.css">
    <link rel="stylesheet" href="../css/main/footer.css">
    <link rel="stylesheet" href="../css/calculadora-tco.css">
    <link rel="stylesheet" href="../js/slick/slick.css">
    <link rel="stylesheet" href="../js/slick/slick-theme.css">
    <script src="../js/script.js"></script>


    <link rel="shortcut icon" href="../icons/logo.ico" type="image/x-icon">
    <title>Minha conta</title>
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
                        <li class="dropdown">
                            <div class="user-enter">
                                <img src="/GearTech/assets/icons/user.svg" alt="" class="user-photo">
                                <a href="#" class="login-account"><?php echo $_SESSION['nomeUsuario']; ?></a>
                                <img src="/GearTech/assets/icons/dowm-arrow.svg" alt="" onclick="toggleDropdown()">
                            </div>
                            <ul class="dropdown-menu">
                                <li><a href="./user.php">Dados pessoais</a></li>
                                <li><a href="/GearTech/index.php">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>


        <section class="result-calculadora-tco">
            <div class="container">
                <div class="resultado-tco">
                    <div class="title-resultado-tco">
                        <h2>Custo para manter o seu veículo de acordo com a nossa <br> <span>calculadora TCO</span> </h2>
                    </div>

                    <div class="grid-resultado-tco">
                        <div class="card-resultado" id="custos-fixos-resultado">
                            <h2>Custos Fixos (por mês)</h2>
                            <table >
                                <tr>
                                    <td>Depreciação do veículo</td>
                                    <td>R$ <?= number_format($depreciacao, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Seguro</td>
                                    <td>R$ <?= number_format($seguro_mensal, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Crédito automóvel</td>
                                    <td>R$ <?= number_format($valor_prestacao, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Vistoria automóvel</td>
                                    <td>R$ <?= number_format($vistoria_total, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>IPVA, DPVAT e licenciamento</td>
                                    <td>R$ <?= number_format($ipva_total / 12, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>50% Manutenção preventiva</td>
                                    <td>R$ <?= number_format($manutencao_preventiva / 24, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td class="table-red"><strong>Total</strong></td>
                                    <td class="table-red"><strong>R$ <?= number_format($custos_fixos, 2, ',', '.') ?></strong></td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-resultado">
                            <h2>Custos Variáveis (por mês)</h2>
                            <table >
                                <tr>
                                    <td>Combustíveis</td>
                                    <td>R$ <?= number_format($combustivel_mes, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>50% Manutenção preventiva</td>
                                    <td>R$ <?= number_format($manutencao_preventiva / 24, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Reparações e Melhoramentos</td>
                                    <td>R$ <?= number_format($reparacoes / 12, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Estacionamento</td>
                                    <td>R$ <?= number_format($estacionamento, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Pedágios</td>
                                    <td>R$ <?= number_format($pedagio_mes, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Multas</td>
                                    <td>R$ <?= number_format($multas_mes, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Lavagens e Limpeza</td>
                                    <td>R$ <?= number_format($lavagem_mes, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td class="table-red"><strong>Total</strong></td>
                                    <td class="table-red"><strong>R$ <?= number_format($custos_variaveis, 2, ',', '.') ?></strong></td>
                                </tr>
                            </table>
                        </div>
                        <div class="card-resultado"  id="total-resultado">
                            <h2>TOTAL</h2>
                            <table >
                                <tr>
                                    <td>Custos fixos</td>
                                    <td>R$ <?= number_format($custos_fixos, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Custos variáveis</td>
                                    <td>R$ <?= number_format($custos_variaveis, 2, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td class="table-red"><strong>Total TCO</strong></td>
                                    <td class="table-red"><strong>R$ <?= number_format($total_tco, 2, ',', '.') ?></strong></td>
                                </tr>
                            </table>
                        </div>
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
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="../js/slick/slick.min.js"></script>


    <script type="text/javascript">
    document.querySelectorAll('input[name="credito"]').forEach(radio => {
        radio.addEventListener('change', function() {
            document.getElementById('credito_detalhes').style.display = this.value === 'sim' ? 'block' :
                'none';
        });
    });

    document.querySelector('input[name="vistoria_num"]').addEventListener('input', function() {
        document.getElementById('vistoria_detalhes').style.display = this.value > 0 ? 'block' : 'none';
    });

    function nextStep(step) {
        document.getElementById("step" + (step - 1)).style.display = "none";
        document.getElementById("step" + step).style.display = "block";
    }

    function prevStep(step) {
        document.getElementById("step" + (step + 1)).style.display = "none";
        document.getElementById("step" + step).style.display = "block";
    }

    // Exibir detalhes do crédito automóvel apenas se "Sim" for selecionado
    document.querySelectorAll('input[name="credito"]').forEach((el) => {
        el.addEventListener('change', function() {
            document.getElementById("credito_detalhes").style.display = this.value === 'sim' ? 'block' :
                'none';
        });
    });
    </script>

</body>