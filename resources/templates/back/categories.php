
<?php

if (isset($_POST['submit'])) { 

    $title = escape_string($_POST['title']);
    
    $query = query("INSERT INTO category (cat_title) VALUEs ('$title') ");
    
    confirm($query);
}





?>

<h1 class="page-header">
  Product Categories
    
    <h4 class="bg-success"><?php display_message(); ?></h4>

</h1>


<div class="col-md-4">
    
    <form action="" method="post">

    <div class="form-group">
        <label for="category-title">Title</label>
        <input type="text" name="title"class="form-control" id="title">
                                   
    </div>

        <div class="form-group">
            
            <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
        </div>      


    </form>


</div>


<div class="col-md-8">

    <table class="table">
            <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
        </tr>
            </thead>


    <tbody>
        <?php display_categories(); ?>

    </tbody>

        </table>

</div>

