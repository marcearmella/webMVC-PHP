<?php

    class Conexion{

        static public function conectar(){

            #PDO("nombre de server ; nombre de DB" , "usuario" , "contraseña");
            $link = new PDO("mysql:host=localhost;dbname=repaso-php","root","");

            $link->exec("set names utf8");

            return $link;

        }

    }

?>