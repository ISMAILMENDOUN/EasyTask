<?php
require_once '../model/taskModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['name'])&&isset($_POST['category'])&&isset($_POST['priority'])&&isset($_POST['startDate'])
    &&isset($_POST['endDate'])&&isset($_POST['statut'])){
$name=$_POST['name'];
$category=$_POST['category'];
$priority=$_POST['priority'];
$startDate=$_POST['startDate'];
$endDate=$_POST['endDate'];
$statut=$_POST['statut'];

$task=new Task($name,$category,$priority,$startDate,$endDate,$statut);
$task->setTask();
}
}
/******************************************************DISPLAY ALL TASKS************************ */
$taskDisplay=new DisplayTasks();
$result=$taskDisplay->displayAllTasks();
/*******************************************************DELETE TASK**************************** */

if(isset($_GET['delete'])){
$delete=$_GET['delete'];
$taskDelete=new DeleteTask();
$taskDelete->deleteTAsk($delete);
}
/********************************************************UPDATE TASK************************ */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if(isset($_POST['updateD0'])&&isset($_POST['updateD1'])&&isset($_POST['updateD2'])&&isset($_POST['updateD3'])&&isset($_POST['updateD4'])&&isset($_POST['updateD5'])&&isset($_POST['updateD6'])){
    $id=$_POST['updateD0'];
    $name=$_POST['updateD1'];
    $category=$_POST['updateD2'];
    $priority=$_POST['updateD3'];
    $startDate=$_POST['updateD4'];
    $endDate=$_POST['updateD5'];
    $statut=$_POST['updateD6'];
$task = Task::createWithSevenParams($id, $name, $category, $priority, $startDate, $endDate, $statut);
$task->updateTask($id);
}}
/********************************************************DISPLAY A TASK*********************** */
function displayMyTask($name){
$mTask=new DisplayTasks();
$mTask=$mTask->displayAtask($name);
return $mTask;
}

?>