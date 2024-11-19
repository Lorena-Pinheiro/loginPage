<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formLogin.css">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <form action="service.php?action=login" method="POST">
            <h2>Login</h2>
            <?php
            if (isset($_SESSION['erro_login'])) {
                echo "<p style='color:red;'>".$_SESSION['erro_login']."</p>";
                unset($_SESSION['erro_login']);
            }
            ?>
            <div class="input-field">
            <input type="email" required name="email">
            <label>Digite seu email</label>
            </div>

            <div class="input-field">
            <input type="password" required name="senha">
            <label>Digite sua senha</label>
            </div>

            <button type="submit" name="submit">Entrar</button>

            <div class="register">
            <p>Não tem uma conta? <a href="Cadastro.php">Criar</a></p>
            </div>
        </form>
    </div>
</body>
</html>