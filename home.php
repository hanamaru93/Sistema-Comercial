
<!DOCTYPE html>
<html lang="en">
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

  ini_set('display_errors', 0 );
  error_reporting(0);

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
      <div class="pull-left search-box" style="display: none;">
        <form action="#" method="get" class="search-form">
          <div class="input-group">
            <input name="search" class="form-control" placeholder="" type="text">
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
      <h1>Home</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
      </ol>
    </div>
    
    
    <!-- Main content -->
    <div class="content">
      <div class="card">
      <div class="card-body">
      <h4 class="text-black">Vendas Recentes</h4>

      <div class="card m-t-3">
        <div class="card-body">
          <h4 class="text-black">Escolha a Periodicidade dos Ganhos e Despesas</h4>
          <a href="home?periodo=semanal"><button type="button" class="btn btn-outline-primary">Semanal</button></a>
          <a href="home?periodo=mensal"><button type="button" class="btn btn-outline-success">Mensal</button></a>
          <a href="home?periodo=anual"><button type="button" class="btn btn-outline-info">Anual</button></a>

        </div>
      </div>
      
      
      <?php 

          $periodo = $_GET['periodo'];

          
      
          include 'includes/conexao.php';

          if($periodo == "semanal"){

            $titulo = "Semanal"; 
            $data_atual = date("Y-m-d",strtotime(date("Y-m-d")."-7 days"));
            $sql_ganho_bruto = "SELECT SUM(total) AS tot FROM venda where dat >= '$data_atual'";
            $query_ganho_bruto = mysqli_query($conn, $sql_ganho_bruto) or die();
            $dados_ganho_bruto = mysqli_fetch_assoc($query_ganho_bruto);

            $sql_despesa = "SELECT SUM(valor) AS tot FROM despesa where data >= '$data_atual'";
            $query_despesa = mysqli_query($conn, $sql_despesa) or die();
            $dados_despesa = mysqli_fetch_assoc($query_despesa);

            $valor_ganho_bruto = $dados_ganho_bruto['tot'];

            if($valor_ganho_bruto != 0){

              $valor_ganho_bruto += 0.01;

            }

            $valor_ganho_bruto = floor($valor_ganho_bruto * 100) / 100;
            $total_ganho_bruto = number_format($valor_ganho_bruto, 2, ',', '.'); 

            $valor_despesa = $dados_despesa['tot'];

            if($valor_despesa != 0){

              $valor_despesa += 0.01;

            }

            $valor_despesa = floor($valor_despesa * 100) / 100;
            $total_despesa = number_format($valor_despesa, 2, ',', '.');
            
            $total_liquido = $dados_ganho_bruto['tot'] - $dados_despesa['tot'];

            if($total_liquido != 0){

              $total_liquido += 0.01;

            }
            $total_liquido= floor($total_liquido * 100) / 100;
            $total_liquido_final = number_format($total_liquido, 2, ',', '.');

            
            
            

          }

          if($periodo == "mensal"){

            $titulo = 'Mensal';
            $data_atual = date("Y-m-d",strtotime(date("Y-m-d")."-31 days"));
            $sql_ganho_bruto = "SELECT SUM(total) AS tot FROM venda where dat >= '$data_atual'";
            $query_ganho_bruto = mysqli_query($conn, $sql_ganho_bruto) or die();
            $dados_ganho_bruto = mysqli_fetch_assoc($query_ganho_bruto);

            $sql_despesa = "SELECT SUM(valor) AS tot FROM despesa where data >= '$data_atual'";
            $query_despesa = mysqli_query($conn, $sql_despesa) or die();
            $dados_despesa = mysqli_fetch_assoc($query_despesa);

            $valor_ganho_bruto = $dados_ganho_bruto['tot'];

            if($valor_ganho_bruto != 0){

              $valor_ganho_bruto += 0.01;

            }

            $valor_ganho_bruto = floor($valor_ganho_bruto * 100) / 100;
            $total_ganho_bruto = number_format($valor_ganho_bruto, 2, ',', '.'); 

            $valor_despesa = $dados_despesa['tot'];

            if($valor_despesa != 0){

              $valor_despesa += 0.01;

            }

            $valor_despesa = floor($valor_despesa * 100) / 100;
            $total_despesa = number_format($valor_despesa, 2, ',', '.');
            
            $total_liquido = $dados_ganho_bruto['tot'] - $dados_despesa['tot'];

            if($total_liquido != 0){

              $total_liquido += 0.01;

            }
            $total_liquido= floor($total_liquido * 100) / 100;
            $total_liquido_final = number_format($total_liquido, 2, ',', '.');
 
  
            }

            if($periodo == ''){

              $titulo = 'Mensal';
              $data_atual = date("Y-m-d",strtotime(date("Y-m-d")."-31 days"));
              $sql_ganho_bruto = "SELECT SUM(total) AS tot FROM venda where dat >= '$data_atual'";
              $query_ganho_bruto = mysqli_query($conn, $sql_ganho_bruto) or die();
              $dados_ganho_bruto = mysqli_fetch_assoc($query_ganho_bruto);

              $sql_despesa = "SELECT SUM(valor) AS tot FROM despesa where data >= '$data_atual'";
              $query_despesa = mysqli_query($conn, $sql_despesa) or die();
              $dados_despesa = mysqli_fetch_assoc($query_despesa);

              $valor_ganho_bruto = $dados_ganho_bruto['tot'];

              if($valor_ganho_bruto != 0){

                $valor_ganho_bruto += 0.01;

              }

              $valor_ganho_bruto = floor($valor_ganho_bruto * 100) / 100;
              $total_ganho_bruto = number_format($valor_ganho_bruto, 2, ',', '.'); 

              $valor_despesa = $dados_despesa['tot'];

              if($valor_despesa != 0){

                $valor_despesa += 0.01;

              }

              $valor_despesa = floor($valor_despesa * 100) / 100;
              $total_despesa = number_format($valor_despesa, 2, ',', '.');
              
              $total_liquido = $dados_ganho_bruto['tot'] - $dados_despesa['tot'];

              if($total_liquido != 0){

                $total_liquido += 0.01;

              }
              $total_liquido= floor($total_liquido * 100) / 100;
              $total_liquido_final = number_format($total_liquido, 2, ',', '.'); 
        
    
              }

            if($periodo == 'anual'){

              $titulo = 'Anual';
              $data_atual = date("Y-m-d",strtotime(date("Y-m-d")."-360 days"));
              $sql_ganho_bruto = "SELECT SUM(total) AS tot FROM venda where dat >= '$data_atual'";
              $query_ganho_bruto = mysqli_query($conn, $sql_ganho_bruto) or die();
              $dados_ganho_bruto = mysqli_fetch_assoc($query_ganho_bruto);

              $sql_despesa = "SELECT SUM(valor) AS tot FROM despesa where data >= '$data_atual'";
              $query_despesa = mysqli_query($conn, $sql_despesa) or die();
              $dados_despesa = mysqli_fetch_assoc($query_despesa);

              $valor_ganho_bruto = $dados_ganho_bruto['tot'];

              if($valor_ganho_bruto != 0){

                $valor_ganho_bruto += 0.01;

              }

              $valor_ganho_bruto = floor($valor_ganho_bruto * 100) / 100;
              $total_ganho_bruto = number_format($valor_ganho_bruto, 2, ',', '.'); 

              $valor_despesa = $dados_despesa['tot'];

              if($valor_despesa != 0){

                $valor_despesa += 0.01;

              }

              $valor_despesa = floor($valor_despesa * 100) / 100;
              $total_despesa = number_format($valor_despesa, 2, ',', '.');
              
              $total_liquido = $dados_ganho_bruto['tot'] - $dados_despesa['tot'];

              if($total_liquido != 0){

                $total_liquido += 0.01;

              }
              $total_liquido= floor($total_liquido * 100) / 100;
              $total_liquido_final = number_format($total_liquido, 2, ',', '.');

    
              }

      ?>
      <div class="row" style="margin-top: 2%;">
        <div class="col-lg-5">
          <div class="tile-progress tile-cyan">
            <div class="tile-header">
              <h5>Ganho Bruto <?php echo $titulo ?></h5>
              <h3>R$ <?php echo $total_ganho_bruto; ?></h3>
            </div>
            
          </div>
        </div>
        <div class="col-lg-3">
          <div class="tile-progress tile-red">
            <div class="tile-header">
              <h5>Despesa <?php echo $titulo ?></h5>
              <h3>R$ <?php echo $total_despesa; ?></h3>
            </div>
            
          </div>
        </div>
        <div class="col-lg-4">
          <div class="tile-progress tile-aqua">
            <div class="tile-header">
              <h5>Ganho Liquido <?php echo $titulo ?></h5>
              <h3>R$ <?php echo $total_liquido_final; ?></h3>
            </div>
          </div>
        </div>
      </div>
      <p>Exporte os dados para CSV, Excel, PDF ou Faça Impressão</p>
      <div class="table-responsive">
                  <table id="example2" class="table table-bordered table-hover" data-name="cool-table">
                    <thead>
                      <tr>
                        <th>ID #</th>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Placa</th>
                        <th>Garantia</th>
                        <th style="width: 14%;">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    
                    

                    $sql = "SELECT * FROM venda order by dat desc";
                    $query = mysqli_query($conn, $sql) or die();

                    while($dados = mysqli_fetch_array($query)){
                    
                      $valor = $dados['total'];
                      $valor = floor($valor * 100) / 100;
                      $vfinal = number_format($valor, 2, '.', '');   

                    ?>
                      <tr>
                        <td><?php echo $dados['id']; ?></td>
                        <td><?php echo utf8_decode($dados['nome']); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($dados['dat'])); ?></td>
                        <td><?php echo $dados['placa']; ?></td>
                        <td><?php echo $dados['garantia']; ?></td>
                        <td><?php echo "R$ ".$vfinal; ?></td>
                        <td style="text-align: center; !important"><a href="editar-venda?id=<?php echo $dados['id']; ?>"><i class="ti-pencil"> Editar </i></a></td>
                        <td style="text-align: center; !important"><a href="includes/excluir-venda?id=<?php echo $dados['id']; ?>"><i class="ti-trash"> Excluir </i></a></td>
                      </tr>
                    <?php  } ?>
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID #</th>
                        <th>Opended by</th>
                        <th>Cust.Email</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Assign to</th>
                        <th>Date</th>
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
</body>
</html>