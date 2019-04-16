
<?php require_once("../../config.php");

if(isset($_GET['id']))
{
    $query = query("DELETE FROM seller WHERE seller_id = '".escape_string($_GET['id'])."' ");
    confirm($query);
    
    set_message("Seller Deleted");
    redirect("../../../public/admin/index.php?sellers");
    
}

else
{
    redirect("../../../public/admin/index.php?sellers");
}





?>