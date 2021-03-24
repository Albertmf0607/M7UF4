<?php
class autorDAO {

	public function inserir($autor) {
		$object = new stdClass();
		$object->id=$autor->getId();
		$object->nom = $autor->getNom();
		$object->cognoms = $autor->getCognoms();
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,$GLOBALS["baseUrl"].'/api/autor');
		curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($object));
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_exec($ch);
		$respostaCodi = curl_getinfo($ch,CURLINFO_HTTP_CODE);
		curl_close($ch);
		if (($respostaCodi>=200)&&($respostaCodi<300) ){
			return true;
		}else{
			return false;
		}
		}

	public function cercarId($id) {
		$curl = curl_init();
	
		// configurem les opcions de la petició HTTP
		// completem la URL del web service per fer la petició GET dels autors
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $GLOBALS['baseUrl'] . '/api/autor/'.$id
		));
	
		// executem la peticio cURL
		$respostaJ = curl_exec($curl);
		curl_close($curl);
	
		// la resposta ve en format Json, l’hem de convertir a format array de PHP
		$resposta = json_decode($respostaJ);
		if (isset($resposta)) {
		$autor = new autor($resposta->nom, $resposta->cognoms);
	    $autor->setId($id);

		  return $autor;
		}

	}

	public function veureAutors() {
		$curl = curl_init();
	
		// configurem les opcions de la petició HTTP
		// completem la URL del web service per fer la petició GET dels autors
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $GLOBALS['baseUrl'] . '/api/autors'
		));
	
		// executem la peticio cURL
		$respostaJ = curl_exec($curl);
		curl_close($curl);
	
		// la resposta ve en format Json, l’hem de convertir a format array de PHP
		$resposta = json_decode($respostaJ);
	
		// construim un array amb objectes de la classe autor
		$arrayAutors = array();
		foreach ($resposta as $row) {
			$autor = new autor($row->nom, $row->cognoms);
		$autor->setId($row->id);
		array_push($arrayAutors, $autor);
		}
	
		return $arrayAutors;
	}
 
 
}
 ?>
