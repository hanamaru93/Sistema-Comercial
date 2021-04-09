<?php 

include_once 'conexao.php';


$servico = utf8_encode($_POST['servico']);
$valor = $_POST['valor'];



$sql = "INSERT INTO servico (servico,  valor)
VALUES ('$servico', '$valor')";

if(mysqli_query($conn, $sql)){


    echo"<script>window.alert('Serviço Cadastrado com Sucesso!');</script>";
    echo"<script>window.location.href='../servicos';</script>";




}else{



    echo"<script>window.alert('Erro ao Cadastrar Serviço!');</script>";
    echo"<script>window.location.href='../servicos';</script>";


}
























?>