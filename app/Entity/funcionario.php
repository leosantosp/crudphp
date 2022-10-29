<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Funcionario{
    /* Identificador único do colaborador @var integer */
    public $id;

    /* Nome do Colaborador @var string */
    public $name;

    /* Departamento em que o colaborador atua @var string */
    public $department;

    /* Email utilizado pelo colaborador @var string*/
    public $email;

    /* Ramal utilizado pelo colaborador @var integer */
    public $phone;

    /* Data de Nascimento do colaborador @var date */
    public $birth;


    /* Método responsável por cadastrar um novo colaborador */
    public function cadastrar(){

        // INSERIR A VAGA NO BANCO
        $obDatabase = new Database('colaborador');
        $this->id = $obDatabase->insert([
                                                'name' => $this->name,
                                                'department' => $this->department,
                                                'email' => $this->email,
                                                'phone' => $this->phone,
                                                'birth' => $this->birth
                                            ]);

        // RETORNAR SUCESSO
        return true;
    }

    /* Método responsável por atualizar um colaborador */
    public function atualizar(){
        return (new Database('colaborador'))->update('id = '.$this->id,[
            'name' => $this->name,
            'department' => $this->department,
            'email' => $this->email,
            'phone' => $this->phone,
            'birth' => $this->birth
        ]);
    }

    /* Método responsável por excluir a vaga do banco */
    public function excluir(){
        return(new Database('colaborador'))->delete('id = '.$this->id);
    }

    /* Método responsável por obter os funcionários no banco de dados */
    public static function getFuncionarios($where = null, $order = null, $limit = null){
        return(new Database('colaborador'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /* Método responsável por buscar uma vaga com base no seu ID */
    public static function getFuncionario($id){
        return(new Database('colaborador'))->select('id = '.$id)->fetchObject(self::class);
    }

}