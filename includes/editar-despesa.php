<?php 

include_once 'conexao.php';

$id = $_POST['id'];
$despesa = utf8_encode($_POST['despesa']);
$data = utf8_encode($_POST['data']);
$valor = $_POST['valor'];




$sql = "UPDATE despesa SET nome='$despesa', data='$data', valor='$valor' WHERE id='$id'";

if(mysqli_query($conn, $sql)){


    echo"<script>window.alert('Despesa Alterada com Sucesso!');</script>";
    echo"<script>window.location.href='../despesas';</script>";




}else{



    echo"<script>window.alert('Erro na Alteração da Despesa!');</script>";
    echo"<script>window.location.href='../despesas';</script>";


}
























?>