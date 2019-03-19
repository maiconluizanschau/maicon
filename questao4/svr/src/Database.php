<?php
/**
 * Classe para conexao com o banco de dados MySql,
 * via acesso nativo do PHP/PDO.
 * É necessário ter definido as seguintes constantes: DB_NAME, DB_HOST, DB_USER, DB_PASSWORD
 */
namespace Tarefas;
use PDO;
class Database {

    /**
     * Instância singleton
     * @var Database
     */
    private static $instance;
    /**
     * Conexão com o banco de dados
     * @var PDO
     */
    private static $connection;

    /**
     * Construtor privado da classe singleton
     */
    private function __construct() {
        self::$connection = new PDO("mysql:dbname=root" . DB_NAME . ";host=root" . DB_HOST, DB_USER, DB_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }

    /**
     * Obtém a instancia da classe DB
     * @return type
     */
    public static function getInstance() {

        if (empty(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    /**
     * Retorna a conexão PDO com o banco de dados
     * @return PDO
     */
    public static function getConn() {
        self::getInstance();
        return self::$connection;
    }

    /**
     * Prepara a SQl para ser executada posteriormente
     * @param String $sql
     * @return PDOStatement stmt
     */
    public static function prepare($sql) {
        return self::getConn()->prepare($sql);
    }

    /**
     * Retorna o id da última consulta INSERT
     * @return int
     */
    public static function lastInsertId() {
        $query = "SELECT id_task FROM tasks ORDER BY id_task DESC LIMIT 1;";
        $query = self::getConn()->prepare($query);
        $query->execute();
        return $query->fetch();
    }

    /**
     * Retorna o id da última consulta INSERT
     * @return int
     */
    public static function orderNewTask(){
        $query = "SELECT count(id_task) as order_task FROM tasks;";
        $query = self::getConn()->prepare($query);
        $query->execute();
        return $query->fetch();
    }

}