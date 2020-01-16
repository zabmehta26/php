<!DOCTYPE html>
<html>
  <head>
    <title></title>
  </head>
  <body>
     <!--code for building normal form-->
    <form action="phpupload5.php" method="post" enctype="multipart/form-data">
      First name:<input type="text" id="fname" name="fname" placeholder="Enter your first Name" ><br>
      Last name:<input type="text"  id="lname" name="lname" placeholder="Enter your last Name" ><br>
      Full name:<input type="text" id="fullname" name="fullname" disabled  ><br>
      Enter marks in each subject:<br>
      <textarea id="marks" name="marks" rows="8" cols="80"></textarea><br>
      Enter your phone number:<input type="number" id="number" name="number" placeholder="10 digit number"><br>
      Enter email id:<input type="text" id="email" name="email" placeholder="example@example.com">
      Select image to upload:<input type="file" name="img" id="fileToUpload"><br>
      <input type="submit" value="Submit" name="submit">
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
    //code for filling fullname field by its own
     $(document).ready(function(){
      $("#fname").keypress(function(){
       document.getElementById('lname').value="";
       document.getElementById('fullname').value=$('#fname').val()+" "+$('#lname').val();
      })
      $("#lname").keypress(function(){
       document.getElementById('fullname').value=$('#fname').val()+" "+$('#lname').val();
      })
     })
    </script>
  </body>
</html>
