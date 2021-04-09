<?php

include_once("conexao.php");

function retorna($servico, $conn){
    
    $query = "SELECT * FROM servico WHERE servico = '$servico'";
    $resul = mysqli_query($conn, $query) or die();

    if($resul->num_rows){
        
        $dados = mysqli_fetch_assoc($resul);
        $val = $dados['valor'];
        $val = floor($val * 100) / 100;
        $valfinal = number_format($val, 2, '.', ''); 
        $valor['valor'] = $valfinal;
       

        
    }else{

        $valor['valor'] = 'Valor não encontrado';




    }

    return json_encode($valor);




}


if(isset($_GET['servico'])){

    echo retorna($_GET['servico'], $conn);

}






?>