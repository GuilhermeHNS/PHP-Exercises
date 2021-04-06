<?php

    class Pessoa{

        private $pdo;
        //CONEXÃO COM O BANCO DE DADOS
        public function __construct($dbname, $host, $user, $password)
        {
            try{
                $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$password);
            }
            catch (PDOException $e){
                echo "Erro com o banco de dados: ".$e->getMessage();
                exit();
            }
            catch (Exception $e){
                echo "Erro: ".$e->getMessage();
                exit();
            }
        }

        //FUNÇÃO PARA BUSCAR DADOS 
        public function buscarDados()
        {
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM usuario ORDER BY nome");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }



        //FUNÇÃO PARA VERIFICAR SE A PESSOA JA ESTÁ CADASTRADA
        public function verificaCadastro($email){
            $cmd = $this->pdo->prepare("SELECT idusuario FROM usuario WHERE email LIKE :e");
            $cmd->bindValue(":e", $email);
            $cmd->execute();
            if($cmd->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }
        
        public function verificaLogin($email, $senha){
            $cmd = $this->pdo->prepare("SELECT idusuario FROM usuario WHERE email LIKE :e AND senha LIKE :s");
            $cmd->bindValue(":e", $email);
            $cmd->bindValue(":s", $senha);
            $cmd->execute();
            if($cmd->rowCount() >0){
                return true;
            }
            else{
                return false;
            }
        }



        //FUNÇÃO PARA CADASTRAR PESSOAS
        public function cadastrarPessoa($nome, $email, $senha){
            if($this->verificaCadastro($email)){
                echo"Email ja cadastrado";
            }
            else{
                $cmd = $this->pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (:n, :e, :s)");
                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":e", $email);
                $cmd->bindValue(":s", $senha);
                $cmd->execute();
            }
        }

        public function fazLogin($email, $senha){
            if($this->verificaLogin($email, $senha)){
                echo"LOGADO";
            }
            else{
                echo"Usuario não encontrado";
            }
        }
    }

?>