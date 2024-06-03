<?php 
/***********************************************************ERROR HANDLING********************************** */
error_reporting(0);
/**********************************************HANDLE LOGGING OUT********************************************/
if(isset($_POST['logout'])){
    session_start();
    session_destroy();
    header('Location:index.php');


    }
session_start();
if($_SESSION['role']=="admin"){

    header('Location:admin.php'); 
}
require_once '../controller/taskController.php';
require_once '../controller/user_taskController.php';
?>

<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://kit.fontawesome.com/f124013f63.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
            
    </head>

    <body class="bg-success">
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#"><i class="fa fa-user"></i> <?php echo $_SESSION['firstName'];?></a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                </ul>
                <form id="myFrm" class="form-inline my-2 my-lg-0 d-flex justify-content-center" action="user.php" method="GET">
                    <input name="searchBar" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>




        <div class="container">
            <section class="searshResults d-block">
                
            <?php 
            if(isset($_GET['searchBar'])){
                $search=$_GET['searchBar'];
                $srh=mysqli_fetch_array(displayMyTask($search));
            echo'<table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID_TASK</th>
                    <th scope="col">NAME</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">PRIORITY</th>
                    <th scope="col">START_DATE</th>
                    <th scope="col">END_DATE</th>
                    <th scope="col">STATUT</th>
                </tr>
            </thead>
            <tbody><th id="d0" scope="row">'.$srh[0].'</th>
            <td id="d1" name="d1">'.$srh[1].'</td>
            <td id="d2">'.$srh[2].'</td>
            <td id="d3">'.$srh[3].'</td>
            <td id="d4">'.$srh[4].'</td>
            <td id="d5">'.$srh[5].'</td>
            <td id="d6">'.$srh[6].'</td>
    </tbody>
</table>';}?>
           
            </section>
            <section id="myTasks" class="myTasks">
                <div class="d-flex justify-content-center mx-auto">
                    <form action="user.php" method="POST">
                        <div class="row">
                            <div class="col-12 col-md-3 mb-2">
                                <input name="displayMyTasks" class="btn btn-primary btn-block rounded" type="submit" value="DISPLAY_TASKS">
                            </div>
                            <div class="col-12 col-md-3 mb-2">
                                <input name="byPriority" class="btn btn-info btn-block rounded" type="submit" value="BY_PRIORITY">
                            </div>
                            <div class="col-12 col-md-3 mb-2">
                                <input name="byGroup" class="btn btn-warning btn-block rounded" type="submit" value="BY_GROUP">
                            </div>
                            <div class="col-12 col-md-3 mb-2">
                                <input name="logout" class="btn btn-danger btn-block rounded" type="submit" value="LOGOUT">
                            </div>
                        </div>
                    </form>
                </div>
                <h1 class="d-flex justify-content-center">My Tasks</h1>
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">ID_TASK</th>
                            <th scope="col">NAME</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col">PRIORITY</th>
                            <th scope="col">START_DATE</th>
                            <th scope="col">END_DATE</th>
                            <th scope="col">STATUT</th>
                            <th scope="col">Mark As Done</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php  
                       while($mt=mysqli_fetch_array($myTasks)){
                      echo' <tr>
                      <th id="d0" scope="row">'.$mt[0].'</th>
                      <td id="d1" name="d1">'.$mt[1].'</td>
                      <td id="d2">'.$mt[2].'</td>
                      <td id="d3">'.$mt[3].'</td>
                      <td id="d4">'.$mt[4].'</td>
                      <td id="d5">'.$mt[5].'</td>
                      <td id="d6">'.$mt[6].'</td>';
                      if($mt[6]=="Done"){
                        echo'<td class="px-5"id="d7"><i class="fa-solid fa-check"></i></td>
                        </tr>';
                      }
                      else{
                      echo'<td class="px-5"id="d7"><input class="markDone" type="checkbox" onclick="check(this)" value='.$mt[0].'></td>
                        </tr>';}}?>
                        
                    </tbody>
                </table>
            </section>


        </div>
        <form id="tD" action="user.php" method="POST">

            <input name="taskDone" id="taskDone" type="hidden">
        </form>
        <script type="text/javascript" src="script.js"></script>
    </body>

</hml>
