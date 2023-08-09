<?php
    require_once("connection.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <title>View Post</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
        <a href="addPost.php" class="btn btn-primary" >Add Post</a>
  <div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>image</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM posts";
                $result = mysqli_query($conn,$sql);
                $fetch = FETCH_SRC;
                $count = 1;
                while($row = mysqli_fetch_assoc($result)){
                    echo <<< posts
                    <tr>
                        <td scope="row">$count</td>
                        <td>$row[title]</td>
                        <td>$row[category]</td>
                        <td><img src="$fetch$row[image]" width ="150px"></td>
                        <td>$row[description]</td>
                        <td>
                            <a href="editposts.php?edit=$row[id]" class="btn btn-warning" >Edit</a>
                            <button onclick = "confirm_rem($row[id])" class="btn btn-primary">Delete</button>
                        </td>

                    </tr>

                    posts;
                    $count++;
                }
            ?>
          
        </tbody>
    </table>
  </div>

  <script>
    function confirm_rem(id){
        if(confirm("Are you sure you want to delete this item?")){
            window.location.href = "deleteposts.php?rem="+id;
        }
    }
  </script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>