<?php
$xml = simplexml_load_file("contactos.xml");
$busqueda = strtolower($_POST['buscar']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Búsqueda</title>
</head>
<body>

<h2>Resultados de búsqueda</h2>

<table border="1">
<tr>
    <th>Nombre</th>
    <th>Teléfono</th>
    <th>Red</th>
    <th>Usuario</th>
    <th>Correo</th>
    <th>Tipo</th>
</tr>

<?php
foreach($xml->contacto as $c){
    if(strtolower($c->nombre) == $busqueda){
        echo "<tr>";
        echo "<td>".$c->nombre."</td>";
        echo "<td>".$c->telefono."</td>";
        echo "<td>".$c->red."</td>";
        echo "<td>".$c->usuarioRed."</td>";
        echo "<td>".$c->correo."</td>";
        echo "<td>".$c->tipo."</td>";
        echo "</tr>";
    }
}
?>

</table>

<br>
<a href="index.php">Regresar</a>

</body>
</html>