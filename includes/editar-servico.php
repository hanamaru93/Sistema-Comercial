<?php 

include_once 'conexao.php';

$id = $_POST['id'];
$servico = utf8_encode($_POST['servico']);
$valor = $_POST['valor'];




$sql = "UPDATE servico SET servico='$servico', valor='$valor' WHERE id='$id'";

if(mysqli_query($conn, $sql)){


    echo"<script>window.alert('Serviço Alterado com Sucesso!');</script>";
    echo"<script>window.location.href='../servicos';</script>";




}else{



    echo"<script>window.alert('Erro na Alteração do Serviço!');</script>";
    echo"<script>window.location.href='../servicos';</script>";


}
























?>