<?php
require_once(__DIR__ . '/../controller/UsuarioController.php');

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
    case 'cadastrar':
        if(isset($_POST['submit'])) {
            $nome = $_POST['nome']; 
            $dt_nasc = $_POST['dt_nasc'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuario = new UsuarioController();
            $usuario->conectarBd();
            $usuario->cadastrar($nome, $dt_nasc, $email, $senha);
            echo "Cadastro realizado com sucesso";
            header("Location: Login.php");
        }else{
            echo "Erro ao cadastrar";
        }
        break;

    case 'login':
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuarioController = new UsuarioController();
            $usuarioController->login($email, $senha);
        } else {
            echo "Erro ao realizar login!";
        }
        break;

    case 'logout':
        if (isset($_POST['button']) && $_POST['button'] === 'logout') {
            $usuarioController = new UsuarioController();
            $usuarioController->logout($email, $senha);
            header("Location: Login.php"); 
        }
        break;

    default:
        break;
        
}