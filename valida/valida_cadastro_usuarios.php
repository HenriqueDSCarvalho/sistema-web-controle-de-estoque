<?php
ob_start();
session_start();
require "../dao/conexao.php";

if (isset($_POST['cadastrar_usuarios'])) {

    $nome_cliente= ($_POST['nome_cli']);
    $identidade = ($_POST['identidade']);
    

    //inserir no banco.
    $sql = "INSERT INTO usuarios (usuario,senha)
          VALUE ('$nome_cliente','$identidade')";

    //Incluir
    $resultado = mysqli_query($conexao, $sql);

    if (!isset($resultado)){
        $_SESSION['cliente_nao_cadastrado'] = true;
        header('Location:../view/lista_usuarios.php');

    } else {
        $_SESSION['cliente_cadastrado'] = true;
        header('Location:../view/lista_usuarios.php');
        exit();
        
    }
} else {
    echo "<script> alert('Não foi possível fazer o cadastro');</script>";
}
