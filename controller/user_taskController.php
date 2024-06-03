<?php
require_once '../model/user_taskModel.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if(isset($_POST['idUserA'])&&isset($_POST['idTaskA'])){
$string=$_POST['idUserA'];
preg_match('!\d+!', $string,$idUserA);
$idTaskA=$_POST['idTaskA'];
$userTask=new userTask(intval($idUserA[0]),$idTaskA);
$userTask->assign();
header('Location:admin.php');
    }}

/****************************************************DISPLAY THE ASSIGNMENT*********************************** */
function getAssignment($idT){
$uT=UserTask::createWithOneParams($idT);
    $uT=$uT->userTask();
    return $uT;}

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if(isset($_POST['displayMyTasks'])){

    $myTasks=UserTask::createWithZeroParams();
    $myTasks=$myTasks->myTasks($_SESSION['idUser']);
    
    
}
if(isset($_POST['byPriority'])){

    $myTasks=UserTask::createWithZeroParams();
    $myTasks=$myTasks->myTasksP($_SESSION['idUser']);
    
}
if(isset($_POST['byGroup'])){

    $myTasks=UserTask::createWithZeroParams();
    $myTasks=$myTasks->myTasksG($_SESSION['idUser']);
    
}

if(isset($_POST['taskDone'])){
    $idTask=$_POST['taskDone'];
    $myTasks=UserTask::createWithZeroParams();
    $myTasks=$myTasks->markAsDone($idTask);
    $_POST['displayMyTasks']=true;
    $display="d";
}
    }
?>