<?php
include_once 'conexao.php';

$id = $_GET["id"];



$sql = "DELETE FROM cliente WHERE id = '$id'";
$query = mysqli_query($conn, $sql) or die();


if(!empty($query)){

    
    echo"<script>window.alert('Cliente Deletado com Sucesso!');</script>";
    echo"<script>window.location.href='../clientes';</script>";



}else{


    echo"<script>window.alert('Erro ao Deletar Cliente');</script>";
    echo"<script>window.location.href='../clientes';</script>";



}









?>