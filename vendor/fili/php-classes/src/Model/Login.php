<?php 

namespace Fili\Model;

use \Fili\DB\Sql;
use \Fili\Model;
use \Fili\Model\Message;

class Login extends Model{

	const SESSION = "usuario";

	public static function getSessionUserId(){


		if(!isset($_SESSION[Login::SESSION]['id_usuario']) || $_SESSION[Login::SESSION]['id_usuario'] == null){
			header("Location: /");
			exit();
		}

		return $_SESSION[Login::SESSION]['id_usuario'];

	}

	public static function procuraLogin(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM usuario WHERE id_usuario = :id", array(
			':id'=>Login::getSessionUserId()
		));

	}

	public static function getPasswordHash($password){

		return password_hash($password, PASSWORD_DEFAULT, [
			'cost'=>12
		]);

	}

	public static function verificaTemLogin($login){

		$sql = new Sql();

		$exiteUsuario = $sql->select("SELECT email, usuario FROM usuario WHERE email = :email OR usuario = :usuario", array(
			':email'=>$login,
			'usuario'=>$login
		));

		return (count($exiteUsuario) > 0);

	}

	public static function returnSts(){

		$sql = new Sql();

		$results = $sql->select("SELECT sts FROM usuario WHERE id_usuario = :id", array(
			":id"=>Login::getSessionUserId()
		));

		return $results;

	}

	public function save(){

		$sql = new Sql();

		// var_dump(Login::verificaTemLogin($_POST['usuario']));exit();

		if(Login::verificaTemLogin($_POST['email']) == false){
			//caso não tenha email ou usuario cadastrado

			if(Login::verificaTemLogin($_POST['usuario']) == false){
				$results = $sql->select("CALL sp_salvar_usuario(:email, :usuario, :senha, :sts, :admin, :imagem)",
					array(
					":email"=>$_POST['email'],
					":usuario"=>strtolower($_POST['usuario']),
					":senha"=>Login::getPasswordHash($_POST['senha']),
					":sts"=>1,
					":admin"=>0,
					":imagem"=>"default.png"
				));
				// CALL sp_save_user('F@gmail.com', 0, 1, '123', 'filipe', 'santos', 'M', '2020-03-19');

				// var_dump($results[0]);exit();
				
				$this->setData($results[0]);
			}else{
				//caso já tenha email ou usuario cadastrado

				Message::setME("Usuário ou email já cadastrado.");
				header('Location: /cadastro');
				exit;
			}

		}else{
			//caso já tenha email ou usuario cadastrado

			Message::setME("Usuário ou email já cadastrado.");
			header('Location: /cadastro');
			exit;
		}

		

	}

	public static function login($login, $senha){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM usuario WHERE usuario = :usuario OR email = :email",
		array(
			':usuario'=>strtolower($login),
			':email'=>$login
		));

		if(count($results) === 0){
			Message::setME("Usuário inexistente ou senha inválida.");
			header('Location: /');
			exit;

		}

		$data = $results[0];

		if(password_verify($senha, $data['senha']) === true){

			$user = new Login();

			$user->setData($data);
			
			$_SESSION[Login::SESSION] = $user->getValues();

			return $user;

		}else{

			Message::setME("Usuário inexistente ou senha inválida.");
			header('Location: /');
			exit;

		}

	}

	public static function verifyLogin($admin = true)
	{
		$sts = Login::returnSts();
		if(!empty($sts)){
			if($sts[0]["sts"] == '1' || $sts[0]["sts"] != 0){
				if (!Login::checkLogin($admin)) {
					if ($admin) {
						header("Location: /admin/login");
					} else {
						header("Location: /");
					}
					exit;
				}
			}else{
				Message::setME("Usuário desabilitado, contate o administrador do sistema.");
				header('Location: /');
				exit;
			}
		}else{
			Message::setME("Usuário desabilitado, contate o administrador do sistema.");
			header('Location: /');
			exit;
		}

	}

	public static function checkLogin($admin = true){

		if(
			!isset($_SESSION[Login::SESSION]) 
			|| 
			!$_SESSION[Login::SESSION] 
			|| 
			!(int)$_SESSION[Login::SESSION]["id_usuario"] > 0 
		){
			//não está logado
			return false;
		}else{

			if($admin === true && (bool)$_SESSION[Login::SESSION]['admin'] === true){

				return true;

			}else if($admin === false){

				return true;

			}else{

				return false;

			}

		}

	}

	public static function logout(){

		$_SESSION[Login::SESSION] = NULL;

	}

}
?>