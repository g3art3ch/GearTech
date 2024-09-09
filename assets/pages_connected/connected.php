<?php
include('connection.php');
include('connection_cars.php');
include('protect.php');
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
WHERE nome in ('Chevrolet Onix 1.0 SPE/4 2024', 'Hyundai HB20 1.0 Comfort Plus ', 'Chevrolet Tracker 1.0 Turbo (A')";

$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
$quantidade = $sql_query->num_rows;

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        </a>
                        <h1>Geartech</h1>
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
                                <li><a href="./saved-vehicle.php">Seus salvos</a></li>
                                <li><a href="/GearTech/index.php">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>


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
                        <form action="connected_recommendation_process.php" method="post" class="box-filter">

                            <div class="error-register-index">
                                <?php
                            if (isset($_GET['error'])) {
                                echo "<p  style='color:red;'>" . $_GET['error'] . "</p>";
                            }
                            ?>
                            </div>
                            <div class="group-1">
                                <div class="itens-filter">
                                    <div class="headline">
                                        <img src="/GearTech/assets/icons/car.svg" alt="">
                                        <div class="title-headline">Seu estilo de carro</div>
                                    </div>
                                    <select name="estilo" id="">
                                        <option value="">Selecione seu estilo de carro</option>
                                        <option value="Hatch">Hatch</option>
                                        <option value="Sedan">Sedan</option>
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
                                        placeholder="Selecione a quantidade de passageiros" min="0" max="4">
                                </div>
                                <div class="itens-filter">
                                    <div class="headline">
                                        <img src="/GearTech/assets/icons/volante.svg" alt="" width="20px">
                                        <div class="title-headline">Uso do veículo</div>
                                    </div>
                                    <select name="tipoUso" id="">
                                        <option value="">Selecione o uso do veículo</option>
                                        <option value="diario">Diário</option>
                                        <option value="passeio">Passeios</option>
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

                            inputPreco.addEventListener('input', function() {
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
                    <p>Acompanhe alguns modelos que se destacaram em vendas e veja quais veículos lideram as listas de
                        mais vendidos.</p>
                </div>
                <?php

                if ($quantidade > 0) {
                    $_SESSION['resultados'] = array();
                    while ($result = $sql_query->fetch_assoc()) {
                        $_SESSION['resultados'][] = $result;
                    };
                };
                echo "<div class=grid-popular-cars>";
                if (isset($_SESSION['resultados']) && !empty($_SESSION['resultados'])) {
                    foreach ($_SESSION['resultados'] as $carro) {
                        echo '<div class="card-popular-cars">';
                        echo '<div class="box-image-popular-cars">';
                        echo '<img src="/GearTech/assets/car_images/' . $carro['idIden'] . '.png" alt="">';
                        echo '</div>';
                        echo '<div class="box-description-popular-cars">';
                        echo '    <div class="title-card-popular-cars">';
                        echo '        <h2>'. $carro['nome'] .'</h2>';
                        echo '    </div>';
                        echo '    <div class="group-popular-cars">';
                        echo '        <div class="info-popular-cars">';
                        echo '            <img src="/GearTech/assets/icons/passager.svg" alt="">';
                        echo '            <p>' . ($carro['capacidade']-1) . ' passageiros</p>';
                        echo '        </div>';
                        echo '        <div class="info-popular-cars">';
                        echo '            <img src="/GearTech/assets/icons/cambio.svg" alt="">';
                        echo '            <p>Automático</p>';
                        echo '        </div>';
                        echo '        <div class="info-popular-cars">';
                        echo '            <img src="/GearTech/assets/icons/car-door.svg" alt="">';
                        echo '            <p>' . ($carro['capacidade'] -1) . ' portas</p>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '    <hr>';
                        echo '    <div class="price-popular-cars">';
                        echo '        <p>Preço</p>';
                        echo '        <span>R$' . $carro['orcamento'] . '</span>';
                        echo '    </div>';
                        echo '    <div class="more-info-popular-cars">';
                        echo '<a href="/GearTech/assets/pages_connected/connected_car_specification.php?IdCar='. $carro['nome'] .' ">Saiba mais</a>';
                        echo '    </div>';
                        echo '</div>';

                        echo '</div>';
                    };
                };
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
                                informadas nunca foi tão simples.</p>
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
                        <img src="../images/bmw-logo.svg" alt="">
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
                            <p>Nossa equipe está pronta para oferecer orientação e prestar suporte a todos os usuários,
                                se enfrentar problemas ou dificuldades utilize nossos meios de contato.
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