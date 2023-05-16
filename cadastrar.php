<?php
include ("conexao.php");
$admin = "cliente";
$email = $_POST['email'];
$senha=$_POST['senha'];
$nome=$_POST['nome'];
$telefone=$_POST['telefone'];
$cpf=$_POST['cpf'];
$img ="uploads/perfil.png";
?>
<!doctype html>
<html lang="pt-br">
  <head>
  </head>
	<body style="background-color:#FFF">
    <?php
$sql = "SELECT * FROM usuarios WHERE email ='$email' or cpf='$cpf'";
$result = mysqli_query($conexao , $sql);
while($row = mysqli_fetch_assoc($result)) {
  $td = $row['email'];
  $tr = $row['cpf'];
}
if($cpf == $tr){
    echo"<p style='color:#991111'>";
    echo"Este cpf: $cpf , já está sendo usado.";
    echo"</p>";
}else{
if($email == $td){
    echo"<p style='color:#991111'>";
echo"Este Email: $email , já está sendo usado.";
echo"</p>";
}else{
$sql= "INSERT INTO usuarios (nome, email, telefone,cpf,admin, senha, imagem) VALUES ('$nome', '$email', '$telefone', '$cpf','$admin', '$senha', '$img')";
if(mysqli_query($conexao,$sql)){
 echo "Usuario cadastrado com sucesso!";
 header("location:index.php");
} else{
 echo "Não foi possivel cadastrar o clientes". mysqli_error($conexao);
}
}
}
?>
<form action="index.php">
    <input type="submit" style="cursor: pointer; margin-left:50px;" value="Login">
</form>
</body>
</html>