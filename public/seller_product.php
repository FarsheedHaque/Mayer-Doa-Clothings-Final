<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATES_FRONT.DS."seller_header.php");   ?>





<div class="col-md-12">
<div class="row">
<h1 class="page-header"><br>
   All Products

</h1>
    
    
    
<h4 class="bg-danger"><?php display_message(); ?></h4>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>ID</th>
           <th>Title</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Description</th>
           <th>Image</th>
           <th>Category</th>       
      </tr>
    </thead>
    <tbody>

        <?php display_product_of_a_seller(); ?>

    </tbody>
</table>
</div>

<?php include(TEMPLATES_FRONT.DS."seller_footer.php");   ?>