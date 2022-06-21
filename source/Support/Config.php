<?php

/**
 * DATABESE
 */
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "fullstackphp");

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "http://localhost/fsphp/06-seguranca-e-boas-praticas/06-08-camada-de-manipulacao-pt3/");
define("CONF_URL_ADMIN", CONF_URL_BASE . "/admin");
define("CONF_URL_ERROR", CONF_URL_BASE . "/404");

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "y-m-d H:i:s");

/**
 * SESSION
 */
define("CONF_SES_PATH", __DIR__ . "/../../storage/sessions/");//Arquivo onde as sessões seram armazenadas

/**
 * PASSWORD
 * Validação da senha com min e max de caracters
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);//Criptografa a senha
define("CONF_PASSWD_OPTION",["cost" => 10]);


/*
 * MESSAGE
 */
define("CONF_MESSAGE_CLASS", "trigger");//class css que formata a mensagem
define("CONF_MESSAGE_INFO", "info");// class de formação da mensagem
define("CONF_MESSAGE_SUCCESS", "success");//seguindo padrão psr-3
define("CONF_MESSAGE_WARNING", "warning");// class de alerta
define("CONF_MESSAGE_ERROR", "error");// class erro