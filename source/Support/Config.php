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
define("CONF_URL_BASE", "http://localhost/fsphp/");
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

/*
 * MESSAGE
 */
define("CONF_MESSAGE_CLASS", "trigger");//class css que formata a mensagem
define("CONF_MESSAGE_INFO", "info");// class de formação da mensagem
define("CONF_MESSAGE_SUCCESS", "success");//seguindo padrão psr-3
define("CONF_MESSAGE_WARNING", "warning");// class de alerta
define("CONF_MESSAGE_ERROR", "error");// class erro