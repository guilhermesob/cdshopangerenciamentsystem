<?php
if(isset($_SESSION)){
    session_start();
}
include('protect.php');
include_once('conexao.php');
$id =  $_SESSION['id'];
$admin =  $_SESSION['admin'];
$sql = "SELECT * FROM usuarios where id = $id";
        $result = mysqli_query($conexao , $sql);
        while($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
        }
?>
<!doctype html>
<html lang="pt-br">
  <head>
  <style>
    .perfil {border-radius:10%;}
div {text-align: center;}
h1 {text-align: center;}
</style>
  	<title>Perfil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="SUPER/style.css">
	</head>
  <body style="background-color:#fff">
    <div style="background-color:#888; height:340px">
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
                <a class="dropdown-item" href="promocao.php">Promoções</a>
                 <a class="dropdown-item" href="mais_comprados.php">Mais Comprados</a> 
                </div>
            </li>
              <li class="nav-item"><a href="carrinho.php?id=<?php echo $id?>" class="nav-link">Carrinho</a></li>
	        	<li class="nav-item active"><a href="#" class="nav-link">Perfil</a></li>
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
    </section>
  </header>
<?php
$sql = "SELECT * FROM usuarios  where id=$id";
$resultado = mysqli_query($conexao,$sql);
while($row = mysqli_fetch_assoc($resultado)) {
   $nome = $row['nome'];
   $email = $row['email'];
   $telefone = $row['telefone'];
   $cpf = $row['cpf'];
   $senha = $row['senha'];
   $img = $row['imagem'];
}
?>
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</div>
    </section>
	</div>
		</div>
			</div>
	</header>
  <div class="img js-fullheight" style="background-image: url(images/bg.jpg);height:300px;">

<div style="display: flex; flex-direction: row; flex-wrap: wrap; align-items: center; align-content: center;position:relative;margin-left:auto;margin-right:auto">
<div style="margin: 10px 10px;margin-left:auto;margin-right:auto; float: left; color:#eff;;margin-top:40px">

<div style="border-radius:10%;border: 3px solid;margin: 10px 10px; float: left; color:#222244; align:center; background-color:#222244">
  <img class="perfil" src="<?php echo $img?>" border-radius:5% width="300px" height="300px" alt="IMG">
  </div>
  <div style="border-radius:5%;width:500px;margin: 10px 10px;margin-left: -10px; float: left; align:center">
  <p style="color:#2222ee; align:center">NOME: <?php echo $nome?></p>
  <p style="color:#222266">EMAIL: <?php echo $email?></p>
  <p style="color:#222266">TELEFONE: <?php echo $telefone?></p>
  <p style="color:#222266">CPF: <?php echo $cpf?></p>
  <br>
  <a href="editar_cliente.php?id=<?php echo $id?>" style="color:#ff0000" class="nav-link">Editar
  <img class="perfil" src="<?php echo $img?>" width="25px" height="25px" alt="IMG">
</a>
  </div>
</div>
</div>
</section>
<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="SUPER/style.css">
	</head>
	<body>
		</div>
	</body>
</html