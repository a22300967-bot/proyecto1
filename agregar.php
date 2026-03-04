<?php

$xml = simplexml_load_file("contactos.xml");

$contacto = $xml->addChild("contacto");

$contacto->addChild("nombre", $_POST['nombre']);
$contacto->addChild("tipo", $_POST['tipo']);
$contacto->addChild("telefono", $_POST['telefono']);
$contacto->addChild("correo", $_POST['correo']);
$contacto->addChild("red", $_POST['red']);
$contacto->addChild("usuarioRed", $_POST['usuarioRed']);

$xml->asXML("contactos.xml");

header("Location: index.php");

?>