<?php


require_once('src/queries/TB_URL.php');
require_once('src/functions/shortner.php');

$_put = urldecode(file_get_contents('php://input'));

//verificar isset PUT, por enquanto get

if(isset($_put) && !empty($_put)){
	$dados = json_decode($_put, true);

	
	if(isset($dados['url']) && isset($dados['CUSTOM_ALIAS']) && !empty($dados['url']) && empty($dados['CUSTOM_ALIAS'])){
		//chamada sem alias

		//verificar se começa com www
		$aux = explode('.', $dados['url']);

		if($aux[0] == 'www'){
			$dados['url'] = 'http://'.$dados['url'];
		}

		$alias = short();

		// TESTAR SE O ALIAS JÁ EXISTE, ENQUANTO EXISTIR GERA UM NOVO
		
		//var_dump(getAliasExistente($alias));

		while (getAliasExistente($alias)) {
			$alias = short();
		}

		if(insereUrlAlias($dados['url'], $alias)){

			$date = new DateTime();
			$time = $date->getTimestamp();// - $dados['time'];

			echo criaJson($alias, $time, $dados['time']); 

		}

	}elseif(!empty($dados['CUSTOM_ALIAS'])){
		//chamada com alias

		//testar de alias existe

		if(!getAliasExistente($dados['CUSTOM_ALIAS'])){
			$aux = explode('.', $dados['url']);

			if($aux[0] == 'www'){
				$dados['url'] = 'http://'.$dados['url'];
			}

			$date = new DateTime();
			$time = $date->getTimestamp();// - $dados['time'];

			if(insereUrlAlias($dados['url'], $dados['CUSTOM_ALIAS'])){
				echo criaJson($dados['CUSTOM_ALIAS'], $time, $dados['time']);

			}
		}else{
			echo json_encode(
					array('url'=>'https://shorturlio.herokuapp.com/u/'.$dados['CUSTOM_ALIAS'], 
					'ERR_CODE'=>'001',
					'Description' => 'CUSTOM ALIAS ALREADY EXISTS'));
		}



}else{
	echo 'ERROR';
}

}

function criaJson($alias, $time, $timeTaken){
	return json_encode(
					array('url'=>'https://shorturlio.herokuapp.com/u/'.$alias, 
					'CUSTOM_ALIAS'=>$alias,
					'statistics' => array('time_taken'=>$time-$timeTaken)));
}
?>