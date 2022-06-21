<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.07 - Camada de manipulação pt2");

require __DIR__ . "/../source/autoload.php";

/*
 * [ string helpers ] Funções para sintetizar rotinas com strings
 */
fullStackPHPClassSession("string", __LINE__);

$string = "Essa é uma string, nela temos um under_score e um guarda-chuva!";

$message = new \Source\Core\Message();

echo $message->info(str_slug($string));
echo $message->info(str_studly_case($string));
echo $message->info(str_camel_case($string));

echo $message->info(str_title($string));//Deixa todas as 1ª letra de cada palavra em maiúscula
echo $message->info(str_limit_words($string, 10)); //Resumindo a frase
echo $message->info(str_limit_chars($string, 220));

