<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database{
    //Credenciais de acesso ao banco de dados

    /* Host de Conexão com o Banco de Dados */
    const HOST = 'localhost';
    
    /* Nome do Banco de Dados */
    const NAME = 'crud';

    /* Usuário do Banco de Dados */
    const USER = 'root';

    /* Senha de Acesso ao Banco de Dados */
    const PASSWORD = '';

    /* Informação do nome da tabela a ser manipulada */
    private $table;

    /* Instancia de conexão com o banco de dados */
    private $connection;

    /* Define a tabela e instancia a conexão */
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    } 

    /* Método responsável por criar uma conexão com o banco de dados */
    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    /* Método responsável por executar querys dentro do banco de dados */
    public function execute($query,$params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement;

        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    /* Método responsável por inserir os dados no banco de dados */
    public function insert($values){
        // Dados da Query
        $fields = array_keys($values);
        $binds = array_pad([], count($fields),'?');

        // Monta a Query
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

        // EXECUTA O INSERT
        $this->execute($query, array_values($values));

        // RETORNA O ID INSERIDO
        return $this->connection->lastInsertId();
    }

    /* Método responsável por executar a consulta no banco de dados */
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        // DADOS DA QUERY
        $where = strlen($where) ? ' WHERE '.$where : '';
        $where = strlen($order) ? ' ORDER BY '.$order : '';
        $where = strlen($limit) ? ' LIMIT '.$limit : '';

        // MONTA A QUERY
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
        
        // EXECUTA A QUERY
        return $this->execute($query);
    }

    /* Método responsável por executar atualizações no banco de dados */
    public function update($where, $values){
        // DADOS DA QUERY
        $fields = array_keys($values);

        // MONTA QUERY
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
    
        // EXECUAR A QUERY
        $this->execute($query,array_values($values));

        return true;
    }

    /* Método responsável por excluir dados do banco */
    public function delete($where){
        

        // MONTA A QUERY 
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        
        //EXECUTA A QUERY
        $this->execute($query);

        // RETORNA SUCESSO
        return true;
    }

}