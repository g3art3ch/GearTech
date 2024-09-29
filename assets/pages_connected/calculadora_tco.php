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


        <section class="calculadora-tco">
            <div class="container">
                <div class="title-calculadora-tco">
                    <h2>Veja quanto custa para manter seu veículo</h2>
                </div>
                <form action="tco_result.php" method="post" id="multiStepForm">

                    <div class="card-calculadora-tco" id="step1">
                        <h2>Custos Fixos</h2>
                        <div class="box-calculadora-tco">
                            <div class="left-side-calculadora-tco">
                                <label>Data de aquisição do veículo:</label>
                                <input type="month" name="data_aquisicao" required placeholder="R$">

                                <label>Valor comercial do veículo quando o adquiriu (R$):</label>
                                <input type="number" step="0.01" name="valor_aquisicao" required placeholder="R$">

                                <label>Valor do veículo à data de hoje (R$):</label>
                                <input type="number" step="0.01" name="valor_hoje" required placeholder="R$">

                                <label>Seguro automóvel:</label>
                                <div class="flex-calculadora">
                                    <select name="seguro_periodo" required>
                                        <option value="mensal">Mensal</option>
                                        <option value="trimestral">Trimestral</option>
                                        <option value="semestral">Semestral</option>
                                        <option value="anual">Anual</option>
                                    </select>
                                    <input type="number" step="0.01" name="seguro_valor" placeholder="R$" required>
                                </div>
                                <button type="button" onclick="nextStep(2)">Próximo</button>
                            </div>

                        </div>

                    </div>

                    <!-- Etapa 2: Custos Variáveis -->
                    <div class="card-calculadora-tco" id="step2" style="display:none;">
                        <h2>Custos fixos</h2>
                        <label>Crédito automóvel:</label>
                        <div class="radio">
                            <div class="radio-item">
                                <input type="radio" id="credito-sim" name="credito" value="sim" required>
                                <label for="credito-sim">Sim</label>
                            </div>
                            <div class="radio-item">
                                <input type="radio" id="credito-nao" name="credito" value="nao" required>
                                <label for="credito-nao">Não</label>
                            </div>
                        </div>


                        <div id="credito_detalhes" style="display:none;">
                            <label>Montante financiado (R$):</label>
                            <input type="number" step="0.01" name="montante_financiado" placeholder="R$">

                            <label>Período do crédito / n.º de prestações:</label>
                            <input type="number" name="num_prestacoes" placeholder="R$">

                            <label>Valor médio da prestação (R$):</label>
                            <input type="number" step="0.01" name="valor_prestacao" placeholder="R$">

                            <label>Valor residual (R$):</label>
                            <input type="number" step="0.01" name="valor_residual" placeholder="R$">
                        </div>

                        <label>Quantas vezes já levou o seu veículo à vistoria?</label>
                        <input type="number" name="vistoria_num" required placeholder="R$">

                        <div id="vistoria_detalhes" style="display:none;">
                            <label>Custo médio da vistoria para o seu veículo (R$):</label>
                            <input type="number" step="0.01" name="vistoria_custo" placeholder="R$">
                        </div>

                        <label>IPVA, DPVAT e taxa de licenciamento (R$ por ano):</label>
                        <input type="number" step="0.01" name="ipva_total" required placeholder="R$">

                        <div class="container-button-tco">
                            <button type="button" onclick="nextStep(3)">Próximo</button>
                            <button type="button" onclick="prevStep(1)">Anterior</button>
                        </div>

                    </div>

                    <!-- Etapa 3: Dados Adicionais -->
                    <div class="card-calculadora-tco" id="step3" style="display:none;">
                        <h2>Custos Variáveis</h2>
                        <label>Gastos com combustíveis (R$ por período):</label>
                        <div class="flex-calculadora">
                            <select name="combustivel_periodo" required>
                                <option value="mes">Mês</option>
                                <option value="trimestre">Trimestre</option>
                                <option value="semestre">Semestre</option>
                                <option value="ano">Ano</option>
                            </select>
                            <input type="number" step="0.01" name="combustivel_valor" required placeholder="R$">
                        </div>
                        <label>Manutenção preventiva (R$ por ano):</label>
                        <input type="number" step="0.01" name="manutencao_preventiva" required placeholder="R$">

                        <label>Reparações e Melhoramentos (R$ por ano):</label>
                        <input type="number" step="0.01" name="reparacoes" required placeholder="R$">

                        <div class="container-button-tco">
                            <button type="button" onclick="nextStep(4)">Próximo</button>
                            <button type="button" onclick="prevStep(2)">Anterior</button>
                        </div>
                    </div>

                    <div class="card-calculadora-tco" id="step4" style="display:none;">
                        <h2>Custos Variáveis</h2>
                        <label>Estacionamento (R$ por mês):</label>
                        <input type="number" step="0.01" name="estacionamento" placeholder="R$" required>

                        <label>Pedágios (R$ por período):</label>
                        <div class="flex-calculadora">
                            <select name="pedagio_periodo" required>
                                <option value="dia">Dia</option>
                                <option value="mes">Mês</option>
                                <option value="trimestre">Trimestre</option>
                                <option value="semestre">Semestre</option>
                                <option value="ano">Ano</option>
                            </select>
                            <input type="number" step="0.01" name="pedagio_valor" required placeholder="R$">
                        </div>

                        <label>Multas (R$ por período):</label>
                        <div class="flex-calculadora">
                            <select name="multas_periodo" required>
                                <option value="mes">Mês</option>
                                <option value="trimestre">Trimestre</option>
                                <option value="semestre">Semestre</option>
                                <option value="ano">Ano</option>
                            </select>
                            <input type="number" step="0.01" name="multas_valor" required placeholder="R$">
                        </div>


                        <label>Lavagens e limpeza (R$ por período):</label>
                        <div class="flex-calculadora">
                            <select name="lavagem_periodo" required>
                                <option value="mes">Mês</option>
                                <option value="trimestre">Trimestre</option>
                                <option value="semestre">Semestre</option>
                                <option value="ano">Ano</option>
                            </select>
                            <input type="number" step="0.01" name="lavagem_valor" required placeholder="R$">
                        </div>

                        <div class="container-button-tco">
                            <button type="button" onclick="nextStep(5)">Próximo</button>
                            <button type="button" onclick="prevStep(2)">Anterior</button>
                        </div>
                    </div>

                    <div class="card-calculadora-tco" id="step5" style="display:none;">
                        <h2>Custos Adicionais</h2>
                        <label>Custo médio em transporte público (R$ por mês):</label>
                        <input type="number" step="0.01" name="transporte_publico" required placeholder="R$">

                        <label>Rendimento líquido (R$ por ano):</label>
                        <input type="number" step="0.01" name="rendimento_anual" required placeholder="R$">

                        <label>Quilômetros percorridos por mês:</label>
                        <input type="number" step="0.01" name="km_mes" required placeholder="R$">

                        <button type="submit">Calcular TCO</button>
                    </div>

                    <div class="card-progress">
                        <div class="progress-container">
                            <div class="progress-bar" id="progressBar"></div>
                            <h2>Calculadora TCO</h2>
                            <div class="progress-steps">
                                <div class="step active">1</div>
                                <div class="step">2</div>
                                <div class="step">3</div>
                                <div class="step">4</div>
                                <div class="step">5</div>
                            </div>
                        </div>
                    </div>


            </div>
            </form>
        </section>


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

    function changeStep(step) {
        const currentStep = step === 1 ? step + 1 : step - 1;
        document.getElementById("step" + currentStep).style.display = "none";
        document.getElementById("step" + step).style.display = "block";
        updateProgress(step);
    }

    function nextStep(step) {
        changeStep(step);
    }

    function prevStep(step) {
        changeStep(step);
    }

    function updateProgress(step) {
        const totalSteps = 5;
        const progressBar = document.getElementById('progressBar');
        const steps = document.querySelectorAll('.step');

        // Atualiza a largura da barra
        progressBar.style.width = ((step - 1) / totalSteps) * 100 + '%';

        // Atualiza as classes dos passos
        steps.forEach((element, index) => {
            element.classList.remove('active', 'completed');
            if (index < step - 1) {
                element.classList.add('completed');
            } else if (index === step - 1) {
                element.classList.add('active');
            }
        });
    }

    function changeStep(step) {
        const currentStep = step === 1 ? step + 1 : step - 1;
        document.getElementById("step" + currentStep).style.display = "none";
        document.getElementById("step" + step).style.display = "block";
        updateProgress(step); // Atualiza a barra de progresso
    }
    </script>

</body>

</html>