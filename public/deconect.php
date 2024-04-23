<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
session_destroy(); 
header("Location: http://www.cheikh.diop:8001/project/public/auth.php");
?>
