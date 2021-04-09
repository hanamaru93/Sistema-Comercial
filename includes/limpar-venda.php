<?php
include_once 'conexao.php';

$placa = $_GET["placa"];
$dat = date("Y-m-d");



$sql = "DELETE FROM venda WHERE placa = '$placa' AND dat = '$dat'";
$query = mysqli_query($conn, $sql) or die();


if(!empty($query)){

    
    echo"<script>window.alert('Vendas deletadas com Sucesso!');</script>";
    echo"<script>window.location.href='../vendas';</script>";



}else{


    echo"<script>window.alert('A venda que você está querendo limpar já foi deletada!');</script>";
    echo"<script>window.location.href='../vendas';</script>";



}









?>