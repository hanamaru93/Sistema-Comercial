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
<link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />


<!-- form wizard -->
<link rel="stylesheet" href="dist/plugins/formwizard/jquery-steps.css">

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
      <h1>Edição de Venda</h1>
      <ol class="breadcrumb">
        <li><a href="home">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Edição de Venda</li>
      </ol>
    </div>
    <?php $id = $_GET['id']; 
          
          $sql = "SELECT * FROM venda WHERE id='$id'";
          $query = mysqli_query($conn, $sql) or die();

          $dados = mysqli_fetch_assoc($query);
    
    
    
    
    ?>
    <!-- Main content -->
    <div class="content">            
      <div class="row m-t-3">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header bg-blue">
              <h5 class="m-b-0">Editar Venda</h5>
            </div>
            <div class="card-body">
              <form action="includes/editar-venda" method="POST" class="form-horizontal form-bordered">
                <div class="form-body">
                  <div class="form-group row">
                  
                    <label class="control-label text-right col-md-2">Nome</label>
                    <div class="col-md-9">
                      <input placeholder="Nome" name="nome" value="<?php echo utf8_decode($dados['nome']); ?>" class="form-control" type="text">
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label text-right col-md-2">Data</label>
                    <div class="col-md-9">
                      <input placeholder="Data" name="dat" class="form-control" value="<?php echo $dados['dat'];  ?>" type="date">
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label text-right col-md-2">Veículo</label>
                    <div class="col-md-9">
                      <input placeholder="Veículo" name="veiculo" value="<?php echo utf8_decode($dados['veiculo']); ?>" class="form-control" type="text">
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label text-right col-md-2">Placa</label>
                    <div class="col-md-9">
                      <input placeholder="Placa" onchange="Receber();" id="placa"  value="<?php echo $dados['placa']; ?>" name="placa" class="form-control" type="text">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label text-right col-md-2">Cor</label>
                    <div class="col-md-9">
                      <input placeholder="Cor" name="cor" value="<?php echo utf8_decode($dados['cor']); ?>" class="form-control" type="text">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label text-right col-md-2">Serviço</label>
                    <div class="col-md-2">
                    <a style="color: white !important;" id="adc" class="btn btn-primary" ><i class="ti-plus"> Adicionar</i></a>

                    </div>
                    <div class="col-md-3">
                      <select name="servico" id="serv" class="form-control js-example-basic-single">
                      <!--<option value="teste">teste</option>
                      <option value="teste2">teste2</option>-->

                      <?php $sql_servi = "SELECT * FROM servico"; 
                            $query_servi = mysqli_query($conn, $sql_servi);

                            while($servico = mysqli_fetch_assoc($query_servi)){
                      
                      
                            
                      ?>
                        

                        <option value="<?php echo utf8_decode($servico['servico']); ?>"><?php echo utf8_decode($servico['servico']); ?></option>
                        



                      <?php } ?>        
                      </select>
                    </div>
                    <div class="col-md-4" style="margin-bottom: 2%;">
                        <select id="lado" class="form-control js-example-basic-single">
                          <option >Escolha o lado</option>
                          <option value="D.D">D.D</option>
                          <option value="D.E">D.E</option>
                          <option value="T.D">T.D</option>
                          <option value="T.E">T.E</option>
                          <option value="P.M">P.M</option>
                        </select>
                    </div>
                    <label class="control-label text-right col-md-2">Valor</label>
                    <div class="col-md-9">
                     <input placeholder="0.00" id="valo"  name="valor" class="form-control dinheiro" type="text">
                    </div>
                  </div>
                  <div class="form-group row">
                  <label class="control-label text-right col-md-2">Serviços</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="servicos" id="servicos" rows="8" ><?php echo utf8_decode($dados['servicos']); ?></textarea>
                    </div>
                  </div>  
            
                    
                  <div class="form-group row">
                    <label class="control-label text-right col-md-2">Pagamento</label>
                    <div class="col-md-9">
                      <select name="pagamento" class="form-control">
                        <option value="<?php echo utf8_decode($dados['pagamento']); ?>"> <?php echo utf8_decode($dados['pagamento']); ?> </option>
                        <option value="A Vista">A Vista</option>
                        <option value="Cartão de Débito">Cartão Débito</option>
                        <option value="Cartão de Crédito">Cartão Crédito</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label text-right col-md-2">Garantia</label>
                    <div class="col-md-9">
                      <select name="garantia" class="form-control">
                        <option value="<?php echo $dados['garantia']; ?>"> <?php echo $dados['garantia']; ?> </option>
                        <option>30 Dias</option>
                        <option>90 Dias</option>
                        <option>1 Ano</option>
                      </select>
                    </div>  
                  </div>

                  <div class="form-group row">
                    <label class="control-label text-right col-md-2">Desconto</label>
                    <div class="col-md-9">
                      <input placeholder="0.00" value="<?php echo $dados['desconto']; ?>"  name="desconto" class="form-control dinheiro" type="text">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="control-label text-right col-md-2">Total</label>
                    <div class="col-md-9">
                      <input placeholder="0.00" value="<?php echo $dados['total']; ?>"   name="total" class="form-control dinheiro" type="text">
                    </div>
                  </div>
                  
                  <input  name="id" value="<?php echo $dados['id']; ?>" class="form-control" type="text" hidden>
                </div>
                <div class="form-actions">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="offset-sm-2 col-md-9">
                          <button type="submit"  class="btn btn-primary"><i class="ti-save"> Salvar</i></button>
                          <a href="home"><button  class="btn btn-success"><i class="ti-thumb-up"> Cancelar</i></button></a>
                          <a href="includes/imprimir?id='<?php echo $dados['id']; ?>'" target="_blank"><div class="btn btn-secondary"><i class="ti-printer"> Imprimir</i></div></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>

              
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">Versão 1.0</div>
    Copyright © <?php  echo date('Y');  ?> Felipe Barbosa Belarmino dos Santos(Analista Desenvolvedor).
  </footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/adminkit.js"></script>

