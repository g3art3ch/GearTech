<?php
include('protect.php');
include('connection_favorite.php');

$sql_code1 = "SELECT * FROM favorites";
$sql_query2 = $favoriteDATA->query($sql_code1);
$quantidade = $sql_query2->num_rows;


$distMARCA = "SELECT DISTINCT nomeMarca FROM favorites;";
$ckMARCA = $favoriteDATA->query($distMARCA);


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
        <section class="comparative">
            <div class="container">
                <div class="title-comparative">
                    <h2>Comparativo de seus carros salvos</h2>
                </div>
                <div class="card-comparative">
                    <form class="grid-comparative" method="POST" action="result_comparative.php">
                        <?php
                        $count = 1;
                        foreach ($_SESSION['resultados'] as $fav) {
                            echo '<div class="item-comparative">
            <h2>Carro ' . $count . '</h2>
            <label for="marca_' . $count . '">Marca</label>
            <select name="marca_' . $count . '" id="marca_' . $count . '" class="marca-select" onchange="fetchModelos(this.value, ' . $count . ')">';

                            foreach ($_SESSION['resMARCA'] as $mar) {
                                echo '<option value="' . $mar['nomeMarca'] . '">' . $mar['nomeMarca'] . '</option>';
                            }
                            echo '</select>';

                            if (isset($_POST['marca'])) {
                                $marca = $_POST['marca'];

                                // Exemplo de consulta ao banco de dados para buscar modelos da marca
                                // Substitua com a consulta correta ao seu banco de dados
                                $query = "SELECT favoriteNAME FROM favorites WHERE nomeMarca = ?";
                                $stmt = $pdo->prepare($query);
                                $stmt->execute([$marca]);
                                $modelos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                // Gera as opções de modelo
                                echo '<option value="">Selecione um modelo</option>';
                                foreach ($modelos as $modelo) {
                                    echo '<option value="' . $modelo['nomeModelo'] . '">' . $modelo['nomeModelo'] . '</option>';
                                }
                            }


                            echo '
            <label for="modelo_' . $count . '">Modelo</label>
            <select name="modelo" id="modelo_' . $count . '" class="modelo-select">
                <option value="">Selecione a marca primeiro</option>
            </select>
        </div>';
                            $count++; // Incrementa o $count no final da iteração
                        }
                        ?>

                        <div class="button-comparative">
                            <button type="submit">Comparar</button>
                        </div>
                    </form>

                </div>
            </div>
        </section>




        <script>

            function fetchModelos(marca, count) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "get_modelos.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Atualiza o select de modelos correspondente
                        document.getElementById("modelo_" + count).innerHTML = xhr.responseText;
                    }
                };
                xhr.send("marca=" + marca); // Envia a marca selecionada
            }

        </script>


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
                    <p>Nós da GearTech compartilhamos nosso gosto por carros e somos dedicados a simplificar sua
                        jornada
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