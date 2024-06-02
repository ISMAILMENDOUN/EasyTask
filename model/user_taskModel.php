<?php

require_once 'db_config.php';

class UserTask{
private $idUser;
private $idTask;

public function __construct($idUser,$idTask){

$this->idUser=$idUser;
$this->idTask=$idTask;
}
public function assign(){

    $date=date('Y/m/d H:i:s');
    $con=new Connection("localhost","root","","tasks");
    $con=$con->connect();
    
try{mysqli_query($con,"INSERT INTO user_task (dateAssignment, idUser, idTask) VALUES
 ('$date', $this->idUser, $this->idTask)");}
 catch(exception $e){header('Location:admin.php');}
}
public static function createWithOneParams($idTask) {
    $task_user = new UserTask(null, null);
    $task_user->idTask = $idTask;
    return $task_user;
}
public static function createWithZeroParams() {
    $task_user = new UserTask(null, null);
    
    return $task_user;
}

public function userTask(){
    $con=new Connection("localhost","root","","tasks");
    $con=$con->connect();
    $assignedTo=mysqli_fetch_array(mysqli_query($con,"SELECT user_task.idUser,firstName from user_task inner join user where idTask=$this->idTask and user_task.idUser=user.idUser "));
    return $assignedTo;
}
public function myTasks($idUser){
    $con=new Connection("localhost","root","","tasks");
    $con=$con->connect();
    $myTasks=mysqli_query($con,"SELECT task.idTask,task.name,category,priority,startDate,endDate,statut from user_task,task where idUser=$idUser and user_task.idTask=task.idTask");
    return $myTasks;

}
public function markAsDone($idTask){

    $con=new Connection("localhost","root","","tasks");
    $con=$con->connect();
    $myTasks=mysqli_query($con,"update task set statut='Done'where idTask=$idTask");
}

}




?>