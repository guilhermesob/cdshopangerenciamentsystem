<?php
include_once('conexao.php');
$nomep = $_POST['nomep'];
$id=$_POST['id'];
$sql = "DELETE FROM carrinho  WHERE nomep=$nomep AND id=$id";
if ($conexao->query($sql) === TRUE) {
 header("Location: carrinho.php?id=$nomep");
} else {
  echo "Erro Ao Deletar CD: " . $conexao->error;
}
$conexao->close();
?>
<!DOCTYPE html >
<html>
<head >
</head>
<body>
  <a href="P.php" style="color:#0000f1;text-decoration:none">
  <p style="margin-top:1px">Voltar</p></a>
</body>
</html>