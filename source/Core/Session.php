<?php

namespace Source\Core;

/**
 * Class Session
 * @package Source\Core
 */
class Session 
{
    /**
     * Session constructor
     */
    public function __construct() 
    {
        if(!session_id()){
            session_save_path(CONF_SES_PATH);
            session_start();
        }
    }
    
    /**
     * @param $name
     * @return null\mixed
     */
    public function __get($name) 
    {
        if (!empty($_SESSION[$name])){
            return $_SESSION[$name];            
        }
        return null;
    }
    
    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return $this->has($name);
    }
        /**
         * @return object|null
         */
        public function all(): ?object
    {
        return (object)$_SESSION;        
    }
        /**
         * @param string $key
         * @param mixed $value
         * @return Session
         */
        public function set($key, $value): Session
    {
        $_SESSION[$key] = (is_array($value) ? (object)$value : $value);
        return $this;
    }
    
    /**
     * @param $key
     * @return $value
     * @return Session
     */    
    public function unset($key): Session 
    {
        unset($_SESSION[$key]);
        return $this;
    }
    
    /**
     * @param string $key
     * @return bool
     */
    public function has($key): bool
    {
        return isset($_SESSION[$key]);        
    }
    
    /**
     * @return Session
     */
    public function regenerate(): Session
    {
        session_regenerate_id(true);
        return $this;
    }
    
    /*
     * @return Session
     */
    public function destroy(): Session
    {
        session_destroy();
        return $this;        
    }
    
    /**
     * return null|Message
     */
    //Método Flash para monitorar, atribuir e exibição da mensagem
    public function flash()
    {
        if($this->has("flash")){
            $flash = $this->flash;//Atribuindo a essa váriavel o obj flash
            $this->unset("flash");//Limpando a msn flash
            return $flash;
        } 
        return null;
    }
    
    /**
     * CSRF Token
     */
    public function csrf()//Método que cria um indice na sessão para saber se o usuário realmente se encontra no site
    {
        $_SESSION['csrf_token'] = base64_decode(random_bytes(20));//Garantindo a seguranção do formulário      
    }
}
