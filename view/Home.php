<?php
session_start();

if (!isset($_SESSION['usuario_email'])) {
    header("Location: Login.php");
    exit;
}

require_once(__DIR__ . '/../config/Banco.php');
require_once(__DIR__ . '/../model/Usuario.php');

$banco = new Banco();
$conexao = $banco->conectar();

$usuario_id = $_SESSION['usuario_email'];

$usuario = new Usuario($conexao);
$query = $usuario->mostrar();

$stmt = $conexao->prepare($query);
$stmt->bind_param("s", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $usuario->nome = $row['nome'];
    $usuario->email = $row['email'];
    $usuario->dt_nasc = $row['dt_nasc'];
} else {
    echo "Usuário não encontrado.";
    exit;
}

$stmt->close();
$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Home</title>
</head>
<body>

    <div class="wrapper">
        <div class="card">
            <h2>Bem-vindo, <?= $usuario->nome ?>!</h2>
            <p><strong>Email:</strong> <?= $usuario->email ?></p>
            <p><strong>Data de Nascimento:</strong> <?= $usuario->dt_nasc ?></p>
        </div>

        <form action="service.php?action=logout" method="POST">
            <button type="submit" name="button" value="logout">Logout</button>
        </form>
    </div>


</body>
</html>