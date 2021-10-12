<?php
require_once dirname(__FILE__).'/../../config.php';

function signInUser(){
  session_start();
  $_SESSION['isLogged'] = true;
  header("Location: "._APP_URL);
}

function isDataCorrect(&$login, &$pass){
  if(isset($login) && isset($pass)){
    $errors = [];
    if($login === ''){
      array_push($errors, 'Login nie może być pustym stringiem');
    };
    if($pass === ''){
      array_push($errors, 'Hasło nie może być pustym stringiem');
    };
    if($login == 'user' && $pass == 'pass'){ // Tu powinno być połączenie z bazą
      signInUser();
    }else{
      array_push($errors, 'Niepoprawne dane logowania');
    }
    return $errors;
  }else{
    return null;
  }
}

$login = isset($_REQUEST['login']) ? $_REQUEST['login']: null;
$password = isset($_REQUEST['pass']) ? $_REQUEST['pass']: null;
if(isset($login) && isset($password)){
  $errors = isDataCorrect($login, $password);
}

include _ROOT_PATH.'/app/login/login_view.php';