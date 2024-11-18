<?php
require 'controller/UsuarioController.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : '';
switch ($acao) {
    case 'cadastrar':
        $Banco = new Banco();
        $conexao = $Banco->conectar();

        if(isset($_GET['nome'], $_GET['dt_nasc'], $_GET['email'], $_GET['senha'])) {
            $nome = $_GET['nome']; 
            $dt_nasc = $_GET['dt_nasc'];
            $email = $_GET['email'];
            $senha = $_GET['senha'];

            $usuario = new UsuarioController();
            $usuario->cadastrar($nome, $dt_nasc, $email, $senha);
        }
        break;
    case 'login':
        
}