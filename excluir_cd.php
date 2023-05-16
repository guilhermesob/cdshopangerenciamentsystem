<!DOCTYPE html >
<html>
<head >
</head>
<body>
  <a href="listar_cds.php" style="color:#0000f1;text-decoration:none">
  <p style="margin-top:1px">Voltar</p></a>   
</body>
<br>
<br>
<?php
$id=$_GET['id'];
$servidor = "localhost";
$usuarios = "root";
$senha = "";
$name = "musictec";
$conexao = new mysqli($servidor, $usuarios, $senha, $name);
if ($conexao->connect_error) {
  die("Falha Na Conexão: " . $conexao->connect_error);
}
$sql = "DELETE FROM cds WHERE id=$id";
if ($conexao->query($sql) === TRUE) {
  echo "CD Excluído Com Sucesso";
  header("Location: listar_cds.php");
} else {
  echo "Erro Ao Deletar CD: " . $conexao->error;
}
$conexao->close();
?>