<!DOCTYPE html >
<html>
<head >
</head>

<body>
<div style="text-align: center">
        <img src="logo2.jpg">
        <div style="display: flex;background-color:#111111">
          <h1 style="width:90%;color:#0000f1">
          </h1>
          <div style="width:70px; height:25px;background-color:#222255;border-radius:10px;color:#ff0000;margin-top:60px;">
            <a href="painel.php" style="color:#0000f1;text-decoration:none">
              <p style="margin-top:1px">Menu</p>
            </a>
          </div>
        </div>
      </div>
<br>
<?php
include ("conexao.php");
$email=$_POST['email'];
$senha=$_POST['senha'];
$nome=$_POST['nome'];
$telefone=$_POST['telefone'];
$cpf=$_POST['cpf'];
$admin=$_POST

$sql= "UPDATE usuarios SET nome='$nome', email='$email', telefone='$telefone', cpf='$cpf', senha='$senha' WHERE id='$id'";

if(mysqli_query($conexao,$sql)){
 echo "Usuario cadastrado com sucesso!";
} else{
 echo "Não foi possivel cadastrar o clientes". mysqli_error($conexao);
}
?>
<form action="menu.php">
</form>
</body>
</html>
 