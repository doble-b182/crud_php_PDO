<?php

session_start();


$errores ='';

try{

    $conexion = new PDO('mysql:host=127.0.0.1:33065; dbname=crud_php', 'root', '');
    // $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}

//  $statement = $conexion->query('SELECT * FROM task');
// if(isset($conexion)){
//     echo "conexion";
// foreach ($statement as $query) {
//     echo $query['description'];
// }
// }else{
//     echo $e;
// }


?>