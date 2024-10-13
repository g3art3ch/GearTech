<?php 
include('connection_carsgt.php'); // Certifique-se de que este arquivo contém a conexão

if (isset($_POST['modelo'])) {
    $modelo = $_POST['modelo'];
    
    // Consulta ao banco de dados para buscar anos do modelo
    $query = "SELECT 
    marca.marca,
    marca.idMarca,
    modelo.nomeCarro,
    modelo.CodModelo,
    modelo.codigoAno,
    modelo.idModelo,
    versao.ano,
    recursos.ano
FROM 
    marca
LEFT JOIN 
    modelo ON marca.idMarca = modelo.idMarca
LEFT JOIN 
    versao ON modelo.idModelo = versao.idModelo
LEFT JOIN 
    recursos ON modelo.idModelo = recursos.idModelo
WHERE 
    modelo.nomeCarro = ?
    AND (modelo.nomeCarro, recursos.ano) IN (
        SELECT DISTINCT 
            modelo.nomeCarro, 
            recursos.ano 
        FROM 
            modelo
        LEFT JOIN 
            recursos ON modelo.idModelo = recursos.idModelo
    );
";
    
    // Prepare a declaração
    $stmt = $finalDATA->prepare($query);
    
    // Bind dos parâmetros
    $stmt->bind_param("s", $modelo); // "s" indica que estamos passando uma string
    $stmt->execute();
    
    // Obtendo o resultado
    $result = $stmt->get_result();
    $anos = $result->fetch_all(MYSQLI_ASSOC);

    // Gera as opções de ano
    echo '<option value="">Selecione um ano</option>';
    
    if ($anos) {
        foreach ($anos as $ano) {
            echo '<option value="' . htmlspecialchars($ano['codigoAno']) . '">' . htmlspecialchars($ano['ano']) . '</option>';
        }
    } else {
        // Caso nenhum ano seja encontrado
        echo '<option value="">Nenhum ano disponível</option>';
    }
    
    // Fechar a declaração
    $stmt->close();
}
?>
