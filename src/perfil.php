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
    
    
$ordem_permitidas = ['name', 'attack', 'defense', 'pokedex_number', 'type', 'is_legendary'];
$ordem = isset($_GET['ordem']) && in_array(strtolower($_GET['ordem']), $ordem_permitidas) ? $_GET['ordem'] : 'pokedex_number';

$direcao_permitidas = ['asc', 'desc'];
$direcao = isset($_GET['direcao']) && in_array(strtolower($_GET['direcao']), $direcao_permitidas) ? $_GET['direcao'] : 'asc';

$id_pessoa = $_SESSION['id'];

    //Query de consulta
    $stmt = $db->prepare("select * from pessoa_pokemon pp
                          join pessoa p on p.id_pessoa = pp.id_pessoa
                          join pokemon po on po.Pokedex_number = pp.pokedex_number
                          where p.id_pessoa = {$id_pessoa}");
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
        echo "Não há pokémon na sua coleção";
    } else {
        $pokemons = $resultado->fetch_all(MYSQLI_ASSOC);

        
        $totalAtaque = 0;
        $totalDefesa = 0;
        $quantidade = count($pokemons);

        foreach ($pokemons as $linha) {
            $totalAtaque += $linha['Attack'];
            $totalDefesa += $linha['Defense'];
        }

        echo "<table>";
        echo "<thead>
             <tr>
             <th>Email</th>
             <th>Média Ataque</th>
             <th>Média Defesa</th>
             </tr>
        </thead>";
        echo "</table>";
        
        $mediaDefesa = $totalDefesa / $quantidade;
        $mediaAtaque = $totalAtaque / $quantidade;

        echo "<tr>";
        echo "<td>{$linha['email']}</td>";
        echo "<td>$mediaAtaque</td>";
        echo "<td>$mediaDefesa</td>";
        echo "</tr>";

        echo "<table>";
        echo "<thead>
              <tr>
              <th><a href='/IFRS-Pokepedia/src/perfil.php?ordem=name&direcao=" . ($direcao == 'asc' ? 'desc' : 'asc') . "'>Nome</a></th>
              <th><a href='/IFRS-Pokepedia/src/perfil.php?ordem=attack&direcao=" . ($direcao == 'asc' ? 'desc' : 'asc') . "'>Ataque</a></th>
              <th><a href='/IFRS-Pokepedia/src/perfil.php?ordem=defense&direcao=" . ($direcao == 'asc' ? 'desc' : 'asc') . "'>Defesa</a></th>
              <th><a href='/IFRS-Pokepedia/src/perfil.php?ordem=pokedex_number&direcao=" . ($direcao == 'asc' ? 'desc' : 'asc') . "'>Número Pokedex</a></th>
              <th><a href='/IFRS-Pokepedia/src/perfil.php?ordem=type&direcao=" . ($direcao == 'asc' ? 'desc' : 'asc') . "'>Tipagem</a></th>
              <th><a href='/IFRS-Pokepedia/src/perfil.php?ordem=is_legendary&direcao=" . ($direcao == 'asc' ? 'desc' : 'asc') . "'>É lendário?</a></th>
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
            echo "<td><a href='/IFRS-Pokepedia/src/deletePokemonColecao.php?pokedex_number={$linha['Pokedex_number']}'>Remover da coleção</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
 


    echo "<a href='/IFRS-Pokepedia/src/logout.php'>Sair</a>";

?>
    </div>
</body>
</html>