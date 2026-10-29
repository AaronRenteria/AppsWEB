<?php
include("conexion.php");
$conn = conectar();

if (isset($_GET['matricula'])) {
    $matricula = $_GET['matricula'];

    $sql = "DELETE FROM alumnos WHERE matricula = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $matricula);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: alumnos.php");
        exit();
    } else {
        echo "Error al eliminar el alumno.";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "No se recibió la matrícula.";
}

mysqli_close($conn);
?>