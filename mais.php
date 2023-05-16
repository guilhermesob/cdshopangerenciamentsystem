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
          $imgs = $row['imagem'];
        }
?>
<!doctype html>
<html lang="pt-br">
  <head>
  <style>
div {text-align: center;}
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
</style>
  	<title>Mais Comprados</title>
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
	        	<li class="nav-item active"><a href="#" class="nav-link">Mais Sobre o CD</a></li>
	        	<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">cd's</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="lancamentos.php">Lançamentos</a>
                <a class="dropdown-item" href="promocao.php">Promoções</a>
                <a class="dropdown-item" href="mais_comprados.php">Mais Comprados</a>
                </div>
            </li>
              <li class="nav-item"><a href="carrinho.php?id=<?php echo $id?>" class="nav-link">Carrinho</a></li>
              <li class="nav-item"><a href="perfil.php?id=<?php echo $id?>" class="nav-link">Perfil
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
  </header>
  <div style="display: flex; flex-direction: row; flex-wrap: wrap; align-items: center; align-content: center;">
      <?php
      include_once('conexao.php');
     $ids= $_GET['ids'];
     $sql = "SELECT * FROM cds where id=$ids";
     $resultado = mysqli_query($conexao,$sql);
      while($row = mysqli_fetch_assoc($resultado)) {
        echo "<div  style='margin-left:auto;margin-right:auto; float: left; color:#eff;' >";
        $img = $row['img'];
        $midia = $row['midia'];
        $preco = $row["preco"];
        $nome = $row["nome"];
        echo "<h1 align= 'center' style='color:#ff0000'>"."Mais sobre ".$row["nome"]."</h1>";
        echo "<div  style='border-radius:5%;border: 1px solid color:#222244; align:center';>";
        echo "<img src='$img' style='border-radius:5%' width='500px' height='auto'>";
        echo "<br>";
        echo "</div>";
        echo "<div  style='border-radius:5%;width:500px;border: 3px solid;margin: 10px 10px; float: left; color:#222244; align:center; background-color:#222244';>";
        echo "<div style='align:center; color:#ffff00'>";
        echo "<br>"."Nome: "."<b>". $row["nome"]."</b>"."<br>";
        echo "</div>";
        echo "<div style='margin-top: 9px;align:center; color:#fff'>";
        echo "Título: "."<b>". $row["titulo"]."</b>"."</br>";
        echo "Gênero: "."<b>". $row["genero"]."</b>"."</br>";
        echo "Artista: "."<b>". $row["artista"]."</b>"."</br>";
        echo "Descrição: "."<b>". $row["descricao"]."</b>"."</br>";
        echo "Ano de Lançamento: "."<b>". $row["ano"]."</b>"."</br>";
        echo "Procedencia: "."<b>". $row["procedencia"]."</b>"."</br>";
        echo "Tempo: "."<b>". $row["tempo"]."</b>"."</br>";
        echo "<div style='align:center; color:#ffff00'>";
        echo "Preço: "."<b>". $preco."</b>"."</br>";
        echo "</div>";
        echo "disponibilidade: "."<b>". $row["disponibilidade"]."</b>"."</br>";
        echo "</div>";
        echo "<br>";
        echo "<div  style='float: center;width:170px;margin-left:auto;margin-right:auto; align:center; background-color:#222244';>";
        echo "<form action='addcarrinho.php' method='post'>"
  ."<input type='hidden' name='ids' value='$ids'/>".
"<input type='hidden' name='img'  value='$img'/>".
  "<input type='hidden' name='preco'  value='$preco'/>".
  "<input type='hidden' name='nome'  value='$nome'/>".
"<input type='hidden' name='nomep'  value='$id'/>"."<input style='font-size: 20px;border: 2px solid #222244;background-color:#222244;color:#00ff00' type='submit' value='Adicionar ao Carrinho' />"
."</form>"."<br>"."</div>";
        echo "</div>";
      }
      ?>
    </div>
</div>
</section>
  <div>
    <a href="#" class="produtos">
    </a>
  </div>
	</body>
</html>