<?php

$xml = simplexml_load_file("contactos.xml");
$telefono = $_GET['telefono'];

foreach($xml->contacto as $c){
    if($c->telefono == $telefono){
        $contacto = $c;
        break;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Modificar Contacto</title>
</head>
<body>

<h2>Modificar Contacto</h2>

<form method="POST" action="actualizar.php">

    <input type="hidden" name="telefono_original" value="<?php echo $contacto->telefono; ?>">

    Nombre: <input type="text" name="nombre" value="<?php echo $contacto->nombre; ?>" required><br><br>

    Tipo:
    <input type="text" name="tipo" value="<?php echo $contacto->tipo; ?>" required><br><br>

    Teléfono: <input type="text" name="telefono" value="<?php echo $contacto->telefono; ?>" required><br><br>

    Correo: <input type="email" name="correo" value="<?php echo $contacto->correo; ?>"><br><br>

    Red: <input type="text" name="red" value="<?php echo $contacto->red; ?>"><br><br>

    Usuario Red: <input type="text" name="usuarioRed" value="<?php echo $contacto->usuarioRed; ?>"><br><br>

    <button type="submit">Actualizar</button>
</form>

<br>
<a href="index.php">Regresar</a>

</body>
</html>