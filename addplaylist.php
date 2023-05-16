<?php
include ("conexao.php");
$img=$_POST['img'];
$midia=$_POST['midia'];
$nome=$_POST['nome'];
$nomep=$_POST['nomep'];
$id=$_POST['ids'];
$sql= "INSERT INTO playlist (nomep, id, nome, img, midia) VALUES ('$nomep', '$id', '$nome', '$img', '$midia')";
if(mysqli_query($conexao,$sql)){
 echo "Usuario cadastrado com sucesso!";
header("location:playlist.php?id=$nomep");
} else{
 echo "Não foi possivel adicionar a playlist". mysqli_error($conexao);
}
?>
<form action="menu.php">
  <input type="submit" style="cursor: pointer; margin-left:50px;" value="voltar">
</form>