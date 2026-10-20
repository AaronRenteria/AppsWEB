<?php
include("conexion.php");
$conn = conectar();

$sql = "SELECT * FROM alumnos";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <main class="contenedor">
        <header class="encabezado">
            <h1>CRUD</h1>
            <p>Fromulario</p>
        </header>

        <section class="tabla-contenedor">
            <table>
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Nombre</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Edad</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['matricula']); ?></td>
                            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($row['apellido_p']); ?></td>
                            <td><?php echo htmlspecialchars($row['apellido_m']); ?></td>
                            <td><?php echo htmlspecialchars($row['edad']); ?></td>

                            <td class="acciones">
                                <a class="btn-editar"
                                    href="editar.php?matricula=<?php echo urlencode($row['matricula']); ?>">
                                    <span class="icono">✎</span>
                                    Editar
                                </a>

                                <a class="btn-eliminar"
                                    href="delete.php?matricula=<?php echo urlencode($row['matricula']); ?>"
                                    onclick="return confirm('¿Seguro que quieres eliminar este alumno?');">
                                    <span class="icono">×</span>
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <section class="formulario-contenedor">
            <h2>Registrar alumno</h2>
            <p class="descripcion">Completa los datos para agregar un nuevo alumno.</p>

            <form action="insertar.php" method="POST">
                <div class="formulario">
                    <input type="text" name="matricula" placeholder="Matrícula" required>
                    <input type="text" name="nombre" placeholder="Nombre" required>
                    <input type="text" name="apellido_p" placeholder="Apellido paterno" required>
                    <input type="text" name="apellido_m" placeholder="Apellido materno" required>
                    <input type="number" name="edad" placeholder="Edad" min="1" max="120" required>
                    <input type="submit" value="Registrar alumno">
                </div>
            </form>
        </section>
    </main>

</body>

</html>