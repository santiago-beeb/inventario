<?php
include("var.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anionymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anionymous">
    <title>Eliminar Instrumento</title>
</head>

<body>
<div class="container">

<h1>Eliminar Instrumento</h1>
    <?php
        $conexion;
        $registros = mysqli_query($conexion, "select * from ins_registroInstrumento
        where reg_id = '$_POST[insEliminar]'")
        or die ("Problemas base de datos");
        if ($reg = mysqli_fetch_array($registros)){
            mysqli_query($conexion, "delete from ins_registroInstrumento
            where reg_id ='$_POST[insEliminar]'")
            or die ("Problemas eliminando instrumento");
            echo "El instrumento fue eliminado";
            header("Location: index.php");
        }else{
            echo"No se encontro el instrumento";
        }
        mysqli_close($conexion);
?>
</div>
</body>
</html>