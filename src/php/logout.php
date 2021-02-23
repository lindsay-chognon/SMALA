<?php
@ini_set("session.cookie_httponly", 1);
@ini_set("session.cookie_samesite", "Strict");
session_name("sess_SMALA_42");
session_start();
session_destroy();
unset($_SESSION['user_role']);
unset($_SESSION['user_id']);
unset($_SESSION['user_pseudo']);
unset($_SESSION['user_mail']);

if (!empty($_SESSION)) $_SESSION = [];
if (isset($_COOKIE[session_name()])) setcookie(session_name(), "", time()-1, "/");

header('location: ../../index.php');
?>