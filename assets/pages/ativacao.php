<?php

if(isset($_GET['hash'])){

    $hash = $_GET['hash'];

    //faz a conexão
    require('connection.php');

    //verifica se a hash resgatada ba url existe no banco de dados
    $sqlVerificaHash = "select hash from usuarios where hash = '$hash'";

    if($resultadoVerificaHash = mysqli_query($conn, $sqlVerificaHash)){

        $qtdLinhas = mysqli_num_rows($resultadoVerificaHash);

        if(qtdLinhas > 0){ 

            $sqlAlteraStatus = "update usuarios set status='2', hash='', ativacao=now()
            where hash = '$hash'";

            if(mysqli_query($conn, $sqlAlteraStatus)){
                echo"<div class='alert alert-sucess' role = 'alert'>

                Cadastro ativado com sucesso! <a href='login.php'> Clique aqui </a> para fazer o login

                </div>";
            }else{
                echo"<div class='alert alert-danger' role = 'alert'>

                Erro ao alterar o status: ".mysqli_error($conn). "</div>";

            }

        }else{ 

            echo"<div class='alert alert-danger' role = 'alert'>

            Código de ativação inválido!
            
            </div>
            <br>
            <a class='btn btn-primary' href='index.php'>Voltar</a>";

        }

    }


}else{

    echo"<div class='alert alert-danger' role = 'alert'>

            Este link de ativação é inválido!
            
            </div>
            <br>
            <a class='btn btn-primary' href='index.php'>Voltar</a>";

}

?>