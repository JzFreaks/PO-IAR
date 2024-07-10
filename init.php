<?php
require 'vendor/autoload.php';
 
// Using Medoo namespace.
use Medoo\Medoo;
 
$database = new Medoo([
	// [required]
	'type' => 'mysql',
	'host' => 'localhost',
	'database' => 'login',
	'username' => 'root',
	'password' => '',
]);

$data = $database -> select("users","*");


?>