<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.11 - Refatorando modelo de usuário");

require __DIR__ . "/../source/autoload.php";

/*
 * [ find ]
 */
fullStackPHPClassSession("find", __LINE__);

$model = new Source\Models\User();
$user = $model->find("id = :id", "id=1");
var_dump($user);

/*
 * [ find by id ]
 */
fullStackPHPClassSession("find by id", __LINE__);

$user = $model->findById(2);
var_dump($user);

/*
 * [ find by email ]
 */
fullStackPHPClassSession("find by email", __LINE__);

$user = $model->findByEmail("paulo67@email.com.br");
var_dump($user);

/*
 * [ all ]
 */
fullStackPHPClassSession("all", __LINE__);

$list = $model->all(2, 5);
var_dump($list);

/*
 * [ save ]
 */
fullStackPHPClassSession("save create", __LINE__);

$user = $model->bootstrap(
        "Lucas",
        "Lindomar",
        "lucas14@yahoo.com.br",
        "32972195"
);

if ($user->save()){
    echo message()->success("Cadastro realizado com sucesso!");
} else {
    echo $user->message();
    echo message()->info($user->message()->json());    
}

/*
 * [ save update ]
 */
fullStackPHPClassSession("save update", __LINE__);

$user = (new \Source\Models\User())->findById(64);
$user->first_name = "Lucas";
$user->last_name = "Lindomar";
$user->password = passwd("47798927456976");

if ($user->save()){
    echo message()->success("Dados atualizado com sucesso!");
}else{
    echo $user->message();
    echo message()->info($user->message()->json());
}

var_dump($user);
