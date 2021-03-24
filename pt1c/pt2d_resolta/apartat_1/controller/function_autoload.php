<?php
spl_autoload_register(function($nom_classe){

    $nomFitxer="class_".$nom_classe.".php";
    $arxiuPersistence="./model/persistence/".$nomFitxer;
    $arxiuBusiness="./model/business/".$nomFitxer;

    if(file_exists($arxiuPersistence)){
        require_once $arxiuPersistence;
    }
    elseif(file_exists(".".$arxiuPersistence)){
           require_once ".".$arxiuPersistence;
    }
    elseif(file_exists($arxiuBusiness)){
           require_once $arxiuBusiness;
    }
    elseif(file_exists(".".$arxiuBusiness)){
           require_once ".".$arxiuBusiness;
    }

});
?>
