<?php 

include_once 'conexao.php';


$nome = utf8_encode($_POST['nome']);
$dat = $_POST['dat'];
$veiculo = utf8_encode($_POST['veiculo']);
$placa = $_POST['placa'];
$cor = utf8_encode($_POST['cor']);
$servico = utf8_encode($_POST['servicos']);
$pagamento = utf8_encode($_POST['pagamento']);
$garantia = utf8_encode($_POST['garantia']);
$desconto = $_POST['desconto'];
$valor = $_POST['total'];


$sql = "INSERT INTO venda (nome, dat, veiculo, placa, cor, servicos, pagamento, garantia, desconto, total)
VALUES ('$nome', '$dat', '$veiculo', '$placa', '$cor', '$servico', '$pagamento', '$garantia', '$desconto', '$valor')";

if(mysqli_query($conn, $sql)){


    echo"<script>window.alert('Vendas Adicionada com Sucesso!');</script>";
    echo"<script>window.location.href='../vendas';</script>";




}else{



    echo"<script>window.alert('Erro na Venda!');</script>";
    echo"<script>window.location.href='../vendas';</script>";


}
























?>