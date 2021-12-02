<?php 

namespace Fili\Model;

use \Fili\DB\Sql;
use \Fili\Model;
use \Fili\Mailer;
use \Fili\Model\User;
use \Fili\Model\Login;
use \Fili\Model\Message;

class Financas extends Model{

	public static function criarCategoria(){

		$sql = new Sql();

		// if(Financas::verificaSeTemCategoria($_POST['nome_cat']) === true){

			$results = $sql->select('CALL sp_salvar_categoria(:nome_cat, :id_usuario)', [
				':nome_cat'=>$_POST['nome_cat'],
				':id_usuario'=>Login::getSessionUserId()
			]);

			if(count($results) === 0){
				Message::setME('Erro ao cadastrar categoria.');
				header('Location: /criar-categoria');
				exit();
			}else{
				Message::setMS('Categoria cadastrada com sucesso.');
				header('Location: /financas');
				exit();
			}

		// }else{
		// 	Message::setME('Categoria já cadastrada.');
		// 	header('Location: /criar-categoria');
		// 	exit();
		// }

	}

	public static function verificaSeTemCategoria($categoria){

		$sql = new Sql();

		$results = $sql->select('SELECT * FROM categoria WHERE nome_cat = :categoria AND id_usuario = :id_usuario', [
			':categoria'=>$categoria,
			':id_usuario'=>Login::getSessionUserId()
		]);

		if(empty($results)){
			return true;
		}else{
			return false;
		}
	}

	public static function retornaTodasCategorias(){

		$sql = new Sql();

		$resuls = $sql->select('SELECT * FROM categoria WHERE id_usuario = :id_usuario', [
			':id_usuario'=>Login::getSessionUserId()
		]);

		return $resuls;
	}

	public function pesquisaMes($mes, $ano){

		$sql = new Sql();

		$resuls = $sql->select('SELECT * FROM conta WHERE mes_orc = :mes AND ano_orc = :ano', [
			':mes'=>$mes,
			':ano'=>$ano
		]);

		if(empty($resuls)){
			return false;
		}else{
			return true;
		}
	}

