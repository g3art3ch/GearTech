<?php 
include('connection.php');

function validarSenha($senha) {
    $erros = [];

    // Verifica o comprimento mínimo da senha
    if (strlen($senha) < 8) {
        $erros[] = "A senha deve ter pelo menos 8 caracteres.";
    }

    // Verifica se a senha contém pelo menos uma letra maiúscula
    if (!preg_match('/[A-Z]/', $senha)) {
        $erros[] = "A senha deve conter pelo menos uma letra maiúscula.";
    }

    // Verifica se a senha contém pelo menos uma letra minúscula
    if (!preg_match('/[a-z]/', $senha)) {
        $erros[] = "A senha deve conter pelo menos uma letra minúscula.";
    }

    // Verifica se a senha contém pelo menos um número
    if (!preg_match('/[0-9]/', $senha)) {
        $erros[] = "A senha deve conter pelo menos um número.";
    }

    // Verifica se a senha contém pelo menos um caractere especial
    if (!preg_match('/[\W_]/', $senha)) {
        $erros[] = "A senha deve conter pelo menos um caractere especial.";
    }

    if (empty($erros)) {
        return true; // Senha válida
    } else {
        return $erros; // Retorna os erros encontrados
    }
}

if (isset($_POST["submit"])) {
    $email = $_POST['email'];

    // Verificar existencia de usuario
    $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if($quantidade == 1) {
        header("Location: register.php?error=Email já cadastrado");
    } else {
        $hash = sprintf('%07X', mt_rand(0,0xFFFFFFF));
        $nomeUsuario = $_POST['nomeUsuario'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senhaC = $_POST['senhaC'];
        
        if($nomeUsuario == null) {
            header("Location: /GearTech/assets/pages/register.php?error=Insira seu nome.");
            exit();
        } else if($email == null) {
            header("Location: /GearTech/assets/pages/register.php?error=Insira seu email.");
            exit();
        } else if($senha == null) {
            header("Location: /GearTech/assets/pages/register.php?error=Insira sua senha.");
            exit();
        } else if ($senha !== $senhaC) {
            header("Location: /GearTech/assets/pages/register.php?error=As senhas não coincidem.");
            exit();
        }

        $validacaoSenha = validarSenha($senha);

        if ($validacaoSenha !== true) {
            $erroMsg = implode('<br>', $validacaoSenha);
            header("Location: /GearTech/assets/pages/register.php?error=$erroMsg");
            exit();
        }
    
        if ($nomeUsuario != null) {
            $result = "INSERT INTO usuarios(nomeUsuario, email, senha, status, hash, cadastro) 
            VALUES ('$nomeUsuario', '$email', '$senha', '1', '$hash', now())";
    
            if ($mysqli->query($result) === TRUE) {
                echo "Usuário cadastrado com sucesso.";
                require('envia_email.php');
            } else {
                echo "Erro ao cadastrar usuário: " . $mysqli->error;
            }
        } 
    }
}
?>

    
 

