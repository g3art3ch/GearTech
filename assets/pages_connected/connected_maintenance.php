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
                        <a href="connected_filtered_catalog.php?Marca=Audi" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/audi.png" alt="">
                            </div>
                            <p>Audi</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="connected_filtered_catalog.php?Marca=BMW" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/bmw.png" alt="">
                            </div>
                            <p>BMW</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="connected_filtered_catalog.php?Marca=Byd" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/byd.png" alt="">
                            </div>
                            <p>Byd</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="connected_filtered_catalog.php?Marca=Chevrolet" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/chevrolet.png" alt="">
                            </div>
                            <p>Chevrolet</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="connected_filtered_catalog.php?Marca=Citroen" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/citroen.png" alt="">
                            </div>
                            <p>Citroen</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="connected_filtered_catalog.php?Marca=Fiat" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/fiat.png" alt="">
                            </div>
                            <p>Fiat</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="connected_filtered_catalog.php?Marca=Ford" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/ford.png" alt="">
                            </div>
                            <p>Ford</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="connected_filtered_catalog.php?Marca=Honda" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/honda.png" alt="">
                            </div>
                            <p>Honda</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="connected_filtered_catalog.php?Marca=Citroen" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/hyundai.png" alt="">
                            </div>
                            <p>Hyundai</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="connected_filtered_catalog.php?Marca=Citroen" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/mitsubishi.png" alt="">
                            </div>
                            <p>Mitsubishi</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="connected_filtered_catalog.php?Marca=Citroen" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/mercedesbenz.png" alt="">
                            </div>
                            <p>Mercedes Benz</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="connected_filtered_catalog.php?Marca=Nissan" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/nissan.png" alt="">
                            </div>
                            <p>Nissan</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="connected_filtered_catalog.php?Marca=Porsche" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/porsche.png" alt="">
                            </div>
                            <p>Porsche</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="connected_filtered_catalog.php?Marca=Peugeot" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/peugeot.png" alt="">
                            </div>
                            <p>Peugeot</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="connected_filtered_catalog.php?Marca=Renault" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/renault.png" alt="">
                            </div>
                            <p>Renault</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="connected_filtered_catalog.php?Marca=Toyota" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/toyota.png" alt="">
                            </div>
                            <p>Toyota</p>
                        </a>
                    </div>
                    <div class="item-maintanance">
                        <a href="connected_filtered_catalog.php?Marca=Volkswagen" class="card-maintenance">
                            <div class="box-maintenance">
                                <img src="../logo_images/volkswagen.png" alt="">
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