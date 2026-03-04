<?php
$xml = simplexml_load_file("contactos.xml");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Búsqueda de Contactos</title>

    <script>
        function mostrarCampo() {
            var criterio = document.querySelector('input[name="criterio"]:checked').value;

            if (criterio == "nombre") {
                document.getElementById("campoNombre").style.display = "block";
                document.getElementById("campoTipo").style.display = "none";
            } else {
                document.getElementById("campoNombre").style.display = "none";
                document.getElementById("campoTipo").style.display = "block";
            }
        }
    </script>
</head>
<body>

<h2>Búsqueda de Contactos</h2>

<form method="POST">

    <input type="radio" name="criterio" value="nombre" onclick="mostrarCampo()" required> Nombre
    <input type="radio" name="criterio" value="tipo" onclick="mostrarCampo()"> Tipo

    <br><br>

    <div id="campoNombre" style="display:none;">
        Nombre: <input type="text" name="nombre">
    </div>

    <div id="campoTipo" style="display:none;">
        Tipo:
        <select name="tipo">
            <option value="Trabajo">Trabajo</option>
            <option value="Escuela">Escuela</option>
            <option value="Amigo">Amigo</option>
            <option value="Familia">Familia</option>
        </select>
    </div>

    <br>
    <button type="submit" name="buscar">Buscar</button>
</form>

<br><br>

<?php
if(isset($_POST['buscar'])){

    echo "<table border='1'>";
    echo "<tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Red</th>
            <th>Usuario</th>
            <th>Correo</th>
            <th>Tipo</th>
          </tr>";

    foreach($xml->contacto as $c){

        if($_POST['criterio'] == "nombre"){
            
            if(stripos($c->nombre, $_POST['nombre']) !== false){
                echo "<tr>";
                echo "<td>".$c->nombre."</td>";
                echo "<td>".$c->telefono."</td>";
                echo "<td>".$c->red."</td>";
                echo "<td>".$c->usuarioRed."</td>";
                echo "<td>".$c->correo."</td>";
                echo "<td>".$c->tipo."</td>";
                echo "</tr>";
            }

        } else {

            if($c->tipo == $_POST['tipo']){
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
    }

    echo "</table>";
}
?>

<br><br>
<a href="index.php">
    <button type="button">Regresar</button>
</a>

</body>
</html>