<?php
require_once 'db_config.php';


class register{
private $idUser;
private $firstName;
private $lastName;
private $email;
private $password;

public function __construct($firstName,$lastName,$email,$password){

$this->firstName=$firstName;
$this->lastName=$lastName;
$this->password=$password;
$this->email=$email;

}
public static function createWithZeroParams() {
    return new self('', '', '', '');
}

public function allUsers(){

    $con=new Connection("localhost","root","","tasks");
    $con=$con->connect();
    $users=mysqli_query($con,"select * from user ");
   return $users;
}
public function register(){

$con=new Connection("localhost","root","","tasks");
$con=$con->connect();
$user=mysqli_fetch_array(mysqli_query($con,"select count(*) from user where email='".$this->email."'"));
if($user[0]==0){
$query=mysqli_query($con,"insert into user(firstName,lastName,email,password)  VALUES ('$this->firstName', '$this->lastName', '$this->email', '$this->password')");
echo'<script>alert("User Added Successfully!!")</script>';
}
else{

    echo'<script>alert("Record Already Exists!!")</script>';
}
echo '<meta http-equiv="refresh" content="0;url=../view/" />';
}



}

class Login{
    private $email;
    private $password;

    public function __construct($email,$password){
        $this->password=$password;
        $this->email=$email;
        
        }
        public function login(){

            $con=new Connection("localhost","root","","tasks");
            $con=$con->connect();
            $user=mysqli_fetch_array(mysqli_query($con,"select * from user where email='$this->email' and password='$this->password'"));
             if($user!=null){

            session_start();
            $_SESSION['idUser']=$user[0];
            $_SESSION['firstName']=$user[1];
            $_SESSION['lastName']=$user[2];
            $_SESSION['email']=$user[3];
           
            echo '<meta http-equiv="refresh" content="0;url=../view/user.php" />';
}
else {
    echo '<script>alert("Email Or Password Is Wrong!!")</script>';
    echo '<meta http-equiv="refresh" content="0;url=../view/index.php" />';
}
        
        }
        



}


?>