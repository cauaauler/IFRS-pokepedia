<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: /IFRS-Pokepedia/index.php");
}
    if(isset($_GET)){
        //Conexão com o banco de dados
        $db = new mysqli("localhost", "root", "", "pokemons_dataset");

        $stmt = $db->prepare("select * from livros where idLivro = ?");
        
        $idLivro = filter_var($_GET['idlivro'],FILTER_SANITIZE_NUMBER_INT);

        $stmt->bind_param("i",$idLivro);

        $stmt->execute();

        $resultado = $stmt->get_result();

        $livro = $resultado->fetch_assoc();

        $_SESSION["idLivro"] = $livro['idLivro'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar livro</title>
    <link rel="stylesheet" type="text/css" href="/IFRS-Pokepedia/css/style.css" />
</head>
<body>
    <div class='container'>
        <div class='box'>
            <h1>Editar livro</h1>
            <form method='post' action='/IFRS-Pokepedia/src/editLivro.php'>
                <label for=Name>Título</label>
                <?php
                    echo "<input type=text id=Name required name=Name value='{$livro['Name']}'>";
                ?>
                <label for=ano>Ano</label>
                <?php
                    echo "<input type=number id=ano required name=ano value={$livro['ano']}>";
                ?>
                <label for=autor>Autor(a)</label>
                <?php
                    echo "<input type=text id=autor required name=autor value='{$livro['autor']}'>";
                ?>
                <div class='grupo_botao'>
                    <input type=submit name=botao value='Editar'>
                </div>        
            </form>
        </div>
        <a href='/IFRS-Pokepedia/src/logout.php'>Sair</a>
        <a href='/IFRS-Pokepedia/src/restrita_lista.php'>Voltar</a>
    </div>  
</body>
</html>