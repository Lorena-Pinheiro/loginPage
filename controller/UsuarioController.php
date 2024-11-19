<?php 
require_once(__DIR__ . '/../model/Usuario.php');
require_once(__DIR__ . '/../config/Banco.php');

class UsuarioController{
    public $usuario;
    public $conexao;


    public function conectarBd(){
        $banco = new Banco();
        $this->conexao = $banco->conectar();
        return $this->conexao;
    }

    public function login($email, $senha){
        $conexao = $this->conectarBd();

        $stmt = $conexao->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
            $stmt->close();

            if (password_verify($senha, $usuario['senha'])) {
                session_start();
                $_SESSION['usuario_email'] = $usuario['email'];
                $_SESSION['usuario_id'] = $usuario['id_usuario'];
                header("Location: Home.php");
                exit();
            } else {
                session_start();
                $_SESSION['erro_login'] = "Senha ou email incorretos!";
                header("Location: Login.php");
                exit();
            }
        } else {
            session_start();
            $_SESSION['erro_login'] = "Usuário não encontrado. Faça seu cadastro.";
            header("Location: ../view/Cadastro.php");
            $stmt->close();
            exit();
        }
    }

    public function logout(){
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }

    public function cadastrar($nome, $dt_nasc, $email, $senha){
        $usuario = new Usuario($this->conectarBd());
        $query = $usuario->cadastrar();
    
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $this->conexao->prepare($query);
        if ($stmt === false) {
            die('Erro na preparação da consulta: ' . $this->conexao->error);
        }
        $stmt->bind_param("ssss", $nome, $dt_nasc, $email, $senha_hash);
        $result = $stmt->execute();

        $stmt->close();
        $this->conexao->close();
    }
}