	public static function criarNovoMes($id_categoria){

		$f = new Financas();

		// $pesquisaMes = $f->pesquisaMes($_POST['mes'], $_POST['ano_orc']);

		// if($pesquisaMes ==  true){
		// 	Message::setME('Mês já adicionado.');
		// 	header('Location: /novo-mes/$id_categoria');
		// 	exit();
		// }

		// $alimentacao = str_replace(',', '.', $_POST['alimentacao']);
		// $alimentacao = str_replace('R$', '', $alimentacao);
		// $alimentacao = utf8_decode($alimentacao);
	 //    $alimentacao = str_replace("&nbsp;", " ", $alimentacao);
	 //    $alimentacao = preg_replace('/\s+/', ' ',$alimentacao);
		// $alimentacao = utf8_decode($alimentacao);
	 //    $alimentacao = str_replace("&nbsp;", " ", $alimentacao);
	 //    $alimentacao = preg_replace('/\s+/', ' ',$alimentacao);
	 //    $alimentacao = trim($alimentacao);

		// $primeira_parc = str_replace(',', '.', $_POST['primeira_parc']);
		// $primeira_parc = str_replace('R$', '', $primeira_parc);
		// $primeira_parc = utf8_decode($primeira_parc);
	 //    $primeira_parc = str_replace("&nbsp;", " ", $primeira_parc);
	 //    $primeira_parc = preg_replace('/\s+/', ' ',$primeira_parc);
	 //    $primeira_parc = trim($primeira_parc);
		// $primeira_parc = utf8_decode($primeira_parc);
	 //    $primeira_parc = str_replace("&nbsp;", " ", $primeira_parc);
	 //    $primeira_parc = preg_replace('/\s+/', ' ',$primeira_parc);
	 //    $primeira_parc = trim($primeira_parc);

		// $bonus = str_replace(',', '.', $_POST['bonus']);
		// $bonus = str_replace('R$', '', $bonus);
		// $bonus = utf8_decode($bonus);
	 //    $bonus = str_replace("&nbsp;", " ", $bonus);
	 //    $bonus = preg_replace('/\s+/', ' ',$bonus);
	 //    $bonus = trim($bonus);
		// $bonus = utf8_decode($bonus);
	 //    $bonus = str_replace("&nbsp;", " ", $bonus);
	 //    $bonus = preg_replace('/\s+/', ' ',$bonus);
	 //    $bonus = trim($bonus);

		// $segunda_parc = str_replace(',', '.', $_POST['segunda_parc']);
		// $segunda_parc = str_replace('R$', '', $segunda_parc);
		// $segunda_parc = utf8_decode($segunda_parc);
	 //    $segunda_parc = str_replace("&nbsp;", " ", $segunda_parc);
	 //    $segunda_parc = preg_replace('/\s+/', ' ',$segunda_parc);
	 //    $segunda_parc = trim($segunda_parc);
		// $segunda_parc = utf8_decode($segunda_parc);
	 //    $segunda_parc = str_replace("&nbsp;", " ", $segunda_parc);
	 //    $segunda_parc = preg_replace('/\s+/', ' ',$segunda_parc);
	 //    $segunda_parc = trim($segunda_parc);

		$sql = new Sql();

		$results = $sql->select('CALL sp_salvar_novomes(:mes, :ano_orc, :id_categoria)', [
			':mes'=>$_POST['mes'],
			':ano_orc'=>$_POST['ano_orc'],
			':id_categoria'=>$id_categoria
		]);

		// ':alimentacao'=>floatval($alimentacao),
		// ':primeira_parc'=>floatval($primeira_parc),
		// ':bonus'=>floatval($bonus),
		// ':segunda_parc'=>floatval($segunda_parc),

		// $vlalimentacao = floatval($results[0]['alimentacao']);
		// $vlprimeira_parc = floatval($results[0]['primeira_parc']);
		// $vlbonus = floatval($results[0]['bonus']);
		// $vlsegunda_parc = floatval($results[0]['segunda_parc']);

		// $total = $vlalimentacao + $vlprimeira_parc + $vlbonus + $vlsegunda_parc;

		if($results == 0){
			Message::setME('Erro ao adicionar novo mês.');
			header('Location: /novo-mes/'.$id_categoria);
			exit();
		}else{
			Message::setMS('Mês adicionado com sucesso');
			header('Location: /categoria/'.$id_categoria);
			exit();
		}
	}

	public static function retornaTodosOsMeses($id_categoria){

		$sql = new Sql();

		$results = $sql->select('SELECT * FROM conta WHERE id_categoria = :id_categoria', [
			':id_categoria'=>$id_categoria
		]);

		return $results;

	}

	public static function todosProdServCategoriaDespesa($id_categoria, $id_conta){

		$sql = new Sql();

		$results = $sql->select('
			SELECT a.id_categoria, b.id_conta, b.receita, b.despesa,
			b.saldo, b.mes_orc, b.ano_orc, SUM(c.valor) AS valorTotalDespesa
			FROM categoria a 
			INNER JOIN conta b 
			ON a.id_categoria = b.id_categoria 
			INNER JOIN despesa c 
			ON b.id_conta = c.id_conta
			WHERE a.id_categoria = :id_categoria AND a.id_usuario = :id_usuario AND b.id_conta = :id_conta', [
			':id_categoria'=>$id_categoria,
			':id_usuario'=>Login::getSessionUserId(),
			':id_conta'=>$id_conta
		]);

		$valorTotalReceita = $results[0]['receita'];

		$valorTotalDespesa = $results[0]['valorTotalDespesa'];

		$saldo = $valorTotalReceita - $valorTotalDespesa;

		$results2 = $sql->select('CALL sp_alterar_conta_despesa(:id_categoria, :id_conta, :valorTotalDespesa, :saldo)', [
			':id_categoria'=>$results[0]['id_categoria'],
			':id_conta'=>$results[0]['id_conta'],
			':valorTotalDespesa'=>$valorTotalDespesa,
			':saldo'=>$saldo
		]);

