<?php
include ("conexao.php");
$imagem=$_POST['img'];
$preco=$_POST['preco'];
$nome=$_POST['nome'];
$nomep=$_POST['nomep'];
$id=$_POST['ids'];
$sql= "INSERT INTO carrinho (nome, nomep, id, preco, imagem) VALUES ('$nome', '$nomep', '$id', '$preco', '$imagem')";
if(mysqli_query($conexao,$sql)){
 echo "sucesso!";
} else{
 echo "Não foi possivel adicionar ao carrinho". mysqli_error($conexao);
}


$sql = "SELECT * FROM cds where id=$id";
$resultado = mysqli_query($conexao,$sql);
while($row = mysqli_fetch_assoc($resultado)) {
$num = $row['disponibilidade'];
$com = $row['comprados'];
}
$num2 = 1;
$atua = $num - $num2;
$comp = $com + $num2;
$sql= "UPDATE cds SET disponibilidade='$atua', comprados='$comp' WHERE id='$id'";
if(mysqli_query($conexao,$sql)){
 echo "cd editado com sucesso!";
 header("location:carrinho.php?id=$nomep");
} else{
 echo "Não foi possivel editar o cd". mysqli_error($conexao);
}
?>
<form action="menu.php">
  <input type="submit" style="cursor: pointer; margin-left:50px;" value="voltar">
</form>