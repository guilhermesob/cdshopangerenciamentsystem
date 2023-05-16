
<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $conexao->real_escape_string($_POST['email']);
        $senha = $conexao->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['admin'] = $usuario['admin'];
            $_SESSION['img'] = $usuario['img'];

            header("Location: menu.php");

        } else {
            echo "<div style='color:#00ff00'>"."Falha ao logar! E-mail ou senha incorretos"."</div>";
        }

    }

}
?>
<!-- isso -->

<!DOCTYPE html>

<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="SUPER/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">tem uma conta?</h3>
                  
                  <!-- form -->
<!-- inicio -->
<br>
<br>
<br>
<form action="" method="POST">
        <p>
            <input type="text"  class="form-control"  name="email" placeholder="Email"/>
            
        </p>
        <p>
            <input type="password" class="form-control"  name="senha"  placeholder="Senha"/>
            
        </p>
       
        <a href="">
           
                <button type="submit" class="form-control btn btn-primary submit px-3">LOGAR</button>
                
            </a>
        </p>
        se não tem uma conta<a href="cadastro.php"style="text-decoration:none;color:DodgerBlue"> cadastre-se</a>

        <br>


    </form>

	            </div>
	            <div class="form-group d-md-flex">
	            
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff"> E.E.E.P JOSÉ OSMAR </a>
								</div>
	            </div>
	          </form> 
              

              <!-- form -->

	          <p class="w-100 text-center">&mdash; MusicTec &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>


        
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>


</body>
</html>


