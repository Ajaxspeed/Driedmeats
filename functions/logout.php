<?php

session_start();

session_destroy();

header('Location: ../fb_login.php');
?>
