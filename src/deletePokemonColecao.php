<?php 
session_start();
if(!isset($_SESSION['id'])){
    header("location: /IFRS-Pokepedia/index.php");
}

    if(isset($_GET)){
        //Conexão com o banco de dados
        $db = new mysqli("localhost", "root", "", "pokemons_dataset");
        
        $id_pessoa = $_SESSION['id'];
        $pokedex_number = filter_var($_GET['pokedex_number'],FILTER_SANITIZE_NUMBER_INT);
        
        $stmt = $db->prepare("delete from pessoa_pokemon where pokedex_number = ? AND id_pessoa = ?");
        
        $stmt->bind_param("ii", $pokedex_number, $id_pessoa);
        
        $stmt->execute();

        header("location:/IFRS-Pokepedia/src/restrita_lista.php");
    }
