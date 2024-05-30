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

?>