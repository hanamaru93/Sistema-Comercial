<?php

ini_set('display_errors', 0 );
error_reporting(0);
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);    

echo "<script> window.alert('Obrigado Por Usar O E-Merc 1.0'); </script>";
echo "<script> window.location.href = '../login';</script>";





?>