<?php
// Inicia a sessão se ela ainda não foi iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Conexão com o banco de dados (se necessária para obter o email do usuário)
$db = new mysqli("localhost", "root", "", "pokemons_dataset");

if ($db->connect_error) {
    die("Erro de conexão: " . $db->connect_error);
}

$id_pessoa = $_SESSION['id'] ?? null; // Verifica se o id da sessão existe

// Query para obter o e-mail do treinador
$email = "";
if ($id_pessoa) {
    $query_treinador = "SELECT email FROM pessoa WHERE id_pessoa = ?";
    $stmt_treinador = $db->prepare($query_treinador);
    $stmt_treinador->bind_param("i", $id_pessoa);
    $stmt_treinador->execute();
    $resultado_treinador = $stmt_treinador->get_result();
    if ($resultado_treinador->num_rows > 0) {
        $treinador = $resultado_treinador->fetch_assoc();
        $email = htmlspecialchars($treinador['email']);
    }
}

?>
<header>
    <nav>
        <ul>
            <?php
            if (!empty($email)) {
                echo "<li>{$email}</li>";
            }
            ?>
            <li><a href="/IFRS-Pokepedia/src/restrita_lista.php">Início</a></li>
            <div class="nav_perfil">
                <li><a href='/IFRS-Pokepedia/src/logout.php'>Logout</a></li>
                <li><a href='/IFRS-Pokepedia/src/perfil.php'>Meu Perfil</a></li>
            </div>
        </ul>
    </nav>
</header>