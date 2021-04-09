<?php 

include_once 'conexao.php';

$id = $_POST['id'];
$nome = utf8_encode($_POST['nome']);
$dat = $_POST['dat'];
$veiculo = utf8_encode($_POST['veiculo']);
$placa = $_POST['placa'];
$cor = utf8_encode($_POST['cor']);
$servico = utf8_encode($_POST['servico']);
$pagamento = utf8_encode($_POST['pagamento']);
$garantia = utf8_encode($_POST['garantia']);
$desconto = $_POST['desconto'];
$valor = $_POST['valor'];


$sql = "UPDATE venda SET nome='$nome', dat='$dat', veiculo='$veiculo', placa='$placa', cor='$cor', 
servicos='$servico', pagamento='$pagamento', garantia='$garantia', desconto='$desconto', total='$valor' 
WHERE id='$id'";

if(mysqli_query($conn, $sql)){


    echo"<script>window.alert('Vendas Alterada com Sucesso!');</script>";
    echo"<script>window.location.href='../vendas';</script>";




}else{



    echo"<script>window.alert('Erro na Alteração da Venda!');</script>";
    echo"<script>window.location.href='../vendas';</script>";


}
























?>