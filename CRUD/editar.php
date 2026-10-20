<?php
include("conexion.php");
$conn = conectar();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $matricula_original = trim($_POST['matricula_original']);
    $matricula_nueva = trim($_POST['matricula_nueva']);
    $nombre = trim($_POST['nombre']);
    $apellido_p = trim($_POST['apellido_p']);
    $apellido_m = trim($_POST['apellido_m']);
    $edad = (int) $_POST['edad'];

    $sql = "UPDATE alumnos
            SET matricula = ?, nombre = ?, apellido_p = ?, apellido_m = ?, edad = ?
            WHERE matricula = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssssis",
        $matricula_nueva,
        $nombre,
        $apellido_p,
        $apellido_m,
        $edad,
        $matricula_original
    );

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: alumnos.php");
        exit();
    } else {
        if (mysqli_stmt_errno($stmt) == 1062) {
            $error = "Esa matrícula ya está registrada.";
        } else {
            $error = "No se pudieron guardar los cambios.";
        }
    }

    mysqli_stmt_close($stmt);

    $matricula = $matricula_original;

} else {

    if (!isset($_GET['matricula'])) {
        mysqli_close($conn);
        header("Location: alumnos.php");
        exit();
    }

    $matricula = trim($_GET['matricula']);

    $sql = "SELECT * FROM alumnos WHERE matricula = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $matricula);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);
    $alumno = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($stmt);

    if (!$alumno) {
        mysqli_close($conn);
        header("Location: alumnos.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alumno = [
        'matricula' => $_POST['matricula_nueva'],
        'nombre' => $_POST['nombre'],
        'apellido_p' => $_POST['apellido_p'],
        'apellido_m' => $_POST['apellido_m'],
        'edad' => $_POST['edad']
    ];
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar alumno</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <main class="contenedor">
        <section class="formulario-contenedor">

            <h2>Editar alumno</h2>
            <p class="descripcion">Modifica los datos del alumno seleccionado.</p>

            <?php if ($error != "") { ?>
                <p style="color: #dc2626; margin-bottom: 15px;">
                    <?php echo htmlspecialchars($error); ?>
                </p>
            <?php } ?>

            <form action="editar.php" method="POST">

                <input
                    type="hidden"
                    name="matricula_original"
                    value="<?php echo htmlspecialchars($_SERVER["REQUEST_METHOD"] == "POST" ? $matricula_original : $alumno['matricula']); ?>"
                >

                <div class="formulario">

                    <input
                        type="text"
                        name="matricula_nueva"
                        placeholder="Matrícula"
                        value="<?php echo htmlspecialchars($alumno['matricula']); ?>"
                        required
                    >

                    <input
                        type="text"
                        name="nombre"
                        placeholder="Nombre"
                        value="<?php echo htmlspecialchars($alumno['nombre']); ?>"
                        required
                    >

                    <input
                        type="text"
                        name="apellido_p"
                        placeholder="Apellido paterno"
                        value="<?php echo htmlspecialchars($alumno['apellido_p']); ?>"
                        required
                    >

                    <input
                        type="text"
                        name="apellido_m"
                        placeholder="Apellido materno"
                        value="<?php echo htmlspecialchars($alumno['apellido_m']); ?>"
                        required
                    >

                    <input
                        type="number"
                        name="edad"
                        placeholder="Edad"
                        min="1"
                        max="120"
                        value="<?php echo htmlspecialchars($alumno['edad']); ?>"
                        required
                    >

                    <input type="submit" value="Guardar cambios">

                </div>

            </form>

            <a href="alumnos.php" style="display: inline-block; margin-top: 20px; color: #2563eb; text-decoration: none;">
                Regresar a alumnos
            </a>

        </section>
    </main>

</body>
</html>