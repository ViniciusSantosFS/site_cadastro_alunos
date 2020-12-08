<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de login</title>
</head>
<?php

$erro = "";

$email = "";

$senha = "";

$submit = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    session_start();
    
    $_SESSION["logado"] = true;

    $email = isset($_POST['email']);

    $password = isset($_POST['password']);

    $submit = isset($_POST['submit']);
    

    $cadastros = fopen("cadastros.txt","r");

    $usuarios = [];

    while(!feof($cadastros))
    {
        $d["email"] = fgets($cadastros);
        $d["password"] = fgets($cadastros);

        $usuarios[] = $d;

      
    }
     
    fclose($cadastros);

    if($submit)
    {
        if (in_array($email,$usuarios) && in_array($password,$usuarios))
        {
            header("location:cadastro_aluno.php");
        }else{
            $erro = "Email ou Senha invalidas";
        }
    }

}

?>


<body>
<div>
    <h2>Seja bem vindo a Pagina de login<h2>
    
    <h3>Faça o login abaixo</h3>
    
    
           <form action="login.php" method="post" class="form">
                    <input name="email" type="email" placeholder="Email" class = "field"autofocus> </br> 

                    <input name="password" type="password" placeholder="Senha" class = "field" autofocus></br>

                   <button name = "submit" type="submit" class="button">Entrar</button>  
           </form> 
           <span class = "erro"><?= $erro;?></span>
    </div>
    <div>
        <a href="cadastrar_site.php">Cadastre-se</a>
    </div>
</body>
</html>