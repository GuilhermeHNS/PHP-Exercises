<?php

    //Estudo sobre arrays


echo "<h1>Estudo sobre arrays</hr>";

$frutas = array("maçã","banana","mamão", "melão", "abacate"); 



//ARRAY MULTIDIMENSIONAL
$produtos = array(
    array(
        "nome"=>"Macarrão 400g", 
        "preco" => 3.99,
        "qtd" => 2
    ),

    array(
        "nome"=>"Biscoito", 
        "preco" => 1.99,
        "qtd" => 3
    ),

    array(
        "nome"=>"Sabão em Pó", 
        "preco" => 6.99,
        "qtd" => 3
    )

);

//faz um push no array
array_push($frutas, "Melancia");
array_push($frutas, "Pêra");
array_push($frutas, "Uva");

echo "<pre>";
//exibe o array todo e suas posições
print_r($produtos);
echo '<br/>';
//exibe o array todo, suas posições e seus tipos
var_dump($produtos);
echo "</pre>";


//Percorre todo o array 
foreach($frutas as $frutas){
    //echo "<br>";
    //echo $frutas;
}

 
echo "<hr>";
echo "<h2>Arrays associativos<h2/>";

$cliente = array(
            "name" => "Guilherme", 
            "fone" => "(55)555-5555", 
            "email" => "contato@curso.com"
        );

/* echo $cliente['name'];
echo "<br>";
echo $cliente['fone']; */



