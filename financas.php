<?php 

use \Fili\Page;
use \Fili\Model\Login;
use \Fili\Model\Message;
use \Fili\Model\User;
use \Fili\Model\Financas;

$app->get('/financas', function() {

	Login::verifyLogin(false);

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$usuario = User::retornaUsuarioDaSessao();

	$todasCategorias = Financas::retornaTodasCategorias();
	// $gastos = Financas::listaAllProdServId();

	// var_dump($todasCategorias);exit();

	$page->setTpl("financas", [
		'msE'=>Message::getME(),
		'msS'=>Message::getMS(),
		'todasCategorias'=>$todasCategorias
	]);

});

$app->get('/criar-categoria', function() {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$usuario = User::retornaUsuarioDaSessao();

	$page->setTpl("criar-categoria", [
		'msE'=>Message::getME()
	]);

});

$app->post('/criar-categoria', function() {

	if(!isset($_POST['nome_cat']) || $_POST['nome_cat'] == ''){
		Message::setME('Insira o nome da categoria.');
		header('Location: /criar-categoria');
		exit();
	}

	$criarCategoria = Financas::criarCategoria();

});

$app->get('/categoria/:id_categoria', function($id_categoria) {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$todosOsMeses = Financas::retornaTodosOsMeses($id_categoria);

	$page->setTpl("categoria", [
		'msS'=>Message::getMS(),
		'id_categoria'=>$id_categoria,
		'todosOsMeses'=>$todosOsMeses
	]);

});

$app->get('/alterar-categoria/:id_categoria', function($id_categoria) {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$retornaCategoria = Financas::retornaCategoria($id_categoria);

	// var_dump($retornaCategoria);exit();

	$page->setTpl("alterar-categoria", [
		'msE'=>Message::getME(),
		'id_categoria'=>$id_categoria,
		'retornaCategoria'=>$retornaCategoria[0]
	]);

});

$app->post('/alterar-categoria/:id_categoria', function($id_categoria) {

	if(!isset($_POST['nome_cat']) || $_POST['nome_cat'] == ''){
		Message::setME('Insira o nome da categoria.');
		header('Location: /alterar-categoria/:id_categoria');
		exit();
	}

	$alterarCategoria = Financas::alterarCategoria($id_categoria);

});

$app->get('/deletar-categoria/:id_categoria/:id_conta', function($id_categoria, $id_conta) {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$deletarCategoriaReceitaDespesa = Financas::deletarCategoriaReceitaDespesa($id_categoria, $id_conta);


});


$app->get('/deletar-financa/:id_categoria', function($id_categoria) {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$deletarFinancaCategoriaReceitaDespesa = Financas::deletarFinancaCategoriaReceitaDespesa($id_categoria);


});

$app->get('/detalhes/:id_conta/:id_categoria', function($id_conta, $id_categoria) {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$retornaDespesaUser = Financas::retornaDespesaUser($id_conta);

	$retornaReceiraUser = Financas::retornaReceiraUser($id_conta);

	$detalheTemReceira = Financas::detalheTemReceira($id_conta);

	if(isset(Financas::retornaReceiraUser($id_conta)[0]["id_receita"])){
		$idReceita = Financas::retornaReceiraUser($id_conta)[0]["id_receita"];
	}else{
		$idReceita = 0;
	}

	// não precisa

	$todosProdServCategoria = Financas::todosProdServCategoriaDespesa($id_categoria, $id_conta);

	// var_dump($todosProdServCategoria);exit();


	// if(isset($todosProdServCategoria[0]["despesa"])){
	// 	$despesa = $todosProdServCategoria[0]["despesa"];
	// }else{
	// 	$despesa = 0;
	// }

	// if(isset($todosProdServCategoria[0]["saldo"])){
	// 	$saldoTotal = $todosProdServCategoria[0]["saldo"];
	// }else{
	// 	$saldoTotal = 0;
	// }

	// não precisa

	$page->setTpl("detalhes", [
		'msS'=>Message::getMS(),
		'msE'=>Message::getME(),
		'id_conta'=>$id_conta,
		'retornaDespesaUser'=>$retornaDespesaUser,
		'retornaReceiraUser'=>$retornaReceiraUser,
		'detalheTemReceira'=>$detalheTemReceira,
		'idReceita'=>$idReceita,
		'id_categoria'=>$id_categoria,
		'todosProdServCategoria'=>$todosProdServCategoria
	]);

});

