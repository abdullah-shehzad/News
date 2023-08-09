<?php
    require_once("connection.php");

    if(isset($_GET['rem']) && $_GET['rem'] > 0){
        $sql = "SELECT * FROM categories WHERE id = '$_GET[rem]'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);

        $sql= "DELETE FROM categories WHERE id ='$_GET[rem]'";
        $result = mysqli_query($conn,$sql);

        if($result){
            header("location:viewCategory.php");
        }
    }


?>
