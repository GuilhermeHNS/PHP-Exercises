<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    <title>Jogo da adivinhação</title>
</head>
<body>
        <h1 class="titulo">TENTE ADIVINHAR O NUMERO QUE ESTOU PENSANDO</h1>
        <fieldset>
            <form action="#" method="post" >
                <input type="text" name="entrada">
                <button type="submit" value="tentar">Tentar</button>
            </form>
        </fieldset>

    <?php

    session_start();
    
    //Inicia a contagem de tentativas e randomiza um valor
    if(!isset($_SESSION['tentativa'])){
        $_SESSION['tentativa'] = 10;
        $_SESSION['numero'] = rand(1,100);
    }

    //verifica se a tentativa é diferente de S
    if($_SESSION['tentativa'] != 0){
        if(isset($_POST['entrada'])&& $_POST['entrada'] != 's'){
            $entrada = $_POST['entrada'];
            if($entrada == $_SESSION['numero']){
                echo"Parabéns, você ganhou! O numero sorteado foi <strong>".$_SESSION['numero']."</strong> <br>";
                echo"O numero de tentativas restantes é de:<strong>".$_SESSION['tentativa']."</strong><br>";
                echo"Digite S para jogar novamente";
            }
            elseif($entrada > $_SESSION['numero']){
                echo"O numero digitado é muito grande <br/>";
                $_SESSION['tentativa']--;
                echo"Tentativas restantes: ".$_SESSION['tentativa'];                
            }
            else{
                echo"O numero digitado é muito pequeno <br/>";
                $_SESSION['tentativa']--;
                echo"Tentativas restantes: ".$_SESSION['tentativa']; 
            }
        }
        elseif(isset($_POST['entrada'])&& $_POST['entrada'] == 's'){
            unset($_SESSION['numero']); session_destroy();
        }
    }
    else{
        echo"O numero de tentativas foi ultrapassado. <br/>VOCÊ PERDEU!";
        unset($_SESSION['numero']); session_destroy();
    }



    
    ?>

</body>
</html>