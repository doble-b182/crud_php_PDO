<?php

require'db.php';

$errores = '';



if(isset($_POST["save_task"])){
    $title = $_POST['title'];
    $description = $_POST['description'];

    $statement = $conexion->prepare("INSERT INTO task (title, description) VALUES (:title, :description)" );
    $statement->execute(array(
        ':title'=>$title,
        ':description'=>$description
    ));
    // echo '<h2> Datos Ingresados</h2>';
    //mostrar y pintar el mensaje al guardar los datos
    $_SESSION['message'] = 'Tasl saved succesfully';
    $_SESSION['message_type'] = 'success';


    header('location: index.php');

}else{
    echo $errores .= '<h2> Error al Ingresar datos</h2>';
};

?>