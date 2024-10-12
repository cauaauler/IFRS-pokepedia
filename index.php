<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex</title>
    <link rel="stylesheet" type="text/css" href="/IFRS-Pokepedia/css/pages/login.css" />
</head>
<body>
    <div class='container'>
        <div class='box'>
            <h1>Pokedéx</h1>
            <form action='/IFRS-Pokepedia/auth/login.php' method='post'>
                <label>E-mail:</label>
                <input type='email' name='email' require>
                <label>Senha:</label>
                <input type='password' name='senha' require>
                <div class='grupo_botao'>
                    <input type='submit' name='botao' value='Acessar'>
                </div>
                <a href='/IFRS-Pokepedia/forms/form_adicionar_pessoa.php'>Adicionar nova pessoa</a>
                
            </form>
        </div>
    </div>
</body>
</html>