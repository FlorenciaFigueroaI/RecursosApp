<?php

    $user_name = 'root';
    $user_pass = '';
    $host_name = 'localhost';
    $db_name = 'retrurism';

    $con = mysqli_connect($host_name,$user_name,$user_pass,$db_name);

    if($con)
    {
        $image = $_POST["image"];
        $titulo = $_POST["titulo"];
        $ciudad = $_POST["ciudad"];
        $anyo = $_POST["anyo"];
        $ruta = "images/$titulo.jpg";
        $sql = "INSERT INTO fotografia (titulo, ciudad, anyo, image) VALUES ('$titulo', '$ciudad', '$anyo','$ruta')";
      

        if(mysqli_query($con,$sql))
        {
            file_put_contents($ruta,base64_decode($image));
            echo json_encode(array('response'=>'Fotografía subida con éxito'));

        }else
        {
            echo json_encode(array('response'=>'Error al subir la fotografía'));

        }
    }
    else 
    {
        echo json_encode(array('response'=>'Error al subir la fotografía'));
   
    }

    mysqli_close($con);

?>