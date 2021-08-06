<?php

if(isset($_POST["submit"])){

  $fName = $_POST["fname"];
  $lName = $_POST["lname"];
  $uName = $_POST["uname"];
  $email = $_POST["email"];
  $rEmail = $_POST["remail"];
  $pwd = $_POST["pwd"];
  $rPwd = $_POST["rpwd"];


  require_once 'dbh.inc.php';
  require_once 'function.inc.php';

  if(emptyInputSignup($fName, $lName,$email, $rEmail, $pwd, $rPwd, $uName) !== false){
    header("location: ../signup.php?error=emptyinput");
    exit();
  }
  if(invalidUID($uName) !== false){
    header("location: ../signup.php?error=invalidusername");
    exit();
  }
  if(invalidEmail($email) !== false){
    header("location: ../signup.php?error=invalidemail");
    exit();
  }
  if(emailMatch($email, $rEmail) !== false){
    header("location:../signup.php?error=emailsdontmatch");
    exit();
  }
  if(pwdMatch($pwd, $rPwd) !== false){
    header("location:../signup.php?error=passwordsdontmatch");
    exit();
  }
  if(uidExists($conn, $uName, $email) !== false){
    header("location: ../signup.php?error=userexists");
    exit();
  }

  createUser($conn, $fName, $lName, $uName, $email, $pwd);

}
else {
  header("location: ../signup.php");
  exit();
}