		if($results2 == 0){

			$results = $sql->select('
				SELECT a.id_categoria,  b.id_conta, SUM(c.valor) AS valorTotalDespesa
				FROM categoria a 
				INNER JOIN conta b 
				ON a.id_categoria = b.id_categoria 
				INNER JOIN despesa c 
				ON b.id_conta = c.id_conta
				WHERE a.id_categoria = :id_categoria AND a.id_usuario = :id_usuario AND b.id_conta = :id_conta', [
				':id_categoria'=>$id_categoria,
				':id_usuario'=>Login::getSessionUserId(),
				':id_conta'=>$id_conta
			]);

			$results2 = $sql->select('CALL sp_alterar_conta_despesa(:id_categoria, :id_conta, :valorTotalDespesa)', [
				':id_categoria'=>$results[0]['id_categoria'],
				':id_conta'=>$results[0]['id_conta'],
				':valorTotalDespesa'=>$results[0]['valorTotalDespesa']
			]);

			if($results2 != 0){
				return $results2;
			}

		}else{

			return $results2;

		}

	}

	public static function salvarDespesa($id_conta, $id_categoria){

		
		$produto = utf8_encode($_POST['despesa']);
		$produto = utf8_decode($produto);

		$valorRecebidoSemMilhar = str_replace('.', '', $_POST['valor']);
		$valor = str_replace(',', '.', $valorRecebidoSemMilhar);

		$sql = new Sql();

		$results = $sql->select('CALL sp_salvar_despesa(:despesa, :valor, :data_compra, :id_conta, :paga_s_n)', [
			':despesa'=>$produto,
			':valor'=>floatval($valor),
			':data_compra'=>$_POST['data_compra'],
			':id_conta'=>$id_conta,
			':paga_s_n'=>$_POST['paga_s_n']
		]);

		// INSERT INTO despesa (despesa, valor, data_compra, paga_s_n, id_conta) VALUES ('10', 10.1, '2021-05-01', 's', 28);

		if($results == 0){
			Message::setME('Erro ao inserir novo produto.');
			header('Location: /despesa/'.$id_conta);
			exit();
		}else{
			Message::setMS('Produto adicionado com sucesso.');
			header('Location: /detalhes/'.$id_conta.'/'.$id_categoria);
			exit();
		}
	}

	public static function retornaDespesaUser($id_conta){

		$sql = new Sql();

		$results = $sql->select('
			SELECT a.id_despesa, a.valor, a.despesa, a.data_compra, a.paga_s_n,
			a.id_conta, c.id_usuario, b.id_categoria FROM despesa a 
			INNER JOIN conta b 
			ON a.id_conta = b.id_conta 
			INNER JOIN categoria c 
			ON b.id_categoria = c.id_categoria 
			WHERE c.id_usuario = :id_usuario 
			AND b.id_conta = :id_conta' , [
			':id_usuario'=>Login::getSessionUserId(),
			':id_conta'=>$id_conta
		]);

		return $results;
	}


	public static function adicionarReceita($primeira_parc, $segunda_parc, $alimentacao, $bonus, $id_conta){

		$sql = new Sql();

		$valorRecebidoSemMilhar = str_replace('.', '', $_POST['alimentacao']);
		$alimentacao = str_replace(',', '.', $valorRecebidoSemMilhar);
		// $alimentacao = str_replace(',', '.', $_POST['alimentacao']);
		// $alimentacao = str_replace('R$', '', $alimentacao);
		// $alimentacao = utf8_decode($alimentacao);
	 //    $alimentacao = str_replace("&nbsp;", " ", $alimentacao);
	 //    $alimentacao = preg_replace('/\s+/', ' ',$alimentacao);
		// $alimentacao = utf8_decode($alimentacao);
	 //    $alimentacao = str_replace("&nbsp;", " ", $alimentacao);
	 //    $alimentacao = preg_replace('/\s+/', ' ',$alimentacao);
	 //    $alimentacao = trim($alimentacao);

		$valorRecebidoSemMilhar2 = str_replace('.', '', $_POST['primeira_parc']);
		$primeira_parc = str_replace(',', '.', $valorRecebidoSemMilhar2);
		// $primeira_parc = str_replace(',', '.', $_POST['primeira_parc']);
		// $primeira_parc = str_replace('R$', '', $primeira_parc);
		// $primeira_parc = utf8_decode($primeira_parc);
	 //    $primeira_parc = str_replace("&nbsp;", " ", $primeira_parc);
	 //    $primeira_parc = preg_replace('/\s+/', ' ',$primeira_parc);
	 //    $primeira_parc = trim($primeira_parc);
		// $primeira_parc = utf8_decode($primeira_parc);
	 //    $primeira_parc = str_replace("&nbsp;", " ", $primeira_parc);
	 //    $primeira_parc = preg_replace('/\s+/', ' ',$primeira_parc);
	 //    $primeira_parc = trim($primeira_parc);

		$valorRecebidoSemMilhar3 = str_replace('.', '', $_POST['bonus']);
		$bonus = str_replace(',', '.', $valorRecebidoSemMilhar3);
		// $bonus = str_replace(',', '.', $_POST['bonus']);
		// $bonus = str_replace('R$', '', $bonus);
		// $bonus = utf8_decode($bonus);
	 //    $bonus = str_replace("&nbsp;", " ", $bonus);
	 //    $bonus = preg_replace('/\s+/', ' ',$bonus);
	 //    $bonus = trim($bonus);
		// $bonus = utf8_decode($bonus);
	 //    $bonus = str_replace("&nbsp;", " ", $bonus);
	 //    $bonus = preg_replace('/\s+/', ' ',$bonus);
	 //    $bonus = trim($bonus);

		$valorRecebidoSemMilhar4 = str_replace('.', '', $_POST['segunda_parc']);
		$segunda_parc = str_replace(',', '.', $valorRecebidoSemMilhar4);
		// $segunda_parc = str_replace(',', '.', $_POST['segunda_parc']);
		// $segunda_parc = str_replace('R$', '', $segunda_parc);
		// $segunda_parc = utf8_decode($segunda_parc);
	 //    $segunda_parc = str_replace("&nbsp;", " ", $segunda_parc);
	 //    $segunda_parc = preg_replace('/\s+/', ' ',$segunda_parc);
	 //    $segunda_parc = trim($segunda_parc);
		// $segunda_parc = utf8_decode($segunda_parc);
	 //    $segunda_parc = str_replace("&nbsp;", " ", $segunda_parc);
	 //    $segunda_parc = preg_replace('/\s+/', ' ',$segunda_parc);
	 //    $segunda_parc = trim($segunda_parc);

		$total = floatval($primeira_parc) + floatval($segunda_parc) + floatval($alimentacao) + floatval($bonus);

		$results = $sql->select('CALL sp_salvar_receita(:primeira_parc, :segunda_parc, :alimentacao, :bonus, :total, :id_conta)', [
			':primeira_parc'=>floatval($primeira_parc),
			':segunda_parc'=>floatval($segunda_parc),
			':alimentacao'=>floatval($alimentacao),
			':bonus'=>floatval($bonus),
			':total'=>floatval($total),
			':id_conta'=>$id_conta
		]);
		//aqui

		if($results == 0){

			Message::setME('Erro ao inserir receita.');
			header('Location: /receita/'.$id_conta);
			exit();

		}else{

			$conta = $sql->select('SELECT * FROM conta WHERE id_conta = :id_conta', [
				':id_conta'=>$id_conta
			]);

			$results2 = $sql->select('CALL sp_alterar_conta_receita(:id_conta, :id_categoria, :receita)', [
				':id_conta'=>$id_conta,
				':id_categoria'=>$conta[0]["id_categoria"],
				':receita'=>$total
			]);

			if($results2 == 0){

				Message::setME('Erro ao inserir receita.');
				header('Location: /receita/'.$id_conta);
				exit();

			}else{

				Message::setMS('Receita adicionado com sucesso.');
				header('Location: /detalhes/'.$id_conta.'/'.$conta[0]["id_categoria"]);
				exit();

			}

		}
	}


	public static function alterarReceita($primeira_parc, $segunda_parc, $alimentacao, $bonus, $id_conta, $id_receita, $id_categoria){

		$sql = new Sql();

		$alimentacao = str_replace(',', '.', $_POST['alimentacao']);

		$primeira_parc = str_replace(',', '.', $_POST['primeira_parc']);

		$bonus = str_replace(',', '.', $_POST['bonus']);

		$segunda_parc = str_replace(',', '.', $_POST['segunda_parc']);

		$total = floatval($primeira_parc) + floatval($segunda_parc) + floatval($alimentacao) + floatval($bonus);

		$results = $sql->select('CALL sp_alterar_receita(:primeira_parc, :segunda_parc, :alimentacao, :bonus, :total, :id_conta, :id_receita)', [
			':primeira_parc'=>floatval($primeira_parc),
			':segunda_parc'=>floatval($segunda_parc),
			':alimentacao'=>floatval($alimentacao),
			':bonus'=>floatval($bonus),
			':total'=>floatval($total),
			':id_conta'=>$id_conta,
			':id_receita'=>$id_receita
		]);

		if($results == 0){

			Message::setME('Erro ao inserir receita.');
			header('Location: /alterar-receita/'.$id_conta.'/'.$id_receita.'/'.$id_categoria);
			exit();

		}else{

			$conta = $sql->select('SELECT * FROM conta WHERE id_conta = :id_conta', [
				':id_conta'=>$id_conta
			]);

			$results2 = $sql->select('CALL sp_alterar_conta_receita(:id_conta, :id_categoria, :receita)', [
				':id_conta'=>$id_conta,
				':id_categoria'=>$conta[0]["id_categoria"],
				':receita'=>$total
			]);

			if($results2 == 0){

				Message::setME('Erro ao inserir receita.');
				header('Location: /alterar-receita/'.$id_conta.'/'.$id_receita.'/'.$id_categoria);
				exit();

			}else{

				Message::setMS('Receita adicionado com sucesso.');
				header('Location: /detalhes/'.$id_conta.'/'.$id_categoria);
				exit();

			}

		}
	}

	public static function retornaReceiraUser($id_conta){

		$sql = new Sql();

		$results = $sql->select('
			SELECT c.id_usuario, b.id_categoria, d.id_receita,
			d.alimentacao, d.bonus, d.primeira_parc, d.segunda_parc,
			d.total, d.id_conta FROM receita d 
			INNER JOIN conta b 
			ON d.id_conta = b.id_conta 
			INNER JOIN categoria c 
			ON b.id_categoria = c.id_categoria 
			WHERE c.id_usuario = :id_usuario
			AND b.id_conta = :id_conta' , [
			':id_usuario'=>Login::getSessionUserId(),
			':id_conta'=>$id_conta
		]);

		return $results;
	}

	public static function detalheTemReceira($id_conta){

		$sql = new Sql();

		$results = $sql->select('SELECT * FROM receita WHERE id_conta = :id_conta', [
			':id_conta'=>$id_conta
		]);

		return count($results);

	}

	public static function retornaReceita($id_conta, $id_receita){

		$sql = new Sql();

		$results = $sql->select('SELECT * FROM receita WHERE id_conta = :id_conta AND id_receita = :id_receita', [
			':id_conta'=>$id_conta,
			':id_receita'=>$id_receita
		]);

		return $results;

	}

	public static function retornaDespesa($id_conta, $id_despesa){

		$sql = new Sql();

		$results = $sql->select('SELECT * FROM despesa WHERE id_conta = :id_conta AND id_despesa = :id_despesa', [
			':id_conta'=>$id_conta,
			':id_despesa'=>$id_despesa
		]);

		return $results;

	}

	public static function alterarDespesa($id_conta, $id_despesa, $id_categoria){
		
		$produto = utf8_encode($_POST['despesa']);
		$produto = utf8_decode($produto);

		$valor = str_replace(',', '.', $_POST['valor']);

		$sql = new Sql();

		$results = $sql->select('CALL sp_alterar_despesa(:despesa, :valor, :data_compra, :id_conta, :id_despesa, :paga_s_n)', [
			':despesa'=>$produto,
			':valor'=>floatval($valor),
			':data_compra'=>$_POST['data_compra'],
			':id_conta'=>$id_conta,
			':id_despesa'=>$id_despesa,
			':paga_s_n'=>$_POST['paga_s_n']
		]);

		if($results == 0){
			Message::setME('Erro ao inserir novo produto.');
			header('Location: /alterar-despesa/'.$id_conta.'/'.$id_despesa);
			exit();
		}else{
			Message::setMS('Produto adicionado com sucesso.');
			header('Location: /detalhes/'.$id_conta.'/'.$id_categoria);
			exit();
		}

	}

	public static function deletarDespesa($id_conta, $id_despesa, $id_categoria){

		$sql = new Sql();

		$results = $sql->select('CALL sp_delete_despesa(:id_conta, :id_despesa)', [
			':id_conta'=>$id_conta,
			':id_despesa'=>$id_despesa
		]);

		if($results == 1){
			Message::setME('Erro ao inserir novo produto.');
			header('Location: /detalhes/'.$id_conta.'/'.$id_categoria);
			exit();
		}else{
			Message::setMS('Produto adicionado com sucesso.');
			header('Location: /detalhes/'.$id_conta.'/'.$id_categoria);
			exit();
		}

	}

	public static function deletarCategoriaReceitaDespesa($id_categoria, $id_conta){

		$sql = new Sql();

		$results = $sql->select('CALL sp_delete_categoria_receita_despesa(:id_conta, :id_categoria)', [
			':id_conta'=>$id_conta,
			':id_categoria'=>$id_categoria
		]);

		if($results == 1){
			Message::setME('Erro ao inserir novo produto.');
			header('Location: /categoria/'.$id_categoria);
			exit();
		}else{
			Message::setMS('Categoria excluida.');
			header('Location: /categoria/'.$id_categoria);
			exit();
		}

	}

	public static function deletarFinancaCategoriaReceitaDespesa($id_categoria){

		$sql = new Sql();

		$id_conta_receita_despesa = $sql->select('
			SELECT b.id_conta FROM categoria a 
			INNER JOIN conta b 
			ON a.id_categoria = b.id_categoria
			WHERE a.id_categoria = :id_categoria', [
				':id_categoria'=>$id_categoria
		]);

		if(empty($id_conta_receita_despesa[0]['id_conta'])){
			$id_conta = 0;
		}else{
			$id_conta = $id_conta_receita_despesa[0]['id_conta'];
		}

		// $id_conta = $id_conta_receita_despesa[0]['id_conta'];

		$results = $sql->select('CALL sp_delete_financa_categoria_receita_despesa(:id_conta, :id_categoria)', [
			':id_conta'=>$id_conta,
			':id_categoria'=>$id_categoria
		]);

		if($results == 1){
			Message::setME('Erro ao inserir novo produto.');
			header('Location: /financas');
			exit();
		}else{
			Message::setMS('Categoria excluida.');
			header('Location: /financas');
			exit();
		}

	}

	public static function retornaCategoria($id_categoria){

		$sql = new Sql();

		$retornaCategoria = $sql->select('SELECT * FROM categoria WHERE id_categoria = :id_categoria', [
			':id_categoria'=>$id_categoria
		]);

		return $retornaCategoria;

	}

	public static function alterarCategoria($id_categoria){

		$sql = new Sql();

		$results = $sql->select('CALL sp_alterar_categoria(:id_categoria, :nome_cat)', [
			':id_categoria'=>$id_categoria,
			':nome_cat'=>$_POST['nome_cat']
		]);

		if($results == 1){
			Message::setME('Erro ao inserir novo produto.');
			header('Location: /alterar-categoria/$id_categoria');
			exit();
		}else{
			Message::setMS('Categoria excluida.');
			header('Location: /financas');
			exit();
		}

	}




















	public function retornaMesId($id){

		$sql = new Sql();

		$resuls = $sql->select('SELECT * FROM mes a 
			INNER JOIN capital b 
			ON a.id_mes = b.id_mes_orc
			WHERE id_mes = :mes', [
			':mes'=>$id
		]);

		return $resuls;
	}

	public static function editarNovoMes($id_capital){

		$sql = new Sql();

		$alimentacao = str_replace(',', '.', $_POST['alimentacao']);
		$alimentacao = str_replace('R$', '', $alimentacao);
		$alimentacao = utf8_decode($alimentacao);
	    $alimentacao = str_replace("&nbsp;", " ", $alimentacao);
	    $alimentacao = preg_replace('/\s+/', ' ',$alimentacao);
	    $alimentacao = trim($alimentacao);

	    // var_dump(floatval($alimentacao));exit();

		$primeira_parc = str_replace(',', '.', $_POST['primeira_parc']);
		$primeira_parc = str_replace('R$', '', $primeira_parc);
		$primeira_parc = utf8_decode($primeira_parc);
	    $primeira_parc = str_replace("&nbsp;", " ", $primeira_parc);
	    $primeira_parc = preg_replace('/\s+/', ' ',$primeira_parc);
	    $primeira_parc = trim($primeira_parc);

		$bonus = str_replace(',', '.', $_POST['bonus']);
		$bonus = str_replace('R$', '', $bonus);
		$bonus = utf8_decode($bonus);
	    $bonus = str_replace("&nbsp;", " ", $bonus);
	    $bonus = preg_replace('/\s+/', ' ',$bonus);
	    $bonus = trim($bonus);

		$segunda_parc = str_replace(',', '.', $_POST['segunda_parc']);
		$segunda_parc = str_replace('R$', '', $segunda_parc);
		$segunda_parc = utf8_decode($segunda_parc);
	    $segunda_parc = str_replace("&nbsp;", " ", $segunda_parc);
	    $segunda_parc = preg_replace('/\s+/', ' ',$segunda_parc);
	    $segunda_parc = trim($segunda_parc);

		$results = $sql->select('CALL up_editar_novo_mes(:alimentacao, :primeira_parc, :bonus, :segunda_parc, :id_capital)', [
			':alimentacao'=>floatval($alimentacao),
			':primeira_parc'=>floatval($primeira_parc),
			':bonus'=>floatval($bonus),
			':segunda_parc'=>floatval($segunda_parc),
			':id_capital'=>$id_capital
		]);

		var_dump($results);exit();
	}

	public static function listAll(){

		$sql = new Sql();

		$results = $sql->select('
			SELECT a.id_mes, a.mes_orc, a.data_criacao, a.ano_orc, 
			b.id_capital, b.alimentacao, b.primeira_parc, b.bonus, b.segunda_parc, b.total,
			c.id_produto, c.produto, c.valor, SUM(c.valor) AS valores_produtos, c.data_compra
			FROM mes a 
			INNER JOIN capital b 
			ON a.id_mes = b.id_mes_orc 
			INNER JOIN produto c 
			ON a.id_mes = c.id_mes_orc
			WHERE a.id_usuario = '.User::retornaUsuarioDaSessao()["id_usuario"]);

		return $results;

		var_dump($results);exit();
	}

	public static function listaAllProdServId($id_mes){

		$sql = new Sql();

		$results = $sql->select('SELECT * FROM produto WHERE id_mes_orc = :id', [
			':id'=>$id_mes
		]);

		return $results;
	}

	public static function salvarProdutoServico($id_mes){

		
		$produto = utf8_encode($_POST['produto']);
		$produto = utf8_decode($produto);

		$valor = str_replace(',', '.', $_POST['valor']);
		$valor = str_replace('R$', '', $valor);
		$valor = utf8_decode($valor);
	    $valor = str_replace("&nbsp;", " ", $valor);
	    $valor = preg_replace('/\s+/', ' ',$valor);
	    $valor = trim($valor);

	    // var_dump(floatval($valor));exit();

		$sql = new Sql();

		// var_dump($id_mes);exit();

		$results = $sql->select('CALL sp_salvar_produt_servico(:produto, :valor, :data_compra, :id_mes_orc)', [
			':produto'=>$produto,
			':valor'=>floatval($valor),
			':data_compra'=>$_POST['data_compra'],
			':id_mes_orc'=>$id_mes
		]);

		if($results == 0){
			Message::setME('Erro ao inserir novo produto.');
			header('Location: /novo-produto/'.$id_mes);
			exit();
		}else{
			Message::setMS('Produto adicionado com sucesso.');
			header('Location: /saiba-mais/'.$id_mes);
			exit();
		}
	}

}

?>