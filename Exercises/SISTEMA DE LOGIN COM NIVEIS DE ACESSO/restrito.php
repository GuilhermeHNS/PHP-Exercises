<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina restrita</title>
</head>
<body>
    
    <?php
        if(!isset($_SESSION))
        {
            session_start();
        }
        

        $nivel_necessario = 2; 

        if(!isset($_SESSION['UsuarioId']) or ($_SESSION['UsuarioNivel'] < $nivel_necessario)){
            
            session_destroy();
            header("Location: index.html");
            exit;
        }
    
    ?>

    <h1>Pagina Restrita</h1><br>
    <p>Olá, <?php echo $_SESSION['UsuarioNome']; ?>!</p>



</body>
</html>