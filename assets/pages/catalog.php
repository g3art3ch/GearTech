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
    <title>Seu carro ideal</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="area">
                <div class="logo">
                    <a href="../pages_connected/logout.php">
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
                    <li><a href="">Catálogo</a></li>
                    <li><a href="">Manutenções</a></li>
                    <li>
                        <div class="user-enter">
                            <a href="/GearTech/assets/pages/login.php">
                                <img src="/GearTech/assets/icons/user.svg" alt="">
                                <a href="/GearTech/assets/pages/login.php" class="red">Entre em sua conta</a>
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="recomendation">
        <div class="container">
            <div class="title-catalog">
                <h2>Nosso catálogo</h2>
            </div>

            <div class="card-logotypes">
                <div class="grid-logotypes">
                    <a href="filtered_catalog.php?Marca=Audi" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/audi.png" alt="">
                            <span>Audi</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=BMW" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/bmw.png" alt="">
                            <span>BMW</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Byd" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/byd.png" alt="">
                            <span>Byd</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Caoachery" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/caoachery.png" alt="">
                            <span>Caoa Cherry</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Chevrolet" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/chevrolet.png" alt="">
                            <span>Chevrolet</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Citroen" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/citroen.png" alt="">
                            <span>Citroen</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Fiat" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/fiat.png" alt="">
                            <span>Fiat</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Ford" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/ford.png" alt="">
                            <span>Ford</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Gwm" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/gwm.png" alt="">
                            <span>GWM</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Honda" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/honda.png" alt="">
                            <span>Honda</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Hyundai" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/hyundai.png" alt="">
                            <span>Hyundai</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Jeep" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/jeep.png" alt="">
                            <span>Jeep</span>
                        </div>
                    </a>
                </div>
    
                <div class="grid-logotypes more-brands" style="display: none;">
    
                    <a href="filtered_catalog.php?Marca=Mitsubishi" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/mitsubishi.png" alt="">
                            <span>Mitsubishi</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Mercedes" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/mercedesbenz.png" alt="">
                            <span>Mercedes</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Nissan" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/nissan.png" alt="">
                            <span>Nissan</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Porsche" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/porsche.png" alt="">
                            <span>Porsche</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Peugeot" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/peugeot.png" alt="">
                            <span>Peugeot</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Renault" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/renault.png" alt="">
                            <span>Renault</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Toyota" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/toyota.png" alt="">
                            <span>Toyota</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Volkswagen" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/volkswagen.png" alt="">
                            <span>Volkswagen</span>
                        </div>
                    </a>
                    <a href="filtered_catalog.php?Marca=Volvo" class="content-logotypes">
                        <div>
                            <img src="/GearTech/assets/logo_images/volvo.png" alt="">
                            <span>Volvo</span>
                        </div>
                    </a>
    
                </div>
            </div>
            <div class="more-logotypes">
                <button id="toggleButton">Mais marcas</button>
            </div>
        </div>
    </section>

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
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book.
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
            var moreBrands = document.querySelector('.more-brands');
            if (moreBrands.style.display === 'none' || moreBrands.style.display === '') {
                moreBrands.style.display = 'grid';
                this.textContent = 'Menos marcas';
            } else {
                moreBrands.style.display = 'none';
                this.textContent = 'Mais marcas';
            }
        });
    </script>


</body>

</html>