<?php 
session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Fili\Page;
use \Fili\Model\Login;

$app = new \Slim\Slim();

$app->config('debug', true);

require_once('functions.php');
require_once('login.php');
require_once('usuario.php');
require_once('financas.php');

$app->get('/home', function() {

	Login::verifyLogin(false);

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("home");

});

$app->get("/sair", function(){

	Login::logout();

	header("Location: /");
	exit;

});

$app->run();

 ?>