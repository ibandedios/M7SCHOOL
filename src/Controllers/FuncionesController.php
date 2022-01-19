<?php
require 'conn.php';

function mostrarTareas($gdb){
    $email = $_COOKIE['iduser'];
    $stmt = $gdb->prepare("SELECT nomTarea FROM tarea WHERE email_user = '".$email."'");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $db_col[] = $row['nomTarea'];
        
    }
    if(isset($db_col)){
        return $db_col;
    }
    else{
        return NULL;
    }
}

function returnIDTarea($gdb, $emailUser, $nomLista){
    $emailUser = "'" . $emailUser . "'";
    $nomLista = "'" . $nomLista . "'";
    $query=("SELECT id FROM tarea WHERE email_user = $emailUser and nomTarea = $nomLista");
    $consulta = $gdb->prepare($query);
    $consulta->execute();
    while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $db_row[] = $row['id'];
        
    }
    return $db_row;


}

function mostrarTareasLocales($gdb, $emailUser){
    $emailUser = "'" . $emailUser . "'";
    $query=("SELECT id FROM tarea WHERE email_user = $emailUser and nomTarea = $nomLista");

}
function mostrarListID($gdb, $idLISTA){
    $consulta = $gdb->prepare("SELECT * FROM taskItem WHERE list_id = $idLISTA");
    return($consulta->execute());
}
function mostrarEjercicios($gdb, $idlist){
    $query = "SELECT nombreItem FROM taskItem WHERE list_id = $idlist";
    $stmt = $gdb->prepare($query);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $db_col[] = $row['nombreItem'];
        
    }
    return $db_col;
}


function eliminarTarea($gdb, $remTarea){
    $remTarea = '"'.$remTarea.'"';
    $query = "DELETE FROM tarea WHERE nomTarea = $remTarea";
    $consulta = $gdb->prepare($query);
    $consulta->execute();
}

function eliminartaskItem($gdb, $list_id){
    $query = "DELETE FROM taskItem WHERE list_id = $list_id";
    $consulta = $gdb->prepare($query);
    $consulta->execute();
}