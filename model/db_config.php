<?php

class Connection{


private $host;
private $user;
private $password;
private $database;

public function __construct($host, $user, $password, $database){
$this->host=$host;
$this->user=$user;
$this->password=$password;
$this->database=$database;


}
public function connect (){
$con= new mysqli($this->host, $this->user, $this->password, $this->database);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
else return $con;
}

}
?>