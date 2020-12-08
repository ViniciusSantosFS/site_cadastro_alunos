<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel= "stylesheet" href="cadastro.css" type="text/css">
    <title>Document</title>
</head>
<body>
<?php

    $erro_nome = "";
    $erro_matricula = "";
    $erro_nota1 = "";
    $erro_nota2 = "";

    function filtro_string(string $texto)
    {
        $texto = trim($texto);
        $texto = stripslashes($texto);
        $texto = htmlspecialchars($texto);

        return $texto;
    }

 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
     $nome = filtro_string($_POST["nome"]);
     $matricula = filter_input(INPUT_POST, "matricula", FILTER_SANITIZE_NUMBER_INT);
     $nota1 =   filter_input(
        INPUT_POST, 
        'nota1', 
        FILTER_SANITIZE_NUMBER_FLOAT, 
        FILTER_FLAG_ALLOW_FRACTION
      );
     $nota2 =   filter_input(
        INPUT_POST, 
        'nota2', 
        FILTER_SANITIZE_NUMBER_FLOAT, 
        FILTER_FLAG_ALLOW_FRACTION
      );;
    
     if($nota1 && $nota2){
        $media =  ($nota1 + $nota2)/2.0;
     }

     
     
     if(!$nome)
    {
        $erro_nome = "Digite um Nome valido". "</br>";
    }
    if($matricula == false)
    {
        $erro_matricula = "Digite um numero de matricula valido" . "</br>";
    }
    if(!$nota1)
    {
        $erro_nota1 = "Digite uma nota valida" . "</br>";
    }
    if(!$nota2)
    {
        $erro_nota2 = "Digite uma nota valida" . "</br>";
    }

    if ($nome && $matricula && $nota1 && $nota2 && $media <= 10)
    {
        $student_data = "$nome  \n $matricula \n $nota1 \n $nota2 \n $media \n";

        $alunos = fopen("data.txt", "a");
        fwrite($alunos, $student_data);
        fclose($alunos);
    }
 }

 session_start();

 if (isset($_SESSION['logado']) == false){
     header("Location: login.php");
 }
 
 if($_SERVER['REQUEST_METHOD'] == "GET")
 {
     if(isset($_GET["logout"]) == true)
     {
         session_destroy();
        
         header("Location: login.php");
         
     }
     
 }
 

?>
    <section>
        <div id="principal">
            <div>
                <div>
                    <h3>Sistema de Cadastro</h3>
                    <h3 id="h3_final">Cadastre um novo aluno</h3>
                    <div>
                        <form action="cadastro_aluno.php" method="POST">
                            <div>
                                <div>
                                    <input name="nome" type="text" class="form_field" placeholder="Nome" autofocus>                                    
                                </div>
                                <span class = "erro"><?= $erro_nome;?></span>
                            </div>
                            <div>
                                <div>
                                    <input name="matricula" type="text" class="form_field" placeholder="Numero de Matricula" autofocus>                                  
                                </div>
                                <span class = "erro"><?= $erro_matricula;?></span>
                            </div>
                            <div>
                                <div>
                                    <input name="nota1" type="text" class="form_field" placeholder="primeira nota">                                    
                                </div>
                                <span class = "erro"><?= $erro_nota1;?></span>
                            </div>
                            <div>
                                <div>
                                    <input name="nota2" class="form_field" type="text" placeholder="Segunda nota">
                                    
                                </div>
                                <span class = "erro"><?= $erro_nota2;?></span>
                            </div>
                            <button type="submit" class="button">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
            <a href="lista_cadastro.php"><h5>Clique aqui para ver a lista de alunos cadastrados<h5></a>

            <form action = "cadastro_aluno.php" method="GET" class="button">
                <button name = "logout" >Sair</button>
            </form>
        </div>
    </section>
</body>
 
</html>