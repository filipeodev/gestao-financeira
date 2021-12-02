<?php 

namespace Fili\Model;

use \Fili\DB\Sql;
use \Fili\Model;
use \Fili\Mailer;
use \Fili\Model\Login;

class User extends Model{

	public static function retornaUsuarioDaSessao(){

		$sql = new Sql();

		$results = $sql->select("SELECT id_usuario, email, senha, usuario, admin, sts, imagem FROM usuario WHERE id_usuario = :id_usuario", array(
			':id_usuario'=>Login::getSessionUserId()
		));

		return $results[0];
	}

	public static function alterarUsuario($email, $senha, $foto, $caminhoAtual, $caminhoNovo){

		// var_dump(User::retornaUsuarioDaSessao());exit();
		$foto = (empty($foto)) ? User::retornaUsuarioDaSessao()["imagem"] : $foto;

		if (empty($senha)) {
			$mesmaSenha = User::retornaUsuarioDaSessao();

			$senha = $mesmaSenha['senha'];
		}else{
			$senha = Login::getPasswordHash($senha);
		}

		if (empty($email)) {
			$mesmoEmail = User::retornaUsuarioDaSessao();

			$email = $mesmoEmail['email'];
		}

		$sql = new Sql();

		$results = $sql->select("CALL sp_alterar_usuario(:id, :email, :senha, :foto)", [
			':id'=>Login::getSessionUserId(),
			':email'=>$email,
			':senha'=>$senha,
			':foto'=>$foto
		]);

		if($results === 0){
			Message::setME('Erro ao alterar. Tente novamente!');
			header('Location: /usuario');
			exit();
		}else{
			move_uploaded_file($caminhoAtual, $caminhoNovo);
			Message::setMS('Alteração realizada');
			header('Location: /usuario');
			exit();
		}

		return $results;
	}

}

?>