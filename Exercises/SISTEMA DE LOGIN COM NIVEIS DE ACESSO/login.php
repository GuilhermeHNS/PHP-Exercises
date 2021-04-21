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
                $resultados = $p->fazLogin($email, $senha);
                

                if(!isset($_SESSION)){
                    session_start();
                    $_SESSION['UsuarioNome'] = $resultados[0]['nome'];
                    $_SESSION['UsuarioId'] = $resultados[0]['idusuario'];
                    $_SESSION['UsuarioNivel'] = $resultados[0]['nivel'];
                    header("Location: restrito.php"); 
                    exit();
                }         
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