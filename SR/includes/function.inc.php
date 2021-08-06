<?php

function emptyInputSignup($fName, $lName,$email, $rEmail, $pwd, $rPwd, $uName){
  $results;
  if(empty($fName) || empty($lName) || empty($email) || empty($rEmail) || empty($pwd) || empty($rPwd) || empty($uName)){
    $results = true;
  }
  else {
    $results = false;
  }
  return $results;
}

function invalidUID($uName){
  $results;
  if(!preg_match("/^[a-zA-Z0-9]*$/", $uName)){
    $results = true;
  }
  else {
    $results = false;
  }
  return $results;
}

function invalidEmail($email){
  $results;
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $results = true;
  }
  else {
    $results = false;
  }
  return $results;
}

function emailMatch($email, $rEmail){
  $results;
  if($email !== $rEmail){
    $results = true;
  }
  else {
    $results = false;
  }
  return $results;
}

function pwdMatch($pwd, $rPwd){
  $results;
  if($pwd !== $rPwd){
    $results = true;
  }
  else {
    $results = false;
  }
  return $results;
}

function uidExists($conn, $uName, $email){
  $sql = "SELECT * FROM user WHERE uUname = ? OR uEmail = ?;";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $uName, $email);
  mysqli_stmt_execute($stmt);

  $resultsData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultsData)) {
    return $row;
  }
  else{
    $results = false;
    return $results;
  }

  mysqli_stmt_close($stmt);
}

function createUser($conn, $fName, $lName, $uName, $email, $pwd){
  $sql = "INSERT INTO user (uFName, uLName, uUname, uEmail, uPwd) VALUES (?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "sssss", $fName, $lName, $uName, $email, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../signup.php?error=none");
  exit();

}

function emptyInputLogin($uName, $pwd){
  $results;
  if(empty($uName) || empty($pwd)){
    $results = true;
  }
  else {
    $results = false;
  }
  return $results;
}

function loginUser($conn, $uName, $pwd){
    $uidExists = uidExists($conn, $uName, $uName);

    if ($uidExists === false) {
      header("location: ../login.php?error=wronglogin");
      exit();
    }

    $pwdHashed = $uidExists["uPwd"];

    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
      header("location: ../login.php?error=wronglogin");
      exit();
    }
    elseif ($checkPwd === true) {
      session_start();
      $_SESSION["userID"] = $uidExists["uID"];
      $_SESSION["usersUname"] = $uidExists["uUname"];
      header("location: ../home.php?success");
      exit();
    }
  }
