<?php
include_once 'conexao.php';

$assunto = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

//SQL para selecionar os registros
$sql = "SELECT servico FROM servico WHERE servico LIKE '%".$assunto."%' ORDER BY servico ASC LIMIT 7";

//Seleciona os registros

$query = mysqli_query($conn, $sql);

while($row_msg_cont = mysqli_fetch_assoc($query)){
    $data[] = $row_msg_cont['servico'];
}

echo json_encode($data);