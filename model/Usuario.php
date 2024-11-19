<?php

class Usuario{
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
        return "INSERT INTO {$this->tabela} (nome, dt_nasc, email, senha) VALUES (?, ?, ?, ?);";
    }

    public function mostrar(){
        return "SELECT nome, email, dt_nasc FROM usuario WHERE email = ?;";
    }
}