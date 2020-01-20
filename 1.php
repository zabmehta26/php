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
     <!--below code is for the pagination-->
      <a href="1.php"><button style="background-color:blue;margin-left:49%;padding-right:10px;">1</button></a>
      <a href="2.php"><button>2</button></a>
    <h1>Hello to page 1</h1>

    <!--below code is for auto logout for specific time inactivity-->
    <script type="text/javascript">
             var IDLE_TIMEOUT = 10; //seconds
                var _idleSecondsCounter = 0;
                document.onclick = function() {
                _idleSecondsCounter = 0;
                };
                document.onmousemove = function() {
                _idleSecondsCounter = 0;
                };
                document.onkeypress = function() {
                _idleSecondsCounter = 0;
                };
                window.setInterval(CheckIdleTime, 1000);

                function CheckIdleTime() {
                _idleSecondsCounter++;
                if (_idleSecondsCounter >= IDLE_TIMEOUT) {
                document.location.href = "logout.php";
                }
                }
        </script>
  </body>
</html>
