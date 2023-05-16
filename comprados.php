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
  $teste = "";
  if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = array();
    $teste = $_SESSION['carrinho'] = array();
  } //adiciona produto 
  if(isset($_GET['acao'])){
    //ADICIONAR CARRINHO
    if($_GET['acao'] == 'add'){
      $id = intval($_GET['id']);
      if(!isset($_SESSION['carrinho'][$id])){
        $_SESSION['carrinho'][$id] = 1;
      } else {
        $_SESSION['carrinho'][$id] += 0;
      }
    } //REMOVER CARRINHO 
    if($_GET['acao'] == 'del'){
      $id = intval($_GET['id']);
      if(isset($_SESSION['carrinho'][$id])){
        unset($_SESSION['carrinho'][$id]);
      }
    } //ALTERAR QUANTIDADE
   }
?>
<!doctype html>
<html lang="pt-br">
  <head>
  <style>
  <style>
div {text-align: center;}
.perfil {border-radius:50%;}
.img {border-radius:5%;}
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
h1 {text-align: center;}
</style>
  	<title>Comprados</title>
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
	        	<li class="nav-item active"><a href="#" class="nav-link">Itens Comprados</a></li>
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
    </section>
  </header>
    <style>
table, td, th {
  border: 1px solid;
}
table {
  
  border-collapse: collapse;
}
tr:hover {background-color:#000888;}
th {
  background-color: #0000FF;
  color: black;
}
tfoot{
  background-color: red;
  color: black;
}
</style>
    </head>
    <body>
    <?php
     $ids= $_GET['id'];
$sql = "SELECT * FROM usuarios  where id=$ids";
$resultado = mysqli_query($conexao,$sql);
while($row = mysqli_fetch_assoc($resultado)) {
   $nomea = $row['nome'];
   $emaila = $row['email'];
   $telefonea = $row['telefone'];
   $cpfa = $row['cpf'];
   $imga = $row['imagem'];
}
?>
  <table>

  <div style="display: flex; flex-direction: row; flex-wrap: wrap; align-content: center;">
<div style="margin: 10px 10px;margin-left:auto;margin-right:auto; float: left; color:#eff;margin-top:40px">
<div style="border-radius:10%;border: 3px solid;margin: 10px 10px; float: left; color:#222244; background-color:#222244">
  <img class="img" src="<?php echo $imga?>" border-radius="5%" width="140px" height="140px" alt="IMG">
  </div>
  <div style="border-radius:5%;margin: 10px 10px;margin-left: -10px; float: left; align:center">
  <p style="color:#2222ee; align:center">NOME: <?php echo $nomea?></p>
  <p style="color:#222266">EMAIL: <?php echo $emaila?></p>
  <p style="color:#222266">TELEFONE: <?php echo $telefonea?></p>
  <p style="color:#222266">CPF: <?php echo $cpfa?></p>
  </div>
    <caption>Carrinho de Compras</caption>
    <thead>
      <tr>
        <th width="244">Produto</th>
        <th width="79">Quantidade</th>
        <th width="89">Preço</th>
        <th width="100">SubTotal</th>
        <th width="64">Remover</th>
      </tr>
    </thead>
    <form action="?acao=up" method="post">
    <tbody>
     <?php
        if(count($_SESSION['carrinho']) == 0){
          echo '<tr>
            <td colspan="5">Não há produto no carrinho</td>
            </tr>';
          } else {
                require("conexao.php");
                $total = 0;
                foreach($_SESSION['carrinho'] as $id => $qtd){
                        $sql   = "SELECT *  FROM cds WHERE id= '$id'";
                        $qr    = mysqli_query($conexao,$sql);
                        $ln    = mysqli_fetch_assoc($qr);
                        $nome  = $ln['nome'];
                        $preco = number_format($ln['preco'], 2, ',', '.');
                        $sub   = number_format($ln['preco'] * $qtd, 2, ',', '.');
                        $total += $ln['preco'] * $qtd;
$sql2 = "SELECT comprados FROM cds where comprados && id = $id";
$result = mysqli_query($conexao , $sql2);
while($row = mysqli_fetch_assoc($result)) {
$contador = $row['comprados'];
}
$atualizar = $contador + $qtd;
$sql1= "UPDATE cds SET comprados='$atualizar' WHERE id=$id ";
if(mysqli_query($conexao,$sql1)){
 echo "";
} else{
 echo "". mysqli_error($conexao);
}
                         echo '  <tr>  
                         <td>'.$nome.'</td>
                         <td>'.$qtd.'</td>
                         <td>R$ '.$preco.'</td>
                         <td>R$ '.$sub.'</td>
                         <td><a href="?acao=del&id='.$id.'">Remove</a></td>
                        </tr>';
                }
                $total = number_format($total, 2, ',', '.');
                echo '<tr>
                <td colspan="3">Total</td>
                <td>R$ '.$total.'</td>
                </tr>';
          }
                   ?>
         </tbody>
    </form>
 </table>
</body>
</html>