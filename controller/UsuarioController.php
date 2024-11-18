<?php 
require_once '../config/Banco.php';
require_once '../model/Usuario.php';

class UsuarioController{
    public $usuario;
    public $conexao;


    public function conectarBd(){
        $this->conexao = new Banco()->conectar();
        return $this->conexao;
    }

    public function login($email, $senha){
        $conexao = $this->conectarBd();

        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();

            if (password_verify($senha, $usuario['senha'])) {
                // Login bem-sucedido
                return true;
            } else {
                // Senha incorreta
                return false;
            }
        } else {
            // Usuário não encontrado
            return false;
        }
        
    }

    public function cadastrar($nome, $dt_nasc, $email, $senha){
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $usuario = new Usuario($this->conectarBd());
        $query = $usuario->cadastrar();

        $stmt = $this->conexao->prepare($query);
        $stmt->bind_param("ssss", $nome, $dt_nasc, $email, $senha_hash);
        $stmt->execute();

        $this->conexao->close();
    }
}