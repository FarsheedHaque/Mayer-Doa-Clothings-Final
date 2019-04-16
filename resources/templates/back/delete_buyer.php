
<?php require_once("../../config.php");

if(isset($_GET['id']))
{
    $query = query("DELETE FROM buyer WHERE buyer_id = '".escape_string($_GET['id'])."' ");
    confirm($query);
    
    set_message("Buyer Deleted");
    redirect("../../../public/admin/index.php?buyers");
    
}

else
{
    redirect("../../../public/admin/index.php?buyers");
}





?>