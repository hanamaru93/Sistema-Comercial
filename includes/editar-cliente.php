<?php 

include_once 'conexao.php';

$id = $_POST['id'];
$nome = utf8_encode($_POST['nome']);
$placa = $_POST['placa'];
$veiculo = utf8_encode($_POST['veiculo']);
$cor = utf8_encode($_POST['cor']);



$sql = "UPDATE cliente SET nome='$nome', placa='$placa', veiculo='$veiculo', cor='$cor' 
WHERE id='$id'";

if(mysqli_query($conn, $sql)){


    echo"<script>window.alert('Cadastro do Cliente Alterado com Sucesso!');</script>";
    echo"<script>window.location.href='../clientes';</script>";




}else{



    echo"<script>window.alert('Erro na Alteração do Cadastro do Cliente!');</script>";
    echo"<script>window.location.href='../clientes';</script>";


}
























?>