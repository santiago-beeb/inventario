<?php
include("var.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anionymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anionymous">
    <title>Registro de instrumento</title>
</head>

<body>
    <div class='container'>
        <h2>Regristro de Instrumentos</h2><br>
        <?php
        $conexion;
            mysqli_query($conexion, "insert into ins_registroInstrumento(
                reg_nombreInstrumento,
                reg_tipoInstrumento,
                reg_anioCompra,
                reg_cantidad,
                reg_observacion
                )
                values (
                '$_POST[nombreInstrumento]',
                '$_POST[tipoInstrumento]',
                '$_POST[anioCompra]',
                '$_POST[cantidad]',
                '$_POST[observacion]'
                )") 
                or die ("Problemas insertando datos en la tabla");
                header("Location: index.php");
            mysqli_close($conexion);
            echo "Instrumento registrado en la base de datos";
            echo "<br><br>";
            echo "<a href='index.php' role='button' class='form-control btn btn-dark'>Menu Principal</a>";

        ?>
    </div>
</body>
</html>