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
    <link rel="stylesheet" href="../css/user.css">
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
                        <li>
                            <a href="/GearTech/index.php" class="logout-area">
                                <img src="../icons/logout.svg" alt="">
                                <p>Encerrar sessão</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>

        <section class="user">
            <div class="container">
                <div class="title-user">
                    <h2>Minha conta</h2>
                </div>

                <div class="box-user">
                    <div class="left-side-user">
                        <div class="card-user-pessoal">
                            <div class="title-card-user">
                                <img src="../icons/user.svg" alt="">
                                <h2>Informações Pessoais</h2>
                            </div>

                            <div class="user-data">
                                <label for="">Nome completo</label>
                                <input type="text" value="<?php echo $_SESSION['nomeUsuario']; ?>" readonly>
                                <label for="" id="email">Email</label>
                                <input type="email" value="<?php echo $_SESSION['email']; ?>" readonly>
                            </div>
                        </div>

                        <div class="card-user-password">
                            <div class="title-card-user">
                                <img src="../icons/key.svg" alt="">
                                <h2>Senha</h2>
                            </div>
                            <div class="user-data">
                                <label for="">Sua Senha</label>
                                <?php
                                $senha = $_SESSION['senha'];
                                $asterisks = str_repeat('*', strlen($senha));
                                echo '<input type=text  value=' . $asterisks . ' readonly>';
                                ?>
                                <form action="" method="post">
                                    <label for="">Confirme sua senha</label>
                                    <input type="password" placeholder="Insira sua senha" name="ConfSenha">
                                    <label for="">Edite sua senha</label>
                                    <input type="password" placeholder="Nova senha" name="EditSenha">
                                    <button type="submit" name="submit">Confirmar alteração</button>
                                </form>

                                <?php
                                if (isset($_POST['submit'])) {
                                    $ConfSenha = $_POST['ConfSenha'];
                                    $EditSenha = $_POST['EditSenha'];

                                    if ($ConfSenha === $senha) {
                                        $_SESSION['senha'] = $EditSenha;

                                        $sql_code = "
                                UPDATE usuarios 
                                SET senha = '$EditSenha'
                                WHERE email = '$_SESSION[email]';
                                ";

                                        $sql_query = $userDATA->query($sql_code);
                                        echo '<p>Senha alterada com sucesso!</p>';
                                    } else {
                                        echo '<p>Senha de confirmação incorreta.</p>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="right-side-user">
                        <div class="card-user-saved-vehicle">
                            <div class="headline-saved-vehicle">
                                <div class="title-card-save-vehicle">
                                    <img src="../icons/saved.svg" alt="">
                                    <h2>Veículos salvos</h2>
                                </div>
                                <div class="comparative">
                                    <a href="./comparative.php">Comparativo</a>
                                </div>
                            </div>

                            <div class="slider-container"></div>

                            <?php

                            if ($quantidade > 0) {
                                if (!isset($_SESSION)) {
                                    session_start();
                                }
                                $_SESSION['resultados'] = array();
                                while ($result = $sql_query2->fetch_assoc()) {
                                    $_SESSION['resultados'][] = $result;
                                }


                            

                                foreach ($_SESSION['resultados'] as $results) {
                                    echo '<h2>' . $results['favoriteNAME'] . '</h2>';
                                    $consultNAME = $results['favoriteNAME'];


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
WHERE nome = '$consultNAME'";

$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
$quantidade1 = $sql_query->num_rows;
$_SESSION['FAVORITES'] = array();
while ($resultFAVORITES = $sql_query->fetch_assoc()) {
    $_SESSION['FAVORITES'][] = $resultFAVORITES;
}

                foreach ($_SESSION['FAVORITES'] as $fav) {



                                    echo '<div class="area-save-vehicle">
                                    <div class="box-image-save-vehicle">';
                                    echo '<img src="../car_images/' . $fav['idIden'] .'.png" alt="">
                                    </div>';
                                    echo '<div class="info-save-vehicle">';
                                    echo '<h2>' . $fav['nome'] . '</h2>';
                                    echo    '<p class="price-save-vehicle">' . $fav['orcamento'] . '</p>';
                                    echo '<p class="desc-save-vehicle">' . $fav['combustivel'] . '</p>';
                                    echo '<p class="desc-save-vehicle">' . $fav['capacidade'] . '</p>';
                                    echo '<p class="desc-save-vehicle">' . $fav['tipoUso'] . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            }

                        }

                            ?>

                            <div class="icon-slider">
                                <img id="toggleSlider" src="../icons/slider.svg" alt="">
                            </div>
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
</body>

</html>