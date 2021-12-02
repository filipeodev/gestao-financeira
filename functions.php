<?php 

use \Fili\Model\Login;
use \Fili\Model\User;
use \Fili\Model\Financas;

function formatDate($date){

	$myDate = date("d-m-Y", strtotime($date));
	$myDate = str_replace("-", " / ", $myDate);

	return $myDate;
}

function utf8_de($date){

	return utf8_decode($date);
}
function utf8_en($date){

	return utf8_encode($date);
}

?>