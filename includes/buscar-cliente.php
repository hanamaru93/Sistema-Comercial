<?php

include_once("conexao.php");

function retorna($placa, $conn){
    
    $query = "SELECT * FROM cliente WHERE placa = '$placa'";
    $resul = mysqli_query($conn, $query) or die();

    if($resul->num_rows){
        
        $dados = mysqli_fetch_assoc($resul);
        $cliente['nome'] = utf8_decode($dados['nome']);
        $cliente['veiculo'] = utf8_decode($dados['veiculo']);
        $cliente['cor'] = utf8_decode($dados['cor']);

        
    }else{

        $cliente['nome'] = 'Cliente não encontrado';




    }

    return json_encode($cliente);




}


if(isset($_GET['placa'])){

    echo retorna($_GET['placa'], $conn);

}






?>