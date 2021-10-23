<?php

    if(!isset($_SESSION["sessionActive"])){

        echo '<script>window.location = "index.php?link=registro";</script>';

        return;

    }else{

        if($_SESSION["sessionActive"] != "ok"){

            echo '<script>window.location = "index.php?link=registro";</script>';

            return;
        }

    }

    $usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);

?>

<main class="main table-users">

    <h1> Usuarios </h1>
    <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Fecha de registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($usuarios as $key => $value): ?>

                    <tr>      
                        <td><?php echo $value['nombre']; ?></td>
                        <td><?php echo $value['email']; ?></td>
                        <td><?php echo $value['fecha_registro']; ?></td>
                        <td class="table-links">
                            <a href="index.php?link=editar-usuario&id=<?php echo $value['id']; ?>" class="btn-table" id="btn-edit-user"><i class="fas fa-user-edit"></i>Editar</a>
                            <form method="post">
                                
                                <input type="hidden" value="<?php echo $value["id"]; ?>" name="eliminarUsuario">

                                <button type="submit" class="btn-table" id="btn-delete-user"><i class="fas fa-user-slash"></i>Eliminar</button>

                                <?php
                                
                                $eliminar = new ControladorFormularios();
                                $eliminar->ctrEliminarRegistro();

                                ?>

                            </form>
                        </td>
                    </tr>

                <?php endforeach; ?>

                
            </tbody>
        </table>

</main>