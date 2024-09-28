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
                            <h2>Questionario de perfil</h2>
                            <div class="first-form">
                                <form id="form-step-1" action="">
                                    <label for="">Qual é a finalidade do veículo?</label>
                                    <select name="objetivo" id="">
                                        <option value="">Selecione uma opção</option>
                                        <option value="urbano">Transporte diário</option> <!-- Usuário Urbano -->
                                        <option value="viagens">Viagens e lazer</option>
                                        <!-- Usuário de Longas Viagens -->
                                        <option value="sustentavel">Minimizar impacto ambiental e uso de tecnologias
                                            sustentáveis</option> <!-- Usuário Sustentável -->
                                    </select>

                                    <label for="">Com que frequência você usaria seu veículo?</label>
                                    <select name="freq" id="">
                                        <option value="">Selecione uma opção</option>
                                        <option value="viagens">1 - 3 Dias na semana</option>
                                        <!-- Usuário de Longas Viagens -->
                                        <option value="viagens">4 - 5 Dias na semana</option>
                                        <!-- Usuário de Longas Viagens -->
                                        <option value="urbano">5 - 7 dias na semana</option> <!-- Usuário Urbano -->
                                    </select>

                                    <label for="">Qual é a sua prioridade ao escolher um carro?</label>
                                    <select name="prio" id="">
                                        <option value="">Selecione uma opção</option>
                                        <option value="sustentavel">Economia de combustível</option>
                                        <!-- Usuário Sustentável -->
                                        <option value="desempenho">Desempenho e velocidade</option>
                                        <!-- Usuário de Desempenho -->
                                        <option value="urbano">Facilidade de uso em áreas urbanas</option>
                                        <!-- Usuário Urbano -->
                                        <option value="sustentavel">Sustentabilidade e impacto ambiental</option>
                                        <!-- Usuário Sustentável -->
                                    </select>

                                    <label for="">Você valoriza um amplo espaço interno para acomodar passageiros e
                                        bagagens?</label>
                                    <select name="espaco" id="">
                                        <option value="">Selecione uma opção</option>
                                        <option value="viagens">Importante</option> <!-- Usuário de Longas Viagens -->
                                        <option value="urbano">Pouco importante</option> <!-- Usuário Urbano -->
                                        <option value="nenhum">Não é uma preocupação</option> <!-- Neutro -->
                                    </select>

                                    <label for="">Você enfrenta dificuldades para estacionar ou manobrar em áreas
                                        apertadas?</label>
                                    <select name="tamanho" id="">
                                        <option value="">Selecione uma opção</option>
                                        <option value="urbano">Sim, frequentemente</option> <!-- Usuário Urbano -->
                                        <option value="urbano">Às vezes</option> <!-- Usuário Urbano -->
                                        <option value="viagens">Raramente</option> <!-- Usuário de Longas Viagens -->
                                        <option value="viagens">Nunca</option> <!-- Usuário de Longas Viagens -->
                                    </select>

                                    <div class="next-button">
                                        <button type="submit" id="next-step">Próximo</button>
                                    </div>
                                </form>


                            </div>

                            <div class="second-form">
                                <form id="form-step-2" style="display: none;" action="./profile_result.php"
                                    method="POST">
                                    <label for="">O design e a tecnologia do carro são importantes para você?</label>
                                    <select name="tecno" id="">
                                        <option value="">Selecione uma opção</option>
                                        <option value="desempenho">Sim, dou grande valor ao design e às inovações
                                            tecnológicas</option> <!-- Usuário de Desempenho -->
                                        <option value="urbano">Prefiro funcionalidade sobre estética, mas gosto de
                                            algumas tecnologias</option> <!-- Usuário Urbano -->
                                        <option value="nenhum">Não é algo que me preocupe, contanto que o carro seja
                                            prático</option> <!-- Neutro -->
                                    </select>

                                    <label for="">A segurança é um fator decisivo na sua escolha de carro?</label>
                                    <select name="seguranca" id="">
                                        <option value="">Selecione uma opção</option>
                                        <option value="todos">Sim, é fundamental</option>
                                        <!-- Aplica a todos os perfis -->
                                        <option value="todos">Sim, mas há outros fatores</option>
                                        <!-- Aplica a todos os perfis -->
                                        <option value="desempenho">Não, prefiro desempenho e estilo</option>
                                        <!-- Usuário de Desempenho -->
                                        <option value="nenhum">Não é uma preocupação</option> <!-- Neutro -->
                                    </select>

                                    <label for="">Você faz uso do carro em estradas não pavimentadas ou trilhas?</label>
                                    <select name="condiestrada" id="">
                                        <option value="">Selecione uma opção</option>
                                        <option value="offroad">Sim, com frequência</option> <!-- Usuário Off-road -->
                                        <option value="offroad">Sim, ocasionalmente</option> <!-- Usuário Off-road -->
                                        <option value="urbano">Não, e prefiro evitar esse tipo de estrada</option>
                                        <!-- Usuário Urbano -->
                                    </select>

                                    <label for="">Com que frequência você faz a manutenção preventiva ou revisões do seu
                                        carro?</label>
                                    <select name="freqManu" id="">
                                        <option value="">Selecione uma opção</option>
                                        <option value="sustentavel">Rigorosamente dentro do prazo</option>
                                        <!-- Usuário Sustentável -->
                                        <option value="nenhum">Geralmente dentro do prazo, mas não sou muito rígido
                                        </option> <!-- Neutro -->
                                        <option value="nenhum">Às vezes atrasado, só quando necessário</option>
                                        <!-- Neutro -->
                                        <option value="nenhum">Raramente faço revisões</option> <!-- Neutro -->
                                    </select>

                                    <div class="form-navigation ">
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
        const nextStepButton = document.getElementById('next-step');
        const prevStepButton = document.getElementById('prev-step');
        const formStep1 = document.getElementById('form-step-1');
        const formStep2 = document.getElementById('form-step-2');

        nextStepButton.addEventListener('click', function () {
            formStep1.style.display = 'none';
            formStep2.style.display = 'block';
        });

        prevStepButton.addEventListener('click', function () {
            formStep2.style.display = 'none';
            formStep1.style.display = 'block';
        });
    </script>
</body>

</html>