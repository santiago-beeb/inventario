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
    <link rel="" href="var.php">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Inventario</title>
</head>

<body>
<div class="container">
        <hr>
        <h1>ABM Inventario</h1>
        <hr>
        <div class="container">
            <h3>Registro de Instrumentos</h3>
            <form method="post" action="registraInstrumento.php">
            <div class="form-group">
            <label>Instrumento</label><br>
            <select name="nombreInstrumento" class="form-control" value="<?php echo $registro['reg_nombreInstrumento']  ?>" required>
            <option></option>
                <?php
                       $conexion;
                        $registros = mysqli_query($conexion,"select * from ins_nombreInstrumento");
                        while($reg = mysqli_fetch_array($registros)) {
                            echo '<option value="'.$reg['nom_id'].'">'.$reg['nom_instrumento'].'</option>';
                        }
                ?>
            </select>
            </div>
                <div class="form-group">
                <label>Tipo de instrumento</label><br>
            <select name="tipoInstrumento" class="form-control" value="<?php echo $registro['reg_tipoInstrumento']  ?>" required>
            <option></option>
                <?php
                        $conexion;
                        $registros = mysqli_query($conexion,"select * from ins_tipoInstrumento");
                        while($reg = mysqli_fetch_array($registros)) {
                            echo '<option value="'.$reg['tpo_id'].'">'.$reg['tpo_tipoInstrumento'].'</option>';
                        }
                        ?>
            </select>
            </div>
            <div class="form-group">
                <label>Fecha de Adquirido</label>
                <input type="date" required name="anioCompra" class="form-control" />
            </div>

            <div class="form-group">
                <label>Cantidad</label>
                <input type="number" required name="cantidad" class="form-control" />
            </div>

            <div class="form-group">
                <label>Observaciones</label>
                <input type="" required name="observacion" class="form-control" />
            </div>
            <br>
            <div class="form-group">
                <input type="submit" value="Registrar instrumento" class="form-control btn btn-success btn-large">
            </div>
        </form>

        <br><hr>
            <h3>Busqueda Instrumento</h3>
            <form method="post" action="buscarEspecifico.php">
                <div class="form-group">
                    <label>Buscar Instrumento por medio del ID del instrumento</label>
                    <input type="text" name="datoBuscar" class="form-control" required /><br>
                    <input type="submit" value="Buscar" class="form-control btn btn-dark" />
                </div>
            </form>
            <br>
            <hr>
            <h3>Listado de Instrumentos</h3>

            <table class="table table-striped">
                <?php
             $conexion;
            $registros = mysqli_query($conexion, "select reg_id, reg_cantidad, nom_instrumento,nom_id, reg_nombreInstrumento, reg_tipoInstrumento,
            tpo_tipoInstrumento, reg_anioCompra, reg_observacion
            FROM ins_registroInstrumento
            JOIN ins_tipoInstrumento 
            on ins_registroInstrumento.reg_tipoInstrumento = ins_tipoInstrumento.tpo_id
            JOIN ins_nombreInstrumento
            on ins_registroInstrumento.reg_nombreInstrumento = ins_nombreInstrumento.nom_id"
            )
            or die('Problemas consultando datos');

            echo"<table class='table table-striped'>
            <tr>
                <th>id</th>
                <th>ID Instrumento</th>
                <th>Nombre Instrumento</th>
                <th>Tipo Instrumento</th>
                <th>Fehca de Adquirido</th>
                <th>Cantidad</th>
                <th>Observaciones</th>
                <th></th>
                <th></th>
            </tr>";



            while($dato = mysqli_fetch_array($registros)){
                echo "<tr>".
                    "<td>".$dato['reg_id']."</td>".
                    "<td>".$dato['nom_id']."</td>".
                    "<td>".$dato['nom_instrumento']."</td>".
                    "<td>".$dato['tpo_tipoInstrumento']."</td>".
                    "<td>".$dato['reg_anioCompra']."</td>".
                    "<td>".$dato['reg_cantidad']."</td>".
                    "<td>".$dato['reg_observacion']."</td>"."<th>"."<form method='post' action='eliminaIns.php'>
                    <input type='hidden' value='$dato[reg_id]' name='insEliminar' />
                    <input type='submit' class='btn btn-danger' value='Eliminar'/>
                    </form>
                    </th><th>
                    <form method='post' action='modificaIns.php'>
                    <input type='hidden' value='$dato[reg_id]' name='insModificar' />
                    <input type='submit' class='btn btn-warning' value='Modificar'/>
                    </form>
                    </th>";

                }
            mysqli_close($conexion);

        ?>
            </table>
            <hr>
            <footer class="container">
            <p class="float-end"><a class="btn btn-secondary" href="index.php">Volver Inicio</a></p>
                <p>º Todos los derechos reservados 2022 </p>
            </footer>
        </div>
</body>

</html>