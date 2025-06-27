<?php
setcookie('User', '', time() - 3600, '/');
header('Location: /login.php');
exit();
?>