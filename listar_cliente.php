<?php
include_once('conexao.php');
$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexao,$sql);
if(isset($_SESSION)){
    session_start();
}
include('protect.php');
$id =  $_SESSION['id'];
$admin =  $_SESSION['admin'];
$sql = "SELECT * FROM usuarios where id = $id";
  $result = mysqli_query($conexao , $sql);
  while($row = mysqli_fetch_assoc($result)) {
  $id = $row['id'];
  $imgs = $row['imagem'];
  }
?>
<!doctype html>
<html lang="pt-br">
  <head>
  <style>
    .perfil {border-radius:50%;}
.centralizado {
  position: relative;
   top: -15px;
  border: 2px solid #FFF;
  width: 30px;
  height: 30px;
  margin: 10px;
  border-radius:50%;
  background-color:#888;
  float: right;
  }
div {text-align: center;}
</style>
  	<title>Listar clientes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="SUPER/style.css">
	</head>
	<body style="background-color:#fff">
    <div style="background-color:#888; height:350px">
	<section class="ftco-section">
		<div style="align:center">
			<div style="align:center">
        <h1 style="margin-top: -90px; font-family:italic; font-size: 90px;">MusicTec</h1>
				<div class="col-md-6 text-center mb-5">
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row justify-content-between">
				<div class="col">
					<a class="navbar-brand" href="index.php">login <span>MusicTec</span></a>
				</div>
			</div>
      </div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    <!-- aqui -->
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span>
	      </button>
	      </button>
				<form action="pesquisa.php" class="searchform order-lg-last">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" name="pesquisa" placeholder="procurar musicas aqui">
            <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
          </div>
          <input type="hidden" name="nome" value="nome">
        </form>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a href="menu.php" class="nav-link">Menu</a></li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">cd's</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="promocao.php">Promoções</a>
                 <a class="dropdown-item" href="mais_comprados.php">Mais Comprados</a> 
                </div>
            </li>
              <li class="nav-item"><a href="carrinho.php?id=<?php echo $id?>" class="nav-link">Carrinho</a></li>
              <li class="nav-item"><a href="perfil.php" class="nav-link">Perfil
              <div  class="centralizado">
              <img class="perfil" src="<?php echo $imgs?>" width="25px" height="25px" alt="IMG"></div></a></li>
	        	<li class="nav-item active"><a href="#" class="nav-link">Listar clientes</a></li>
<?php
if($admin == "admin"){
  echo"<li class='nav-item dropdown'>";
echo"<a class='nav-link dropdown-toggle' href='#' id='dropdown04' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Administrador</a>";
echo"<div class='dropdown-menu' aria-labelledby='dropdown04'>";
echo"<a class='dropdown-item' href='listar_cliente.php?pesquisa=a'>Clientes Logados</a>";
echo"<a class='dropdown-item' href='listar_cds.php'>Todos os CDs</a>";
echo"<a class='dropdown-item' href='adm_cadastro.php'>Cadastra Novo Usuario</a>";
echo"<a class='dropdown-item' href='cad_cd.php'>Cadastra Novo Cd</a>";
echo"</div>";
echo"</li>";
}
?>
	        </ul>
	      </div>
	    </div>
</div>
	  </nav>
	</section>
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</div>
    </section>
    <div style="background-color:#fff; height:40px"></div>
    <form action="listar_cliente.php" method="GET" class="pesquisa">
            <input style="width:50%;border-radius:10px;margin-left:20%" type="search" name="pesquisa" placeholder="procurar nome do cliente">
            <button style="border-radius:20px">
                <svg width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                  <path fill-rule="evenodd"
                    d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                </svg>
                </button>
</form>
</body>
</html>
<table class="table">
  <thead>
    <tr>
    <th scope="col">img</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
      <th scope="col">CPF</th>
      <th scope="col">Senha</th>
      <th scope="col">administrador</th>
      <th scope="col">Editar</th>
      <th scope="col">Compras</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $pesquisa = $_GET['pesquisa'];
      $sql_code = "SELECT * FROM usuarios WHERE nome LIKE '$pesquisa%' LIMIT 1 ";
            $result = mysqli_query($conexao,$sql_code);
            while($row = mysqli_fetch_assoc($result)){ ?>
    <tr>
    <td ><img src="<?php echo $row['imagem']?>" alt="<?php echo $row['imagem']?>" style="max-width: 200px; min-width: 30px; height: 50px;"></td>
      <td ><?php echo $row['nome']?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['telefone']?></td>
      <td><?php echo $row['cpf']?></td>
      <td><?php echo $row['senha']?></td>
      <td><?php echo $row['admin']?></td>
      <td><a href="editar_cliente.php?id=<?php  echo $row['id']?>">Editar</a></td>
      <td><a href="carrinho.php?id=<?php  echo $row['id']?>">Compras</a></td>
      <td><a href="excluir_cliente.php?id=<?php  echo $row['id']?>">Excluir</a></td>
    </tr>
      <?php } ?>
      <br>
      <br>
      </tbody>
</table>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
      <th scope="col">CPF</th>
      <th scope="col">Senha</th>
      <th scope="col">administrador</th>
      <th scope="col">Editar</th>
      <th scope="col">Compras</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
      <?php
      echo"<hr style='text-align: center'>"."<h1>"."Lista de clientes"."</h1>"."<br>"."<br>";
      $sql = "SELECT * FROM usuarios where id = $id";
      $result = mysqli_query($conexao , $sql);
      while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
      }
      while($row = mysqli_fetch_assoc($resultado)) { ?>
    <tr>
      <td ><?php echo $row['nome']?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['telefone']?></td>
      <td><?php echo $row['cpf']?></td>
      <td><?php echo $row['senha']?></td>
      <td><?php echo $row['admin']?></td>
      <td><a href="editar_cliente.php?id=<?php  echo $row['id']?>">Editar</a></td>
      <td><a href="carrinho.php?id=<?php  echo $row['id']?>">Compras</a></td>
      <td><a href="excluir_cliente.php?id=<?php  echo $row['id']?>">Excluir</a></td>
    </tr>
      <?php } ?>
  </tbody>
</table>