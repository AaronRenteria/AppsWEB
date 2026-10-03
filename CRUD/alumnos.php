<?php
include("Conexion.php");
$conn = conectar();

$sql = "SELECT * FROM alumnos";

//
$query = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Alumnos</title>
</head>

<body>
    <table border="2">
        <thead>
            <tr>
                <th>Matricula</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while($row = mysqli_fetch_array($query)){
            ?>
                    <tr> 
                        <td><?php echo $row['matricula']?></td>
                        <td><?php echo $row['nombre']?></td>
                        <td><?php echo $row['apellido_p']?></td>
                        <td><?php echo $row['apellido_m']?></td>
                        <td><?php echo $row['edad']?></td>
                    </tr>
                    <?php
                    } 
                    ?>
                
            <tr>
                <td>125052409</td>
                <td>Aaron</td>
                <td>Renteria</td>
                <td>Garibay</td>
                <td>18</td>
                <td>
                    <button type="button">Editar</button>
                    <button type="button">Eliminar</button>
                </td>
            </tr>
            <tr>
                <td>125052409</td>
                <td>Leonardo</td>
                <td>Suarez</td>
                <td>Cocilion</td>
                <td>21</td>
                <td>
                    <button type="button">Editar</button>
                    <button type="button">Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>
    <div>
        <h1>Formulario</h1>

        <form action="insertar.php" method="POST">
            <div style="display: flex; gap: 10px;">
                <input type="text" name="matricula" placeholder="Matricula">
                <input type="text" name="nombre" placeholder="Nombre">
                <input type="text" name="apellido_p" placeholder="Apellido Paterno">
                <input type="text" name="apellido_m" placeholder="Apellido Materno">
                <input type="text" name="edad" placeholder="Edad">
                <input type="submit" value="Enviar">
            </div>

        </form>
    </div>
</body>

</html>