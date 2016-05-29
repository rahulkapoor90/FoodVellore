<?php
$_SESSION['on']=false;
session_start();
session_unset();
session_destroy();
header('Location: ./');
?>