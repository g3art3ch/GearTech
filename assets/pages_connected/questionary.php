<?php
include('connection.php');
include('protect.php');


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
    <link rel="stylesheet" href="../css/questionary.css">
    <link rel="stylesheet" href="../css/main/footer.css">
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
                        <li><a href="./calculadora_tco.php">Calculadora TCO</a></li>
                        <li class="dropdown">
                            <div class="user-enter">
                                <img src="/GearTech/assets/icons/user.svg" alt="" class="user-photo">
                                <a href="#" class="login-account"><?php echo $_SESSION['nomeUsuario']; ?></a>
                                <img src="/GearTech/assets/icons/dowm-arrow.svg" alt="" onclick="toggleDropdown()">
                            </div>
                            <ul class="dropdown-menu">
                                <li><a href="./saved-vehicle.php">Seus salvos</a></li>
                                <li><a href="/GearTech/index.php">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>
        <section class="questionary">
    <div class="container">
        <div class="box-questionary">
            <div class="left-side-questionary">
                <div class="card-questionary">
                    <h2>Questionário de perfil</h2>

                    <!-- Primeiro Formulário -->
                    <div class="first-form">
                        <form id="form-step-1">
                            <label for="">Qual é a finalidade do veículo?</label>
                            <select name="objetivo" id="objetivo">
                                <option value="">Selecione uma opção</option>
                                <option value="urbano">Transporte diário</option>
                                <option value="viagens">Viagens e lazer</option>
                                <option value="sustentavel">Minimizar impacto ambiental</option>
                            </select>

                            <label for="">Com que frequência você usaria seu veículo?</label>
                            <select name="freq" id="freq">
                                <option value="">Selecione uma opção</option>
                                <option value="viagens">1 - 3 Dias na semana</option>
                                <option value="viagens">4 - 5 Dias na semana</option>
                                <option value="urbano">5 - 7 dias na semana</option>
                            </select>

                            <label for="">Qual é a sua prioridade ao escolher um carro?</label>
                            <select name="prio" id="prio">
                                <option value="">Selecione uma opção</option>
                                <option value="sustentavel">Economia de combustível</option>
                                <option value="desempenho">Desempenho e velocidade</option>
                                <option value="urbano">Facilidade de uso em áreas urbanas</option>
                                <option value="sustentavel">Sustentabilidade</option>
                            </select>

                            <label for="">Você valoriza um amplo espaço interno para acomodar passageiros e bagagens?</label>
                            <select name="espaco" id="espaco">
                                <option value="">Selecione uma opção</option>
                                <option value="viagens">Importante</option>
                                <option value="urbano">Pouco importante</option>
                                <option value="nenhum">Não é uma preocupação</option>
                            </select>

                            <label for="">Você enfrenta dificuldades para estacionar ou manobrar em áreas apertadas?</label>
                            <select name="tamanho" id="tamanho">
                                <option value="">Selecione uma opção</option>
                                <option value="urbano">Sim, frequentemente</option>
                                <option value="urbano">Às vezes</option>
                                <option value="viagens">Raramente</option>
                                <option value="viagens">Nunca</option>
                            </select>

                            <div class="next-button">
                                <button type="button" id="next-step">Próximo</button>
                            </div>
                        </form>
                    </div>

                    <!-- Segundo Formulário -->
                    <div class="second-form" style="display: none;">
                        <form id="form-step-2" action="profile_result.php" method="POST">
                            <!-- Dados do primeiro formulário serão inseridos aqui -->
                            
                            <label for="">O design e a tecnologia do carro são importantes para você?</label>
                            <select name="tecno" id="tecno">
                                <option value="">Selecione uma opção</option>
                                <option value="desempenho">Sim, grande valor ao design</option>
                                <option value="urbano">Funcionalidade sobre estética</option>
                                <option value="nenhum">Praticidade acima de tudo</option>
                            </select>

                            <label for="">A segurança é um fator decisivo na sua escolha de carro?</label>
                            <select name="seguranca" id="seguranca">
                                <option value="">Selecione uma opção</option>
                                <option value="todos">Sim, é fundamental</option>
                                <option value="todos">Sim, mas há outros fatores</option>
                                <option value="desempenho">Não, prefiro desempenho e estilo</option>
                                <option value="nenhum">Não é uma preocupação</option>
                            </select>

                            <label for="">Você faz uso do carro em estradas não pavimentadas ou trilhas?</label>
                            <select name="condiestrada" id="condiestrada">
                                <option value="">Selecione uma opção</option>
                                <option value="offroad">Sim, com frequência</option>
                                <option value="offroad">Sim, ocasionalmente</option>
                                <option value="urbano">Não, evito esse tipo de estrada</option>
                            </select>

                            <label for="">Com que frequência você faz a manutenção preventiva ou revisões do seu carro?</label>
                            <select name="freqManu" id="freqManu">
                                <option value="">Selecione uma opção</option>
                                <option value="sustentavel">Rigorosamente dentro do prazo</option>
                                <option value="nenhum">Dentro do prazo, mas não sou rígido</option>
                                <option value="nenhum">Às vezes atrasado</option>
                                <option value="nenhum">Raramente faço revisões</option>
                            </select>

                            <div class="form-navigation">
                                <button type="button" id="prev-step">Voltar</button>
                                <button type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="right-side-questionary">
                <div class="ilustrative-questionary">
                    <img src="/GearTech/assets/images/onix.png" alt="">
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



    <script src="../js/script.js"></script>
    <script>
    // Função para alternar entre os formulários
    document.getElementById('next-step').addEventListener('click', function(e) {
        e.preventDefault(); // Impede o envio do formulário

        // Esconde o primeiro formulário
        document.querySelector('.first-form').style.display = 'none';

        // Exibe o segundo formulário
        document.querySelector('.second-form').style.display = 'block';

        // Copia os dados do primeiro formulário para o segundo
        const form1 = document.getElementById('form-step-1');
        const form2 = document.getElementById('form-step-2');

        // Itera pelos campos do primeiro formulário e os adiciona ao segundo formulário como inputs hidden
        const formData1 = new FormData(form1);
        for (let [key, value] of formData1.entries()) {
            let hiddenField = document.createElement('input');
            hiddenField.type = 'hidden';
            hiddenField.name = key;
            hiddenField.value = value;
            form2.appendChild(hiddenField);
        }
    });

    document.getElementById('prev-step').addEventListener('click', function(e) {
        e.preventDefault(); // Impede o comportamento padrão

        // Esconde o segundo formulário
        document.querySelector('.second-form').style.display = 'none';

        // Exibe o primeiro formulário
        document.querySelector('.first-form').style.display = 'block';
    });
</script>
</body>

</html>