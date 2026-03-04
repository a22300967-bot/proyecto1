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
    <select name="tipo" required>
    <option value="Trabajo" <?php if($contacto->tipo == "Trabajo") echo "selected"; ?>>Trabajo</option>
    <option value="Escuela" <?php if($contacto->tipo == "Escuela") echo "selected"; ?>>Escuela</option>
    <option value="Amigo" <?php if($contacto->tipo == "Amigo") echo "selected"; ?>>Amigo</option>
    <option value="Familia" <?php if($contacto->tipo == "Familia") echo "selected"; ?>>Familia</option>
    </select>
    <br><br>

    Teléfono: <input type="text" name="telefono" value="<?php echo $contacto->telefono; ?>" required><br><br>

    Correo: <input type="email" name="correo" value="<?php echo $contacto->correo; ?>"><br><br>

    Red Social:
    <select name="red">
    <option value="Facebook" <?php if($contacto->red == "Facebook") echo "selected"; ?>>Facebook</option>
    <option value="Instagram" <?php if($contacto->red == "Instagram") echo "selected"; ?>>Instagram</option>
    <option value="Twitter" <?php if($contacto->red == "Twitter") echo "selected"; ?>>Twitter</option>
    </select>
    <br><br>
    Usuario Red: <input type="text" name="usuarioRed" value="<?php echo $contacto->usuarioRed; ?>"><br><br>

    <button type="submit">Actualizar</button>
</form>

<br>
<a href="index.php">Regresar</a>

</body>
</html>