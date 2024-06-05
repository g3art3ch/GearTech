<?php
include('connection_cars.php');

// Verifica se o formulário foi enviado
if (isset($_POST["submit"])) {
    // Obtém os dados do formulário
    $estilo = $_POST["estilo"];
    $value = $_POST["orcamento"];
    // Validação dos dados do formulário
    if ($value == null) {
        header("Location: /GearTech/assets/pages_connected/connected.php?error=Preencha todos os campos");
        exit(); // Encerra o script após o redirecionamento
    } else {
        $textWithoutLastTwoChars = substr($value, 0, -2);
        // Remove todos os pontos
        $numberWithoutDots = str_replace('.', '', $textWithoutLastTwoChars);

        // Substitui a vírgula por um ponto
        $normalizedNumber = str_replace(',', '.', $numberWithoutDots);

        // Converte para int
        $finalNumber = intval($normalizedNumber);

        if($finalNumber < 1000){
            $orcamento = 0;
        }else
        $orcamento = number_format($finalNumber, 0, ',', '.');
    }
    $combustivel = $_POST["combustivel"];
    $capacidade = $_POST["capacidade"];
    $tipoUso = $_POST["tipoUso"];

    // Validação dos dados do formulário
    if (empty($estilo) || empty($orcamento) || empty($combustivel) || empty($capacidade) || empty($tipoUso)) {
        header("Location: /GearTech/assets/pages_connected/connected.php?error=Preencha todos os campos");
        exit(); // Encerra o script após o redirecionamento
    }

    // Executa a consulta SQL
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
    WHERE estilo = '$estilo' AND orcamento <= '$orcamento' and combustivel = '$combustivel' and capacidade >= $capacidade and tipoUso='$tipoUso'";

    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
    $quantidade = $sql_query->num_rows;

    // Verifica se foram encontrados resultados
    if ($quantidade > 0) {
        // Inicia a sessão e armazena os resultados
        session_start();
        $_SESSION['resultados'] = array();
        while ($result = $sql_query->fetch_assoc()) {
            $_SESSION['resultados'][] = $result;
        }
        $_SESSION['idIden'] = $result['idIden'];
    $_SESSION['urlCarro'] = $result['urlCarro'];
    $_SESSION['nome'] = $result['nome'];
    $_SESSION['estilo'] = $result['estilo'];
    $_SESSION['orcamento'] = $result['orcamento'];
    $_SESSION['combustivel'] = $result['combustivel'];
    $_SESSION['capacidade'] = $result['capacidade'];
    $_SESSION['tipoUso'] = $result['tipoUso'];

        // Redireciona para a página de recomendação
        header("Location: /GearTech/assets/pages_connected/connected_recommendation.php");
        exit(); // Encerra o script após o redirecionamento
    } else {
        // Se nenhum resultado for encontrado, exibe uma mensagem de erro na mesma página
        header("Location: /GearTech/assets/pages_connected/connected.php?error=Nenhum resultado encontrado.");
        exit(); // Encerra o script após o redirecionamento
    }
}
?>
