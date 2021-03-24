<?php

class llibreDAO {

	public function inserir($llibre) {
	$object = new stdClass();
	// $object->id=$llibre->getId();
	$object->titol = $llibre->getTitol();
	$object->data_public = $llibre->getDataPublic();
	$object->autor_id=$llibre->getAutor();
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$GLOBALS["baseUrl"].'/api/llibre');
	curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($object));
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_exec($ch);
	$respostaCodi = curl_getinfo($ch,CURLINFO_HTTP_CODE);
	curl_close($ch);
	if (($respostaCodi>=200)&&($respostaCodi<300) ){
		return true;
	}else{
		echo $respostaCodi;
		return false;
	}
	}

	public function eliminar($id) {

		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,$GLOBALS["baseUrl"].'/api/llibre/'.$id);
		curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_exec($ch);
		$respostaCodi = curl_getinfo($ch,CURLINFO_HTTP_CODE);
		curl_close($ch);
		if (($respostaCodi>=200)&&($respostaCodi<300) ){
			return true;
		}else{
			echo $respostaCodi;
		return false;
	}
	}
	public function modificar($llibre) {
		$object = new stdClass();
		$object->id=$llibre->getId();
		$object->titol = $llibre->getTitol();
		$object->data_public = $llibre->getDataPublic();
		$object->autor_id=$llibre->getAutor();
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,$GLOBALS["baseUrl"].'/api/llibre/'.$object->id);
		curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"PUT");
		curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($object));
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_exec($ch);
		$respostaCodi = curl_getinfo($ch,CURLINFO_HTTP_CODE);
		curl_close($ch);
		if (($respostaCodi>=200)&&($respostaCodi<300) ){
			return true;
		}else{
			echo $respostaCodi;
		return false;
	}
}

public function cercarId($id) {
	$curl = curl_init();

	// configurem les opcions de la petició HTTP
	// completem la URL del web service per fer la petició GET dels autors
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => $GLOBALS['baseUrl'] . '/api/llibre/'.$id
	));

	// executem la peticio cURL
	$respostaJ = curl_exec($curl);
	curl_close($curl);

	// la resposta ve en format Json, l’hem de convertir a format array de PHP
	$resposta = json_decode($respostaJ);
	if (isset($resposta)) {
	$llibre = new llibre($resposta->titol, $resposta->data_public,$resposta->autor_id);
	$llibre->setId($id);

	  return $llibre;
	}

}
	

// 	public function veureLlibres() {
// 		$query="SELECT * FROM llibre;";

//     //$con = new db();
// 		$consulta = $this->consulta($query);
// 		$this->close();

// 		$arrayLlibres = array();
// 		foreach ($consulta as $row) {
// 		$llibre = new llibre($row["titol"], $row["data_public"], $row["autor"]);
// 	    $llibre->setId($row["id"]);
// 	    array_push($arrayLlibres, $llibre);
//     }

// 		return $arrayLlibres;
//   }
  public function veureLlibres() {
    $curl = curl_init();

    // configurem les opcions de la petició HTTP
    // completem la URL del web service per fer la petició GET dels autors
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $GLOBALS['baseUrl'] . '/api/llibres'
    ));

    // executem la peticio cURL
    $respostaJ = curl_exec($curl);
    curl_close($curl);

    // la resposta ve en format Json, l’hem de convertir a format array de PHP
    $resposta = json_decode($respostaJ);

    // construim un array amb objectes de la classe autor
    $arrayLlibres = array();
    foreach ($resposta as $row) {
    $llibre = new llibre($row->titol, $row->data_public,$row->autor_id);
	$llibre->setId($row->id);
	array_push($arrayLlibres, $llibre);
    }

    return $arrayLlibres;
}

	public function inserirLlibreAutor($llibre, $autor)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $GLOBALS['baseUrl'] . '/api/autor');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($autor));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


        $responseJ=curl_exec($ch);
        $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (!$response >= 200 && $response < 300) {
            echo "<b>Error " . $response . "</b><br>No s'ha pogut inserir";
            return false;
        }

        $autorI = json_decode($responseJ);
        $id = $autorI->id;

        $obj = new stdClass();
        $obj->id = $llibre->getId();
        $obj->titol = $llibre->getTitol();
        $obj->data_public = $llibre->getDataPublic();
        $obj->autor_id = $id;


        curl_setopt($ch, CURLOPT_URL, $GLOBALS['baseUrl'] . '/api/llibre');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($obj));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resj=curl_exec($ch);
        $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($response >= 200 && $response < 300) {
            return true;
        } else {
            echo "<b>Error " . $response . "</b><br>No s'ha pogut inserir". $resj;
            return false;
        }
    }
}
 ?>
