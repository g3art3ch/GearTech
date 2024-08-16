<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo SweetAlert com PHP</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php
// Verifica uma condição no PHP (por exemplo, se as senhas não coincidem)
$senhasNaoCoincidem = true; // Supondo que a condição seja verdadeira

if ($senhasNaoCoincidem) {
    echo "<script type='text/javascript'>
        Swal.fire({
            position: 'top',
            icon: 'success',
            iconColor: '#23A669',
            title: 'Você já possui uma conta!',
            showConfirmButton: false,
            width: '27rem',
            showCloseButton: true,
            background: '#fafafa',
            color: '#000',
            customClass: {
                title: 'custom-title',
            }
        });
    </script>";
}
?>

</body>
</html>
