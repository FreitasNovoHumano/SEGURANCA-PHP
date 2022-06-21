<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.08 - Camada de manipulação pt3");

require __DIR__ . "/../source/autoload.php";

/*
 * [ validate helpers ] Funções para sintetizar rotinas de validação
 */
fullStackPHPClassSession("validate", __LINE__);

$message =  new \Source\Core\Message();

$email = "cursos@upinside.com.br";
if (!is_email($email)){
    echo $message->error("Email");
} else {
    echo $message->success("Email");    
}

$passwd = 83272832;
if (!is_passwd($passwd)){
    echo $message->error("Senha");
} else {
    echo $message->success("Senha");    
}

/*
 * [ navigation helpers ] Funções para sintetizar rotinas de navegação
 */
fullStackPHPClassSession("navigation", __LINE__);

var_dump([
    url("/blog/titulo-do-artigo"),
    url("blog/titulo-do-artigo")
]);

//redirecionando a url
//if (empty($_GET)){
//    redirect("?f=true");
//}


/*
 * [ class triggers ] São gatilhos globais para criação de objetos
 */
fullStackPHPClassSession("triggers", __LINE__);

var_dump(user()->load(1));

echo message()->error("Esse é um erro");
echo message()->warning("Esse é um aviso");

//Carregando o usuário através do Helper user. Jogamos para dentro da sessão através helper session
session()->set("user", user()->load(2)); 
var_dump(session()->all());// Abrindo a sessão com mesmo helper buscando o método all
