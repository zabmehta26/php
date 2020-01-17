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
<?php
$flag=0; //this variable is made to support the code of file create
$fname=$_POST['fname'];
//the below code is to validate the firstname which user enters
if(!preg_match('/^[a-zA-Z]*$/',$fname)){
  $err = "Use only alphabetical characters in firstname" ;
  echo $err;
  return;
}
$lname=$_POST['lname'];
//the below code is to validate the lastname which user enters
if(!preg_match('/^[a-zA-Z]*$/',$lname)){
  $err = "Use only alphabetical characters in lastname" ;
  echo $err;
  return;
}
$number=$_POST['number'];
//the below code is to validate the number which user enters
if(!preg_match('/^[0-9]{10}$/',$number)){
  $err = "Enter a valid number" ;
  echo $err;
  return;
}
$email =$_POST['email'];
//the below code is to validate the email user enters without using type="email"
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $err = "Invalid email format";
  echo $err;
  return;
}
$marks=$_POST['marks'];
//the below code is to extract the subject and marks from the textarea field for table creation
$marks2=explode("\n",$marks);
$lines=count($marks2);
for($i=0;$i<$lines;$i++){
  $marks3[$i]=explode("|",$marks2[$i]);
}
//the below code is to validate if the user has entered the textarea field correctly or not
for($i=0;$i<$lines;$i++){
 if(!preg_match('/^[a-zA-Z]*[|][0-9]{2,3}$/',$marks2[$i])){
  $err = "Marks should be in the form: subject_name|makrs" ;
  echo $err;
  return;
 }
 //the below code will be processed only if everything is validated correctly
 else {
  echo "Hello $fname $lname";
  $iname=$_FILES['img']['name'];
  $tname=$_FILES['img']['tmp_name'];
  echo "<br>";
  echo "Your phone no. is:+91$number";
  echo "<br>";
  echo "<table>";
  echo "<th>Subject</th>";
  echo "<th>Marks</th>";
  //the below code is used to create table for subject and marks description
  for($i=0;$i<$lines;$i++){
    echo "<tr>";
    echo "<td>".$marks3[$i][0]."</td>";
    echo "<td>".$marks3[$i][1]."</td>";
    echo "</tr>";
  }
  echo "</table>";
  move_uploaded_file($tname,'pic/'.$iname);
  echo "<br><br><img src=pic/$iname height=200 width=200>";
  $flag=1;
  break;
 }
}
//the below code will create a file containing all the details which the user just entered
if($flag==1){
  $myfile = fopen("newfile.txt", "w");
  $name = "Name:$fname $lname \n";
  fwrite($myfile, $name);
  $id = "Email:$email \n";
  fwrite($myfile, $id);
  $contact = "Number:$number\n";
  fwrite($myfile, $contact);
  fwrite($myfile, "Subject name with marks:\n");
  for($i=0;$i<$lines;$i++){
    $row1 = $marks3[$i][0];
    $row2 = $marks3[$i][1];
    $row = "$row1==>$row2";
    fwrite($myfile, $row);
  }
  $url = 'https://zubin26.000webhostapp.com/newfile.txt';
  $file_name = basename($url);
  if(file_put_contents( $file_name,file_get_contents($url))) {
    echo "<br><h3>File downloaded successfully<h3>";
  }
  fclose($myfile);
}
?>
<br>
<br>
<a href="logout.php" style="margin-left:50%;">
  <button onclick='logout()'; style="background-color:green;color:white;">Logout</button>
</a>
