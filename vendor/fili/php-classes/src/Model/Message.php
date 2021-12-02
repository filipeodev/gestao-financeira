<?php 

namespace Fili\Model;

use \Fili\DB\Sql;
use \Fili\Model;

class Message extends Model{

	const ME = "MensagemErro";
	const MS = "MensagemSucesso";

	public static function setMS($msg){
		$_SESSION[Message::MS] = $msg;
	}
	public static function getMS(){
		$msg = isset(($_SESSION[Message::MS])) ? $_SESSION[Message::MS] : '';

		Message::clearMS();

		return $msg;
	}
	public static function clearMS(){
		$_SESSION[Message::MS] = NULL;		
	}

	public static function setME($msg){
		$_SESSION[Message::ME] = $msg;
	}
	public static function getME(){
		$msg = isset(($_SESSION[Message::ME])) ? $_SESSION[Message::ME] : '';

		Message::clearME();

		return $msg;
	}
	public static function clearME(){
		$_SESSION[Message::ME] = NULL;		
	}

}

?>