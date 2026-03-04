<?php
$xml = simplexml_load_file("contactos.xml");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agenda de Contactos</title>
</head>
<body>

<h2>Agenda de Contactos</h2>

<!-- FORMULARIO AGREGAR -->
<form method="POST" action="agregar.php">
    Nombre: <input type="text" name="nombre" required><br><br>

    Tipo:
    <select name="tipo" required>
        <option value="Trabajo">Trabajo</option>
        <option value="Escuela">Escuela</option>
        <option value="Amigo">Amigo</option>
        <option value="Familia">Familia</option>
    </select><br><br>

    Teléfono: <input type="text" name="telefono" maxlength="10" required><br><br>

    Correo: <input type="email" name="correo"><br><br>

    Red Social:
    <select name="red">
        <option value="Facebook">Facebook</option>
        <option value="Instagram">Instagram</option>
        <option value="Twitter">Twitter</option>
    </select><br><br>

    Usuario Red: <input type="text" name="usuarioRed"><br><br>

    <button type="submit">Agregar</button>
</form>

<br><br>

<!-- BUSCAR -->
<form method="POST" action="buscar.php">
    Buscar por nombre:
    <input type="text" name="buscar" required>
    <button type="submit">Buscar</button>
</form>

<br><br>

<h3>Lista de Contactos</h3>

<table border="1">
<tr>
    <th>Nombre</th>
    <th>Teléfono</th>
    <th>Red</th>
    <th>Usuario</th>
    <th>Correo</th>
    <th>Tipo</th>
    <th>Modificar</th>
    <th>Eliminar</th>
</tr>

<?php
foreach($xml->contacto as $c){
    echo "<tr>";
    echo "<td>".$c->nombre."</td>";
    echo "<td>".$c->telefono."</td>";
    echo "<td>".$c->red."</td>";
    echo "<td>".$c->usuarioRed."</td>";
    echo "<td>".$c->correo."</td>";
    echo "<td>".$c->tipo."</td>";
    echo "<td><a href='modificar.php?telefono=".$c->telefono."'>Modificar</a></td>";
    echo "<td><a href='eliminar.php?telefono=".$c->telefono."' onclick='return confirm(\"¿Seguro que deseas eliminar?\")'>Eliminar</a></td>";
    echo "</tr>";
}
?>

</table>

<br>
<a href="contactos.xml">Ver Archivo XML</a>

</body>
</html>