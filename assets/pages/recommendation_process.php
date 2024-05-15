<?php
include('connection_cars.php');
if (isset($_POST["submit"])) {

    $estilo = $_POST["estilo"];
    $no_format_orcamento = $_POST["orcamento"];
    if($no_format_orcamento == null){
        header("Location: /GearTech/index.php?error=Preencha todos os campos.");
    }else
    $orcamento = number_format($no_format_orcamento, 0, ',', '.');

    $combustivel = $_POST["combustivel"];
    $capacidade = $_POST["capacidade"];
    $tipoUso = $_POST["tipoUso"];

    

    if (empty($estilo) || empty( $orcamento) || empty($combustivel) || empty($capacidade) || empty($tipoUso)) {
        
        header("Location: /GearTech/index.php?error=Preencha todos os campos.");
        exit();
    }
    

    
    $sql_code = "SELECT 
    nc.nome,
    fc.estilo,
    oc.orcamento,
    tc.combustivel,
    cc.capacidade,
    uc.tipoUso,
    iden.idIden,
    iden.urlCarro
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
        WHERE estilo = '$estilo' AND orcamento <= '$orcamento' and combustivel = '$combustivel' and capacidade <= $capacidade and tipoUso='$tipoUso'";


    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
    $quantidade = $sql_query->num_rows;
    

    if($quantidade > 0) {
        if(!isset($_SESSION)) {
            session_start();
        }
        
        $_SESSION['resultados'] = array();
        while ($result = $sql_query->fetch_assoc()) {
            $_SESSION['resultados'][] = $result;
        }
    
    $_SESSION['idIden'] = $result['idIden'];
    $_SESSION['urlCarro'] = $result['urlCarro'];
    $_SESSION['nomeCarro'] = $result['nomeCarro'];
    $_SESSION['estilo'] = $result['estilo'];
    $_SESSION['orcamento'] = $result['orcamento'];
    $_SESSION['combustivel'] = $result['combustivel'];
    $_SESSION['capacidade'] = $result['capacidade'];
    $_SESSION['tipoUso'] = $result['tipoUso'];

   
    } 

         header("Location: /GearTech/assets/pages/recommendation.php");
}