$app->get('/receita/:id_conta', function($id_conta) {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("receita", [
		'msE'=>Message::getME(),
		'id_conta'=>$id_conta
	]);

});

$app->get('/alterar-receita/:id_conta/:id_receita/:id_categoria', function($id_conta, $id_receita, $id_categoria) {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$retornaReceita = Financas::retornaReceita($id_conta, $id_receita);

	// var_dump($retornaReceita);exit();

	$page->setTpl("alterar-receita", [
		'msE'=>Message::getME(),
		'id_conta'=>$id_conta,
		'id_receita'=>$id_receita,
		'retornaReceita'=>$retornaReceita[0],
		'id_categoria'=>$id_categoria
	]);

});

$app->post('/alterar-receita/:id_conta/:id_receita/:id_categoria', function($id_conta, $id_receita, $id_categoria){

	// var_dump($_POST['primeira_parc']);exit();

	$primeira_parc = (isset($_POST['primeira_parc']) || $_POST['primeira_parc'] == '') ? 0 : $_POST['primeira_parc'];
	$segunda_parc = (isset($_POST['segunda_parc']) || $_POST['segunda_parc'] == '') ? 0 : $_POST['segunda_parc'];
	$alimentacao = (isset($_POST['alimentacao']) || $_POST['alimentacao'] == '') ? 0 : $_POST['alimentacao'];
	$bonus = (isset($_POST['bonus']) || $_POST['bonus'] == '') ? 0 : $_POST['bonus'];

	$adicionarReceita = Financas::alterarReceita($primeira_parc, $segunda_parc, $alimentacao, $bonus, $id_conta, $id_receita, $id_categoria);

});

$app->post('/receita/:id_conta' , function($id_conta){

	// var_dump($_POST['primeira_parc']);exit();

	$primeira_parc = (isset($_POST['primeira_parc']) || $_POST['primeira_parc'] == '') ? 0 : $_POST['primeira_parc'];
	$segunda_parc = (isset($_POST['segunda_parc']) || $_POST['segunda_parc'] == '') ? 0 : $_POST['segunda_parc'];
	$alimentacao = (isset($_POST['alimentacao']) || $_POST['alimentacao'] == '') ? 0 : $_POST['alimentacao'];
	$bonus = (isset($_POST['bonus']) || $_POST['bonus'] == '') ? 0 : $_POST['bonus'];

	$adicionarReceita = Financas::adicionarReceita($primeira_parc, $segunda_parc, $alimentacao, $bonus, $id_conta);

});

$app->get('/despesa/:id_conta/:id_categoria' , function($id_conta, $id_categoria){

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("despesa", [
		'msE'=>Message::getME(),
		'id_conta'=>$id_conta,
		'id_categoria'=>$id_categoria
	]);

});

$app->post('/despesa/:id_conta/:id_categoria' , function($id_conta, $id_categoria){

	if(!isset($_POST['despesa']) || $_POST['despesa'] == ''){
		Message::setME('Insira o produto/serviço.');
		header('Location: /novo-produto');
		exit();
	}

	if(!isset($_POST['valor']) || $_POST['valor'] == ''){
		Message::setME('Insira o valor.');
		header('Location: /novo-produto');
		exit();
	}

	if(!isset($_POST['data_compra']) || $_POST['data_compra'] == ''){
		Message::setME('Insira a data.');
		header('Location: /novo-produto');
		exit();
	}

	$despesa = Financas::salvarDespesa($id_conta, $id_categoria);

});

$app->get('/alterar-despesa/:id_conta/:id_despesa/:id_categoria', function($id_conta, $id_despesa, $id_categoria) {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$retornaDespesa = Financas::retornaDespesa($id_conta, $id_despesa);

	$page->setTpl("alterar-despesa", [
		'msE'=>Message::getME(),
		'id_conta'=>$id_conta,
		'id_despesa'=>$id_despesa,
		'retornaDespesa'=>$retornaDespesa[0],
		'id_categoria'=>$id_categoria
	]);

});

