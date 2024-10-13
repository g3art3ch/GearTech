<?php
include('connection_carsgt.php');

// Verifica se o formulário foi enviado
if (isset($_POST["submit"])) {
    // Obtém os dados do formulário
    $estilo = $_POST["estilo"];
    $value = $_POST["orcamento"];
    // Validação dos dados do formulário
    if ($value == null) {
        $orcamento = 0;
        // header("Location: /GearTech/assets/pages_connected/connected.php?error=EmptyField");
        // exit(); // Encerra o script após o redirecionamento
    } else {
        $textWithoutLastTwoChars = substr($value, 0, -2);
        // Remove todos os pontos
        $numberWithoutDots = str_replace('.', '', $textWithoutLastTwoChars);

        // Substitui a vírgula por um ponto
        $normalizedNumber = str_replace(',', '.', $numberWithoutDots);

        // Converte para int
        $finalNumber = intval($normalizedNumber);


        if ($finalNumber < 1000) {
            $orcamento = 0;
        } else
            $orcamento = number_format($finalNumber, 0, ',', '.');
    }

    $combustivel = $_POST["combustivel"];
    $capacidade = $_POST["capacidade"];
    $slcmarca = $_POST["marcas"];

    // Validação dos dados do formulário
    if (empty($estilo) && empty($orcamento) && empty($combustivel) && empty($capacidade) && empty($slcmarca)) {
        header("Location: /GearTech/assets/pages_connected/connected.php?error=Empty");
        exit(); // Encerra o script após o redirecionamento
    }

    // Executa a consulta SQL
    $sql_code = "SELECT 
    marca.marca,
    marca.idMarca,
    modelo.nomeCarro,
    modelo.CodModelo,
    modelo.idModelo,
    modelo.codigoAno,
    versao.nomeVersao,
    versao.ano,
    recursos.combustivel,
    recursos.preco,
    recursos.configuracao,
    recursos.lugares,
    recursos.consumo_urbano
FROM 
    marca
LEFT JOIN 
    modelo ON marca.idMarca = modelo.idMarca
LEFT JOIN 
    versao ON modelo.idModelo = versao.idVersao
LEFT JOIN 
    recursos ON modelo.idModelo = recursos.idModelo
WHERE 

   marca.marca = '$slcmarca' AND recursos.configuracao = '$estilo' AND recursos.preco <= $finalNumber";


    $sql_query = $finalDATA->query($sql_code) or die("Falha na execução do código SQL: " . $finalDATA->error);
    $quantidade = $sql_query->num_rows;

    // Verifica se foram encontrados resultados
    if ($quantidade > 0) {
        // Inicia a sessão e armazena os resultados
        session_start();
        $_SESSION['resultados'] = array();
        while ($results = $sql_query->fetch_assoc()) {
            $_SESSION['resultados'][] = $results;
        }
        foreach ($_SESSION['resultados'] as $result) {
            $_SESSION['ano'] = $result['ano'];
            $_SESSION['nomeCarro'] = $result['nomeCarro'];
            $_SESSION['combustivel'] = $result['combustivel'];
            $_SESSION['configuracao'] = $result['configuracao'];
            $_SESSION['preco'] = $result['preco'];
            $_SESSION['idModelo'] = $result['idModelo'];
            $_SESSION['lugares'] = $result['lugares'];
            $_SESSION['slcmarca'] = $result['marca'];
        }
        // echo $_SESSION['lugares'];
        // echo $result['consumo_urbano'];
        // Redireciona para a página de recomendação
        header("Location: /GearTech/assets/pages_connected/connected_recommendation.php");
        exit(); // Encerra o script após o redirecionamento
    } else {
        echo $orcamento;
        // Se nenhum resultado for encontrado, exibe uma mensagem de erro na mesma página
       header("Location: /GearTech/assets/pages_connected/connected.php?error=NoRes");
       exit(); // Encerra o script após o redirecionamento
    }
}
?>