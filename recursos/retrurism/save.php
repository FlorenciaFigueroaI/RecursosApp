<?php

    $user_name = 'root';
    $user_pass = '';
    $host_name = 'localhost';
    $db_name = 'retrurism';

    $con = mysqli_connect($host_name,$user_name,$user_pass,$db_name);

    if($con)
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $apodo = $_POST['apodo'];
        $sql = "INSERT INTO autor (nombre, apellido, apodo) VALUES ('$nombre', '$apellido', '$apodo')";

        if(mysqli_query($con,$sql))
        {
            echo json_encode(array('response'=>'Usuario creado'));

        }else
        {
            echo json_encode(array('response'=>'Error al crear al usuario'));

        }
    }
    else 
    {
        echo json_encode(array('response'=>'Error al crear al usuario'));
   
    }

    mysqli_close($con);

?>