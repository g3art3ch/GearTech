<?php
include('connection.php');
include('connection_carsgt.php');
include('protect.php');

if (isset($_GET['Val'])) {
    $valor = $_GET['Val'];
    // Remover 'R$', apóstrofos e espaços
    $valor_limpo = str_replace(["R$", "'", " "], "", $valor);

    // Substituir a vírgula por ponto
    $valor_limpo = str_replace(",", ".", $valor_limpo);

    // Remover pontos extras (separadores de milhar)
    $valor_limpo = str_replace(".", "", substr($valor_limpo, 0, -3)) . substr($valor_limpo, -3);

    // Converter para número decimal (float)
    $valor_numerico = (float) $valor_limpo;

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
    <link rel="stylesheet" href="../css/catalog.css">
    <link rel="stylesheet" href="../css/financing.css">
    <link rel="shortcut icon" href="../icons/logo.ico" type="image/x-icon">
    <title>Financiamento</title>
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
        <section class="financing">
            <div class="container">
                <div class="title-financing">
                    <h2>Simulador de financiamento</h2>
                </div>

                <div class="card-financing">
                    <form id="simulador" name="simulador" method="post">
                        <div class="grid-financing">
                            <div class="item-financing">
                                <div class="campo">
                                    <span class="labelSimula">Valor Financiado:</span>
                                    <input type="text" name="valor" id="valor" value="<?php echo $valor_numerico; ?>" />
                                </div>
                            </div>
                            <div class="item-financing">
                                <div class="campo">
                                    <span class="labelSimula">Taxa de Juros(%) ao mês:</span>
                                    <input type="text" name="taxa" id="taxa" />
                                </div>
                            </div>
                            <div class="item-financing">
                                <div class="campo">
                                    <span class="labelSimula">N&ordm; Parcelas ( em meses ):</span>
                                    <input type="number" name="parcelas" id="parcelas" min="1" step="1" />
                                </div>
                                <br style="clear:both;" />
                            </div>
                        </div>

                        <div class="grid-taxas-botoes">
                            <div class="taxas">
                                <div class="item-taxas">
                                    <img src="/GearTech/assets/icons/itau.svg" alt="">
                                    <p>2,02% a.m</p>
                                </div>
                                <div class="item-taxas">
                                    <img src="/GearTech/assets/icons/santander.svg" alt="">
                                    <p>2,01% a.m</p>
                                </div>
                                <div class="item-taxas">
                                    <img src="/GearTech/assets/icons/bb.svg" alt="" id="bb">
                                    <p>1,89% a.m</p>
                                </div>


                                <div class="item-taxas">
                                    <img src="/GearTech/assets/icons/caixa-logo.svg" alt="" id="caixa">
                                    <p>1,69% a.m</p>
                                </div>
                                <a href="https://www.bcb.gov.br/estatisticas/reporttxjuros?codigoSegmento=1&codigoModalidade=401101&historicotaxajurosdiario_atual_page=1&tipoModalidade=D&InicioPeriodo=2024-11-04" target="_blank">Consulte as taxas do seu banco</a>
                            </div>
                            
                            <div class="button-financing">
                                <button id="simular">Simular</button>
                            </div>
                        </div>



                    </form>
                </div>
                <div id="resultado">

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
    <script src="bundle.js"></script>

</body>

</html>