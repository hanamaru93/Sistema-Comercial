<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Sistema Comercial - Baixinho das Portas</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- v4.0.0 -->


<!-- Favicon -->
<link rel="icon" type="image/png" sizes="16x16" href="../dist/img/favicon-16x16.png">

</head>
<?php
error_reporting(0);
ini_set(“display_errors”, 0 );

include_once 'conexao.php';


$id = $_GET['id'];

$query = "SELECT * FROM venda WHERE id = '$id'";


$resul = mysqli_query($conn, $query) or die();



if(mysqli_num_rows($resul) <= 0){


    echo"";



}else{




    $dados = mysqli_fetch_assoc($resul);
 
    $valor = $dados['total'];
    $valor = floor($valor * 100) / 100;
    $vfinal = number_format($valor, 2, ',', ''); 
    $desconto = $dados['desconto'];
    $desconto = floor($desconto * 100) / 100;
    $dfinal = number_format($desconto, 2, ',', ''); 
    $total = $valor - $desconto; 
    
    if($desconto == 0){

        $des = "0.00";

    }else{

        $des = $desconto;

    }

    echo"<h2>Baixinho das Portas</h2>";
    echo"<p>(83) 9 8764-7274 / 3512-9438<br>";
    echo"Siga-nos no Instagram - @baixinhodasportas<br>";
    echo"Rua Professora Leonor Coutinho - Nº18 (Em frente ao antigo CAIC)</p>";

    echo"======================================= <br>";                                                
    echo"Nome:  ".utf8_decode($dados['nome'])."<br>";
    echo"Data:   ".date('d/m/Y',strtotime($dados['dat']))."<br>";
    echo"Veiculo:   ".utf8_decode($dados['veiculo'])."<br>";
    echo"Placa:   ".$dados['placa']."<br>";
    echo"Garantia: ".$dados['garantia']."<br>";
    echo"======================================= <br>";
    

          

       
    echo"<textarea class='form-control' name='servicos' id='servicos' style='width: 346px !important; height: 290px !important;' >".utf8_decode($dados['servicos'])."</textarea>";
                 


        

    
    echo"<br>";
    echo"<h4>Desconto=========================R$".$des."</h4>";
    echo"<h4>Total============================R$".$total."</h4>";
    

    echo"<script>window.print();</script>";
   
    






}
?>

</html>