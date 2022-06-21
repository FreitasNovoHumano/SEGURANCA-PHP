<?php

/**
 * ####################
 * ###   VALIDATE   ###
 * ####################
 */


/**
 * @param string $email
 * @return bool
 */
function is_email(string $email)//Verificação de e-mail
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);    
}

/**
 * @param string $password
 * @return bool
 */
function is_passwd(string $password)//Validado a quantidade min e max de caracter
{
    return (mb_strlen($password) >= CONF_PASSWD_MIN_LEN && mb_strlen($password) <= CONF_PASSWD_MAX_LEN ? true : false);    
}

/**
 * @param string $password
 * @return string
 */
function passwd($password)//Método para gerar o PASSWORD
{
    return password_hash($password, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);    
}

/**
 * @param string $password
 * @param STRING $hash
 * @return BOOL
 */
function passwd_verify($password, $hash)//Método verificar o PASSWORD
{
    return password_verify($password, $hash);    
}

/**
 * @param string $hash
 * @return bool
 */
function passwd_rehash($hash) //Método para fazer o Rehash
{
    return password_needs_rehash($hash, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);    
}

function csrf_input()
{
    session()->csrf();//Sempre que o input rodar a chave muda
    return "<input type='hidden' name='csrf' value='" . (session()->csrf_token ?? "") . "'/>";
    //TYPE='HIDDEN' deixa o campo criado no form invisívél para o usuário
}

/**
 * @param $request
 * @return boolean
 */
function csrf_verify($request)
{
    //Verificando se existe o token na sessão ou se não existe na requisição, verificar o indice csrf, se for diferente false
    if (empty(session()->csrf_token) || empty($request['csrf']) || $request['csrf'] != session()->csrf_token){
        return false;
    } 
    return true;
}

/**
 * ##################
 * ###   STRING   ###
 * ##################
 */


/**
 * 
 * @param string $string
 * @return string
 */
// Função slug pega uma string e transforma em url
function str_slug(string $string)
{
    $string = filter_var(mb_strtolower($string), FILTER_SANITIZE_SPECIAL_CHARS);
    $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
    $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyrr                                 ';
    
    //Deixando um traço por separação de letra
    $slug = str_replace(["-----", "----", "---", "--"], "-",
        str_replace(" ", "-",
            trim(strtr(utf8_decode($string), utf8_decode($formats), $replace))
        )
    );
    return $slug;
}

/**
 * @param string $string
 * @return string
 */
function str_studly_case(string $string) //Deixa a 1ª letra de cada palavra com letra maiúscula
{
    $string = str_slug($string);
    $studlyCase = str_replace(" ", "",
            mb_convert_case(str_replace("-", " ", $string), MB_CASE_TITLE)
    );
    
    return $studlyCase;
}

/**
 * @param string $string
 * @return string
 */
function str_camel_case(string $string) //A 1ª letra da 1ª palavra é minuscula. e todas as 1ª letra de todas as palavras consecutivas são maiúscula
{
    return lcfirst(str_studly_case($string));    
}

/**
 * @param string $string
 * @return string
 */
function str_title(string $string) //Ao receber html ou um script, será mantido com tags html para q a aplicação possa interpretar o código
{
    return mb_convert_case(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS), MB_CASE_TITLE);    
}

/**
 * @param string $string
 * @param int $limit
 * @param string $pointer
 * @return string
 */
function str_limit_words($string, $limit, $pointer = "...") //Limite ou geração de resumo de texto, Quantidade de palavra. Ao cortar vai mostrar os .....
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    $arrWords = explode(" ", $string); //Conta as palavras
    $numWords = count($arrWords); //Armazenando o valor para poder utilizar
    
   // var_dump($arrWords, $numWords);//Mostra quantas palavras tem
    
    if($numWords < $limit){
        return $string;        
    }
    
    //Transformando o array em um texto novamente
    $words = implode(" ", array_slice($arrWords, 0, $limit));
    return "{$words}{$pointer}";
}

/**
 * @param string $string
 * @param int $limit
 * @param string $pointer
 * @return string
 */
function str_limit_chars($string, $limit, $pointer = "...") //Resumindo por quantidade de caracters
{
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    if (mb_strlen($string) <= $limit){ //Se a string for menor que o limit, não cortar
        return $string;
    }
    
    //$chars = mb_strrpos(mb_substr($string, 0, $limit), " "); //descobrindo qual é o útimo espaço dessa string
    $chars = mb_substr($string, 0, mb_strrpos(mb_strrpos($string, 0, $limit), " "));
    return "{$chars}{$pointer}";
}

/**
 * ##################
 * ###   STRING   ###
 * ##################
 */


/**
 * @param string $url
 * @return string
 */
function url(string $path)
{
    return CONF_URL_BASE . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);    
}


/**
 * @param string $url
 */
function redirect(string $url)
{
    header("HTTP/1.1 302 Redirect");
    if (filter_var($url, FILTER_VALIDATE_URL)){
        header("Location: {$url}");
        exit;
    }
    
    $location = url($url);
    header("Location: {$location}");
    exit;
}

/**
 * ###############
 * ###   CORE  ###
 * ###############
 */


/**
 * @return PDO
 */
function db()
{
    return \Source\Core\Connect::getInstance();    
}

/**
 * @return \Source\Core\Message
 */
function message()
{
    return new \Source\Core\Message();    
}

/**
 * @return \Source\Core\Session
 */
function session()
{
    return new \Source\Core\Session();    
}


/**
 * ################
 * ###   MODEL  ###
 * ################
 */

/**
 * @return \Source\Models\User
 */
function user()
{
    return new \Source\Models\User();    
}