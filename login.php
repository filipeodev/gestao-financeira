<?php 

use \Fili\Page;
use \Fili\Model\Login;
use \Fili\Model\Message;

$app->get('/', function() {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login", [
		'msE'=>Message::getME()
	]);

});

$app->post('/login', function() {

	if(!isset($_POST['email']) || $_POST['email'] == ''){

		Message::setME('Preencha o capo de Email ou Usuário.');
		header('Location: /');
		exit;

	}

	if(!isset($_POST['senha']) || $_POST['senha'] == ''){

		Message::setME('Preencha o campo de senha.');
		header('Location: /');
		exit;

	}

	Login::login($_POST['email'], $_POST['senha']);
	header("Location: /financas");
	exit;

});

$app->get('/cadastro', function() {

	// Login::verifyLogin(false);

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("cadastro", [
		'msE'=>Message::getME()
	]);

});

$app->post('/cadastro', function() {

	$usuario = new Login();

	if(!isset($_POST['email']) || $_POST['email'] == ''){

		Message::setME('Preencha o capo de Email ou Usuário.');
		header('Location: /');
		exit;

	}

	if(!isset($_POST['senha']) || $_POST['senha'] == ''){

		Message::setME('Preencha o campo de senha.');
		header('Location: /');
		exit;

	}

	$usuario->save();

	header("Location: /");
	exit;

});

?>