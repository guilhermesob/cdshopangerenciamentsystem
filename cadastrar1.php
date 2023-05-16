<?php
include_once('conexao.php');
include('protect.php');
$admin =  $_SESSION['admin'];
?>
<!doctype html>
<html lang="pt-br">
  <head>
  <title>Perfill</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="SUPER/style.css">
  <style>
div {text-align: center;}
h1 {text-align: center;}
</style>
</head>
<body>
<div style="background-color:#888; height:380px">
					<div style="align:center"> 
                <img src="logo.png " width="400px" height="200px" align="center" alt="logo do site">
				<div class="col-md-6 text-center mb-5">
				
				</div>
			</div>
	<div class="container">
			<div class="row justify-content-between">
				<div class="col">
					<a class="navbar-brand" href="menu.php">Menu <span>MusicTecc</span></a>
				</div>
				<div class="col d-flex justify-content-end">
					<div class="social-media">
		    		<p class="mb-0 d-flex">
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
		    		</p>
	    		</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	      <div class="collapse navbar-collapse" id="ftco-nav">
		  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item active"><a href="#" class="nav-link">Perfil</a></li>
				<li class="nav-item"><a href="menu.php" class="nav-link">Menu</a></li>
	        	<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">cd's</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="lancamentos.php">Lançamentos</a>
                <a class="dropdown-item" href="promocao.php">Promoção</a>
                 <a class="dropdown-item" href="mais_comprados.php">Mais comprados</a> 
              </div>
            </li>
              <li class="nav-item"><a href="carrinho.php" class="nav-link">Carrinho</a></li>
<?php
if($admin == "admin"){
  echo"<li class='nav-item dropdown'>";
echo"<a class='nav-link dropdown-toggle' href='#' id='dropdown04' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Administrador</a>";
echo"<div class='dropdown-menu' aria-labelledby='dropdown04'>";
echo"<a class='dropdown-item' href='listar_cliente.php'>Clientes Logados</a>";
echo"<a class='dropdown-item' href='listar_cds.php'>Todos os CDs</a>";
echo"<a class='dropdown-item' href='adm_cadastro.php'>Cadastra Novo Usuario</a>";
echo"</div>";
echo"</li>";
}
?>
	        </ul>
	      </div>
	    </div>
</div>
</div>
	  </nav> 
</body>
<br>
<?php
$id=$_POST['id'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$nome=$_POST['nome'];
$telefone=$_POST['telefone'];
$cpf=$_POST['cpf'];
$file =$_FILES['img'];
$img = "uploads/perfil.png";
$dirUploads ="uploads";
if(!is_dir($dirUploads)){
	mkdir($dirUploads);
}
if(move_uploaded_file($file["tmp_name"],$dirUploads . DIRECTORY_SEPARATOR . $file['name'])){
	$img = $dirUploads . DIRECTORY_SEPARATOR . '/' .$file['name'];
}
$sql= "UPDATE usuarios SET nome='$nome', email='$email', telefone='$telefone', cpf='$cpf', senha='$senha', imagem='$img' WHERE id='$id'";
if(mysqli_query($conexao,$sql)){
 echo "Usuario editado com sucesso!";
} else{
 echo "Não foi possivel editar o clientes". mysqli_error($conexao);
}
?>