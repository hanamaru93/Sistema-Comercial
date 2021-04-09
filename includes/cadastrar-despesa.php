<?php 

include_once 'conexao.php';


$nome = utf8_encode($_POST['despesa']);
$data = $_POST['data'];
$valor = $_POST['valor'];



$sql = "INSERT INTO despesa (nome, data,  valor)
VALUES ('$nome', '$data', '$valor')";

if(mysqli_query($conn, $sql)){


    echo"<script>window.alert('Despesa Cadastrada com Sucesso!');</script>";
    echo"<script>window.location.href='../despesas';</script>";




}else{



    echo"<script>window.alert('Erro ao Cadastrar Despesa!');</script>";
    echo"<script>window.location.href='../despesas';</script>";


}
























?>