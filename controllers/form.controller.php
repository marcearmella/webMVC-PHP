<?php
    
    class ControladorFormularios{

        # Registro 
        static public function ctrRegistro(){
            
            if(isset($_POST['registroNombre'])) {
                $tabla = "registros";
                $datos = array("nombre"=>$_POST["registroNombre"],
                                "email"=>$_POST['registroEmail'],
                                "password"=>$_POST['registroPassword']);

                $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

                return $respuesta;
            }

        }

        #Seleccionar Registros
        static public function ctrSeleccionarRegistros($item, $valor){

            $tabla = "registros";

            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

            return $respuesta;

        }

        #Ingreso de usuario
        public function ctrIngreso(){

            if(isset($_POST['ingresoUsuario'])){

                $tabla = 'registros';
                $item = 'nombre';
                $valor = $_POST['ingresoUsuario'];

                $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

                if($respuesta['nombre'] == $_POST['ingresoUsuario'] && $_POST['ingresoUsuario'] != '' && $_POST['ingresoPassword'] != '' && $respuesta['password'] == $_POST['ingresoPassword']){

                    $_SESSION["sessionActive"] = "ok";

                    echo'<script>
                        if( window.history.replaceState){
                            window.history.replaceState(null,null,window.location.href);
                        }

                        window.location = "index.php?link=usuarios";

                    </script>';

                }else{
                    echo'<script>
                        if( window.history.replaceState){
                            window.history.replaceState(null,null,window.location.href);
                        }
                    </script>';
                    echo '<div class="form-group alert-error">Usuario no encontrado.</div>';
                }

            }

        }

        # Actualizar registros
        static public function ctrActualizarRegistro(){

            if(isset($_POST['actualizarNombre'])) {

                if($_POST['actualizarPassword'] != ''){

                    $password = $_POST['actualizarPassword'];

                }else{

                    $password = $_POST['passwordActual'];

                }

                $tabla = "registros";

                $datos = array( "id"=>$_POST['idUsuario'],
                                "nombre"=>$_POST["actualizarNombre"],
                                "email"=>$_POST['actualizarEmail'],
                                "password"=>$password);

                $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);

                return $respuesta;
                
            }

        }

        # Eliminar Registro
        static public function ctrEliminarRegistro(){

            if(isset($_POST['eliminarUsuario'])){

                $tabla = 'registros';
                $valor = $_POST['eliminarUsuario'];

                $respuesta  = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

                if($respuesta == 'ok'){

                    echo'<script>
                        if( window.history.replaceState){
                            window.history.replaceState(null,null,window.location.href);
                        }

                        window.location = "index.php?link=usuarios";

                    </script>';

                }

            }

        }

    }