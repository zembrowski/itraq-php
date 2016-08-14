<?php

// Place examples.php in the composer root directory or adjust the path to autoload.php
require_once 'vendor/autoload.php';

$email = 'name@domain.com';
$password = 'pa$$word';
$apiKey = '{apiKey given by iTraq}';

// Simple
/*
try {
  $itraq = new iTraq\User($apiKey);
  $token = $itraq->login($email, $password);
  $itraq = new iTraq\Devices($token);
  $devices = $itraq->devices();
  echo $devices;
} catch (Exception $e) {
  echo '[ERROR] ' . $e->getMessage();
}
*/

// Advanced
try {
    //TBD
} catch (Exception $e) {
    echo '[ERROR] ' . $e->getMessage();
}
