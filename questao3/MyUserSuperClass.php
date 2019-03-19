<?php
require_once 'DatabaseConnection.php';

/*O ideal é que os dados de credenciais de banco estivessem contidas no arquivo
 * DatabaseConnection, porem para fins do teste, tais variaveis serão mantidas no objeto de
 * Super Classe 
*/
class MyUserSuperClass
{

    protected $dbConn;
    protected $userName = 'user';
    protected $password = 'password';
    protected $host = 'localhost';

    function __construct()
    {
        if (!isset($this->dbConn) || !( $this->dbConn instanceOf DatabaseConnection )) {
            $this->dbConn = new DatabaseConnection($this->host, $this->userName, $this->password);
        }
    }
}
