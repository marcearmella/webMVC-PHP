<?php

    class Paginas{

        static public function enlacesPaginasModel($enlacesModel){
            
            if($enlacesModel == "inicio-sesion" || 
               $enlacesModel == "usuarios" ||
               $enlacesModel == "nosotros" ||
               $enlacesModel == "contacto" ||
               $enlacesModel == "cerrar-sesion" ||
               $enlacesModel == "editar-usuario"){

                $module = 'views/modules/' . $enlacesModel . '.php';

            }else if($enlacesModel == 'index'){

                $module = 'views/modules/registro.php';

            }else{

                $module = 'views/modules/registro.php';

            }
            
            return $module;

        }

    }

?>