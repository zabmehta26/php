<?php
//below code is only the logout page which includes the login below it
session_start();
session_destroy();
echo "Logging out from your account";
include('login.php');
?>
