<?php

namespace Source\Core;

class Message 
{
    private $text;
    private $type;
    
    //Método mágico. É executado automaticamente quando se dar um echo no obj
    public function __toString() 
    {
        return $this->render();        ;
    }
    
    public function getText() 
    {
        return $this->text;
    }

    public function getType() 
    {
        return $this->type;
    }
    
    public function info($message)
    {
        $this->type = CONF_MESSAGE_INFO;
        $this->text = $this->filter($message);
        return $this;
    }
    
    public function success($message)
    {
        $this->type = CONF_MESSAGE_SUCCESS;
        $this->text = $this->filter($message);
        return $this;
    }
    
    public function warning($message)
    {
        $this->type = CONF_MESSAGE_WARNING;
        $this->text = $this->filter($message);
        return $this;
    }
    
    public function error($message)
    {
        $this->type = CONF_MESSAGE_ERROR;
        $this->text = $this->filter($message);
        return $this;
    }
    //monta o html a 1ª class é o padrão. 2ª class que formata o padrão de msn
    public function render()
    {
        return "<div class='" . CONF_MESSAGE_CLASS . " {$this->getType()}'>{$this->getText()}</div>";        
    }
    
    public function json()//Rastrear o erro 
    {
        return json_encode(["error" => $this->getText()]);        
    }
    //Armazenando a mensagem atribui
    public function flash(): void
    {
        (new Session())->set("flash", $this);        
    }
    
    // Filtrar a mensagem impede ataques XSS, onde o usuário inputa um script e acaba com nossa aplicação
    private function filter($message)
    {
        return filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS);        
    }
}
