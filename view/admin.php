
<?php 
include '../controller/taskController.php';
include '../controller/userController.php';
include '../controller/user_taskController.php';
?>
<hml>

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
        <nav class="mt-5 mb-5 d-flex justify-content-center">
            <h1>Administration</h1>
        </nav>
        
        <div class="container">
            
                <div class="d-flex justify-content-center mx-auto">
                    <form action="admin.php" method="POST">
                        <div class="row">
                            <div class="col-12 col-md-3 mb-2">
                                <input name="displayUsers" class="btn btn-warning btn-block" type="submit" value="DISPLAY_USERS">
                            </div>
                            <div class="col-12 col-md-3 mb-2">
                                <input name="displayTasks" class="btn btn-info btn-block" type="submit" value="DISPLAY_TASKS">
                            </div>
                            <div class="col-12 col-md-3 mb-2">
                                <input name="addTask" class="btn btn-dark btn-block" type="submit" value="ADD_TASK">
                            </div>
                            <div class="col-12 col-md-3 mb-2">
                                <input name="logout" class="btn btn-danger btn-block" type="submit" value="LOGOUT">
                            </div>
                        </div>
                    </form>
                </div>

<?php 
if(isset($_POST['addTask'])){
    
    echo "<form class='mx-auto mt-5 bg-dark w-50 py-5 rounded' name='f2' method='POST' action='admin.php' align='center' >
    <input class='rounded ' type='text' placeholder='Task_Name' name='name'>
    <br>
Category:<br><select name='category'>
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>  
</select><br><br>
    <input class='rounded' type='text' placeholder='Priority' name='priority'><br>
    Starts:<br><input class='rounded' type='date' name='startDate'>
<br>
Ends :<br><input class='rounded' type='date' name='endDate'><br>
Statut:<br><select name='statut'>
<option>Done</option>
<option>Undone</option>   
</select>


<br><br>
    <input class='rounded btn-success' type='submit' name='addTask' value='Add_TASK' ></form>";
    $justDisplay="";}
    if(isset($_POST['displayTasks'])){echo'<section class="allTasks">
                <h1 class="d-flex justify-content-center">All Tasks</h1>
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
                            <th scope="col">EDIT</th>
                            <th scope="col">DELETE</th>
                            <th scope="col">ASSIGN_TO:</th>
                        </tr>
                    </thead>
                    <tbody>';
                    
                    while($row=mysqli_fetch_array($result)){
                        echo'<form id="myForm" action="admin.php" method="POST"><tr>
                            <th id="d0" scope="row">'.$row[0].'</th>
                            <td id="d1" name="d1">'.$row[1].'</td>
                            <td id="d2">'.$row[2].'</td>
                            <td id="d3">'.$row[3].'</td>
                            <td id="d4">'.$row[4].'</td>
                            <td id="d5">'.$row[5].'</td>
                            <td id="d6">'.$row[6].'</td>
                            <td><a id="d7" class="text-success" href="#" onclick="editContent(this)"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a class="text-danger"href="admin.php?delete='.$row[0].'"><i class="fa fa-trash"></i></a></td>
                            <td>';
                            $uT=getAssignment($row[0]);
                            if(isset($uT)){
                                echo $uT[1].'(ID:'.$uT[0].')';
                            }
                            else{
                            echo'<select name="idUserA"class="bg-dark text-light rounded">';
                            mysqli_data_seek($user, 0);
                            echo'<option selected>No One</option>';
                            while($row1=mysqli_fetch_array($user)){
                            echo'<option>'.$row1[1].'(ID:'.$row1[0].')</option> ';
                            }
                                echo'</select>&nbsp<input class="bg-dark text-light border-light hover-success rounded "
                                 type="submit" value="assign"><input name="idTaskA" type="hidden" value="'.$row[0].'">';}
                                 echo'</form>';
                        
                                echo'</td>
                        </tr>';
                    $uT=null;
                    
                    
                    }
                        echo'
                    </tbody>
                </table>
            </section>';}
            if(isset($_POST['displayUsers'])){echo'<section class="allTasks">
                <h1 class="d-flex justify-content-center">All Tasks</h1>
                <table class="table table-dark">
                    <thead>
                       <tr>
                            <th scope="col">ID_USER</th>
                            <th scope="col">FIRST_NAME</th>
                            <th scope="col">LAST_NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">PASSWORD</th>
                        </tr>
                    </thead>
                    <tbody>';
                    while($row=mysqli_fetch_array($user)){
                        echo'<tr>
                            <th scope="row">'.$row[0].'</th>
                            <td>'.$row[1].'</td>
                            <td>'.$row[2].'</td>
                            <td>'.$row[3].'</td>
                            <td>'.$row[4].'</td>
                        </tr>';}
                        echo'
                    </tbody>
                </table>
            </section>';}
            if(isset($_POST['logout'])){
            session_start();
            session_destroy();
            header('Location:index.php');


            }
    
?>

              ;
        </div>

        <form id="formToSubmit"action="admin.php" method="POST">

        <input id="updateD0" name="updateD0" type="hidden">
        <input id="updateD1" name="updateD1" type="hidden">
        <input id="updateD2" name="updateD2" type="hidden">
        <input id="updateD3" name="updateD3" type="hidden">
        <input id="updateD4" name="updateD4" type="hidden">
        <input id="updateD5" name="updateD5" type="hidden">
        <input id="updateD6" name="updateD6" type="hidden">
        <input id="updateD7" name="updateD7" type="hidden">
        
        </form>
        <script type="text/javascript" src="script.js"></script>
    </body>

</hml>
