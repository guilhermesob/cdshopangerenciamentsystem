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
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span>
	      </button>
	      </button>
				<form action="pesquisa.php" class="searchform order-lg-last">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" name="pesquisa" placeholder="procurar musicas aqui">
            <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
          </div>
          <div style='position:absolute;margin-left:250px;margin-top:-52px'>
          <div style="width:90px;height:25px;background-color:#222244;border-radius:20px;border:1px solid #555;float: left;margin:2px">
          <label>Nome </label>
            <input type="radio" name="nome" value="nome">
          </div>
          <div style="width:90px;height:25px;background-color:#222244;border-radius:10px;border:1px solid #555;float: left;margin:2px">
            <label>Artista </label>
            <input type="radio" name="nome" value="artista">
          </div>
          <div style="width:90px;height:25px;background-color:#222244;border-radius:10px;border:1px solid #555;float: left;margin:2px">
            <label>Gênero</label>
            <input type="radio" name="nome" value="genero">
          </div></div>
        </form>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a href="menu.php" class="nav-link">Menu</a></li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">cd's</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="lancamentos.php">Lançamentos</a>
                <a class="dropdown-item" href="promocao.php">Promoções</a>
                 <a class="dropdown-item" href="mais_comprados.php">Mais Comprados</a> 
                </div>
            </li>
              <li class="nav-item active"><a href="#" class="nav-link">Playlist</a></li>
              <li class="nav-item"><a href="carrinho.php?id=<?php echo $id?>" class="nav-link">Carrinho</a></li>
              <li class="nav-item"><a href="perfil.php" class="nav-link">Perfil
              <div  class="centralizado">
              <img class="perfil" src="<?php echo $imgs?>" width="25px" height="25px" alt="IMG"></div></a></li>
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
</body>
</html>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Imagem</th>
      <th scope="col">Nome de CD</th>
      <th scope="col">Musica</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
      <?php
      include_once('conexao.php');
      $ids=$_GET['id'];
      echo"<hr style='text-align: center'>"."<h1>"."Playlist"."</h1>"."<br>"."<br>";
      $sql = "SELECT * FROM playlist where nomep=$ids";
      $result = mysqli_query($conexao , $sql);
      while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $img = $row['img'];
        $nome = $row['nome'];
        $midia = $row['midia'];?>
    <tr>
      <td ><img src="<?php echo $img?>" width="100px" height="auto" alt="Imagem do cd"></td>
      <td><?php echo $nome?></td>
      <td><audio src="<?php echo $midia?>" controls></audio></td>
      <td>
      <form action="excluir_playlist.php" method="post">
  <input type="hidden" name="nomep" value="<?php  echo $ids?>" />
  <input type="hidden" name="id"  value="<?php  echo $id?>" />
  <input style="font-size: 20px;border: 2px solid #FFF;background-color:#fff;color:#fff000" type="submit" value="Excluir" />
</form></td>
    </tr>
      <?php } ?>
  </tbody>
</table>