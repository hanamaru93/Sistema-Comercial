<?php
include_once 'conexao.php';

$id = $_GET["id"];



$sql = "DELETE FROM despesa WHERE id = '$id'";
$query = mysqli_query($conn, $sql) or die();


if(!empty($query)){

    
    echo"<script>window.alert('Despesa Deletada com Sucesso!');</script>";
    echo"<script>window.location.href='../despesas';</script>";



}else{


    echo"<script>window.alert('Erro ao Deletar Despesa');</script>";
    echo"<script>window.location.href='../despesas';</script>";



}









?>