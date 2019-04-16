<?php require_once("../../config.php");

if(isset($_GET['id']))
{
    
    $query = query("SELECT * FROM orders WHERE order_id = '".escape_string($_GET['id'])."' ");
    confirm($query);
    
    while($row = fetch_array($query))
    {
        if($row['status'] == "not complete")
        {
            $status = "complete";
            $query1 = query("UPDATE orders SET status = '$status' WHERE order_id = '".escape_string($_GET['id'])."' ");
            confirm($query1);
            
            $query2 = query("UPDATE ordered_product SET status = '$status' WHERE order_id = '".escape_string($_GET['id'])."' ");
            confirm($query2);
            
        }
        
        if($row['status'] == "complete")
        {
            $status = "not complete";
            $query1 = query("UPDATE orders SET status = '$status' WHERE order_id = '".escape_string($_GET['id'])."' ");
            confirm($query1);
            
            $query2 = query("UPDATE ordered_product SET status = '$status' WHERE order_id = '".escape_string($_GET['id'])."' ");
            confirm($query2);
            
        }
    }
    
    set_message("Status Changed");
    redirect("../../../public/admin/index.php?orders");
    
}

else
{
    redirect("../../../public/admin/index.php?orders");
}





?>