<?php

class Database{

    //Define credential variables to access the database - PRIVATE
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database_name = 'restaurant';
    protected $db_connection; //This will be used in other classes

    public function __construct(){
        try{
            $dsn = "mysql:host=$this->host;dbname=$this->database_name";
            $this->db_connection = new PDO($dsn, $this->$username,$this->$password);

            //Set PDO attributes for error handling and fetch mode
            $this->$db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->$db_connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        
        } catch(PDOException $e) {
            //handle connection errors
            echo "Database Connection Failed: " . $e->getMessage();
        }
    }
}

?>