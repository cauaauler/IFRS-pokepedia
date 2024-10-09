<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: /IFRS-Pokepedia/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar livro</title>
    <link rel="stylesheet" type="text/css" href="/IFRS-Pokepedia/css/style.css" />
</head>
<body>
    <div class='container'>
        <div class='box'>
            <h1>Adicionar livro</h1>
            <form method='post' action='/IFRS-Pokepedia/src/addLivro.php'>
                <label for=Name>Título</label>
                <input type=text id=Name required name=Name>
                <br>
                <label for=ano>Ano</label>
                <input type=number id=ano required name=ano>
                <br>
                <label for=autor>Autor(a)</label>
                <input type=text id=autor required name=autor>
                <br>
                <div class='grupo_botao'>
                    <input type=submit name=botao value='Adicionar'>
                </div>
            </form>
        </div>
        <a href='/IFRS-Pokepedia/src/logout.php'>Sair</a>
        <a href='/IFRS-Pokepedia/src/restrita_lista.php'>Voltar</a>
    </div>
</body>
</html>