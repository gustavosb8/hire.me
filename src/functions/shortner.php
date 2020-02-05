<?php

function short()
{
	/*Lista de carateres possiveis, diferente do exemplo, decidi adicionar números*/
	$caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 
    $alias = array();
    $size = strlen($caracteres) - 1;
    for ($i = 0; $i < 8; $i++) {// aqui você escolhe o tamanho da string
        $n = rand(0, $size); //gera um indice aleatorio de acordo com o tamanho da string
        $alias [] = $caracteres[$n]; //pega um caracter de acordo com o indice
    }
    return implode($alias); //transforma o array numa string
}

function unShort($info){
	/*
		Desencolher a url;
		retornar a url normal


	*/
}


?>