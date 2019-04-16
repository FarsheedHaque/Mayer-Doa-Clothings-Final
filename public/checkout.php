<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATES_FRONT.DS."header.php"); ?>







    <!-- Page Content -->
    <div class="container">


<!-- /.row --> 

<div class="row">
    
    <h4 class="text-center bg-danger"><?php display_message(); ?></h4>

      <h1>Checkout</h1>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="businessjj@mail.com">
    <input type="hidden" name="currency_code" value="USD">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
     
          </tr>
        </thead>
        <tbody>
            <?php cart(); ?>     
    </tbody>
    </table>
<?php 
    if($_SESSION['logged_in'] == 1){
    
    echo show_checkout_button($_SESSION['city'], $_SESSION['area'], $_SESSION['road'], $_SESSION['house']); }
    
else
{
    $W = 0;
    $Y = 0;
    $O = 0;
    $P = 0;
    echo show_checkout_button($W, $Y, $O, $P );
}
    
    
    
    ?>
</form>
    
    
    
    
    
    
    
<!--  ***********CART DETAILS*************-->
    
    
    
    

    
    <div class="col-xs-4 pull-right ">
<h3>Cart Details</h3><br><br>

<table class="table table-bordered" cellspacing="0">
    
    <tr class="buyer-name">
    
<th>Name</th>
<td><span class="amount">
        <?php 
    if($_SESSION['logged_in'] == 1){
    echo $_SESSION['name']; }
    ?>
    </span></td>
</tr>

<tr class="cart-subtotal">
    
<th>Items:</th>
<td><span class="amount">
        <?php
    echo isset($_SESSION['item_quantity'])? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0";
    ?>
    </span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><span class="amount">
    <?php
    echo isset($_SESSION['item_total'])? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";
    ?>
    </span></td>
</tr>


</tbody>

</table>

</div>
        
        
        
        


<!--  ***********Shipping ADDRESSS*************-->
        
        
        
        
        
            
<div class="col-xs-4 pull-right ">
<h3>Shipping Address</h3>

<table class="table table-bordered" cellspacing="0">
    
    <tr class="city">
<th>City</th>
<td><span class="amount">
        <?php
    if($_SESSION['logged_in'] == 1){
    echo $_SESSION['city']; }
    ?>
    </span></td>
</tr>

<tr class="area">
<th>Area</th>
<td><span class="amount">
        <?php 
    if($_SESSION['logged_in'] == 1){
    
    echo $_SESSION['area']; }
     
    ?>
    </span></td>
</tr>
    
    <tr class="road">
<th>Road No</th>
<td><span class="amount">
    <?php
    if($_SESSION['logged_in'] == 1){
    echo $_SESSION['road']; }
    ?>
    </span></td>
</tr>


<tr class="house">
<th>House No</th>
<td><span class="amount">
    <?php
    if($_SESSION['logged_in'] == 1){
    echo $_SESSION['house']; }
    ?>
    </span></td>
</tr>
    
    
                  <div class="change_link"><br>
					<a href="address.php">Change Address</a>
				</div>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->


           <hr>

        <!-- Footer -->

<?php

include(TEMPLATES_FRONT.DS."footer.php");

?>
