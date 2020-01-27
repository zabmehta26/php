<?php
// error_reporting(  E_WARNING);
  if(!isset($_SESSION['id']))
  {
    session_start();
  }
  //the below code checks whether the user has logged in or not
  if( !isset($_SESSION['id']))
  {
    header('location: checkin.php');
  }
?>
<?php
  //the below code supports query parameter
   if(isset($_GET['q'])){
    $page_number=$_GET['q'];
    header("location: $page_number.php");
  }
?>
     <!--code for building normal form-->
<html>
  <body>
     <!--below code is for the pagination-->
    <a href="1.php"><button style='margin-left:49%;padding-right:10px;'>1</button></a>
    <a href="2.php"><button style="background-color:blue">2</button></a>
    <form name="myform" action="phpupload5.php" method="post" enctype="multipart/form-data">
      First name:<input type="text" id="fname" name="fname" placeholder="Enter your first Name" required><h5 style="color:red">*Enter alphabetical charaters only</h5>
      Last name:<input type="text"  id="lname" name="lname" placeholder="Enter your last Name" required><h5 style="color:red">*Enter alphabetical charaters only</h5>
      Full name:<input type="text" id="fullname" name="fullname" disabled  required><br>
      Enter marks in each subject:<br>
      <textarea id="marks" name="marks" rows="8" cols="80" required></textarea><br>
      Enter your phone number:<input type="number" id="number" name="number" placeholder="10 digit number" required><br>
      Enter email id:<input type="text" id="email" name="email" placeholder="example@example.com" required>
      Select image to upload:<input type="file" name="img" id="fileToUpload"><br>
      <input type="submit" value="Submit" name="submit">
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
    //code for filling fullname field by its own
     $(document).ready(function(){
       $("#fname").keyup(function(){
         document.getElementById('fullname').value=$('#fname').val()+" "+$('#lname').val();
       })
       $("#lname").keyup(function(){
         document.getElementById('fullname').value=$('#fname').val()+" "+$('#lname').val();
       })
     })
    </script>
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
        <br>
        <br>
        <a href="logout.php" style="margin-left:50%;">
          <button onclick='logout()'; style="background-color:green;color:white;">Logout</button>
        </a>
  </body>
</html>
