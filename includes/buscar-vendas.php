<?php
error_reporting(0);
ini_set(“display_errors”, 0 );

include_once 'conexao.php';


$placa = $_POST['palavra'];
$data = date('Y-m-d');

$query = "SELECT * FROM venda WHERE placa = '$placa' AND DATE_FORMAT(dat, '%Y-%m-%d') = CURDATE()";
$resul = mysqli_query($conn, $query) or die();


if(mysqli_num_rows($resul) <= 0){


    echo"";



}else{




    while($dados = mysqli_fetch_array($resul)){


        echo"<tr>";
                                                    
        echo"<td>".$dados['id']."</td>";
        echo"<td>".date('d/m/Y',strtotime($dados['dat']))."</td>";
        echo"<td>".utf8_decode($dados['nome'])."</td>";
        echo"<td>".$dados['servico']."</td>";
        echo"<td>".$dados['placa']."</td>";
        $valor = $dados2['valor'];
        $valor = floor($valor * 100) / 100;
        $vfinal = number_format($valor, 2, ',', ''); 
        echo"<td>R$ ".$vfinal."</td>";

        echo"</tr>";    







    }






}
?>