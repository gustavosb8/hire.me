<?php

require_once('src/functions/connection.php');

function insereUrlAlias($url, $alias){

	require_once('src/functions/connection.php');
	$conexao = conectarDB();

	$sql = "INSERT INTO tb_url (URL, ALIAS) VALUES (:url, :alias)";

	$insert = $conexao->prepare($sql);

	$insert->bindParam(':url', $url, PDO::PARAM_STR);
	$insert->bindParam(':alias', $alias, PDO::PARAM_STR);

	try{

		$insert->execute();
		return true;

	} catch (\PDOException $erro) {

		echo $erro->getMessage();

	}
}

function getRanking(){
	$conexao = conectarDB();

	$sql = "SELECT DISTINCT URL, COUNT(URL) AS QTD FROM tb_url GROUP BY URL ORDER BY COUNT(URL) DESC LIMIT 10";

	$select = $conexao->prepare($sql);


	try{

		$select->execute();
		return $select->fetchAll(PDO::FETCH_ASSOC);

	} catch (\PDOException $erro) {

		echo $erro->getMessage();

	}
}

function getUrlbyAlias($alias){
	$conexao = conectarDB();

	$sql = "SELECT URL from tb_url where ALIAS like :alias";

	$select = $conexao->prepare($sql);

	$select->bindParam(':alias', $alias, PDO::PARAM_STR);

	try{

		$select->execute();
		return $select->fetch(PDO::FETCH_ASSOC);
		

	} catch (\PDOException $erro) {

		echo $erro->getMessage();

	}
}

function getAliasExistente($alias){
	$conexao = conectarDB();

	$sql = "SELECT ALIAS from tb_url where ALIAS like :alias";

	$select = $conexao->prepare($sql);

	$select->bindParam(':alias', $alias, PDO::PARAM_STR);

	try{

		$select->execute();
		
		if($select->fetch(PDO::FETCH_ASSOC)){
			return true;
		}else{
			return false;
		}
		

	} catch (\PDOException $erro) {

		echo $erro->getMessage();

	}
}

?>