<?php
    $server = "localhost";
    $user   = "root";
    $pass   = "";
    $bd     = "empresa";

    $conn   = mysqli_connect($server,$user,$pass,$bd); 

    if(!$conn)
    echo "erro";

    function messagem($text,$type)
    {
        echo "<div class='alert alert-$type' role='alert'> $text </div>";
    }

    function mostrar_data($data)
    {
        $v = explode('-', $data);
        return $v[2]."/".$v[1]."/".$v[0];
    }

?>