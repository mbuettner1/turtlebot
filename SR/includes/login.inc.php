<?php

if (isset($_POST["submit"])) {

  $uName = $_POST["name"];
  $pwd = $_POST["pwd"];

  require_once 'dbh.inc.php';
  require_once 'function.inc.php';

  if(emptyInputLogin($uName, $pwd) !== false){
    header("location: ../login.php?error=emptyinput");
    exit();
  }

  loginUser($conn, $uName, $pwd);
}
else {
  header("location: ../login.php?error=hitsubmit");
  exit();
}
