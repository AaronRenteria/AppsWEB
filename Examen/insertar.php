<?php

include("conexion.php");

$con = conectar();

$marca = $_POST['Marca'];
$modelo = $_POST['Modelo'];
$anio = $_POST['Anio'];
$precio = $_POST['Precio'];

$sql = "INSERT INTO carros (Marca, Modelo, Anio, Precio)
        VALUES ('$marca', '$modelo', '$anio', '$precio')";

$query = mysqli_query($con, $sql);

if ($query) {

    header("Location: index.php");

} else {

    echo "Error al insertar el carro";

}

?>