<?php

include 'conexao.php';



if (!empty($_POST) AND (empty($_POST['login']) OR empty($_POST['senha']))){
    
    header("Location: ../login");

}



$login = mysqli_real_escape_string($conn, $_POST['login']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);


$sql = "SELECT id, nome, foto FROM login WHERE login = '$login' AND senha = '$senha' LIMIT 1";

$query = mysqli_query($conn, $sql);
  if (mysqli_num_rows($query) != 1) {
      // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
      
      echo"<script> window.alert('Login e/ou Senha Incorreto(s)!'); </script>";
      echo"<script> window.location.href = '../login'; </script>";
      
      exit;


  } else {
      // Salva os dados encontados na variável $resultado
      $resultado = mysqli_fetch_assoc($query);

      if (!isset($_SESSION)) session_start();

      // Salva os dados encontrados na sessão
      $_SESSION['id'] = $resultado['id'];
      $_SESSION['nome'] = $resultado['nome'];
      $_SESSION['foto'] = $resultado['foto'];

      // Redireciona o visitante
      header("Location: ../home"); exit;
  }




?>