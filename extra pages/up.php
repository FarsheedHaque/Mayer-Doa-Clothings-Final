<?php
if(isset($_POST['upload']))
{
    $name = $_FILES['file']['name'];
    $loc = $_FILES['file']['tmp_name'];
    $dir = "upload/".$name;
    
    move_uploaded_file($loc, $dir);
    
}

?>



<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
                    <label for="product-title">Product Image</label>
            <p><input type="file" name="file"></p>
            <p><input type="submit" name="upload" value="Upload Image"></p>
            
        </form>
    </body>
</html>