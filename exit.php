<?php
setcookie('useremail', $email, time()-3600, "/");
 header('Location: /');
?>
