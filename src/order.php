<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: /IFRS-Pokepedia/index.php");
}

    if(isset($_POST)){
        //Conexão com o banco de dados
        $db = new mysqli("localhost", "root", "", "pokemons_dataset");
        
        // $Name = htmlspecialchars($_POST['Name']);
        // $autor = htmlspecialchars($_POST['autor']);
        // $ano = filter_var($_POST['ano'],FILTER_SANITIZE_NUMBER_INT);
        // $id_pessoa = $_SESSION['id'];

        //Query de consulta
        $stmt = $db->prepare("");

        $stmt->bind_param("ssii",$Name,$autor,$ano,$id_pessoa);

        //Executa a consulta e armazena o resultado
        $stmt->execute();

        header("location:/IFRS-Pokepedia/src/restrita_lista.php");
    }