<?php
$xml = simplexml_load_file("contactos.xml");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estilos.css">
    <meta charset="UTF-8">
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
    <a href="buscar.php">
    <button type="button">Buscar</button>
    </a>
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

<footer>
    <p>Desarrollado por Martin Alejandro Acevedo Cisneros 22300967</p>
    <p>Trabajo académico CETI Tonalá 2026</p>
</footer>


</body>
</html>