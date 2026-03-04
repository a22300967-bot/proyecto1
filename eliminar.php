<?php

$xml = simplexml_load_file("contactos.xml");
$contador= 0;
foreach($xml->contacto as $key => $c){
    if($c->telefono == $_GET['telefono']){
        unset($xml->contacto[$contador]); 
        
        break;
    }
    $contador = $contador + 1;

}

$xml->asXML("contactos.xml");

header("Location: index.php");
?>