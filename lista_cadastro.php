<?php

$data = fopen("data.txt","r");


$students = [];

while (!feof($data))//feof verifica se chegou ou não ao final do arquvio dando true or false
{
   

    $d["nome"] = fgets($data); 
    $d["matricula"] = fgets($data);
    $d["nota1"] = fgets($data);
    $d["nota2"] = fgets($data);
    $d["media"] = fgets($data);

    $students[] = $d;
}

fclose($data);


session_start();

 if (!isset($_SESSION['logado'])){
     header("Location: login.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="lista.css" type="text/css">
    <title>Lista de alunos</title>
</head>
<body>
    <div>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Matricula</th>
            <th>Primeira nota</th>
            <th>Segunda nota</th>
            <th>Media</th>
        </tr>
        <?php 
        
        foreach ($students as $student)
        {?>
           <tr>
                <td>
                    <?=$student["nome"]?>
                </td>
                <td>
                    <?=$student["matricula"]?>
                </td>
                <td>
                    <?=$student["nota1"]?>
                </td>
                <td>
                    <?=$student["nota2"]?>
                </td>
                <td>
                    <?=$student["media"]?>
                </td>
           </tr> 
        </div>
        <?php } ?>

    </table>
    <a href= "cadastro_aluno.php"><h4>Retornar para a pagina de cadastro</h4></a>

</body>
</html>