<!-- form wizard --> 
<script src="dist/plugins/formwizard/jquery-steps.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<!--<script>
    var frmRes = $('#frmRes');
    var frmResValidator = frmRes.validate();
	
    var frmInfo = $('#frmInfo');
    var frmInfoValidator = frmInfo.validate();

    var frmLogin = $('#frmLogin');
    var frmLoginValidator = frmLogin.validate();

    var frmMobile = $('#frmMobile');
    var frmMobileValidator = frmMobile.validate();

    $('#demo1').steps({
      onChange: function (currentIndex, newIndex, stepDirection) {
        console.log('onChange', currentIndex, newIndex, stepDirection);
        // tab1
        if (currentIndex === 0) {
          if (stepDirection === 'forward') {
            var valid = frmRes.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmResValidator.resetForm();
          }
        }
		
		// tab2
        if (currentIndex === 1) {
          if (stepDirection === 'forward') {
            var valid = frmInfo.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmInfoValidator.resetForm();
          }
        }

        // tab3
        if (currentIndex === 2) {
          if (stepDirection === 'forward') {
            var valid = frmLogin.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmLoginValidator.resetForm();
          }
        }

        // tab4
        if (currentIndex === 3) {
          if (stepDirection === 'forward') {
            var valid = frmMobile.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmMobileValidator.resetForm();
          }
        }

        return true;

      },
      onFinish: function () {
        alert('Wizard Completed');
      }
    });
  </script> 
<script>
    $('#demo').steps({
      onFinish: function () {
        alert('Wizard Completed');
      }
    });
  </script>-->
<script> 

function Receber(){
  
  var placa = document.getElementById("placa").value;

  var link = "includes/limpar-venda?placa="+placa;
  var link2 = "includes/imprimir?placa="+placa;

  if(placa != ""){


    document.getElementById("limpar").href = link;
    document.getElementById("imprimir").href = link2;


  }}

</script>
<script src="buscar-cliente.js"></script>
<script src="buscar-vendas.js"></script>
<script src="buscar-total-vendas.js"></script> 
<script src="Inputmask-5.x/dist/jquery.inputmask.js"></script> 

<script>
$(document).ready(function(){
   $("#placa").inputmask({mask: 'AAA-9999'});
});
</script>
<script>
   $(".dinheiro").inputmask('99999999.99', { numericInput: true, placeholder: ''});
</script>
<script src="calctotal.js"></script>

</body>
</html>