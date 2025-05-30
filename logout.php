<?php // This file logs out the user and redirects to the admin login page.
session_start();
session_unset();
session_destroy();
header("Location: admin_login.php");
exit;
