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
            <a href="listar_cds.php" style="color:#0000f1;text-decoration:none">
              <p style="margin-top:1px">Voltar</p>
            </a>
          </div>
        </div>
      </div>
      <br>
</body>
</html>

<?php
include ("conexao.php");
$id= $_POST['id'];
$nome=$_POST['nome'];
$titulo=$_POST['titulo'];
$genero=$_POST['genero'];
$artista=$_POST['artista'];
$descricao=$_POST['descricao'];
$preco=$_POST['preco'];
$ano=$_POST['ano'];
$procedencia=$_POST['procedencia'];
$tempo=$_POST['tempo'];
$disponibilidade=$_POST['disponibilidade'];
$files =$_FILES['midia'];
$file =$_FILES['img'];

$midia = "midias/plano.mp3";
$img = "uploads/cds.jpg";

  $dirUploads ="uploads";
  if(!is_dir($dirUploads)){
      mkdir($dirUploads);
  }
  
  if(move_uploaded_file($file["tmp_name"],$dirUploads . DIRECTORY_SEPARATOR . $file['name'])){
      $img = $dirUploads . DIRECTORY_SEPARATOR . '/' .$file['name'];
  }
midia
//   $dirMidias ="midias";
//   if(!is_dir($dirMidias)){
//       mkdir($dirMidias);
//   }
  
//   if(move_uploaded_file($files["tmp_name"],$dirMidias . DIRECTORY_SEPARATOR . $files['name'])){
//       $midia = $dirMidias . DIRECTORY_SEPARATOR . '/' .$files['name'];
//   }
  
// $sql= "UPDATE cds SET nome='$nome',titulo='$titulo', genero='$genero', artista='$artista', descricao='$descricao' , preco='$preco', ano='$ano', procedencia='$procedencia', tempo='$tempo', disponibilidade='$disponibilidade', img='$img', midia='$midia' WHERE id='$id'";

// if(mysqli_query($conexao,$sql)){
//  echo "cd editado com sucesso!";
// } else{
//  echo "Não foi possivel editar o cd". mysqli_error($conexao);
// }

// header("location:lista.php");
// mysqli_query($conexao

?>