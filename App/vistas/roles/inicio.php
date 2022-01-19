<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['roles'] as $lor): ?>
                <tr>
                    <td><?php echo $lor->id_rol ?></td>
                    <td><?php echo $lor->rol ?></td>
                    <td>
                        <a href="<?php echo RUTA_URL?>/roles/editar/<?php echo $lor->id_rol ?>">Editar</a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="<?php echo RUTA_URL?>/roles/borrar/<?php echo $lor->id_rol ?>">Borrar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <div class="col text-center">
        <a class="btn btn-success" href="<?php echo RUTA_URL?>/roles/agregar/">+</a>
    </div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>