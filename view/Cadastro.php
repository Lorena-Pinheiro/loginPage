<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formLogin.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="wrapper">
        <form action="service.php?action=cadastrar" method="POST">
            <h2>Cadastrar</h2>
            <div class="input-field">
            <input type="text" required name="nome">
            <label>Nome: </label>
            </div>

            <div class="input-field">
            <input type="date" required name="dt_nasc">
            <label>Data de nascimento: </label>
            </div>

            <div class="input-field">
            <input type="email" required name="email">
            <label>Email: </label>
            </div>

            <div class="input-field">
            <input type="password" required name="senha">
            <label>Senha: </label>
            </div>

            <button type="submit" name="submit">Criar</button>

            <div class="register">
            <p>Já tem uma conta? <a href="Login.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
