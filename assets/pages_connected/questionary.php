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
                        <form id="form-step-1" action="process_questionary.php">
                        <label for="">Qual é a finalidade do veículo?</label>
                        <select name="objetivo" id="">
                            <option value="">Selecione uma opção</option>
                            <option value="Transporte diário">Transporte diário</option>
                            <option value="Viagens e lazer">Viagens e lazer</option>
                            <option value="Viagens e lazer"> Minimizar impacto ambiental e uso de tecnologias sustentáveis</option>
                        </select>
                        <label for="">Com que frequência você usaria seu veículo?</label>
                        <select name="orcamento" id="">
                            <option value="">Selecione uma opção</option>
                            <option value="Até R$ 50.000,00">1 - 3 Dias na semana</option>
                            <option value="Entre R$ 50.000,00 e R$ 150.000,00"> 4 - 5 Dias na semana</option>
                            <option value="Acima de 150.000,00">5 - 7 dias na semana</option>
                        </select>
                        <label for="">Qual é a sua prioridade ao escolher um carro?</label>
                        <select name="tipo_carro" id="">
                            <option value="">Selecione uma opção</option>
                            <option value="Sedan">Economia de combustível</option>
                            <option value="Hatch">Desempenho e velocidade</option>
                            <option value="SUV">Facilidade de uso em áreas urbanas</option>
                            <option value="SUV">Sustentabilidade e impacto ambiental</option>
                        </select>
                        <label for="">Você valoriza um amplo espaço interno para acomodar passageiros e bagagens?</label>
                        <select name="economia_combustivel" id="">
                            <option value="">Selecione uma opção</option>
                            <option value="Importante">Importante</option>
                            <option value="Pouco importante">Pouco importante</option>
                            <option value="Não é uma preocupação">Não é uma preocupação</option>
                        </select>
                        <label for="">Você enfrenta dificuldades para estacionar ou manobrar em áreas apertadas?</label>
                        <select name="pagamento" id="">
                            <option value="">Selecione uma opção</option>
                            <option value="Pagar à vista">Sim, frequentemente</option>
                            <option value="Financiar">Às vezes</option>
                            <option value="Não tenho certeza">Raramente</option>
                            <option value="Não tenho certeza">Nunca</option>
                        </select>  
                        
                        <div class="next-button">
                            <button type="submit" id="next-step">Próximo</button>
                        </div>
                    </form>

                    </div>
                    
                    <div class="second-form">
                         <form id="form-step-2" style="display: none;" action="./profile_result.php" method="POST">
                            <label for="">O design e a tecnologia do carro são importantes para você?</label>
                        <select name="economia_combustivel" id="">
                        <option value="">Selecione uma opção</option>
                            <option value="Inegociável">Sim, dou grande valor ao design e às inovações tecnológicas</option>
                            <option value="Importante">Prefiro funcionalidade sobre estética, mas gosto de algumas tecnologias</option>
                            <option value="Pouco importante">Não é algo que me preocupe, contanto que o carro seja prático</option>
                        </select>
                        <label for="">A segurança é um fator decisivo na sua escolha de carro?</label>
                        <select name="economia_combustivel" id="">
                        <option value="">Selecione uma opção</option>
                            <option value="Inegociável">Sim, é fundamental</option>
                            <option value="Importante">Sim, mas há outros fatores</option>
                            <option value="Pouco importante"> Não, prefiro desempenho e estilo</option>
                            <option value="Não é uma preocupação">Não é uma preocupação</option>
                        </select>
                        <label for="">Você faz uso do carro em estradas não pavimentadas ou trilhas?</label>
                        <select name="pagamento" id="">
                        <option value="">Selecione uma opção</option>
                            <option value="Pagar à vista"> Sim, com frequência</option>
                            <option value="Financiar"> Sim, ocasionalmente</option>
                            <option value="Não tenho certeza"> Não, e prefiro evitar esse tipo de estrada</option>
                        </select>
                        
                        <label for="">Com que frequência você faz a manutenção preventiva ou revisões do seu carro?</label>
                        <select name="economia_combustivel" id="">
                        <option value="">Selecione uma opção</option>
                            <option value="Inegociável">Rigorosamente dentro do prazo</option>
                            <option value="Importante">Geralmente dentro do prazo, mas não sou muito rígido</option>
                            <option value="Pouco importante">Às vezes atrasado, só quando necessário</option>
                            <option value="Não é uma preocupação">Raramente faço revisões</option>
                        </select>

                        <label for="">Você tem preferência por alguma marca de carros?</label>
                        
                        <input type="text" placeholder="Digite a sua marca">
                        
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

    nextStepButton.addEventListener('click', function() {
        formStep1.style.display = 'none';
        formStep2.style.display = 'block';
    });

    prevStepButton.addEventListener('click', function() {
        formStep2.style.display = 'none';
        formStep1.style.display = 'block';
    });
</script>
</body>

</html>