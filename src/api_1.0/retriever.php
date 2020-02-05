<?php
require_once('src/queries/TB_URL.php');
require_once('src/functions/shortner.php');

$_put = urldecode(file_get_contents('php://input'));

//verificar isset PUT, por enquanto get



if(isset($_put) && !empty($_put)){
	if($_put === "buscatodos"){
		//echo json_encode(array("Teste"=>"Voltei"));

		$ranking = getRanking();
		$dump = array();
		$i=1;
		foreach ($ranking as $linha) {
			array_push($dump, array("indice" => $i,"url" => $linha['URL'], "count" => $linha['QTD']));
			$i++;
		}

		echo json_encode($dump);
	}

}

?>