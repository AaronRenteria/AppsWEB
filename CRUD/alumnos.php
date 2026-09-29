<?php
include("conexion.php");
$con = conectar();

$sql = " SELECT * FROM alumnos";

$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Alumnos</title>
</head>

<body>

    <div style="display: flex; justify-content: space-between; align-items: flex-start;">

        <!-- TABLA DE ALUMNOS -->
        <div>
            <h1>TABLA DE ALUMNOS</h1>

            <table border="1">
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>125052409</td>
                        <td>Renteria</td>
                        <td>Garibay</td>
                        <td>Yoshua Aaron</td>
                        <td><a href="#">Editar</a></td>
                        <td><a href="#">Eliminar</a></td>
                    </tr>

                    <tr>
                        <td>125045467</td>
                        <td>Suarez</td>
                        <td>Cocilion</td>
                        <td>Leonardo Octavio</td>
                        <td><a href="#">Editar</a></td>
                        <td><a href="#">Eliminar</a></td>
                    </tr>
                    <tr>
                        <td>125053479</td>
                        <td>Camargo</td>
                        <td>Araujo</td>
                        <td>Juan Carlos</td>
                        <td><a href="#">Editar</a></td>
                        <td><a href="#">Eliminar</a></td>
                    </tr>
        </div>
        </tbody>
        </table>
    </div>


    <!-- FORMULARIO -->
    <div>
        <h1>Formulario</h1>

        <form>
            <input type="text" name="matricula" placeholder="Matrícula">

            <input type="text" name="nombre" placeholder="Nombre">

            <input type="text" name="apellido_paterno" placeholder="Apellido Paterno">

            <input type="text" name="apellido_materno" placeholder="Apellido Materno">

            <input type="submit" value="Guardar">
        </form>
    </div>

    </div>

</body>

</html>