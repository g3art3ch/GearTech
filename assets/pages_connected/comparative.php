<?php 
include('protect.php');
include('connection_favorite.php');
include('connection_cars.php');

$sql_code1 = "SELECT * FROM favorites";
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
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/comparative.css">
    <link rel="stylesheet" href="../css/main/footer.css">
    <link rel="shortcut icon" href="/GearTech/assets/icons/logo.ico" type="image/x-icon">
    <title>Comparativo</title>
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
        <script>
        function enviarMarca(marca, carCOUNT) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "process_brand.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('marcaSelecionadaDisplay-' + carCOUNT).innerHTML =
                        "<p>Marca selecionada: " + marca + "</p>";
                }
            };
            xhr.send("marca=" + marca + "&carCOUNT=" + carCOUNT);

            // Armazene o valor da marca no localStorage
            localStorage.setItem('selectedBrand', marca);

            // Recarregue a página
            location.reload();
        }
        </script>
        <section class="comparative">
            <div class="container">
                <div class="title-comparative">
                    <h2>Comparativo de seus carros salvos</h2>
                </div>
                <div class="card-comparative">
                    <form class="grid-comparative">
                        <div class="item-comparative">
                            <h2>Carro 1</h2>
                            <label for="">Marca</label>
                            <select name="" id="">
                                <option value=""></option>
                            </select>
                            <label for="">Modelo</label>
                            <select name="" id="">
                                <option value=""></option>
                            </select>
                            <label for="">Carroceria</label>
                            <select name="" id="">
                                <option value=""></option>
                            </select>
                            <label for="">Ano</label>
                            <select name="" id="">
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="item-comparative">
                            <h2>Carro 2</h2>
                            <label for="">Marca</label>
                            <select name="" id="">
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                            <label for="">Modelo</label>
                            <select name="" id="">
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                            <label for="">Carroceria</label>
                            <select name="" id="">
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                            <label for="">Ano</label>
                            <select name="" id="">
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="item-comparative">
                            <h2>Carro 3</h2>
                            <label for="">Marca</label>
                            <select name="" id="">
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                            <label for="">Modelo</label>
                            <select name="" id="">
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                            <label for="">Carroceria</label>
                            <select name="" id="">
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                            <label for="">Ano</label>
                            <select name="" id="">
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="item-comparative">
                            <h2>Carro 4</h2>
                            <label for="">Marca</label>
                            <select name="" id="">
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                            <label for="">Modelo</label>
                            <select name="" id="">
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                            <label for="">Carroceria</label>
                            <select name="" id="">
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                            <label for="">Ano</label>
                            <select name="" id="">
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </div>
                        
                        
                    </form>
                    <div class="button-comparative">
                        <a href="./result_comparative.php">Comparar</a>
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

    <script src="/GearTech/assets/js/script.js"></script>
</body>

</html>