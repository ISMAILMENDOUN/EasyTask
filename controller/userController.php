<?php
require_once '../model/userModel.php';
require_once '../model/userModel.php';
/****************************************HANDLE REGISTRATION**************************************** */

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_REFERER']) && ($_SERVER['HTTP_REFERER'] === "http://localhost:8080/easytask/view/"||$_SERVER['HTTP_REFERER'] === "http://localhost:8080/easytask/view/index.php")&&isset($_POST['confirm_password'])) {
var_dump($_SERVER['HTTP_REFERER']);
if(isset($_POST['first_name'])&&isset($_POST['last_name'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['confirm_password'])&&$_POST['first_name']!=""&&$_POST['last_name']!=""&&$_POST['email']!=""&&$_POST['password']!=""&&$_POST['confirm_password']!=""){
if($_POST['password']==$_POST['confirm_password']){
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $record=new register($first_name,$last_name,$email,$password);
    $record->register();


}
else{
echo'<script>alert("Passwords Does Not Match!!")</script>';
echo '<meta http-equiv="refresh" content="0;url=../view/index.php?var=s" />';

}
}
else{
    echo'<script>alert("All Fields Are Required!!")</script>';
    echo '<meta http-equiv="refresh" content="0;url=../view/index.php?var=s"/>';
       }
}
/***********************************************HANDLE LOGIN**************************************** */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if(isset($_POST['loginEmail'])&&isset($_POST['loginPassword'])){
    $email =$_POST['loginEmail'];
    $password =$_POST['loginPassword'];
$log=new login($email,$password);
$log->login();

}


}
/*****************************************************DISPLAY ALL USERS******************** */
$user = register::createWithZeroParams();
$user=$user->allUsers();
?>