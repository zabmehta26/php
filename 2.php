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
   if(isset($_GET['q'])){
    $page_number=$_GET['q'];
    header("location: $page_number.php");
  }
?>
     <!--code for building normal form-->
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
  </body>
</html>
