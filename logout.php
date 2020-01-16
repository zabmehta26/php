<?php
session_start();
session_destroy();
echo "Logging out from your account";
header('Location: login.php');
?>
