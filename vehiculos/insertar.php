<?php

if (!isset($_POST['matricula'])) {
    // Mueve el navegador hasta otra página si no se llegadesde el formulario
    header('Location:registro.php');
}
require_once('../plantillas/cabecera.php');

    $matricula = $_POST['matricula'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $tipo = $_POST['tipo'];
    $color = $_POST['color'];
    $fecha_mat = $_POST['fecha_matriculacion'];
    $cilindrada = $_POST['cilindrada'];
    $itv_pas = $_POST['itv_pasada'];

    // controles sobre los valores o validaciones
    ?>

    <h2>vehiculo  a insertar</h2>
    <ul>
        <li>Matricula: <?=$matricula?></li>
        <li>Marca: <?=$marca?></li>
        <li>Modelo: <?=$modelo?></li>
        <li>Tipo: <?=$tipo?></li>
        <li>Color: <?=$color?></li>
        <li>Fecha de Matriculacion: <?=$fecha_mat?></li>
        <li>Cilindrada: <?=$cilindrada?></li>
        <li>ITV Pasada: <?=$itv_pas?></li>
    </ul>

    <?php 
        $consulta = 
            "insert into vehiculos(matricula, marca, modelo, tipo, color, fecha_matriculacion, cilindrada, itv_pasada) values('$matricula','$marca','$modelo', '$tipo', '$color', '$fecha_mat', '$cilindrada', '$itv_pas')";

           // ejecutamos la consulta
           $resultado = mysqli_query($conexion, $consulta);
           if ($resultado>0) {
                echo "<p>Se ha insertado la vehiculo satisfactoriamente</p>";
           } else {
                echo "<p class='error'> Error al insertar el vehiculo </p>";
           }
?>



<?php require_once('../plantillas/pie.php'); ?>