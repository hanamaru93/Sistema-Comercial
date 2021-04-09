<?php
include_once 'conexao.php';

$id = $_GET["id"];



$sql = "DELETE FROM venda WHERE id = '$id'";
$query = mysqli_query($conn, $sql) or die();


if(!empty($query)){

    
    echo"<script>window.alert('Venda Deletada com Sucesso!');</script>";
    echo"<script>window.location.href='../vendas';</script>";



}else{


    echo"<script>window.alert('A venda que você está querendo deletar já foi deletada!');</script>";
    echo"<script>window.location.href='../vendas';</script>";



}









?>