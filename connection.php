<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "basicblog";

    $conn = mysqli_connect($servername,$username,$password,$database);

    if(!$conn){
        die("Connection Not Established");
    }
    define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/basicblog/uploads/");
    define("FETCH_SRC","http://127.0.0.1/basicblog/uploads/");

?>