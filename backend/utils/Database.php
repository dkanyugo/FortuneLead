<?php
require "Constants.php";
/**
* Database is a utility class that helps with the database connection.
* This class obeys the single pattern hence use get_database() to have an instance of the class
**/
class Database{
  private $connection;
  private $host;
  private $port;
  private $type;
  private $user;
  private $pass;
  private $name;
  private static $instance;

  /**
 * Private constructor for the class.
 * @param string $db_host hostname
 * @param string $db_port port number
 * @param string $db_user username
 * @param string $db_pass password
 * @param string $db_name database name
 */
  private function __construct($db_host, $db_port, $db_user, $db_pass, $db_name){
    $this->host = $db_host;
    $this->port = $db_port;
    $this->user = $db_user;
    $this->pass = $db_pass;
    $this->name = $db_name;
    $this->connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
  }

  /**
  * Connects to the database using PDO.
  * @return PDO
  **/
  private function connect():PDO{
    try{
      if ($this->port <> Null){
        $connect_stmt = "mysql:host=$this->host;dbname=$this->name;";
        return new PDO($connect_stmt, $this->user, $this->pass);
      }
    } catch(PDOException $e){
      echo "Connection failed: " . $e->getMessage();
    }
  }

  /**
  * Provides an instance of the database class.
  * @return Database
  **/
  public static function get_database():Database{
    if (!isset(self::$instance)){
      self::$instance = new Database(DB_HOST, DB_PORT, DB_USER, DB_PASS, DB_NAME);
    }
    return self::$instance;
  }

  /**
  * Adds lead to the database.
  * @param string $surname Employee's surname
  * @param string $firstname Their firstname
  * @param string $email their email address
  * @param string $phone their phone number
  * @return bool return if the action was successful
  */
  public function add_lead($surname, $firstname, $email, $phone): bool{
    $stmt = $this->connection->prepare("INSERT INTO leads(surname, firstname, email, phone) VALUES(?,?,?,?)");
    $stmt->bind_param('ssss', $surname, $firstname, $email, $phone);
    $success = true;
    try {
      $stmt->execute();
      $stmt->close();
    } catch(Exception $e){
      $success = false;
      echo "Internal Server Error: " . $e;
    }
    return $success;
  }
}
