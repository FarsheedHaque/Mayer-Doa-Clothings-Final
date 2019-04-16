<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATES_FRONT.DS."header.php"); ?>



<?php

if(isset($_GET['tx']))
{
    $amount = $_GET['amt'];
    $date = $_GET['dt'];
    $transaction = $_GET['tx'];
    $status = $_GET['st'];
    $city = $_GET['ct'];
    $area = $_GET['ar']; 
    $road = $_GET['rd']; 
    $house = $_GET['hs'];
    
    $b_id;
    
    $query = query("INSERT INTO orders (amount, transaction_id, city, area, road, house, entry_date, status, buyer_id) VALUES('$amount', '$transaction', '$city', '$area', '$road', '$house', '$date', '$status', '$_SESSION[buyer_id]')");
    
    confirm($query); 
    
    $query1 = query("SELECT order_id FROM orders WHERE transaction_id='$transaction'");
    
    confirm($query1); 
    
    while($row = fetch_array($query1))
    {
        $b_id = $row['order_id'];
    }
    
   after_math($b_id, $status);
}

else
{
    redirect("checkout.php");
}

//http://localhost/ISD/public/thank_you.php?tx=27456612&amt=765&dt=3417&st=completed

?>






    <!-- Page Content -->
    <div class="container">
        <h1 class="text-center">THANK YOU</h1>
        
</div>


<?php

include(TEMPLATES_FRONT.DS."footer.php");

?>
