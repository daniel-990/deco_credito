<?php 

session_start();

session_unset();

session_destroy();

echo "sesion cerrada";

header('Location: '.URLR);

?>