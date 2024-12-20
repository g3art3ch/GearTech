<?php
include('connection.php');
include('connection_carsgt.php');
include('protect.php');

$sql_code = "SELECT 
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
WHERE modelo.idModelo = 41447 OR modelo.idModelo = 55616 OR modelo.idModelo = 37678";
$searchALL = $finalDATA->query($sql_code);
$qtdALL = $searchALL->num_rows;

$scmarca = "SELECT marca from marca;";
$searchMC = $finalDATA->query($scmarca);
$_SESSION['MARCAS'] = array();
while ($mcs = $searchMC->fetch_assoc()) {
    $_SESSION['MARCAS'][] = $mcs;
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/GearTech/assets/css/main/main.css">
    <link rel="stylesheet" href="/GearTech/assets/css/main/header.css">
    <link rel="stylesheet" href="/GearTech/assets/css/main/banner.css">
    <link rel="stylesheet" href="/GearTech/assets/css/main/filter.css">
    <link rel="stylesheet" href="/GearTech/assets/css/main/brands.css">
    <link rel="stylesheet" href="/GearTech/assets/css/main/popular-cars.css">
    <link rel="stylesheet" href="/GearTech/assets/css/main/about-us.css">
    <link rel="stylesheet" href="/GearTech/assets/css/main/contact.css">
    <link rel="stylesheet" href="/GearTech/assets/css/main/footer.css">
    <link rel="stylesheet" href="/GearTech/assets/css/var.css">
    <link rel="shortcut icon" href="/GearTech/assets/icons/logo.ico" type="image/x-icon">
    <title>GearTech</title>
</head>

<body>
    <main>
        <div class="container">
            <header>
                <div class="area">
                    <div class="logo">
                        <a href="/GearTech/assets/pages_connected/connected.php">
                            <img src="/GearTech/assets/images/logo.svg" alt="Logo" />
                            <h1>Geartech</h1>
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
        if (isset($_GET['error'])) {
            if ($_GET['error'] = 'NoRes') {
                echo '<script type="text/javascript">
             
        Swal.fire({
            position: "top",
            icon: "warning",
            iconColor: "#C23A42",
            title: "Falha na busca",
            html: `<p style="font-size: 17px; margin="0px"">Desculpe não encontramos nenhum carro.</p>`,
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
            

            if ($_GET['error'] = 'Empty') {
                echo '<script type="text/javascript">
             
        Swal.fire({
            position: "top",
            icon: "warning",
            iconColor: "#C23A42",
            title: "Falha na busca",
            html: `<p style="font-size: 17px; margin="0px"">Preencha pelo menos um dos campos</p>`,
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
            

        }
        ?>


        <section class="banner">
            <div class="container">
                <div class="area-banner">
                    <div class="left-side">
                        <h2>Somos o melhor lugar para você <span>encontrar seu carro ideal</span></h2>
                        <p>Descubra o carro ideal para você! Com opções sob medida para seu estilo de vida!</p>
                    </div>
                    <div class="right-side">
                        <img src="/GearTech/assets/images/onix.png" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="filter">
            <div class="background-filter">
                <div class="title-filter">
                    <h2>Comece a sua busca agora</h2>
                </div>

                <div class="container">
                    <div class="card-filter">
                        <form action="connected_recommendation_process.php" method="POST" class="box-filter">

                            <div class="error-register-index">
                            </div>
                            <div class="group-1">
                                <div class="itens-filter">
                                    <div class="headline">
                                        <img src="/GearTech/assets/icons/car.svg" alt="">
                                        <div class="title-headline">Seu estilo de carro</div>
                                    </div>
                                    <select name="estilo" id="">
                                        <option value="NULL">Selecione seu estilo de carro</option>
                                        <option value="Hatchback">Hatch</option>
                                        <option value="Sedã">Sedan</option>
                                        <option value="Suv">SUV</option>
                                    </select>
                                </div>
                                <div class="itens-filter">
                                    <div class="headline">
                                        <img src="/GearTech/assets/icons/money.svg" alt="">
                                        <div class="title-headline">Orçamento disponível</div>
                                    </div>
                                    <input type="text" id="preco_input" name="orcamento" placeholder="R$ 000.000,00"
                                        maxlength="10">
                                </div>
                                <div class="itens-filter">
                                    <div class="headline">
                                        <img src="/GearTech/assets/icons/fuel.svg" alt="">
                                        <div class="title-headline">Tipo de combustível</div>
                                    </div>
                                    <select name="combustivel" id="">
                                        <option value="">Selecione o tipo de combustível</option>
                                        <option value="Gasolina">Gasolina</option>
                                        <option value="Flex">Flex (Álcool e gasolina)</option>
                                        <option value="Elétrico">Elétrico</option>
                                    </select>
                                </div>

                            </div>

                            <div class="group-2">
                                <div class="itens-filter">
                                    <div class="headline">
                                        <img src="/GearTech/assets/icons/people.svg" alt="">
                                        <div class="title-headline">Capacidade de passageiros</div>
                                    </div>
                                    <input type="number" name="capacidade" id=""
                                        placeholder="Selecione a quantidade de passageiros" min="0" max="5">
                                </div>
                                <div class="itens-filter">
                                    <div class="headline">
                                        <img src="/GearTech/assets/icons/Marca.svg" alt="" width="20px">
                                        <div class="title-headline">Marca</div>
                                    </div>
                                    <select name="marcas" id="">
                                        <option value="">Selecione a marca</option>

                                        <?php 
                                            foreach($_SESSION['MARCAS'] as $mca){
                                                echo '<option value='.$mca['marca'].'>'.$mca['marca'].'</option>';
                                            }
                                        ?>
                                        
                                    </select>
                                </div>
                                <div class="itens-filter">
                                    <button type="submit" name="submit">Procure agora</button>
                                </div>
                            </div>
                            <script>
                                function formatarNumero(valor) {
                                    valor = valor.replace(/\D/g, ''); // Remove caracteres não numéricos
                                    if (valor === "") return "";

                                    valor = (parseInt(valor, 10) / 100).toFixed(2) +
                                        ''; // Converte para número e formata com duas casas decimais
                                    valor = valor.replace(".", ","); // Substitui ponto por vírgula
                                    valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, "."); // Adiciona pontos a cada milhar
                                    return valor;
                                }

                                const inputPreco = document.getElementById('preco_input');

                                inputPreco.addEventListener('input', function () {
                                    let cursorPosition = this.selectionStart;
                                    let valorAntigo = this.value;

                                    this.value = formatarNumero(this.value);

                                    // Recalcular posição do cursor
                                    cursorPosition = this.value.length - valorAntigo.length + cursorPosition;
                                    this.setSelectionRange(cursorPosition, cursorPosition);
                                });
                            </script>
                        </form>
                    </div>
        </section>

        <section class="popular-cars">
            <div class="container">
                <div class="title-popular-cars">
                    <h2>Carros mais vendidos <br>no ultimo semestre</h2>
                    <p>Acompanhe alguns modelos que se destacaram em vendas e veja quais os veículos que lideram a lista
                        de
                        mais vendidos.</p>
                </div>
                <?php

                require("../fipeIN/vendor/autoload.php");
                use DeividFortuna\Fipe\FipeCarros;


                if ($qtdALL > 0) {
                    $_SESSION['resultados'] = array();
                    while ($result = $searchALL->fetch_assoc()) {
                        $_SESSION['resultados'][] = $result;
                    }
                    ;
                }
                ;
                echo "<div class=grid-popular-cars>";
                if (isset($_SESSION['resultados']) && !empty($_SESSION['resultados'])) {
                    foreach ($_SESSION['resultados'] as $carro) {
                        $setVehicle = FipeCarros::getVeiculo($carro['idMarca'], $carro['CodModelo'], $carro['codigoAno']);
                        echo '<div class="card-popular-cars">';
                        echo '<div class="box-image-popular-cars">';
                        echo '<img src="../car_images/' . $carro['idModelo'] . '.png" alt="">';
                        echo '</div>';
                        echo '<div class="box-description-popular-cars">';
                        echo '    <div class="title-card-popular-cars">';
                        echo '        <h2>' . $carro['nomeCarro'] . '</h2>';
                        echo '    </div>';
                        echo '    <div class="group-popular-cars">';
                        echo '        <div class="info-popular-cars">';
                        // echo '            <img src="/GearTech/assets/icons/passager.svg" alt="">';
                        // echo '            <p>' . ($carro['capacidade']-1) . ' passageiros</p>';
                        echo '        </div>';
                        echo '        <div class="info-popular-cars">';
                        // echo '            <img src="/GearTech/assets/icons/cambio.svg" alt="">';
                        // echo '            <p>Automático</p>';
                        echo '        </div>';
                        echo '        <div class="info-popular-cars">';
                        // echo '            <img src="/GearTech/assets/icons/car-door.svg" alt="">';
                        // echo '            <p>' . ($carro['capacidade'] -1) . ' portas</p>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '    <hr>';
                        echo '    <div class="price-popular-cars">';
                        echo '        <p>Preço</p>';
                        echo '        <span>' . $setVehicle['Valor'] . '</span>';
                        echo '    </div>';
                        echo '    <div class="more-info-popular-cars">';
                        echo '<a href="/GearTech/assets/pages_connected/connected_car_specification.php?Marca=' . $carro['idMarca'] . '&Modelo=' . $carro['idModelo'] . '&CodModelo=' . $carro['CodModelo'] . '&Ano=' . $carro['ano'] . '&codAno=' . $carro['codigoAno'] . '">Saiba mais</a>';
                        echo '    </div>';
                        echo '</div>';

                        echo '</div>';
                    }
                    ;
                }
                ;
                echo "</div>"
                    ?>
            </div>
        </section>



        <section class="about-us">
            <div class="container">
                <div class="title-about-us">
                    <h2>Entenda o porquê a GearTech <br> foi feita para você</h2>
                </div>
                <div class="box-about-us">
                    <div class="about-us-group">
                        <div class="box-about-us-image">
                            <img src="../icons/globe.svg" alt="">
                        </div>
                        <div class="title-about-us-group">
                            <h2>As melhores <br>marcas</h2>
                        </div>
                        <div class="desc-about-us-group">
                            <p>Selecionamos as marcas mais confiáveis para garantir qualidade e segurança,
                                proporcionando uma compra satisfatória.</p>
                        </div>
                    </div>
                    <div class="about-us-group">
                        <div class="box-about-us-image">
                            <img src="../icons/hand.svg" alt="">
                        </div>
                        <div class="title-about-us-group">
                            <h2>Atende a sua <br> necessidade</h2>
                        </div>
                        <div class="desc-about-us-group">
                            <p>Desenvolvemos um filtro personalizado que se adapta ao seu estilo e preferências, para
                                facilitar a busca do veículo. </p>
                        </div>
                    </div>
                    <div class="about-us-group">
                        <div class="box-about-us-image">
                            <img src="../icons/phone.svg" alt="">
                        </div>
                        <div class="title-about-us-group">
                            <h2>Prático, intuivo e <br> muito fácil</h2>
                        </div>
                        <div class="desc-about-us-group">
                            <p>Oferecemos uma navegação simples e com uma interface intuitiva, que torna a busca pelo
                                carro perfeito mais rápida.</p>
                        </div>
                    </div>
                    <div class="about-us-group">
                        <div class="box-about-us-image">
                            <img src="../icons/brain.svg" alt="">
                        </div>
                        <div class="title-about-us-group">
                            <h2>Facilita sua <br> decisão</h2>
                        </div>
                        <div class="desc-about-us-group">
                            <p>Através das recomendações personalizadas e comparações detalhadas, tomar decisões
                                bem informadas nunca foi tão simples.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="brands">
            <div class="container">
                <div class="flex-logo">
                    <div class="logotipos">
                        <img src="../images/honda.svg" alt="">
                        <img src="../images/volkswagen.svg" alt="">
                        <img src="../images/TOYOTA-LOGO.svg" alt="">
                        <img src="../images/fiat-logo.svg" alt="">
                        <img src="../images/mitsubishi.svg" alt="">
                        <img src="../images/hyundai-logo.svg" alt="">
                        <img src="../images/ford.svg" alt="">
                        <img src="../images/chevrolet-logo.svg" alt="">
                    </div>
                </div>
            </div>
        </section>


        <section class="contact">
            <div class="title-contact">
                <h2>Ficou com alguma dúvida?<br>Entre em contato conosco</h2>
                <div class="desc-contact-mobile">
                    <p>Nossa equipe está pronta para oferecer orientação e prestar suporte a todos os usuários, se
                        enfrentar problemas ou dificuldades utilize nossos meios de contato.</p>
                </div>

            </div>

            <div class="container">
                <div class="area-contact">

                    <div class="left-side-contact">
                        <div class="desc-contact">
                            <p>Nossa equipe está pronta para oferecer orientação e prestar suporte a todos os usuários.
                                Se enfrentar problemas ou dificuldades, utilize nossos meios de contato.
                            </p>
                        </div>

                        <div class="card-channels">
                            <h2>Nosos canais</h2>
                            <div class="box-icons-channels">
                                <img src="../icons/email.svg" alt="">
                                <img src="../icons/instagram.svg" alt="">
                            </div>
                            <p>Email: suporte.geartech@gmail.com</p>
                            <p>Instagram: @g3artech</p>
                        </div>
                    </div>

                    <div class="right-side-contact">
                        <div class="card-form-contact">
                            <form action="https://api.web3forms.com/submit" method="post" id="ContForm">
                                <input type="hidden" name="access_key" value="b92d6b10-0fe4-4d01-a034-23dbefe8e98e">
                                <label for="">Nome completo</label>
                                <input type="text" value="<?php echo $_SESSION['nomeUsuario']; ?>" name="Nome" readonly>
                                <label for="">Email</label>
                                <input type="email" value="<?php echo $_SESSION['email']; ?>" name="E-mail" id=""
                                    readonly>
                                <label for="">Assunto</label>
                                <input type="text" name="Subject" id="subject">
                                <label for="">Mensagem</label>
                                <textarea name="Message" id="message" cols="20" rows="10"></textarea>
                                <button onclick=check() type="submit">Enviar</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
    <script>
        function validarInput(input) {
            if (input.value < 0) input.value = 0;
            if (input.value > 4) input.value = 4;
        }
    </script>
</body>

</html>