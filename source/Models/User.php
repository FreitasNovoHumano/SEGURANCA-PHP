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
    
    //Ajuda construir os dados cadastrais de um novo usuário
    public function bootstrap($firstName, $lastName, $email, $document = null)
    {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->document = $document;
        return $this;//Permite trabalhar com todos os métodos na index
    }
    
    //Buscar o usuário pelo id
    public function load(int $id, string $columns = "*")
    {
        $load = $this->read("SELECT * FROM users  WHERE id = :id" ,"id={$id}");
        if ($this->fail() || !$load->rowCount()){//Deu erro ou não obteve result
            $this->message = "Usuário não encontrado para o id informado";
            return null;
        }//Caso contrário ativa todos os métodos da classe nesse carregamento      
        return $load->fetchObject(__CLASS__);
    }
    
    public function find($email)//Busca pelo e-mail
    {
        $find = $this->read("SELECT * FROM users  WHERE email = :email" ,"email={$email}");
        if ($this->fail() || !$find->rowCount()){//Deu erro ou não obteve result
            $this->message = "Usuário não encontrado para o e-mail informado";
            return null;
        }//Caso contrário ativa todos os métodos da classe nesse carregamento      
        return $find->fetchObject(__CLASS__);
        
    }
    
    public function all(int $limit = 30, int $offset = 0, $columns = "*")//Busca todos os resultados
    {
        $entity = self::$entity;
         $all = $this->read("SELECT {$columns} FROM {$entity} LIMIT :limit OFFSET :offset", " limit={$limit}&offset={$offset}");
        if ($this->fail() || !$all->rowCount()){//Deu erro ou não obteve result
            $this->message = "Sua consulta não retornou usuários";
            return null;
        }//Caso contrário ativa todos os métodos da classe nesse carregamento      
        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
        
    }
    
    public function save()//Responsavel por cadastrar ou salvar usuário na base
    {
        if (!$this->required()){
            return null;
        }
        /** User Update */
        if (!empty($this->id)){
            $userId = $this->id;
            $email = $this->read("SELECT id FROM users WHERE email = :email "
                    . "AND id != :id", "email={$this->email}&id={$userId}");
            if ($email->rowCount()){
                $this->message = "O e-mail informado já está cadastrado!";
                return null;
            }
            
            $this->update(self::$entity, $this->safe(), "id = :id", "id={$userId}");
        if ($this->fail()){
            $this->message = "Erro ao atualizar, verifique os dados";
        }
        $this->message = "Dados atualizados com sucesso";                    
    }     
        
        /** User Create */
        if (empty($this->id)){
            if($this->find($this->email)){
                $this->message = "O e-mail informado já está cadastrado!";
                return null;
            }
            
            $userId = $this->create(self::$entity, $this->safe());
            if ($this->fail()){
                $this->message = "Erro ao cadastrar, verifique os dados";
            }
            $this->message = "Cadastro realizado com sucesso!";            
        }
        
        $this->data = $this->read("SELECT * FROM users WHERE id = :id", "id={$userId}")->fetch();
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
    
    private function required()//Diz quais os capos é obrigatorio no cadastro
    {
        if (empty($this->first_name) || empty($this->last_name) || empty($this->email)){
            $this->message = "Nome, sobrenome e e-mail são obrigatórios";
            return false;
        }
        
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $this->message = "O e-mail informado não parece válido";
            return false;
        }
        
        return true;
        
    }
}
