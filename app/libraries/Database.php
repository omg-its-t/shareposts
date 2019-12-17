<?php
/* PDO database class
 * connect to database
 * create prepared statements
 * bind values
 * returns rows and results
*/

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    //database handler
    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){
        //DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            //increase performace by checking if connection exists
            PDO::ATTR_PERSISTENT => true,
            //more elegant way of throwing errors
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        //create PDO instance
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //STEP 1 prepare statement with query
    public function query($sql){
         $this->stmt = $this->dbh->prepare($sql);
    }

    //STEP 2 bind values
    public function bind($param, $value, $type = null){
        //check to see what type it is
        if(is_null($type)){
            switch(true){
                //if int set to int
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                //if bool set to bool
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                //if null set to null
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    //STEP 3 execute prepared statement
    public function execute(){
        return $this->stmt->execute();
    }

    // get multiple records from DB as an array of objects
    public function resultSet(){
        $this->execute();
                                    // this make it return objects and not arrays                     
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //get single record as object
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //get row count
    public function rowCount(){
        return $this->stmt->rowCount();
    }
}
