<?php
$id=$_GET['id'];
include_once('conexao.php');
// sql to delete a record
$sql = "DELETE FROM usuarios  WHERE id=$id";
if ($conexao->query($sql) === TRUE) {
  header("Location: listar_cliente.php?pesquisa=a");
} else {
  echo "Erro Ao Deletar Cliente: " . $conexao->error;
}
$conexao->close();
?>
<!DOCTYPE html >
<html>
<head >
</head>
<body>
  <a href="listar_cliente.php?pesquisa=a" style="color:#0000f1;text-decoration:none">
  <p style="margin-top:1px">Voltar</p></a>
</body>
</html>