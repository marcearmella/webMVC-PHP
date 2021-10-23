<?php

    require_once "conexion.php";

    class ModeloFormularios{

        # Registro
        static public function mdlRegistro($tabla, $datos){
            
            #prepare() Prepara una sentencia SQL para ser ejecutada por el metodo PDOStatement::execute().  La sentencia SQL puede contener cero o mas marcadores de parametros con nombres (:name) o signos de interrogacion (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parametros.
            #stmt : statement : declaracion
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,email,password)  VALUES(:nombre,:email,:password)");

            #bindParam()  Vincula una variable de PHP a un parametro de sustitucion con nombre o de signo de interrogacion correspondiente de la sentencia SQL que fue usada para prearar la sentencia
            $stmt->bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
            $stmt->bindParam(":email",$datos['email'],PDO::PARAM_STR);
            $stmt->bindParam(":password",$datos['password'],PDO::PARAM_STR);

            if($stmt->execute()){
                return 'ok';
            }else{
                print_r(Conexion::conectar()->errorInfo);
            }

            $stmt->close();
            $stmt = null;
            
        }

        # Seleccionar Registros
        static public function mdlSeleccionarRegistros($tabla, $item, $valor){

            if($item == null && $valor == null){

                $stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha_registro, '%d/%m/%Y') AS fecha_registro FROM $tabla ORDER BY id DESC");

                $stmt->execute();

                #fetchALL devuelve todos los registros de la tabla
                return $stmt->fetchALL();

            }else{

                $stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha_registro, '%d/%m/%Y') AS fecha_registro FROM $tabla WHERE $item = :$item ORDER BY id DESC");

                $stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);

                $stmt->execute();

                return $stmt->fetch();

            }

            

            #para mayor seguridad
            $stmt->close();
            $stmt = null;

        }

        # Actualizar Registro
        static public function mdlActualizarRegistro($tabla, $datos){

            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, email=:email, password=:password WHERE id = :id");

            $stmt->bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
            $stmt->bindParam(":email",$datos['email'],PDO::PARAM_STR);
            $stmt->bindParam(":password",$datos['password'],PDO::PARAM_STR);
            $stmt->bindParam(":id",$datos['id'],PDO::PARAM_INT);

            if($stmt->execute()){

                return 'ok';

            }else{
                print_r(Conexion::conectar()->errorInfo);
            }

            $stmt->close();
            $stmt = null;
            
        }

        # Eliminar Registro
        static public function mdlEliminarRegistro($tabla, $valor){

            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

            $stmt->bindParam(":id",$valor,PDO::PARAM_INT);

            if($stmt->execute()){

                return 'ok';

            }else{
                print_r(Conexion::conectar()->errorInfo);
            }

            $stmt->close();
            $stmt = null;
            
        }

    }