<?php 

use \Fili\Page;
use \Fili\Model\Login;
use \Fili\Model\Message;
use \Fili\Model\User;

$app->get('/usuario', function() {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$usuario = User::retornaUsuarioDaSessao();
	// var_dump(Message::getME());exit();

	$page->setTpl("user", [
		'usuario'=>$usuario,
		'msE'=>Message::getME(),
		'msS'=>Message::getMS()
	]);

});

$app->post('/alterar-usuario', function(){

	// print_r($_FILES['foto']['name']);exit();

	$foto = $_FILES['foto']['name'];
	$caminhoAtual = $_FILES['foto']['tmp_name'];
	$caminhoNovo = 'res/img-users/'.$foto;

	$alterar = User::alterarUsuario($_POST['email'], $_POST['senha'], $foto, $caminhoAtual, $caminhoNovo);

});

?>