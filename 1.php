<?php
  session_start();
  //the below code checks whether the user has logged in or not
  if( !isset($_SESSION['id']))
  {
    header('location: checkin.php');
  }
?>
<?php
  //the below code supports query parameter
  //
   if(isset($_GET['q'])){
    $page_number=$_GET['q'];
    header("location: $page_number.php");
  }
?>
<!--the below code is for a simple form to display-->
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <h1>Hello to page 1</h1>
  </body>
</html>
