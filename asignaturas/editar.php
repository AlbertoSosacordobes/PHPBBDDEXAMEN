<?php
require_once('../plantillas/cabecera.php');

if (!isset($_GET['id'])) {
    header('Location:listado.php');
}

$consulta = "SELECT * FROM asignaturas WHERE id=".$_GET['id'];

$resultado = mysqli_query($conexion, $consulta);
// comprobamos el número de filas
if (mysqli_num_rows($resultado)==0) {
    // No hay ningún alumno con ese código
    $_SESSION['mensaje']='No se puede editar. No existe ninguna asignatura con el id '.$_GET['id'];
    header('Location:listado.php');
}
// recupoeramos los datos de la asignatura a modificar

$fila = mysqli_fetch_array($resultado);
$id = $fila['id'];
$nombre=$fila['nombre'];
$tipo=$fila['tipo'];
$creditos=$fila['creditos'];
$curso = $fila['curso'];

?>

<article>
    <h2>Editar los datos de un alumno</h2>

     <form action="actualizar.php" method="post">
        <div class="control mb-3">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required value="<?=$nombre?>" class="form-control">
        </div>

        <div class="control mb-3">
            <label for="tipo" class="col-sm-2 col-form-label">Tipo:</label>
            <select name="tipo" id="tipo" class="form-select form-select-lg">
                <option value="TRONCAL" <?=($tipo=="TRONCAL"?"SELECTED":"")?>>Troncal</option>
                <option value="OBLIGATORIA" <?php if($tipo=="OBLIGATORIA") echo "SELECTED"?>>Obligatoria</option>
                <option value="OPTATIVA" <?php if($tipo=="OPTATIVA") echo "SELECTED"?>>Optativa</option>
            </select>
        </div>

        <div class="control mb-3">
            <label for="creditos" class="col-sm-2 col-form-label">Créditos:</label>
            <input type="number" name="creditos" id="creditos" value="<?=$creditos?>" step="0.5" min="0.5" max="15"  class="form-control">
        </div>

        <div class="control mb-3">
            <label for="curso" class="col-sm-2 col-form-label">Curso:</label>
            <input type="number" name="curso" id="curso" min="1" max="4" step="1" value="<?=$curso?>" class="form-control">
        </div>

        <div class="control mb-3">
            <input type="submit" value="Editar Asignatura">
        </div>

<!-- Colocamos en el formulario un campo oculto con la información del id del alumno a editar, esto hace que en el envío del formulario se envíe el dato -->
        <input type="hidden" name="id" value="<?=$id?>">

    </form>
</article>

<?php
require_once('../plantillas/pie.php');
?>
