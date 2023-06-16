<?php 
function conectarDB() : mysqli
{
    $db = mysqli_connect('localhost','root','','notapromedio');
    if(!$db){
        echo "Error";
        exit;
    }
    return $db;
}
?>