<main class="main">

    <h1>inicio de sesion</h1>
    <div class="contenedor-form">
        
        <form link="" method="post">

            <div class="form-group">
                <label for="ingUsuario">Usuario:</label>
                <div class="cont-icon-input">
                    <div class="form-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <input type="text" class="form-input" id="ingUsuario" name="ingresoUsuario">
                </div>
            </div>

            <div class="form-group">
                <label for="pass">Contraseña:</label>
                <div class="cont-icon-input">
                    <div class="form-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input type="password" class="form-input" id="pass" name="ingresoPassword">
                </div>
            </div>
            <?php

            $ingreso = new ControladorFormularios;
            $ingreso->ctrIngreso();
                
            ?>
            <div class="form-group">
                <button type="submit" class="form-button">Ingresar</button>
            </div>

        </form>
    </div>

</main>