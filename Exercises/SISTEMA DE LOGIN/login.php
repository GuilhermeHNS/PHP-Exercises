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

    <title>Login</title>
</head>
<body>
    
    <?php
        if(isset($_POST['email']))
        {
            $email = addslashes($_POST['email']);
            $senha = addslashes(MD5($_POST['senha']));

            if(!empty($email) && !empty($senha)){
                $p->fazLogin($email, $senha);               
            }
            else{
                echo "Preencha todos os campos";
            }
        }
    ?>

    
    <h1>Login</h1>

    <form method="POST">
        <label for="">Email:</label>
        <input type="text" name="email"><br><br>

        <label for="">Senha:</label>
        <input type="password" name="senha"><br>

        <input type="submit" value="entrar" name="entrar" id="entrar">
    </form>

</body>
</html>