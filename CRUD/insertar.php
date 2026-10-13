<?php
include("Conexion.php");
$conn = conectar();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: alumnos.php");
    exit();
}

$matricula = trim($_POST['matricula'] ?? '');
$nombre = trim($_POST['nombre'] ?? '');
$apellido_p = trim($_POST['apellido_p'] ?? '');
$apellido_m = trim($_POST['apellido_m'] ?? '');
$edad = filter_var($_POST['edad'] ?? '', FILTER_VALIDATE_INT);

if ($matricula === '' || $nombre === '' ||
    $apellido_p === '' || $apellido_m === '' ||
    $edad === false || $edad < 1 || $edad > 120) {
    mysqli_close($conn);
    die("Verifica los datos del alumno.");
}

$sql = "INSERT INTO alumnos
        (matricula, nombre, apellido_p, apellido_m, edad)
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ssssi",
    $matricula,
    $nombre,
    $apellido_p,
    $apellido_m,
    $edad
);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: alumnos.php");
    exit();
}

if (mysqli_stmt_errno($stmt) == 1062) {
    echo "Error: esa matrícula ya está registrada.";
} else {
    echo "Error al insertar al alumno.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>