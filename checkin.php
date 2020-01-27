<?php
session_start();
if(isset($_POST['id'])){
  $_SESSION['id']=$_POST['id'];
  $_SESSION['password']=$_POST['password'];
}
//below code is getting the content of password file and making it an array
$pswd_chk = file_get_contents("password.txt");
$pswd_chk_arr_1 = explode("\n",$pswd_chk);
$lines=count($pswd_chk_arr_1);
for($i=0;$i<$lines;$i++){
  $pswd_chk_arr_2[$i]=explode("|",$pswd_chk_arr_1[$i]);
}
print_r($pswd_chk_arr_2);

//below code is checking for mail validation and password setting plus checking
if(isset($_SESSION['id'])){
  for($i=0;$i<$lines;$i++){
    if($_SESSION['id']==$pswd_chk_arr_2[$i][0]){
      $password=$pswd_chk_arr_2[$i][1];
    }
    //else{$password="0";}
  }
  if($_SESSION['password'] == $password){
  header('Location: 2.php');
  }
  else{
    echo "<h1>Please enter correct details</h1>";
    include('login.php');
  }
}
//below code will run when details hasn't been added at all in the form
else{
  echo "<h1>Please enter correct details</h1>";
  include('login.php');
}
?>
