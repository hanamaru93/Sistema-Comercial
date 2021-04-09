<?php 

include_once 'conexao.php';


$palavra = $_POST['palavra'];


$query = "SELECT * FROM cliente WHERE nome LIKE '%$palavra%' OR placa LIKE '%$palavra%'";
$resul = mysqli_query($conn, $query) or die();


if(mysqli_num_rows($resul) <= 0){


    echo"";



}else{




    while($dados = mysqli_fetch_array($resul)){

      
        echo"<tr>";
                                                    
         echo"<td>".$dados['id']."</td>";
         echo"<td>".utf8_decode($dados['nome'])."</td>";
         echo"<td>".utf8_decode($dados['placa'])."</td>";
         echo"<td>".utf8_decode($dados['veiculo'])."</td>";
         echo"<td>".utf8_decode($dados['cor'])."</td>";
         echo".<td style='text-align: center; !important'><a href='editar-venda?id=".$dados['id']."' /><i class='ti-pencil'> Editar </i></a></td>";
         echo"<td style='text-align: center; !important'><a href='includes/excluir-venda?id='".$dados['id']."'><i class='ti-trash'> Excluir </i></a></td>";

        echo"</tr>";    







    }






}