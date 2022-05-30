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
    <title>Busqueda</title>
</head>
<body>    
<div class='container'>
    <hr>
    <h1>Busqueda de Instrumentos</h1><hr>
       <?php
        $conexion;

        $registros = mysqli_query($conexion, "select reg_id, reg_cantidad,nom_instrumento,
        tpo_tipoInstrumento, reg_anioCompra, reg_observacion
        FROM ins_registroInstrumento
        JOIN ins_tipoInstrumento 
        on ins_registroInstrumento.reg_tipoInstrumento = ins_tipoInstrumento.tpo_id
        JOIN ins_nombreInstrumento
        on ins_registroInstrumento.reg_nombreInstrumento = ins_nombreInstrumento.nom_id
        where reg_nombreInstrumento like '%$_POST[datoBuscar]%'")
        or die('Problemas consultando datos');

        echo"<table class='table table-striped'>
        <tr>
            <th>id</th>
            <th>Nombre Instrumento</th>
            <th>Tipo Instrumento</th>
            <th>Fehca de Adquirido</th>
            <th>Cantidad</th>
            <th>Observaciones</th>
            <th></th>
            <th></th>
        </tr>";
        while($reg = mysqli_fetch_array($registros)){
            echo "<tr>".
                "<td>".$reg['reg_id']."</td>".
                "<td>".$reg['nom_instrumento']."</td>".
                "<td>".$reg['tpo_tipoInstrumento']."</td>".
                "<td>".$reg['reg_anioCompra']."</td>".
                "<td>".$reg['reg_cantidad']."</td>".
                "<td>".$reg['reg_observacion']."</td>"."<th>"."<form method='post' action='eliminaIns.php'>
                <input type='hidden' value='$reg[reg_id]' name='insEliminar' />
                <input type='submit' class='btn btn-danger' value='Eliminar'/>
                </form>
                </th><th>
                <form method='post' action='modificaIns.php'>
                <input type='hidden' value='$reg[reg_id]' name='insModificar' />
                <input type='submit' class='btn btn-warning' value='Modificar'/>
                </form>
                </th>";

            }
            mysqli_close($conexion);
        ?>

    </div>

</body>
<footer>
<a href='index.php' role='button' class='form-control btn btn-dark'>Menu Principal</a> 
</footer>
</html>