<?php
error_reporting(0);
ini_set(“display_errors”, 0 );

include_once 'conexao.php';


$placa = $_POST['palavra'];
$data = date('Y-m-d');

$query = "SELECT * FROM venda WHERE placa = '$placa' AND DATE_FORMAT(dat, '%Y-%m-%d') = CURDATE()";
$query2 = "SELECT SUM(valor) as val FROM venda  WHERE placa = '$placa' AND DATE_FORMAT(dat, '%Y-%m-%d') = CURDATE()";
$query3 = "SELECT SUM(desconto) as desco FROM venda  WHERE placa = '$placa' AND DATE_FORMAT(dat, '%Y-%m-%d') = CURDATE()";

$resul = mysqli_query($conn, $query) or die();
$resul2 = mysqli_query($conn, $query2) or die();
$resul3 = mysqli_query($conn, $query3) or die();




if(mysqli_num_rows($resul) <= 0){


    echo"";



}else{




    $dados = mysqli_fetch_assoc($resul);
    $dados2 = mysqli_fetch_assoc($resul2);
    $dados3 = mysqli_fetch_assoc($resul3);
    $valor = $dados2['val'];
    $valor = floor($valor * 100) / 100;
    $vfinal = number_format($valor, 2, '.', ''); 
    $desconto = $dados3['desco'];
    $desconto = floor($desconto * 100) / 100;
    $dfinal = number_format($desconto, 2, '.', ''); 
    $total = $valor - $desconto; 

    echo"<tr>";
                                                    
    echo"<td>".utf8_decode($dados['nome'])."</td>";
    echo"<td>".date('d/m/Y',strtotime($dados['dat']))."</td>";
    echo"<td>".$dados['placa']."</td>";
    echo"<td>".$dados['garantia']."</td>";
    echo"<td>R$".$desconto."</td>";
    echo"<td>R$ ".$total."</td>";
    

    echo"</tr>";    







    






}
?>