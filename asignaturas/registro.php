<?php
require_once('../plantillas/cabecera.php');
?>

<article>
    <h2>Dar de alta una asignatura</h2>

    <form action="insertar.php" method="post">
        <div  class="control mb-3">
            <label for="nombre"class="col-sm-2 col-form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required class="form-control">
        </div>

        <div  class="control mb-3">
            <label for="tipo"class="col-sm-2 col-form-label">Tipo:</label>
            <select name="tipo" id="tipo" class="form-select form-select-lg">
                <option value="TRONCAL">Troncal</option>
                <option value="OBLIGATORIA">Obligatoria</option>
                <option value="OPTATIVA">Optativa</option>
            </select>
        </div>

        <div  class="control mb-3">
            <label for="creditos"class="col-sm-2 col-form-label">Créditos:</label>
            <input type="number" name="creditos" id="creditos" value="6" step="0.5" min="0.5" max="15" class="form-control">
        </div>

        <div  class="control mb-3">
            <label for="curso"class="col-sm-2 col-form-label">Curso:</label>
            <input type="number" name="curso" id="curso" min="1" max="4" step="1" class="form-control">
        </div>

        <div  class="control mb-3">
            <input type="submit" value="Añadir Asignatura"   class="btn btn-primary">
        </div>

    </form>
</article>

<?php
require_once('../plantillas/pie.php');
?>
