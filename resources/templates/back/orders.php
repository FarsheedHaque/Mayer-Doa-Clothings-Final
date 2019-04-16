           

<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Orders

</h1>
    
<h4 class="bg-success"><?php display_message(); ?></h4>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>ID</th>
           <th>Amount</th>
           <th>Transaction ID</th>
           <th>City</th>
           <th>Area</th>
           <th>Road No.</th>
           <th>House No.</th>
           <th>Status</th>
          <th>Change Status</th>
           <th>Entry Date</th>
           <th>Buyer ID</th>
      </tr>
    </thead>
    <tbody>

        <?php display_orders(); ?>

    </tbody>
</table>
</div>

