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
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Modificar</title>
</head>
<body>
    <div class='container'>
        <hr>
        <h1>Modificar Instrumentos</h1><hr>
        <?php
        $conexion;
        $resultado = mysqli_query($conexion, "select * from  ins_registroinstrumento
        where reg_id = '$_POST[insModificar]'")
        or die("Problemas consultando datos");
        if($registro = mysqli_fetch_array($resultado)){
            ?>
        <form method="post" action="guardaIns.php">
            <input type="hidden" name="id" value="<?php echo $registro['reg_id']  ?>"><br>
            <label>Instrumento</label><br>
            <select name="nuevoIns" class="form-control" value="<?php echo $registro['reg_nombreInstrumento']?>"required><br><br>
            <?php
                        $conexion;
                        $registros = mysqli_query($conexion,"select reg_id,nom_instrumento
                        FROM ins_registroInstrumento
                        JOIN ins_nombreInstrumento
                        on ins_registroInstrumento.reg_nombreInstrumento = ins_nombreInstrumento.nom_id
                        where reg_id = '$_POST[insModificar]'");
                        while($reg = mysqli_fetch_array($registros)) {
                            echo '<option value="'.$reg['nom_id'].'">'.$reg['nom_instrumento'].'</option>';
                        }
                        $registros = mysqli_query($conexion,"select * from ins_nombreInstrumento");
                        while($reg = mysqli_fetch_array($registros)) {
                            echo '<option value="'.$reg['nom_id'].'">'.$reg['nom_instrumento'].'</option>';
                        }
                        ?>
            </select> <br>  

            <label>Tipo Instrumento</label><br>
            <select name="nuevoTipo" class="form-control" value="<?php echo $registro['reg_tipoInstrumento']  ?>" required>
            <?php
                        $conexion;
                        $registros = mysqli_query($conexion,"select reg_id, tpo_tipoInstrumento
                        FROM ins_registroInstrumento
                        JOIN ins_tipoInstrumento
                        on ins_registroInstrumento.reg_tipoInstrumento = ins_tipoInstrumento.tpo_id
                        where reg_id = '$_POST[insModificar]'");
                        while($reg = mysqli_fetch_array($registros)) {
                            echo '<option value="'.$reg['tpo_id'].'">'.$reg['tpo_tipoInstrumento'].'</option>';
                        }
                        $registros = mysqli_query($conexion,"select * from ins_tipoinstrumento");
                        while($reg = mysqli_fetch_array($registros)) {
                            echo '<option value="'.$reg['tpo_id'].'">'.$reg['tpo_tipoInstrumento'].'</option>';
                        }
                        ?>
            </select> <br>
            <label>Año de Compra</label><br>
            <input class="form-control" type="text" name="nuevoAnio"
                value="<?php echo $registro['reg_anioCompra']  ?>" required /><br>
                <label>Cantidad</label><br>
            <input class="form-control" type="number" name="nuevaCanti" value="<?php echo $registro['reg_cantidad']  ?>"
                required /><br><br>
            <label>Observaciones</label><br>
            <input class="form-control" type="text" name="nuevaObs" value="<?php echo $registro['reg_observacion']  ?>"
                required /><br><br>
            <input type="submit" class="form-control btn btn-warning" value="Actualizar Instrumento">
            <br><br><hr><a class="form-control btn btn-dark" role='button' href='index.php'>Volver atras</a><br><br>
        </form>

        <?php
    
        }else{
            echo"No se encontro el ID para la modificacion";    
        }
    
    
    
        ?>



    </div>

</body>

</html>
