<?php

require_once dirname(__FILE__).'/../config.php';

$amount = $_REQUEST['amount'];
$percent = $_REQUEST['percent'];
$years = $_REQUEST['years'];
$result;

$errors = [];

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
  array_push($errors, 'Wszystkie wartości muszą być podane');
}

if(empty($errors)){
  $monthsCount = $years * 12;
  $result = (($amount * $percentInt) + $amount)/$monthsCount;
  $resultRound = round($result, 2);
  $result = $resultRound === $result ? $result : $result." ≈ ".round($result, 2);
}

include 'calc_view.php';