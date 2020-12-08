<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="cadastrar_site.css">
    <title>Site para se cadastrar</title>
</head>
<body>
<?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $_POST["email"];

        $password = $_POST["password"];

        $usuarios = "$email \n $password\n";
        $cadastros_usuarios = fopen("cadastros.txt", "a");
        fwrite($cadastros_usuarios, $usuarios);
        fclose($cadastros_usuarios);
    }

?>
<div>
    <h2>Seja bem vindo a pagina de cadastro</h2>
    <h3>Cadastre-se abaixo</h3>

    
    <form action="cadastrar_site.php" method="post">
        <input type="email" name="email" class = "field" placeholder="Digite um Email"></br>
        <input type="password" name="password" class = "field" placeholder="Digite uma senha"></br>

        <button type="submit">cadastrar</button>
    </form>   
    <div>
    <a href="login.php">Pagina de login</a>
</body>
</html>