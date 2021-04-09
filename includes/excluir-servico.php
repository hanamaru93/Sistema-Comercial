<?php
include_once 'conexao.php';

$id = $_GET["id"];



$sql = "DELETE FROM servico WHERE id = '$id'";
$query = mysqli_query($conn, $sql) or die();


if(!empty($query)){

    
    echo"<script>window.alert('Serviço Deletado com Sucesso!');</script>";
    echo"<script>window.location.href='../servicos';</script>";



}else{


    echo"<script>window.alert('Erro ao Deletar Serviço');</script>";
    echo"<script>window.location.href='../servicos';</script>";



}









?>