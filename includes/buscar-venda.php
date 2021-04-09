<?php 

include_once 'conexao.php';


$palavra = $_POST['palavra'];


$query = "SELECT * FROM venda WHERE placa LIKE '%$palavra%' OR dat LIKE '%$palavra%'";
$resul = mysqli_query($conn, $query) or die();


if(mysqli_num_rows($resul) <= 0){


    echo"";



}else{




    while($dados = mysqli_fetch_array($resul)){

        $valor = $dados['valor'];
        $valor = floor($valor * 100) / 100;
        $vfinal = number_format($valor, 2, '.', ''); 
        echo"<tr>";
                                                    
         echo"<td>".$dados['id']."</td>";
         echo"<td>".utf8_decode($dados['nome'])."</td>";
         echo"<td>".date('d/m/Y', strtotime($dados['dat']))."</td>";
         echo"<td>".  $dados['placa']."</td>";
         echo"<td>".$dados['garantia']."</td>";
         echo"<td>".$vfinal."</td>";
         echo".<td style='text-align: center; !important'><a href='editar-venda?id=".$dados['id']."' /><i class='ti-pencil'> Editar </i></a></td>";
         echo"<td style='text-align: center; !important'><a href='includes/excluir-venda?id='".$dados['id']."'><i class='ti-trash'> Excluir </i></a></td>";

        echo"</tr>";    







    }






}