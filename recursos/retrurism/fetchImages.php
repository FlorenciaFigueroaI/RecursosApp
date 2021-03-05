<?php

    $user_name = 'root';
    $user_pass = '';
    $host_name = 'localhost';
    $db_name = 'retrurism';

    $con = mysqli_connect($host_name,$user_name,$user_pass,$db_name);

    if($con)
    {  
         $sql = $con->prepare("SELECT * FROM fotografia");

         $sql -> execute();
         $sql -> bind_result($foto_id, $titulo, $ciudad, $anyo, $image);

         $fotografias = array();

         while ($sql -> fetch()){

            $temp = array();

            $temp['foto_id'] = $foto_id;
            $temp['titulo'] = $titulo;
            $temp['ciudad'] = $ciudad;
            $temp['anyo'] = $anyo;
            $temp['image'] = $image;

            array_push($fotografias, $temp);

         }
        
        
    }
   
    echo json_encode($fotografias);

    mysqli_close($con);

?>
