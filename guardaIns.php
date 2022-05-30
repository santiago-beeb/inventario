<?php
include("var.php");
$conexion;
            mysqli_query($conexion, "UPDATE `ins_registroinstrumento` 
            SET `reg_nombreInstrumento` = '$_POST[nuevoIns]',
            `reg_tipoInstrumento` = '$_POST[nuevoTipo]',
            `reg_anioCompra` = '$_POST[nuevoAnio]',
            `reg_cantidad` = '$_POST[nuevaCanti]',
            `reg_observacion` = '$_POST[nuevaObs]'
            where ins_registroinstrumento.reg_id = '$_POST[id]'
        ") or die("Problemas al actualizar el Instrumento");

        echo "<h6>Instrumento Actualizado</h6><br>";
        echo "<a class='form-control btn btn-dark' role='button' href='index.php'>Modificar otro instrumento</a><br>";
        header("Location: index.php");
        mysqli_close($conexion);

    ?>