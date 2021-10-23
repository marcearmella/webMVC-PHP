<?php

    if(isset($_GET['id'])){

        $item = 'id';
        $valor = $_GET['id'];
        $usuario = ControladorFormularios::ctrSeleccionarRegistros($item,$valor);
    }

?>


<main class="main">

    <div class="contenedor-form">
        <form class="form" method="post">
            <div class="form-group">
                <label for="nombre">Usuario:</label>
                <div class="cont-icon-input">
                    <div class="form-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <input type="text" value="<?php  echo $usuario['nombre']; ?>" class="form-input" id="nombre" name="actualizarNombre">
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <div class="cont-icon-input">
                    <div class="form-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <input type="email" value="<?php  echo $usuario['email']; ?>" class="form-input" id="email" name="actualizarEmail">
                </div>
            </div>
            <div class="form-group">
                <label for="pwd">Contraseña:</label>
                <div class="cont-icon-input">
                    <div class="form-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input type="password" class="form-input" id="pwd" name="actualizarPassword">
                    <input type="hidden" name="passwordActual" value="<?php  echo $usuario['password']; ?>">
                    <input type="hidden" name="idUsuario" value="<?php  echo $usuario['id']; ?>">
                </div>
            </div>
            <?php
  
            $actualizar = ControladorFormularios::ctrActualizarRegistro();

            if($actualizar == 'ok'){

                echo'<script>
                    if( window.history.replaceState){
                        window.history.replaceState(null,null,window.location.href);
                    }
                </script>';
                echo '<div class="form-group alert-success">El usuario fué actualizado.</div>
                
                <script>
                    setTimeout(function(){

                        window.location = "index.php?link=usuarios";

                    },2000);
                </script>
                    
                ';

            }
                
            ?>
            <div class="form-group">
                <button type="submit" class="form-button">Actualizar</button>
            </div>
        </form>
    </div>
</main>
