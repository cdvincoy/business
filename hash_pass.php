<?php // This file hashes the password of the admin.
$password = "password123";
$hashed = password_hash($password, PASSWORD_DEFAULT);
echo $hashed;
?>
