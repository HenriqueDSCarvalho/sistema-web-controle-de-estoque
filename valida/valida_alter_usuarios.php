<?php
ob_start();
session_start();
require "../dao/conexao.php";

$cod_prod = $_POST['cod_prod'];
echo $cod_prod;


if (isset($_POST['alterar'])) {

    //verificando posts
    if (isset($_POST['nome']) && ($_POST['nome']) != "") {

        $novo_nome = ($_POST['nome']);

        $sql = "UPDATE usuarios SET usuario='$novo_nome' WHERE id ='$cod_prod'";

        $resultado = mysqli_query($conexao, $sql);

        if (isset($resultado)) {
            $_SESSION['prod_alterado'] = true;
        }
    }

    if (isset($_POST['nova_unidade']) && ($_POST['nova_unidade']) != "") {

        $nova_unidade = ($_POST['nova_unidade']);

        $sql = "UPDATE produto SET unidade='$nova_unidade' WHERE codigo ='$cod_prod'";

        $resultado = mysqli_query($conexao, $sql);

        if (isset($resultado)) {
            $_SESSION['prod_alterado'] = true;
        }
    }
    


    $responsavel = $_SESSION['usuario'];

    //inserir no banco.
    $sql = "UPDATE produto SET responsavel='$responsavel'WHERE codigo ='$cod_prod'";

    //Incluir
    $resultado = mysqli_query($conexao, $sql);

    if (isset($_SESSION['prod_alterado'])) {
        header('Location:../view/lista_usuarios.php');
    } else {
        $_SESSION['prod_nao_alterado'] = true;
        header('Location:../view/lista_usuarios.php');
    }
} else {
    echo "<script> alert('Não foi possível fazer o cadastro');</script>";
}
