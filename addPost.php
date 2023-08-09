<?php 
    require_once("connection.php");

    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $categories[] = $row;
      }
    
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

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $category = $_POST['category'];
        $image = image_upload($_FILES['image']);
        $description = $_POST['description'];

        $sql = "INSERT INTO posts (title,category,image,description) VALUES ('$title','$category','$image','$description')";

        $result = mysqli_query($conn,$sql);
        if($result){
            header("location:viewpost.php");
        }
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Add Posts</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

        <div class="container">
            <form action="" method="post" enctype="multipart/form-data" >
                <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="category" id="">
                        <?php
                            if ($categories) {
                                foreach ($categories as $category) {
                                    ?>
                                    <option value="<?php echo $category['name'] ?>" ><?php echo $category['name'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                </div>
                <div class="form-group">
                  <label for="">Image</label>
                  <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea class="form-control" name="description" id="" rows="3"></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Add</button>
            </form>
            <a href="addCategory.php" class="btn btn-warning  m-2 ">Add Category</a>
        </div>

      
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>