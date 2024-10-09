<?php
// Inicia sessão
session_start();
// Verifica se a sessão foi criada
if (!isset($_SESSION['id'])) {
    header("location: /IFRS-Pokepedia/index.php");
    exit();
}

// Conexão com o banco de dados
$db = new mysqli("localhost", "root", "", "pokemons_dataset");

// Verifica se a conexão foi bem-sucedida
if ($db->connect_error) {
    die("Erro de conexão: " . $db->connect_error);
}

$ordem_permitidas = ['name', 'attack', 'defense', 'pokedex_number', 'type', 'is_legendary'];
$ordem = isset($_GET['ordem']) && in_array(strtolower($_GET['ordem']), $ordem_permitidas) ? $_GET['ordem'] : 'pokedex_number';

$direcao_permitidas = ['asc', 'desc'];
$direcao = isset($_GET['direcao']) && in_array(strtolower($_GET['direcao']), $direcao_permitidas) ? $_GET['direcao'] : 'asc';

// Query de consulta
$stmt = $db->prepare("SELECT * FROM pokemon ORDER BY {$ordem} {$direcao}");
$stmt->execute();
$resultado = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex</title>
    <link rel="stylesheet" type="text/css" href="/IFRS-Pokepedia/css/style.css" />
</head>
<body>
    <div class='container'>
        <h1>Pokédex</h1>
        <?php 
        if ($resultado->num_rows == 0) {
            echo "Não há pokémons cadastrados";
        } else {
            $pokemons = $resultado->fetch_all(MYSQLI_ASSOC);
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

        // echo "<a href='/IFRS-Pokepedia/src/logout.php'>Sair</a>";
        ?>
    </div>
</body>
</html>
