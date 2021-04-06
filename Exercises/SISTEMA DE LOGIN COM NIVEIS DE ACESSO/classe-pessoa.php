<?php

    class Pessoa{
        private $pdo;

        public function __construct($dbname, $host, $user, $password)
        {
            try{
                $this->pdo = new PDO("mysql:dbname =".$dbname.";host=".$host, $user, $password);
            }
            catch(PDOException $e){
                echo"Erro com o banco de dados".$e->getMessage();
                exit();
            }
            catch(Exception $e){
                echo"Erro".$e->getMessage();
                exit();
            }
        }

        public function buscaDados(){
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM usuario ORDER BY nome");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        public function validaCadastro($email){
            $cmd = $this->pdo->prepare("SELECT idusuario FROM usuario WHERE email like:e");
            $cmd->bindValue(":e", $email);
            $cmd->execute();
            if($cmd->rowCount() > 0){
                //USUARIO JA CADASTRADO
                return true;
            }
            else{
                //USUARIO NÃO CADASTRADO
                return false;
            }
        }
    }

?>