<?php

namespace App\Database;
class QueryBuilder{
    private $selectables=[];
    private $table;
    private $whereClause;
    private $limit;
    protected $pdo;

    function __construct($pdo)
    {
        $this->pdo=$pdo;
    }

    function selectAll($table){
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS);
    }
    
    function insertTarea($nomTarea, $email_user){
        $statement = $this->pdo->prepare("INSERT into tarea (nomTarea, email_user) VALUES ('$nomTarea', '$email_user')");
        $statement->execute();
        #$prueba = $statement->fetchAll(\PDO::FETCH_CLASS);
    }

    function insertMateria($nombre, $emailProfesor, $cursoid){
        $statement = $this->pdo->prepare("INSERT into materias (nombre, profesor_id, curso_id) VALUES ('$nombre', '$emailProfesor', $cursoid)");
        $statement->execute();
    }

    function insertCurso($curso){
        $statement = $this->pdo->prepare("INSERT into curso (nombre) VALUES ('$curso')");
        $statement->execute();
    }

    function tipoAlumno($email){
        $statement = $this->pdo->prepare("select * from alumnos where '{$email}'=email");
        $statement->execute();
        $prueba = $statement->fetchAll(\PDO::FETCH_CLASS);
        $cantidad = count($prueba);
        if ($cantidad = 1){
        return $prueba;
        }
        else{
            return NULL;
        }
        
    }
    function tipoAdmin($email){
        $statement = $this->pdo->prepare("select * from admins where '{$email}'=email");
        $statement->execute();
        $resultado = $statement->fetchAll(\PDO::FETCH_CLASS);
        $cantidad = count($resultado);
        if ($cantidad = 1){
        return $resultado;
        }
        else{
            return NULL;
        }
        
    }

    function returnIDTarea($emailUser, $nomLista){
        $emailUser = "'" . $emailUser . "'";
        $nomLista = "'" . $nomLista . "'";
        $statement = $this->pdo->prepare("SELECT id FROM tarea WHERE email_user = $emailUser and nomTarea = $nomLista");
        $statement->execute();
        $resultado = $statement->fetchAll(\PDO::FETCH_CLASS);
        return $resultado;
    
    
    }

    function insertTaskitem($idListaSTR, $nomItem){
        $statement =  $this->pdo->prepare("INSERT INTO taskItem(list_id,nombreItem, completed) VALUES($idListaSTR, '$nomItem', 0)");
        $statement->execute();
    }

    function modificarCurso($curso, $nuevoNombre){
        $statement =  $this->pdo->prepare("UPDATE curso SET nombre = '$nuevoNombre' WHERE id = $curso");
        $statement->execute();
    }

    function modificarUsuario($tipo, $email, $nombre){
        $statement =  $this->pdo->prepare("UPDATE $tipo SET nombre = '$nombre' WHERE email = '$email'");
        $statement->execute();
    }

    function modificarMateria($materia, $nuevoNombre){
        $statement =  $this->pdo->prepare("UPDATE materias SET nombre = '$nuevoNombre' WHERE idmateria = $materia");
        $statement->execute();
    }

    function borrarCurso($curso){
        $statement =  $this->pdo->prepare("DELETE FROM curso WHERE id = $curso");
        $statement->execute();
    }

    function borrarMateria($materia){
        $statement =  $this->pdo->prepare("DELETE FROM materias WHERE idmateria = $materia");
        $statement->execute();
    }

    function eliminartaskItem($list_id){
        $statement =  $this->pdo->prepare("DELETE FROM taskItem WHERE list_id = $list_id");
        $statement->execute();
    }

    function eliminarTarea($remTarea){
        $remTarea = '"'.$remTarea.'"';
        $statement =  $this->pdo->prepare("DELETE FROM tarea WHERE nomTarea = $remTarea");
        $statement->execute();
    }

    function obtenerCurso($email_user){
        $email_user = "'" . $email_user . "'";
        $statement =  $this->pdo->prepare("SELECT curso_id FROM alumnos WHERE email = $email_user");
        $statement->execute();
        $resultado = $statement->fetchAll(\PDO::FETCH_CLASS);
        return $resultado;
    }
    
    function obtenerMaterias($curso){
        $curso = intval($curso);
        $statement =  $this->pdo->prepare("SELECT nombre FROM materias WHERE curso_id = $curso");
        $statement->execute();
        $resultado = $statement->fetchAll(\PDO::FETCH_CLASS);
        return $resultado;
    }

    function mostrarEjercicios($idlist){
        $statement = $this->pdo->prepare("SELECT nombreItem FROM taskItem WHERE list_id = $idlist");
        $statement->execute();
        $resultado = $statement->fetchAll(\PDO::FETCH_CLASS);
        return $resultado;
    }
    

    function tipoProfesor($email){
        try{
        $statement = $this->pdo->prepare("select * from profesor where '{$email}'=email");
        $statement->execute();
        $prueba = $statement->fetchAll(\PDO::FETCH_CLASS);
        $cantidad = count($prueba);
        if ($cantidad = 1){
        return $prueba;
        }
    else{
        return NULL;
    }}
        catch(\Exception $e){
            $prueba = NULL;
            return $prueba;
        }
    }

    function registerProfesor($email, $user, $passwd){
        $statement = $this->pdo->prepare("INSERT into profesor (email, nombre, passwd) VALUES ('$email', '$user', '" . md5($passwd) . "')");
        $statement->execute();

    }
    function registerAlumno($email, $user, $passwd, $curso_id){
        $statement2 = $this->pdo->prepare("INSERT into alumnos (email, nombre, passwd, curso_id) VALUES ('$email', '$user', '" . md5($passwd) . "', '$curso_id')");
        $statement2->execute();

    }

    function getCurso($nombreCurso){
        $statement = $this->pdo->prepare("select * from curso");
    }

    public function selec(){
        $this->selectables=func_get_args();
        return $this;
    }

    public function query($sql){
        return $stmt=$this->pdo->prepare($sql);
    }
}