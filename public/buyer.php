<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATES_FRONT.DS."header.php"); ?>


<div class="col-md-12">
<h1 class="page-header">
      Account Information

</h1>
          <h2 class="text-center"><?php display_message(); ?></h2>

</div>

<div class="col-xs-6 pull-left ">


<table class="table table-unbordered" cellspacing="0">
    
        <tr class="buyer-name">
    
<th>ID</th>
<td><span class="amount">
        <?php echo $_SESSION['buyer_id'];
    ?>
    </span></td>
</tr>
    
    <tr class="buyer-name">
    
<th>Name</th>
<td><span class="amount">
        <?php echo $_SESSION['name'];
    ?>
    </span></td>
</tr>

<tr class="cart-subtotal">
    
<th>Date Of Birth</th>
<td><span class="amount">
        <?php
    echo $_SESSION['dob'];
    ?>
    </span></td>


<tr class="order-total">
<th>City</th>
<td><span class="amount">
    <?php
    echo $_SESSION['city'];
    ?>
    </span></td>
</tr>
    
    <tr class="order-total">
<th>Area</th>
<td><span class="amount">
    <?php
    echo $_SESSION['area'];
    ?>
    </span> </td>
</tr>
    
    <tr class="order-total">
<th>Road No.</th>
<td><span class="amount">
    <?php
    echo $_SESSION['road'];
    ?>
    </span></td>
</tr>
    
    <tr class="order-total">
<th>House No.</th>
<td><span class="amount">
    <?php
    echo $_SESSION['house'];
    ?>
    </span></td>
</tr>
    
    <tr class="order-total">
<th>Phone No.</th>
<td><span class="amount">
    <?php
    echo $_SESSION['phone'];
    ?>
    </span></td>
</tr>
    
    <tr class="order-total">
<th>Email</th>
<td><span class="amount">
    <?php
    echo $_SESSION['email'];
    ?>
    </span></td>
</tr>
    <th><br><a href="edit_buyer.php">Edit</a></th>
<td><strong><span class="amount">
    
  

    </span></strong> </td>
</tr>
    


</tbody>

</table>

</div>







<?php include(TEMPLATES_FRONT.DS."footer.php");   ?>