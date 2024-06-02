<h1 style="text-align:center">TEST</h1>
<?php 
echo $_POST['idTask'];
$string=$_POST['idUser'];
preg_match('!\d+!', $string,$idUser);
echo $idUser[0];


?>
