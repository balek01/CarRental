<?php 
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}


if (isset($_SESSION["iduser"])) {
   session_unset();
   session_destroy();
   header("Location: /", true, 301);
  exit;
}


if (isset($_SESSION["idadmin"])) {
  session_unset();
  session_destroy();
  header("Location: /admin", true, 301);
 exit;
}

