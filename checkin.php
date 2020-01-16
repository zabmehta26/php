<?php
session_start();
if(isset($_POST['id'])){
  $_SESSION['id']=$_POST['id'];
  $_SESSION['password']=$_POST['password'];
}
$myfile = file_get_contents("password.txt");
$myfile2 = explode("\n",$myfile);
$lines=count($myfile2);
for($i=0;$i<$lines;$i++){
  $myfile3[$i]=explode("|",$myfile2[$i]);
}
if(isset($_SESSION['id'])){
  for($i=0;$i<$lines;$i++){
    if($_SESSION['id']==$myfile3[$i][0]){
      $password=$myfile3[$i][1];
    }
  }
  if($_SESSION['password'] == $password){
  header('Location: phpassignment5.php');
  }
  else{
    echo "<h1>Please enter correct details</h1>";
    include('login.php');
  }
}
else{
  echo "<h1>Please enter correct details</h1>";
  include('login.php');
}
?>
