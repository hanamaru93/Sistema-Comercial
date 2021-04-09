<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Sistema Comercial - Baixinho das Portas</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- v4.0.0 -->
<link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="16x16" href="dist/img/favicon-16x16.png">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/style.css">
<link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">
<link rel="stylesheet" href="dist/css/simple-lineicon/simple-line-icons.css">

<!-- DataTables -->
<link rel="stylesheet" href="dist/plugins/datatables/css/dataTables.bootstrap.min.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php

  include 'includes/conexao.php';
  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();

  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['nome'])) {
      
    // Destrói a sessão por segurança
      
      session_destroy();
      
      // Redireciona o visitante de volta pro login
      
      header("Location: login"); 
      
      exit;
  }
  
  if (empty($_SESSION['foto'])){

    $foto = "dist/img/sem-foto.jpg";

  }else{

    $foto = $_SESSION['foto'];


  }

  ?>

</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
<header class="main-header"> 
    <!-- Logo --> 
    <a href="" class="logo blue-bg"> 
    <!-- mini logo for sidebar mini 50x50 pixels --> 
    <span class="logo-mini"><img src="dist/img/logo-n-blue.png" alt=""></span> 
    <!-- logo for regular state and mobile devices --> 
    <span class="logo-lg"><img src="dist/img/logo-blue.png" alt=""></span> </a> 
    <!-- Header Navbar -->
    <nav class="navbar blue-bg navbar-static-top"> 
      <!-- Sidebar toggle button-->
      <ul class="nav navbar-nav pull-left">
        <li><a class="sidebar-toggle" data-toggle="push-menu" href=""></a> </li>
      </ul>
      <div class="pull-left search-box">
        <form action="" method="POST" class="search-form">
          <div class="input-group">
            <input name="pesquisar" id="pesquisar" class="form-control" placeholder="" type="text">
            <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
            </span></div>
        </form>
        <!-- search form --> </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages -->
        
          <!-- User Account  -->
          <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo $foto; ?>" class="user-image" alt="User Image"> <span class="hidden-xs"><?php echo $_SESSION['nome']; ?></span> </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <div class="pull-left user-img"><img src="<?php echo $foto; ?>" class="img-responsive img-circle" alt="User"></div>
                <p class="text-left"><?php echo $_SESSION['nome']; ?> <!--<small>florence@gmail.com</small>--> </p>
              </li>
              <li><a href="https://mail.google.com/" target="_blank"><i class="icon-envelope"></i> Gmail</a></li>
              <li><a href="https://login.live.com/" target="_blank"><i class="icon-envelope"></i> Hotmail</a></li>
              <li><a href="https://web.whatsapp.com/" target="_blank"><i class=" icon-phone"></i> Whatsapp Web</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="includes/logout"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"> 
    <!-- sidebar -->
    <div class="sidebar"> 
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image text-center"><img src="<?php echo $foto; ?>" class="img-circle" alt="User Image"> </div>
        <div class="info">
          <p><?php echo $_SESSION['nome']; ?></p>
          <a href=""><i class="fa fa-circle text-success"></i> Online</a> </div>
      </div>
      
      <!-- sidebar menu -->
      <?php include 'includes/menu.php'; ?>
    </div>
    <!-- /.sidebar --> 
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>Despesas</h1>
      <ol class="breadcrumb">
        <li><a href="">Despesas</a></li>
       
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="card">
      <div class="card-body">
      <h4 class="text-black">Lista de Despesas </h4> 
      <p>Exporte os dados para CSV, Excel, PDF ou Faça Impressão</p>
      <a href="cadastrar-despesa"><button type="button" class="btn btn-success" style="width: 56%;">+ Nova Despesa</button></a>
      <div class="table-responsive">
                  <table id="example2" class="table table-bordered table-hover" data-name="cool-table">
                    <thead>
                      <tr>
                        <th>ID #</th>
                        <th>Despesa</th>
                        <th>Data</th>
                        <th>Valor</th>
                        
                      
                        
                      </tr>
                    </thead>
                    
                    <tbody class="resultado">
                    <?php 
                    
                    include 'includes/conexao.php';

                    $sql = "SELECT * FROM despesa order by id desc limit 0,10";
                    $query = mysqli_query($conn, $sql) or die();

                    while($dados = mysqli_fetch_array($query)){
                    
                      $valor = $dados['valor'];
                      $valor = floor($valor * 100) / 100;
                      $vfinal = number_format($valor, 2, '.', ''); 

                    
                    ?>
                      <tr>
                        <td><?php echo $dados['id']; ?></td>
                        <td><?php echo utf8_decode($dados['nome']); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($dados['data'])); ?></td>
                        <td><?php echo "R$ ".$vfinal; ?></td>
                        <td style="text-align: center; !important"><a href="editar-despesa?id=<?php echo $dados['id']; ?>"><i class="ti-pencil"> Editar </i></a></td>
                        <td style="text-align: center; !important"><a href="includes/excluir-despesa?id=<?php echo $dados['id']; ?>"><i class="ti-trash"> Excluir </i></a></td>
                      </tr>
                    <?php  } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID #</th>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Placa</th>
                        <th>Garantia</th>
                        <th style="padding-right: 9%;">Valor</th>
                      </tr>
                    </tfoot>
                  </table>
                  </div>
      </div></div>
      
     
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">Versão 1.0</div>
    Copyright © <?php  echo date('Y');  ?> Felipe Barbosa Belarmino dos Santos(Analista Desenvolvedor).</footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script>
 
<script src="dist/plugins/popper/popper.min.js"></script>

<!-- v4.0.0-alpha.6 -->
<script src="dist/bootstrap/js/bootstrap.min.js"></script>

<!-- template --> 
<script src="dist/js/adminkit.js"></script>

<!-- DataTable --> 
<script src="dist/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="dist/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script src="dist/plugins/table-expo/filesaver.min.js"></script>
<script src="dist/plugins/table-expo/xls.core.min.js"></script>
<script src="dist/plugins/table-expo/tableexport.js"></script>
<script>
$("table").tableExport({formats: ["xlsx","xls", "csv", "txt"],    });
</script>
<script>
$('#pesquisar').keyup(function() {

var pesquisar = $(this).val();

if (pesquisar != '') {

    var dados = {

        palavra: pesquisar

    }

    $.post('includes/buscar-venda.php', dados, function(retorna) {

        $(".resultado").html(retorna);
      




    });
} else {




    $(".resultado").html('');
  
    







}



})
</script>

</body>
</html>