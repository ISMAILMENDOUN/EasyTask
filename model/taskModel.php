<?php
require_once 'db_config.php';
class Task{
private $idTask;
private $name;
private $category;
private $priority;
private $startDate;
private $endDate;
private $statut;
public function __construct($name,$category,$priority,$startDate,$endDate,$statut){

    $this->name=$name;
    $this->category=$category;
    $this->priority=$priority;
    $this->startDate=$startDate;
    $this->endDate=$endDate;
    $this->statut=$statut;
}

public static function createWithSevenParams($idTask,$name,$category,$priority,$startDate,$endDate,$statut){
    $task = new Task($name, $category, $priority, $startDate, $endDate, $statut);
        $task->idTask = $idTask;
        return $task;


}
public function setTask(){
$con=new Connection("localhost","root","","tasks");
$con=$con->connect();
mysqli_query($con,"insert into task(name,category,priority,startDate,endDate,statut) values('$this->name',
'$this->category','$this->priority','$this->startDate','$this->endDate','$this->statut')");
}
public function updateTask($idTask){
    $con=new Connection("localhost","root","","tasks");
    $con=$con->connect();
    mysqli_query($con," update task set name='$this->name',category= '$this->category',priority='$this->priority',startDate='$this->startDate',endDate='$this->endDate',statut='$this->statut' where idTask=$idTask");

}

/*public function updateTask($idTask){


    $con=new Connection("localhost","root","","tasks");
    $con=$con->connect();
    mysqli_query($con,"update task set name=? category,priority,startDate,endDate,statut) values('$this->name',
    '$this->category','$this->priority','$this->startDate','$this->endDate','$this->statut') where idTask=".$idTask);

}*/
}

class DisplayTasks{


    public function displayAllTasks(){


        $con=new Connection("localhost","root","","tasks");
        $con=$con->connect();
        $result=mysqli_query($con,"select * from task ");
       return $result;
    
    }

    public function displayAtask($name){


        $con=new Connection("localhost","root","","tasks");
        $con=$con->connect();
        $mTask=mysqli_query($con,"select * from task where name='$name'");
       return $mTask;
    
    }
}

class DeleteTask{

    public function deleteTask($idTask){

        $con=new Connection("localhost","root","","tasks");
        $con=$con->connect();
        mysqli_query($con,"delete from task where idTask=".$idTask);
    
    }
    
}

?>