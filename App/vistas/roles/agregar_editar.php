<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<?php
    if (isset($datos['rol']->id_rol) && $datos['rol']->id_rol!=''){
        $accion = "Modificar";
    } else {
        $accion = "Agregar";
    }
?>

<a href=".." class="btn btn-light"><i class="bi bi-chevron-double-left"></i>Volver</a>

<div class="card bg-light mt-5 w-75 card-center" style=" margin: auto;">
    <h2 class="card-header"><?php echo $accion ?> Rol</h2>

    <form method="post" class="card-body">
        <div class="mb-3">
            <label for="rol">Id: <sup>*</sup></label>
            <input type="id" name="id" id="id" class="form-control form-control-lg" value="<?php echo $datos['rol']->id_rol ?>">
        </div>
        <div class="mb-3">
            <label for="rol">Rol: <sup>*</sup></label>
            <input type="rol" name="rol" id="rol" class="form-control form-control-lg" value="<?php echo $datos['rol']->rol ?>">
        </div>
        <input type="submit" class="btn btn-success" value="<?php echo $accion ?> Rol">
    </form>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>