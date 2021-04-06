<?php
    require_once 'classe-pessoa.php';
    $p = new Pessoa("login", "localhost", "root", "");
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <?php
        if(isset($_POST['nome']))
        {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes(MD5($_POST['senha']));
            if(!empty($nome) && !empty($email) && !empty($senha)){
                $p->cadastrarPessoa($nome, $email, $senha);                
            }
            else{
                echo "Preencha todos os campos";
            }
        }
    ?>
    
    <h1>CADASTRO</h1>

    <form method="POST">

        <label for="">Nome:</label>
        <input type="text" name="nome"><br><br>

        <label for="">Email:</label>
        <input type="text" name="email"><br><br>

        <label for="">Senha:</label>
        <input type="password" name="senha"><br>

        <input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
    </form>




</body>
</html>