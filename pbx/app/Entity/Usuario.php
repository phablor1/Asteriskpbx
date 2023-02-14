<?php

namespace App\Entity;

use \App\DB\Database;

use \PDO;

class Usuario{
    /**
     * Identificado unico do usuario
     * @var int
     */
    public $user_id;

    /**
     * Usuario
     * @var string
     */
    public $username;

    /**
     * Senha do usuario
     * @var string
     */
    public $password;

    /**
     * Nome do Usuario
     * @var string
     */
    public $name;

    /**
     * Email do Usuario
     * @var mixed
     */
    public $email;

    /**
     * Metodo responsavel por cadastrar novo usuario no banco
     * @return bool
     */
    public function cadastrar(){
        $obDatabase = new Database('users');
        //echo "<pre>";print_r($obDatabase);echo "</pre>";exit;
        //Insere novo usuario
        $this->user_id = $obDatabase->insert([
            'username'=> $this->username,
            'password'=> $this->password,
            'name'=> $this->name,
            'email'=> $this->email
        ]);
        //echo "<pre>";print_r($this);echo "</pre>";exit;
        return true;
    
    }

 /**
   * Método responsável por atualizar a vaga no banco
   * @return bool
   */
  public function atualizar(){
    return (new Database('users'))->update('user_id = '.$this->user_id,[
                                                                'usuario'=> $this->username,
                                                                'senha' => $this->password,
                                                                'nome' => $this->name,
                                                                'email' => $this->email
                                                              ]);
  }
/**
   * Método responsável por obter as vagas do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getUsuarios($where = null, $order = null, $limit = null){
    return (new Database('users'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
  }

/**
 * Summary of getUsuario
 * @param string $usuario
 * @return Usuario
 */
public static function getUsuario($usuario){
    //return (new Database('users'))->select('username = '.$usuario)->fetchObject(self::class);
    return $usuario;
}
}