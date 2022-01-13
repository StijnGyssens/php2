<?php
session_start();

require_once "connection_data.php";
require_once "pdo.php";
require_once "html_functions.php";
require_once "form_elements.php";
require_once "sanitize.php";
require_once "validate.php";
require_once "security.php";

$errors = [];

if (!array_key_exists('msgs',$_SESSION)){
    $_SESSION['msgs'] =false;
}


if ( key_exists( 'errors', $_SESSION ) AND is_array( $_SESSION['errors']) )
{
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
}