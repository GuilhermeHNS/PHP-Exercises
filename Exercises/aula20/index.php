<?php require"listaProdutos.php";?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>
    
    <h3>Listagem de Produtos</h3>
    <hr>

    <table border="1">
        <tr>
            <td>PRODUTOS</td>
            <td>VALOR</td>
            <td>QTD</td>
        </tr>

    <?php foreach($produtos as $produto): ?>   
        <tr>
            <td><?php echo $produto['nome']?></td>
            <td><?php echo $produto['preço']?></td>
            <td><?php echo $produto['qtd']?></td>
        </tr>

    <?php endforeach; ?>
    </table>

</body>
</html>