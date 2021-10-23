<main class="main">

    <h1>Regístrate aquí</h1>

    <div class="contenedor-form">
        <form class="form" method="post">
            <div class="form-group">
                <label for="nombre">Usuario:</label>
                <div class="cont-icon-input">
                    <div class="form-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <input type="text" class="form-input" id="nombre" name="registroNombre">
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <div class="cont-icon-input">
                    <div class="form-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <input type="email" class="form-input" id="email" name="registroEmail">
                </div>
            </div>
            <div class="form-group">
                <label for="pwd">Contraseña:</label>
                <div class="cont-icon-input">
                    <div class="form-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input type="password" class="form-input" id="pwd" name="registroPassword">
                </div>
            </div>
            <?php

                // Forma en que se instancia la clase de un método no estático.
                /*$registro = new ControladorFormularios();
                $registro -> ctrRegistro();*/

                // Forma en que se instacia la clase de un  método  estático
                $registro = ControladorFormularios::ctrRegistro();
                
                if($registro == "ok"){
                    echo'<script>
                        if( window.history.replaceState){
                            window.history.replaceState(null,null,window.location.href);
                        }
                    </script>';
                    echo '<div class="form-group alert-success">El usuario fué registrado.</div>';
                }
                
            ?>
            <div class="form-group">
                <button type="submit" class="form-button">Enviar</button>
            </div>
        </form>
    </div>
    
</main>
