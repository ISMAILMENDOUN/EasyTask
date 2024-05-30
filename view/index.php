
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

   <body background="images/taskGreen.png">
      <div class="container font-weight-bold text-center">

         <div class="login container-fluid">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6 col-lg-4 bg-success p-5 rounded">
                    <form action="../controller/userController.php" method="POST">
                        <h2 class="text-center mb-4">EASY TASK</h2>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input name="loginEmail" class="form-control rounded" type="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input name="loginPassword" class="form-control rounded" type="password">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-dark btn-block rounded" type="submit" value="Sign In">
                        </div>
                        <div class="text-center">
                            <a href="javascript:void(0);" onclick="showSignup()">Sign Up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="signup container-fluid d-none mb-5">
         <div class="row justify-content-center mt-5">
             <div class="col-md-6 col-lg-4 bg-success p-5 rounded">
                 <form action="../controller/userController.php" method="POST">
                     <h2 class="text-center mb-4">EASY TASK</h2>
                     <div class="form-group">
                         <label for="first_name">First Name:</label>
                         <input name="first_name" class="form-control rounded" type="text">
                     </div>
                     <div class="form-group">
                         <label for="last_name">Last Name:</label>
                         <input name="last_name" class="form-control rounded" type="text">
                     </div>
                     <div class="form-group">
                         <label for="email">E-mail:</label>
                         <input name="email" class="form-control rounded" type="email">
                     </div>
                     <div class="form-group">
                         <label for="password">Password:</label>
                         <input name="password" class="form-control rounded" type="password">
                     </div>
                     <div class="form-group">
                         <label for="confirm_password">Confirm Password:</label>
                         <input name="confirm_password" class="form-control rounded" type="password">
                     </div>
                     <div class="form-group">
                         <input class="btn btn-dark btn-block rounded" type="submit" value="Sign Up">
                     </div>
                     <div class="text-center">
                         <a href="index.php">Login</a>
                     </div>
                 </form>
             </div>
         </div>
     </div>
     
      </div>
<script type="text/javascript" src="script.js"></script>
   </body>

</hml>
<?php 
/**************************RETURN TO SIGNUP PAGE WHEN THERE IS ISSUE IN SIGNING UP*************************** */
if(isset($_GET['var'])&& $_GET['var']=="s"){
echo'<script>showSignup();</script>';

}

?>