$app->post('/alterar-despesa/:id_conta/:id_despesa/:id_categoria', function($id_conta, $id_despesa, $id_categoria) {

	if(!isset($_POST['despesa']) || $_POST['despesa'] == ''){
		Message::setME('Insira o produto/serviço.');
		header('Location: /novo-produto');
		exit();
	}

	if(!isset($_POST['valor']) || $_POST['valor'] == ''){
		Message::setME('Insira o valor.');
		header('Location: /novo-produto');
		exit();
	}

	if(!isset($_POST['data_compra']) || $_POST['data_compra'] == ''){
		Message::setME('Insira a data.');
		header('Location: /novo-produto');
		exit();
	}

	$despesa = Financas::alterarDespesa($id_conta, $id_despesa, $id_categoria);

});

$app->get('/deletar-despesa/:id_conta/:id_despesa/:id_categoria', function($id_conta, $id_despesa, $id_categoria) {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$deletarDespesa = Financas::deletarDespesa($id_conta, $id_despesa, $id_categoria);

	$page->setTpl("detalhe", [
		'msE'=>Message::getME()
	]);

});

























$app->get('/novo-mes/:id_categoria', function($id_categoria) {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$usuario = User::retornaUsuarioDaSessao();

	$page->setTpl("novo-mes", [
		'msE'=>Message::getME(),
		'id_categoria'=>$id_categoria
	]);

});

$app->post('/novo-mes/:id_categoria', function($id_categoria) {

	if(!isset($_POST['mes']) || $_POST['mes'] == 'Selecione'){
		Message::setME('Insira o mês de referência.');
		header('Location: /novo-mes/'.$id_categoria);
		exit();
	}

	if(!isset($_POST['ano_orc']) || $_POST['ano_orc'] == 'Selecione'){
		Message::setME('Insira o ano de referência.');
		header('Location: /novo-mes/'.$id_categoria);
		exit();
	}

	$fi = Financas::criarNovoMes($id_categoria);

});

$app->get('/editar-novo-mes/:id_mes', function($id_mes) {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$mes_id = Financas::retornaMesId($id_mes);

	$page->setTpl("editar-novo-mes", [
		'msE'=>Message::getME(),
		'id_capital'=>$mes_id[0]['id_capital'],
		'alimentacao'=>$mes_id[0]['alimentacao'],
		'primeira_parc'=>$mes_id[0]['primeira_parc'],
		'bonus'=>$mes_id[0]['bonus'],
		'segunda_parc'=>$mes_id[0]['segunda_parc'],
	]);

});

$app->post('/editar-novo-mes/:id_capital', function($id_capital) {

	Financas::editarNovoMes($id_capital);

});

$app->get('/saiba-mais/:id_mes', function($id_mes) {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$mes = new Financas();

	$valores_mes = $mes->retornaMesId($id_mes);
	$id_mes = $mes->retornaMesId($id_mes);

	$listagemProdutos = Financas::listaAllProdServId($id_mes[0]['id_mes']);

	$page->setTpl("saiba-mais", [
		'msS'=>Message::getMS(),
		'mes'=>$valores_mes[0],
		'id'=>$id_mes[0]['id_mes'],
		'produtos'=>$listagemProdutos
	]);

});

$app->get('/novo-produto/:id_mes', function($id_mes) {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$usuario = User::retornaUsuarioDaSessao();

	$page->setTpl("novo-produto", [
		'msE'=>Message::getME(),
		'id_mes'=>$id_mes
	]);

});

$app->post('/novo-produto/:id_mes', function($id_mes) {

	if(!isset($_POST['produto']) || $_POST['produto'] == ''){
		Message::setME('Insira o produto.');
		header('Location: /novo-produto');
		exit();
	}

	if(!isset($_POST['valor']) || $_POST['valor'] == ''){
		Message::setME('Insira o valor.');
		header('Location: /novo-produto');
		exit();
	}

	if(!isset($_POST['data_compra']) || $_POST['data_compra'] == ''){
		Message::setME('Insira a data.');
		header('Location: /novo-produto');
		exit();
	}


	$produto_servicos = Financas::salvarProdutoServico($id_mes);

});

?>