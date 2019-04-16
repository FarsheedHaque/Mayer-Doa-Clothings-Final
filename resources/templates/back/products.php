           

<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Products

</h1>
    
<h4 class="bg-success"><?php display_message(); ?></h4>
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
           <th>Seller ID</th>
           <th>Category</th>       
      </tr>
    </thead>
    <tbody>

        <?php display_products(); ?>

    </tbody>
</table>
</div>


