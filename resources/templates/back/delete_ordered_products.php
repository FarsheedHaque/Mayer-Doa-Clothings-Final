<?php require_once("../../config.php");

if(isset($_GET['id']))
{
    $query = query("DELETE FROM ordered_product WHERE ordered_product_id = '".escape_string($_GET['id'])."' ");
    confirm($query);
    

    
    set_message("Order Product Deleted");
    redirect("../../../public/admin/index.php?ordered_products");
    
}

else
{
    redirect("../../../public/admin/index.php?ordered_products");
}




?>