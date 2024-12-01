<?php
include('connection_cars.php');
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
    <link rel="stylesheet" href="../css/main/footer.css">
    <link rel="stylesheet" href="../css/recomendation.css">
    <link rel="stylesheet" href="../css/maintenance.css">
    <link rel="shortcut icon" href="../icons/logo.ico" type="image/x-icon">
    <title>Manutenções</title>
</head>


<body>
    <main>
        <div class="container">
            <header>
                <div class="area">
                    <div class="logo">
                        <a href="/GearTech/assets/pages_connected/connected.php">
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

        <section class="maintenance">
            <div class="container">
                <div class="title-maintenance">
                    <h2>Selecione a montadora</h2>
                </div>
                <div class="grid-maintenance">
                    
                    <div class="item-maintanance">
                        <a href="https://meu.chevrolet.com.br/saiba-mais-e-suporte/manuais-guias" class="card-maintenance" target="_blank">
                            <div class="box-maintenance">
                                <img src="../logo_images/chevrolet.png" alt="">
                            </div>
                            <p>Chevrolet</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="https://www.citroen.com.br/meu-citroen/manuais.html" class="card-maintenance" target="_blank">
                            <div class="box-maintenance">
                                <img src="../logo_images/citroen.png" alt="">
                            </div>
                            <p>Citroen</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="https://servicos.fiat.com.br/manuais.html" class="card-maintenance" target="_blank">
                            <div class="box-maintenance">
                                <img src="../logo_images/fiat.png" alt="">
                            </div>
                            <p>Fiat</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="https://www.ford.com.br/support/owner-manuals/" class="card-maintenance" target="_blank">
                            <div class="box-maintenance">
                                <img src="../logo_images/ford.png" alt="">
                            </div>
                            <p>Ford</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="https://www.honda.com.br/pos-venda/motos/manual-e-guia" class="card-maintenance" target="_blank">
                            <div class="box-maintenance">
                                <img src="../logo_images/honda.png" alt="">
                            </div>
                            <p>Honda</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="https://www.hyundai.com.br/manutencao.html" class="card-maintenance" target="_blank">
                            <div class="box-maintenance">
                                <img src="../logo_images/hyundai.png" alt="">
                            </div>
                            <p>Hyundai</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="https://www.jeep.com.br/proprietarios/manuais.html" class="card-maintenance" target="_blank">
                            <div class="box-maintenance">
                                <img src="../logo_images/jeep.png" alt="">
                            </div>
                            <p>Jeep</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="https://www.mitsubishi-motors.ca/en/owners/know-your-mitsubishi/owners-manuals" class="card-maintenance" target="_blank">
                            <div class="box-maintenance">
                                <img src="../logo_images/mitsubishi.png" alt="">
                            </div>
                            <p>Mitsubishi</p>
                        </a>
                    </div>
                    
                    <div class="item-maintanance">
                        <a href="https://www.nissan.com.br/servicos/manuais.html" class="card-maintenance" target="_blank">
                            <div class="box-maintenance">
                                <img src="../logo_images/nissan.png" alt="">
                            </div>
                            <p>Nissan</p>
                        </a>
                    </div>
                    
                    <div class="item-maintanance">
                        <a href="https://carros.peugeot.com.br/servicos-e-manutencao/manutencao-do-veiculo/manuais.html" class="card-maintenance" target="_blank">
                            <div class="box-maintenance">
                                <img src="../logo_images/peugeot.png" alt="">
                            </div>
                            <p>Peugeot</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="https://www.renault.com.br/manuais.html" class="card-maintenance" target="_blank">
                            <div class="box-maintenance">
                                <img src="../logo_images/renault.png" alt="">
                            </div>
                            <p>Renault</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="https://www.toyota.com.br/manuais" class="card-maintenance" target="_blank">
                            <div class="box-maintenance">
                                <img src="../logo_images/toyota.png" alt="">
                            </div>
                            <p>Toyota</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="https://www.vw.com.br/pt/servicos-e-acessorios/manuais-e-garantia/manuais.html" class="card-maintenance" target="_blank">
                            <div class="box-maintenance">
                                <img src="../logo_images/volkswagen.png" alt="" >
                            </div>
                            <p>Volkswagen</p>
                        </a>
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
    <script>
    document.getElementById('toggleButton').addEventListener('click', function() {
        var moreBrands = document.querySelectorAll('.grid-logotypes')[1];
        if (moreBrands.style.display === 'none' || moreBrands.style.display === '') {
            moreBrands.style.display = 'grid';
        } else {
            moreBrands.style.display = 'none';
        }
        this.style.display = 'none';
    });
    </script>

</body>

</html>