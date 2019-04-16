           

<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Ordered Products

</h1>
    
<h4 class="bg-success"><?php display_message(); ?></h4>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>ID</th>
          <th>Product ID</th>
           <th>Quantity</th>
           
           <th>Delivery Status</th>
           <th>Order ID</th>     
      </tr>
    </thead>
    <tbody>

        <?php display_ordered_products(); ?>

    </tbody>
</table>
</div>