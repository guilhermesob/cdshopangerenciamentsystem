<!DOCTYPE html >
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=5.0">
</head>
</html>
<?php
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['id'])) {
    header("location:index.php");
    die("<p style=\"color:#0a0\">Você não pode acessar esta página porque não está logado.</p><p><a href=\"index.php\" style=\"color:#f00;text-decoration:none\">Logar no sity</a></p>");
}
?>