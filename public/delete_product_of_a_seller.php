<?php require_once("../resources/config.php"); ?>


<?php


if(isset($_GET['id']))
{
    $status = "not complete";
    $query = query("SELECT * FROM ordered_product WHERE product_id = '".escape_string($_GET['id'])."' AND status = '$status' ");
    confirm($query);
    
    if(mysqli_num_rows($query) == 0)
    {
        $query1 = query("DELETE FROM product WHERE product_id = '".escape_string($_GET['id'])."' ");
        confirm($query1);
        
        set_message("Product is deleted");
        redirect("seller_product.php");
        
    }
    else
    {
        set_message("Product is in shipment, can not be deleted");
        redirect("seller_product.php");
    }
    

    
}

    else
    {

        redirect("seller.php");
    }



?>