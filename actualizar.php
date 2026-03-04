<?php

$xml = simplexml_load_file("contactos.xml");

foreach($xml->contacto as $c){
    if($c->telefono == $_POST['telefono_original']){
        
        $c->nombre = $_POST['nombre'];
        $c->tipo = $_POST['tipo'];
        $c->telefono = $_POST['telefono'];
        $c->correo = $_POST['correo'];
        $c->red = $_POST['red'];
        $c->usuarioRed = $_POST['usuarioRed'];
        
        break;
    }
}

$xml->asXML("contactos.xml");

header("Location: index.php");

?>