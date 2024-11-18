<?php
    class Banco{
        const host = 'localhost';
        const banco_de_dados = 'loginpage';
        const usuario = 'root';
        const senha = '';
        public $conexao;
    
        public function conectar(){
            $this->conexao = new mysqli(self::host, self::usuario, self::senha, self::banco_de_dados);
            if(!$this->conexao){
                echo "erro na conexao";
            } else{
                return $this->conexao;
            }
        } 
    }