<?php 

include_once 'conexao.php';


$nome = utf8_encode($_POST['nome']);
$placa = $_POST['placa'];
$veiculo = utf8_encode($_POST['veiculo']);
$cor = utf8_encode($_POST['cor']);


$sql = "INSERT INTO cliente (nome, placa, veiculo, cor)
VALUES ('$nome', '$placa', '$veiculo', '$cor')";

if(mysqli_query($conn, $sql)){


    echo"<script>window.alert('Cliente Cadastrado com Sucesso!');</script>";
    echo"<script>window.location.href='../clientes';</script>";




}else{



    echo"<script>window.alert('Erro ao Cadastrar Cliente!');</script>";
    echo"<script>window.location.href='../clientes';</script>";


}
























?>