<?php
// Inicia sessão
session_start();
// Verifica se a sessão foi criada
if(!isset($_SESSION['id'])){
    // Se não foi criada a sessão, redireciona para a página inicial
    header("location: /IFRS-Pokepedia/index.php");
}

    //Conexão com o banco de dados
    $db = new mysqli("localhost", "root", "", "pokemons_dataset");
    
    //Query de consulta
    $stmt = $db->prepare("select * from pokemon");
    // $stmt->bind_param("i",$_SESSION['id']);
    $stmt->execute();
    //Executa a consulta e armazena o resultado
    $resultado = $stmt->get_result();
?>
<!DOCTYPE ht
ml>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coleção de Livros</title>
    <link rel="stylesheet" type="text/css" href="/IFRS-Pokepedia/css/style.css" />
</head>
<body>
    <div class='container'>
    <h1>Perfil de treinador</h1>
      <?php 
    if($resultado->num_rows==0){
        echo "Não há pokémon cadastrados.";
    }else{
        // Resgata todas as linhas da consulta
        // https://www.php.net/manual/pt_BR/mysqli-result.fetch-all.php
        $pokemons = $resultado->fetch_all(MYSQLI_ASSOC);
        echo "<table>";
        echo "<thead>
              <th>Nome</th>
              <th>Ataque</th>
              <th>Defesa</th>
              <th>Número Pokedex</th>
              <th>Tipagem</th>
              <th>É lendário ?</th>

              <th>Remover da Coleção</th>
            </thead>";
  
        foreach($pokemons as $linha){
            echo "<tr>";
                echo "<td>{$linha['Name']}</td>";
                echo "<td>{$linha['Attack']}</td>";
                echo "<td>{$linha['Defense']}</td>";
                echo "<td>{$linha['Pokedex_number']}</td>";
                echo "<td>{$linha['Type']}</td>";
                if($linha['Is_legendary'] == 0){
                    echo "<td>Não</td>";
                }else{
                    echo "<td>Sim</td>";
                }
                
                echo "<td><a href='/IFRS-Pokepedia/forms/form_adicionar_livro.php'>Remover da sua coleção</a></td>";
                // echo "<td>{$linha['ano']}</td>";
                // echo "<td>{$linha['autor']}</td>";
            //     echo "<td><a href='/IFRS-Pokepedia/src/deleteLivro.php?idlivro={$linha['idLivro']}'>Apagar</a>
            //               <a href='/IFRS-Pokepedia/forms/form_editar_livro.php?idlivro={$linha['idLivro']}'>Editar</a>
            //          </td>";
            // echo "</tr>";
        }
        echo "</table>";
    }
 


    echo "<a href='/IFRS-Pokepedia/src/logout.php'>Sair</a>";

?>
    </div>
</body>
</html>