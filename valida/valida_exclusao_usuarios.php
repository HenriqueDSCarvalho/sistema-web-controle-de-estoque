<?php
ob_start();

require "../dao/conexao.php";
$id = $_GET['id'];

if (isset($_GET['id'])) {

    $id_user = ($_GET['id']);


    //inserir no banco.
    $sql = "DELETE FROM usuarios WHERE id='$id_user'";

    //Incluir
    $resultado = mysqli_query($conexao, $sql);

    if (!isset($resultado)){
        echo "Falha ao inserir dados!";
    } else {
        $_SESSION['deletado'] = true;
        header('Location:../view/lista_usuarios.php');
        exit();
        
    }
} else {
    echo "<script> alert('Não foi possível excluir o usuário');</script>";
}