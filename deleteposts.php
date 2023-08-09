<?php 
require_once("connection.php");
function image_upload($img){
    $tmp_loc = $img['tmp_name'];
    $new_name = random_int(11111,99999).$img['name'];
    $new_loc = UPLOAD_SRC.$new_name;
    if(!move_uploaded_file($tmp_loc,$new_loc)){
      echo "image does not uploaded";
    }
    else{
      return $new_name;
    }
  }

  function image_remove($img){
    if(!unlink(UPLOAD_SRC.$img)){
        echo "image not uploaded";
    }
  }

  if(isset($_GET['rem']) && $_GET['rem'] > 0){
    $sql = "SELECT * FROM posts WHERE id = '$_GET[rem]'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    image_remove($row['image']);

    $sql = "DELETE FROM posts where id = '$_GET[rem]'";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("location:viewpost.php");
    }

  }


?>