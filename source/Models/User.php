<?php
/**
 * Regra de negocio
 */

namespace Source\Models;

use Source\Core\Model;

class User extends Model
{
    /** @var array $safe no update or create */
    protected static $safe = ["id", "created_at", "updated_at"];
    
    /** @var string $entity database table */
    protected static $entity = "users";
    
    /** @var array $required table fileds */
    protected static $required = ["first_name", "last_name", "email", "password"];


    //Ajuda construir os dados cadastrais de um novo usuário
    public function bootstrap($firstName, $lastName, $email, $password, $document = null): ?User
    {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->document = $document;
        return $this;//Permite trabalhar com todos os métodos na index
    }
    
    /**
     * @param string $terms
     * @param string $params
     * @param string $columns
     * @return null|User
     */
    public function find($terms, $params, $columns = "*")
    {
        $find = $this->read("SELECT * FROM users  WHERE {$terms}", $params);
        if ($this->fail() || !$find->rowCount()){//Deu erro ou não obteve result
            return null;
        }//Caso contrário ativa todos os métodos da classe nesse carregamento      
        return $find->fetchObject(__CLASS__);       
    }

    /**
     * @param int $id
     * @param string $columns
     * @return null|User
     */    
    public function findById(int $id, string $columns = "*")
    {
        return $this->find("id = :id", "id={$id}", $columns);
    }
    
    /**
     * @param $email
     * @param string $columns
     * @return null|User
     */
    public function findByEmail($email, $columns = "*")//Busca pelo e-mail
    {
       return $this->find("email = :email", "email={$email}", $columns);
        
    }
    
    /**
     * @param int $limit
     * @param int $offset
     * @param string $columns
     * @return tarray|null
     */
    public function all(int $limit = 30, int $offset = 0, $columns = "*")//Busca todos os resultados
    {
        $entity = self::$entity;
         $all = $this->read("SELECT {$columns} FROM {$entity} LIMIT :limit OFFSET :offset", " limit={$limit}&offset={$offset}");
        if ($this->fail() || !$all->rowCount()){//Deu erro ou não obteve result
            return null;
        }//Caso contrário ativa todos os métodos da classe nesse carregamento      
        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);        
    }
    
    /**
     * @return $this
     */
    public function save()//Responsavel por cadastrar e salvar usuário na base
    {
        if (!$this->required()){
            $this->message->warning("Nome, sobrenome, email e senha são obrigatórios");
            return null;
        }
        /** User Update */
        if (!empty($this->id)){
            $userId = $this->id;
            
            if ($this->find("email = :e AND i != :id", "e={$this->email}&i={$userId}")){
                $this->message->warning("O e-mail informado já está cadastrado!");
                return null;
            }
            
            $this->update(self::$entity, $this->safe(), "id = :id", "id={$userId}");
        if ($this->fail()){
            $this->message->error("Erro ao atualizar, verifique os dados");
            return null;
        }                    
    }     
        
        /** User Create */
        if (empty($this->id)){
            if($this->findByEmail($this->email)){
                $this->message->warning("O e-mail informado já está cadastrado!") ;
                return null;
            }
            
            $userId = $this->create(self::$entity, $this->safe());
            if ($this->fail()){
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return null;
            }           
        }
        
        $this->data = ($this->findById($userId))->data();
        return $this;
    }
    
    public function destroy()//Deletar usuário
    {
        if (!empty($this->id)){
            $this->delete(self::$entity, "id = :id", "id={$this->id}");
        }
        
        if ($this->fail()){
            $this->message = "Não foi possível remover o usuário";
            return null;
        }
        
        $this->message = "Usuário removido com sucesso";
        $this->data = null;//Limpa os dados
        return $this;        
    }
}
