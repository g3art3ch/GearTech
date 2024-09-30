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
    <link rel="stylesheet" href="../css/catalog.css">
    <link rel="shortcut icon" href="../icons/logo.ico" type="image/x-icon">
    <title>Catálogo</title>
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
                        <li><a href="/GearTech/assets/pages_connected/connected.php">Voltar ao início</a></li>
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


    <section class="catalog">
            <div class="container">
                <div class="title-catalog">
                    <h2>Escolha a marca</h2>
                </div>
                <div class="grid-logotypes">
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=6" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/audi.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=6" class="name-logotype">Audi</a>
                    </div>
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=7" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/bmw.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=7" class="name-logotype">BMW</a>
                    </div>
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=238" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/byd.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=238" class="name-logotype">Byd</a>
                    </div>
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=23" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/chevrolet.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=23" class="name-logotype">Chevrolet</a>
                    </div>
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=13" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/citroen.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=13" class="name-logotype">Citroen</a>
                    </div>
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=21" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/fiat.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=21" class="name-logotype">Fiat</a>
                    </div>
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=22" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/ford.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=22" class="name-logotype">Ford</a>
                    </div>
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=25" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/honda.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=25" class="name-logotype">Honda</a>
                    </div>
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=26" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/hyundai.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=26" class="name-logotype">Hyundai</a>
                    </div>
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=29" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/jeep.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=29" class="name-logotype">Jeep</a>
                    </div>
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=41" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/mitsubishi.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=41" class="name-logotype">Mitsubishi</a>
                    </div>
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=39" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/mercedesbenz.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=39" class="name-logotype">Mercedes Benz</a>
                    </div>
                </div>

                <div class="grid-logotypes" style="display:none">
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=43" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/nissan.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=43" class="name-logotype">Nissan</a>
                    </div>
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=47" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/porsche.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=47" class="name-logotype">Porsche</a>
                    </div>
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=44" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/peugeot.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=44" class="name-logotype">Peugeot</a>
                    </div>
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=48" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/renault.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=48" class="name-logotype">Renault</a>
                    </div>
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=56" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/toyota.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=56" class="name-logotype">Toyota</a>
                    </div>
                    <div class="item-logotype">
                        <a href="connected_filtered_catalog.php?Marca=59" class="card-logotype">
                            <div class="box-image-logotype">
                                <img src="../logo_images/volkswagen.png" alt="">
                            </div>
                        </a>
                        <a href="connected_filtered_catalog.php?Marca=59" class="name-logotype">Volkswagen</a>
                    </div>
                </div>
                <div class="more-logotypes">
                    <button id="toggleButton">Mais marcas</button>
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
                    <p>Nós da GearTech compartilhamos nosso gosto por carros e somos dedicados a simplificar sua jornada de compra. Valorizamos a transparência e a confiabilidade, proporcionando a você a melhor escolha da sua vida.
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