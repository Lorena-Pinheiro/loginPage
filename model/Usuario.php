<?php
class Usuario{
    private $conexao;
    private $tabela = 'usuario';
    public $id_usuario;
    public $nome;
    public $dt_nasc;
    public $email;
    public $senha;


    public function __construct($db){
        $this->conexao = $db;
    }

    public function cadastrar(){
        $query = "INSERT INTO {$this->tabela} (nome, dt_nasc, email, senha) VALUES ('?', '?', '?', '?');";
        $resultado = $this->conexao->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function mostrar(){
        $query = "SELECT * FROM usuario WHERE id_usuario = {$this->id_usuario};";
        $resultado = $this->conexao->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}