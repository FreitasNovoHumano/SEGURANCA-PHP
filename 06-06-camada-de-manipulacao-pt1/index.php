<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.06 - Camada de manipulação pt1");

require __DIR__ . "/../source/autoload.php";

/*
 * [ string helpers ] Funções para sintetizar rotinas com strings
 */
fullStackPHPClassSession("string", __LINE__);

$string = "Essa é uma string, nela temos um under_core e um guarda-chuva!";

$message = new \Source\Core\Message();

echo $message->info(str_slug($string)); // Função slug pega uma string e transforma em url
echo $message->info(str_studly_case($string)); //Deixa a 1ª letra de cada palavra com letra maiúscula
echo $message->info(str_camel_case($string));//A 1ª letra da 1ª palavra é minuscula. e todas as 1ª letra de todas as palavras consecutivas são maiúscula