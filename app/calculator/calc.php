<?php
include dirname(__FILE__).'/../security/auth_guard.php';

function validateValues(&$amount, &$percent, &$years, &$errors) {
  if(isset($amount) && isset($percent) && isset($years)){
    if($amount != '' && $percent != '' && $years != ''){
      $amount = intval($amount);
      $percentInt = intval($percent)/100;
      $years = intval($years);
      if($percentInt < 0){
        array_push($errors, 'Oprocentowanie nie może być ujemne');
      }
    }else{
      array_push($errors, 'Żadna z wartości nie może być pusta');
    }
  }else{
    return false;
  }

  return count($errors) === 0;
}

function calculate(&$amount, &$percentInt, &$years, &$result) {
  $monthsCount = $years * 12;
  $result = (($amount * $percentInt) + $amount)/$monthsCount;
  $resultRound = round($result, 2);
  $result = $resultRound === $result ? $result : $result." ≈ ".round($result, 2);
}

$amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
$percent = isset($_REQUEST['percent']) ? $_REQUEST['percent'] : null;
$percentInt = isset($_REQUEST['percent']) ? $_REQUEST['percent'] / 100 : null;
$years = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
$result;
$errors = [];

if(validateValues($amount, $percent, $years, $errors)){
  calculate($amount, $percentInt, $years, $result);
}

include 'calc_view.php';