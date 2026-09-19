<!-- <?php   
    echo "K rollo";
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        h1 {
            /* Texto */
            color: #00ffea;
        }

        div {
            /* Fondo */
            background: #ff5100;
        }

        /* Padding forma corta */
        .seccion{
            background-color: lightgreen;
            padding: 20px 40px;
        /* Margin forma corta*/
            margin: 20px;
        }

        /* padding y margin forma */
        .seccion2 {
            background-color: lightpink;
        /* Padding forma larga */
            padding-top: 20px;
            padding-right: 40px;
            padding-bottom: 20px;
            padding-left: 40px;

        /* Margin forma larga */
            margin-top: 20px;
            margin-right: 30px;
            margin-bottom: 40px;
            margin-left: 50px;
        }

        /* BORDES */

        .solid {
            background-color: lightblue;
            padding: 20px;
            margin: 20px;
            border: 5px solid black;
        }

        .dashed {
            background-color: lightgreen;
            padding: 20px;
            margin: 20px;
            border: 5px dashed black;
        }

        .dotted {
            background-color: lightpink;
            padding: 20px;
            margin: 20px;
            border: 5px dotted black;
        }

        .double {
            background-color: lightgray;
            padding: 20px;
            margin: 20px;
            border: 5px double black;
        }

        .groove {
            background-color: lightblue;
            padding: 20px;
            margin: 20px;
            border: 5px groove black;
        }

        .ridge {
            background-color: lightgreen;
            padding: 20px;
            margin: 20px;
            border: 5px ridge black;
        }

        .inset {
            background-color: lightpink;
            padding: 20px;
            margin: 20px;
            border: 5px inset black;
        }

        .outset {
            background-color: lightgray;
            padding: 20px;
            margin: 20px;
            border: 5px outset black;
        }

        .none {
            background-color: lightblue;
            padding: 20px;
            margin: 20px;
            border: 5px none black;
        }

        .hidden {
            background-color: lightgreen;
            padding: 20px;
            margin: 20px;
            border: 5px hidden black;
        }

    </style>
</head>

<body>
        <h1>Titulo</h1>

    <h1>Hola Crayola</h1>
    <h2>Hola Crayola</h2>
    <h3>Hola Crayola</h3>
    <h4>Hola Crayola</h4>
    <h5>Hola Crayola</h5>
    <h6>Hola Crayola</h6>
    
    <div>
        <h2>Titulo del parrafo</h2>

        <p>Este es un parrafo</p>  
    </div>

    <div class="seccion">
        <h2>Titulo del párrafo</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
            nisi ut aliquip ex ea commodo consequat.
        </p>
    </div>

    <!-- PADDING Y MARGIN FORMA LARGA -->
    <div class="seccion2">
        <h2>Titulo del párrafo</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
            nisi ut aliquip ex ea commodo consequat.
        </p>
    </div>

    <div class="solid">
        <h2>Solid</h2>
        <p>Ejemplo de borde solid.</p>
    </div>

    <div class="dashed">
        <h2>Dashed</h2>
        <p>Ejemplo de borde dashed.</p>
    </div>

    <div class="dotted">
        <h2>Dotted</h2>
        <p>Ejemplo de borde dotted.</p>
    </div>

    <div class="double">
        <h2>Double</h2>
        <p>Ejemplo de borde double.</p>
    </div>

    <div class="groove">
        <h2>Groove</h2>
        <p>Ejemplo de borde groove.</p>
    </div>

    <div class="ridge">
        <h2>Ridge</h2>
        <p>Ejemplo de borde ridge.</p>
    </div>

    <div class="inset">
        <h2>Inset</h2>
        <p>Ejemplo de borde inset.</p>
    </div>

    <div class="outset">
        <h2>Outset</h2>
        <p>Ejemplo de borde outset.</p>
    </div>

    <div class="none">
        <h2>None</h2>
        <p>Ejemplo de borde none.</p>
    </div>

    <div class="hidden">
        <h2>Hidden</h2>
        <p>Ejemplo de borde hidden.</p>
    </div>


</body>
</html>