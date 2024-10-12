<?php
// Verifica se o botão foi clicado
if (isset($_POST['botao'])) {
    
    // Sanitiza as variáveis recebidas
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $senha = htmlspecialchars($_POST['senha']);

    // Conecta com o banco
    $db = new mysqli('localhost', 'root', '', 'pokemons_dataset');

    // Verifica se a conexão foi bem-sucedida
    if ($db->connect_error) {
        die("Erro de conexão: " . $db->connect_error);
    }

    // Verifica se o e-mail já está cadastrado
    $stmt = $db->prepare("SELECT COUNT(*) FROM pessoa WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        // E-mail já cadastrado, exibe mensagem
        $erro = "Este e-mail já está cadastrado.";
    } else {
        // Gera uma variável criptografada
        $password_hash = password_hash($senha, PASSWORD_BCRYPT);

        // Prepara a query para inserir
        $stmt = $db->prepare("INSERT INTO pessoa (email, senha) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password_hash);

        // Executa
        if ($stmt->execute()) {
            // Redireciona
            header("location: /IFRS-Pokepedia/index.php");
            exit(); // Para garantir que o script não continue a ser executado
        } else {
            $erro = "Erro ao cadastrar. Tente novamente.";
        }
        $stmt->close();
    }
    $db->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pessoa</title>
    <link rel="stylesheet" type="text/css" href="/IFRS-Pokepedia/css/pages/login.css" />
</head>
<body>
    <div class='container'>
        <div class='box'>
            <h1>Adicionar pessoa</h1>
            <form method='post' action='/IFRS-Pokepedia/forms/form_adicionar_pessoa.php'>
                <label>E-mail:</label>
                <input type='text' name='email' required>
                <label>Senha:</label>
                <input type='password' name='senha' required>
                <div class='grupo_botao'>
                    <input type='submit' name='botao' value='Adicionar'>
                </div>
                <a href='/IFRS-Pokepedia/index.php'>Voltar</a>
            </form>
            <?php if (isset($erro)) : ?>
                <p style="color: red;"><?= $erro; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
