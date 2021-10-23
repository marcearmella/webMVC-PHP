<?php

    class MvcController{

        public function plantilla(){

            include "views/template.php";

        }

        public function enlacesPaginasController(){

            if(isset($_GET['link'])){

                $enlacesController = $_GET['link'];

            }else{

                $enlacesController = 'index';

            }
            
            $respuesta = Paginas::enlacesPaginasModel($enlacesController);

            include $respuesta;

        }

    }

?>