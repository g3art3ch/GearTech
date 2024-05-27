<?php 
if(isset($_POST['submit'])){
$value = $_POST['orcamento_input'];
}

$textWithoutLastTwoChars = substr($value, 0, -2);
// Remove todos os pontos
$numberWithoutDots = str_replace('.', '', $textWithoutLastTwoChars);

// Substitui a vírgula por um ponto
$normalizedNumber = str_replace(',', '.', $numberWithoutDots);

// Converte para float
$number = floatval($normalizedNumber);

echo $number; // Output: 1111111
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamento</title>
    <style>
        .headline {
            display: flex;
            align-items: center;
        }
        .headline img {
            margin-right: 10px;
        }
        .headline .title-headline {
            font-size: 1.5em;
        }
        input {
            font-size: 1.2em;
            padding: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="headline">
        <img src="assets/icons/money.svg" alt="">
        <div class="title-headline">Orçamento disponível</div>
    </div>
    <form action="" method="POST">
    <input type="text" id="preco_input" name="orcamento_input">
    <button type="submit" name="submit">enviar</button>
    </form>

    <script>
        function formatarNumero(valor) {
            valor = valor.replace(/\D/g, ''); // Remove caracteres não numéricos
            if (valor === "") return "";
            
            valor = (parseInt(valor, 10) / 100).toFixed(2) + ''; // Converte para número e formata com duas casas decimais
            valor = valor.replace(".", ","); // Substitui ponto por vírgula
            valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, "."); // Adiciona pontos a cada milhar
            return valor;
        }

        const inputPreco = document.getElementById('preco_input');

        inputPreco.addEventListener('input', function() {
            let cursorPosition = this.selectionStart;
            let valorAntigo = this.value;

            this.value = formatarNumero(this.value);
            
            // Recalcular posição do cursor
            cursorPosition = this.value.length - valorAntigo.length + cursorPosition;
            this.setSelectionRange(cursorPosition, cursorPosition);
        });
    </script>
</body>
</html>
