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
    $stmt = $db->prepare("select * from pessoa_pokemon pp
                          join pessoa p on p.id_pessoa = pp.id_pessoa
                          join pokemon po on po.Pokedex_number = pp.pokedex_number");
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
    if ($resultado->num_rows == 0) {
        echo "Não há pokémon cadastrados";
    } else {
        $pokemons = $resultado->fetch_all(MYSQLI_ASSOC);
        echo "<table>";
        echo "<thead>
             <tr>
             <th>Email</th>
             <th>Média Ataque</th>
             <th>Média Defesa</th>
             </tr>
        </thead>";
        echo "</table>";

        echo "<tr>";
        echo "<td>$pokemons['email']</td>";
        echo "</tr>";

        echo "<table>";
        echo "<thead>
              <tr>
              <th><a href='/IFRS-Pokepedia/src/restrita_lista.php?ordem=name&direcao=" . ($direcao == 'asc' ? 'desc' : 'asc') . "'>Nome</a></th>
              <th><a href='/IFRS-Pokepedia/src/restrita_lista.php?ordem=attack&direcao=" . ($direcao == 'asc' ? 'desc' : 'asc') . "'>Ataque</a></th>
              <th><a href='/IFRS-Pokepedia/src/restrita_lista.php?ordem=defense&direcao=" . ($direcao == 'asc' ? 'desc' : 'asc') . "'>Defesa</a></th>
              <th><a href='/IFRS-Pokepedia/src/restrita_lista.php?ordem=pokedex_number&direcao=" . ($direcao == 'asc' ? 'desc' : 'asc') . "'>Número Pokedex</a></th>
              <th><a href='/IFRS-Pokepedia/src/restrita_lista.php?ordem=type&direcao=" . ($direcao == 'asc' ? 'desc' : 'asc') . "'>Tipagem</a></th>
              <th><a href='/IFRS-Pokepedia/src/restrita_lista.php?ordem=is_legendary&direcao=" . ($direcao == 'asc' ? 'desc' : 'asc') . "'>É lendário?</a></th>
              <th>Adicionar a Coleção</th>
              </tr>
              </thead>";

        foreach ($pokemons as $linha) {
            echo "<tr>";
            echo "<td>{$linha['Name']}</td>";
            echo "<td>{$linha['Attack']}</td>";
            echo "<td>{$linha['Defense']}</td>";
            echo "<td>{$linha['Pokedex_number']}</td>";
            echo "<td>{$linha['Type']}</td>";
            echo "<td>" . ($linha['Is_legendary'] == 0 ? "Não" : "Sim") . "</td>";
            echo "<td><a href='/IFRS-Pokepedia/forms/form_adicionar_pokemon_colecao.php'>Adicionar a sua coleção</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
 


    echo "<a href='/IFRS-Pokepedia/src/logout.php'>Sair</a>";

?>
    </div>
</body>
</html>