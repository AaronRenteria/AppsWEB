<?php

include("conexion.php");

$con = conectar();

$sql = "SELECT * FROM carros";
$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Examen 1er Parcial</title>

    <link rel="stylesheet" href="estilos.css">

</head>

<body>

    <header>

        <div class="titulo">
            EXAMEN 1ER PARCIAL - APLICACIONES WEB
        </div>

    </header>


    <main>

        <section class="contenido">

            <article class="formulario">

                <div class="subtitulo">
                    REGISTRAR CARRO
                </div>

                <form action="insertar.php" method="POST">

                    <div class="campo">

                        <label for="Marca">
                            Marca
                        </label>

                        <input type="text" id="Marca" name="Marca" required>

                    </div>


                    <div class="campo">

                        <label for="Modelo">
                            Modelo
                        </label>

                        <input type="text" id="Modelo" name="Modelo" required>

                    </div>


                    <div class="campo">

                        <label for="Anio">
                            Año
                        </label>

                        <input type="number" id="Anio" name="Anio" required>

                    </div>


                    <div class="campo">

                        <label for="Precio">
                            Precio
                        </label>

                        <input type="number" id="Precio" name="Precio" required>

                    </div>


                    <div class="botones">

                        <button type="submit">
                            Guardar
                        </button>

                        <button type="reset">
                            Limpiar
                        </button>

                    </div>

                </form>

            </article>


            <article class="tabla">

                <div class="subtitulo">
                    Tabla de Carros
                </div>

                <table>

                    <tr>

                        <th>ID</th>

                        <th>MARCA</th>

                        <th>MODELO</th>

                        <th>AÑO</th>

                        <th>PRECIO</th>

                    </tr>


                    <?php

                    while ($carro = mysqli_fetch_assoc($query)) {

                        ?>

                        <tr>

                            <td>
                                <?php echo $carro['ID']; ?>
                            </td>

                            <td>
                                <?php echo $carro['Marca']; ?>
                            </td>

                            <td>
                                <?php echo $carro['Modelo']; ?>
                            </td>

                            <td>
                                <?php echo $carro['Anio']; ?>
                            </td>

                            <td>
                                $<?php echo number_format($carro['Precio']); ?>
                            </td>

                        </tr>

                        <?php

                    }

                    ?>

                </table>

            </article>

        </section>

        <section class="recursos">

            <article>

                <a href="Documentos\index.php" target="_blank">

                    <div>
                        R1 - Introducción a Git y GitHub
                    </div>

                    <div>
                        URL
                    </div>

                </a>

            </article>


            <article>

                <a href="Documentos\P2_CV.html" target="_blank">

                    <div>
                        R2 - HTML + CSS + Box Model
                    </div>

                    <div>
                        URL
                    </div>

                </a>

            </article>


            <article>

                <a href="Documentos\P1_Grid.html" target="_blank">

                    <div>
                        R3 - Flex y Grid
                    </div>

                    <div>
                        URL
                    </div>

                </a>

            </article>

        </section>


        <section class="informacion">

            <figure>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSu2IBIR_Tro5X5-qHa9uvEZUB7rgq95TI7CuCLUQtszg&s=10" alt="Por si no jala">
            </figure>
            <article>

                <div class="nombre">
                    Aaron (Chilango)
                </div>

                <div class="parrafo">

                    Mi experiencia durante estos 4 cuatrimestres
                    en la UPQ ha sido de aprendizajepero tambien tortura
                    como en las materias faciles de abracitos.
                    He adquirido conocimientos en diferentes áreas de
                    programación y desarrollo de aplicaciones web por parte de la escuela y de mi trabajo.

                </div>

            </article>

        </section>

    </main>

</body>

</html>