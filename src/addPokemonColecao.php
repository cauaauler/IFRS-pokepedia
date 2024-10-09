<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: /IFRS-Pokepedia/index.php");
}

    if(isset($_POST)){
        //Conexão com o banco de dados
        $db = new mysqli("localhost", "root", "", "pokemons_dataset");
        
        $pokedex_number = $_GET['pokedex_number'];
        $id_pessoa = $_SESSION['id'];

        //Query de consulta
        $stmt = $db->prepare("insert into pessoa_pokemon (id_pessoa,pokedex_number) values (?,?)");

        $stmt->bind_param("ii", $id_pessoa, $pokedex_number);

        //Executa a consulta e armazena o resultado
        $stmt->execute();

        header("location:/IFRS-Pokepedia/src/restrita_lista.php");
    }