<?php
include('protect.php');
include_once('conexao.php');
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
  	<title>Editar cd</title>
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
            <li class="nav-item"><a href="Playlist.php?id=<?php echo $id?>" class="nav-link">Playlist</a></li>
              <li class="nav-item"><a href="carrinho.php" class="nav-link">Carrinho</a></li>
              <li class="nav-item"><a href="perfil.php" class="nav-link">Perfil
              <div  class="centralizado">
              <img class="perfil" src="<?php echo $imgs?>" width="25px" height="25px" alt="IMG"></div></a></li>
	        	<li class="nav-item active"><a href="#" class="nav-link">Novo cd</a></li>
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
<div style="background-image: url(images/bg.jpg);background-size: cover; background-repeat: no-repeat">
  <br>
<form enctype="multipart/form-data" action="cadastrar_cd.php" method="POST" enctype="multipart/form-data">
<div><input name="id" type="hidden" value="<?php echo $ids ?>"/></div>
<br>
<div>
<label style="margin-left: 30px;color:#0000ff">Nome: </label>
  <input style="border-radius:10px;background-color:#6666ff" name="nome" type="text" required/></div>
<br>
<div>
<label style="margin-left: 27px;color:#0000ff">Titulo: </label>
<input style="border-radius:10px;background-color:#6666ff" name="titulo" type="text" required/></div>
<br>
<div>
<label style="margin-left: 15px;color:#0000ff">Gênero: </label>
<input style="border-radius:10px;background-color:#6666ff" name="genero" type="text" required/></div>
<br>
<div>
<label style="margin-left: 20px;color:#0000ff">Artista: </label>
<input style="border-radius:10px;background-color:#6666ff" name="artista" type="text" required/></div>
<br>
<div>
<label style="margin-left: -7px;color:#0000ff">Descrição: </label>
<input style="border-radius:10px;background-color:#6666ff" name="descricao" type="text" required/></div>
<br>
<div>
<label style="margin-left: -20px;color:#0000ff">Ano de Lançamento: </label>
<input style="border-radius:10px;background-color:#6666ff" name="ano" type="date" required/></div>
<br>
<div>
<label style="color:#0000ff">Preço R$: </label>
<input style="border-radius:10px;background-color:#6666ff" name="preco" type="text" required/></div>
<br>
<div>
<label style="margin-left: -20px;color:#0000ff">Procedência: </label>
<input style="border-radius:10px;background-color:#6666ff" name="procedencia" type="text" required/></div>
<br>
<div>
<label style="margin-left: 20px;color:#0000ff">Tempo: </label>
<input style="border-radius:10px;background-color:#6666ff" name="time" type="textarea" required/></div>
<br>
<div>
<label style="margin-left: -40px;color:#0000ff">Disponibilidade: </label>
<input style="border-radius:10px;background-color:#6666ff" type="number" name="disponibilidade" required/></div>
<br>
<div>
<label style="margin-left: -50px;color:#0000ff">Promoção:</label>
<label style="margin-left: 30px;color:#00f">Sim</label>
<input type="radio" name="promocao" value="sim">
<label style="margin-left: 30px;color:#f00">Não</label>
<input type="radio" name="promocao" value="nao">
</div>
<br>
<div>
<label style="margin-left: -90px;color:#0000ff">Em Lançamento:</label>
<label style="margin-left: 30px;color:#00f">Sim</label>
<input type="radio" name="lancamento" value="sim">
<label style="margin-left: 30px;color:#f00">Não</label>
<input type="radio" name="lancamento" value="nao">
</div>
<br>
<div>
<label style="color:#0000ff">img</label>
<input style="border-radius:10px;background-color:#6666ff" type="file" name="img">
</div>
<br>
<div><input type="submit" style="width:300px;height:30px;background-color:#6666ff;border-radius:10px;color:#000;margin-left: 1px" value="Cadastrar"></div> 
<br> 
</div>
</div>
</body>
</html>