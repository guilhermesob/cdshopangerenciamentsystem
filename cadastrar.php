<?php
include ("conexao.php");
$tipo = $_POST['tipo'];
switch($tipo){
    case "cliente":
        $admin = "cliente";
        break;
    case "admin":
        $admin = "admin";
        break;     
}
//$admin = "cliente";
$email = $_POST['email'];
$senha = $_POST['senha'];
$nome=$_POST['nome'];
$telefone=$_POST['telefone'];
$cpf=$_POST['cpf'];
$img ="uploads/perfil.png";
$textoCriptografado = base64_encode($senha);
$textoDescriptografado = base64_decode($textoCriptografado);
?>
<!doctype html>
<html lang="pt-br">
  <head>
  </head>
	<body style="background: #000;">
    <?php
    if(isset($_POST['cpf']) || isset($_POST['email'])) {
        if(strlen($_POST['cpf']) == 0) {
            echo "0";
        } else if(strlen($_POST['email']) == 0) {
            echo "1";
        } else {
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
$sql= "INSERT INTO usuarios (nome, email, telefone,cpf,admin, senha, imagem) VALUES ('$nome', '$email', '$telefone', '$cpf','$admin', '$textoCriptografado', '$img')";
if(mysqli_query($conexao,$sql)){
 echo "<p style='color:#0a0'>"."Usuario cadastrado com sucesso!"."</p>";
} else{
 echo "<p style='color:#ff0000'>"."Não foi possivel cadastrar o clientes!"."</p>". mysqli_error($conexao);
}
}
}      
}
}
?>
<form action="index.php">
    <input type="submit" style="cursor: pointer; margin-left:50px; background: #16b; color: #fff; font-size: 18px; width: 100px; height: 30px; border-radius: 50px;" value="Login">
</form>
</body>
</html>