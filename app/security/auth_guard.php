<?php
require_once dirname(__FILE__).'/../../config.php';
session_start();
$isLogged = isset($_SESSION['isLogged']) ? $_SESSION['isLogged'] : false;

if ( !$isLogged ){
	include _ROOT_PATH.'/app/login/login.php';
	exit();
}