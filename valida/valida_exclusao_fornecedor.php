<?php
ob_start();

require "../dao/conexao.php";
$id = $_GET['id'];

if (isset($_GET['id'])) {

    $id_for = ($_GET['id']);


    //excluir no banco.
    $sql = "DELETE FROM fornecedores WHERE id='$id_for'";

    //conexão
    $resultado = mysqli_query($conexao, $sql);

    if (!isset($resultado)){
        echo "Falha ao inserir dados!";
    } else {
        $_SESSION['deletado'] = true;
        header('Location:../view/lista_fornecedores.php');
        exit();
        
    }
} else {
    echo "<script> alert('Não foi possível excluir o fornecedor');</script>";
}