<?php 

require 'db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $statement = $conexion->prepare('DELETE FROM task WHERE id = :id');
    $statement->execute(array(':id'=>$id));
    $resultado = $statement->fetch();

    // si no existe resultado
    if(!$resultado){
        $errores .='Error al eliminar';
    }
    
    $_SESSION['message']='Task Removed Successfully';
    $_SESSION['message_type']= 'danger';
    header("Location: index.php");
}


?>