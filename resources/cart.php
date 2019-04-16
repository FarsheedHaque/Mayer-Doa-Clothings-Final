<?php require_once("config.php"); ?>

<?php



if(isset($_GET['add']))
{
    
    $query = query("SELECT * FROM product WHERE product_id =
    '".escape_string($_GET['add'])."' ");
    
    confirm($query);
    
    while($row = fetch_array($query))
    {
        if($row['product_quantity'] != $_SESSION['product_'.$_GET['add']])
        {
            $_SESSION['product_'.$_GET['add']] += 1;
            
            if($_GET['page'] == "1"){
            redirect("../public/index.php");}
            if($_GET['page'] == "2"){
            redirect("../public/checkout.php");}
            if($_GET['page'] == "3"){
            redirect("../public/item.php?id={$_GET['add']}");}
            if($_GET['page'] == "4"){
            redirect("../public/category.php?id={$_GET['cid']}");}
            if($_GET['page'] == "5"){
            redirect("../public/searched_item.php?name=$name");}
 
            
        }
        
        else
        {
            set_message("We only have ". $row['product_quantity']." ".$row['product_title']. " available");
            //redirect("../public/checkout.php");
            if($_GET['page'] == "1"){
            redirect("../public/index.php");}
            if($_GET['page'] == "2"){
            redirect("../public/checkout.php");}
            if($_GET['page'] == "3"){
            redirect("../public/item.php?id={$_GET['add']}");}
            if($_GET['page'] == "4"){
            redirect("../public/category.php?id={$_GET['cid']}");}
        }
    }
    

}


if(isset($_GET['remove']))
{
    $_SESSION['product_'.$_GET['remove']]--;
    
    if($_SESSION['product_'.$_GET['remove']] < 1)
    {
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        redirect("../public/checkout.php");
    }
    
    else
    {
        redirect("../public/checkout.php");
    }
    
}



if(isset($_GET['delete']))
{
    $_SESSION['product_'.$_GET['delete']] = '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    redirect("../public/checkout.php");
    
}


function cart()
{
    $total = 0;
    $quantity = 0;
    $item_name = 1;
    $item_number = 1;
    $amount = 1;
    $qntty = 1;
    
    
    foreach($_SESSION as $name => $value)
    {
        if($value > 0)
        {
             if(substr($name, 0, 8) == "product_")
             {
                 $length = strlen($name - 8);
                 $id = substr($name, 8, $length);
                 
                 $query = query("SELECT * FROM product WHERE product_id ='".escape_string($id)."' ");
            
                 confirm($query);
    
                 while($row = fetch_array($query))
                 {
                     $sub = $row['product_price'] * $value;
                     $quantity += $value;
                     $product = <<<DELIMETER
<tr>
<td>{$row['product_title']}<br>

<img width="100" src="../resources/uploads/{$row['product_image']}" alt="">
</td>
<td>{$row['product_price']}</td>
<td>{$value}</td>
<td>{$sub}</td>
<td><a class='btn btn-success' href="../resources/cart.php?add={$row['product_id']}&page=2"><span class='glyphicon glyphicon-plus'></span></a>

<a class='btn btn-warning' href="../resources/cart.php?remove={$row['product_id']}"><span class='glyphicon glyphicon-minus'></span></a>

<a class='btn btn-danger' href="../resources/cart.php?delete={$row['product_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
</tr>

<input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
<input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
<input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
<input type="hidden" name="quantity_{$qntty}" value="{$value}">
DELIMETER;
        
                     echo $product;
                     $item_name++;
                     $item_number++;
                     $amount++;
                     $qntty++;
                     
                     
                 } 
                 
                 $_SESSION['item_total'] = $total += $sub;
                 $_SESSION['item_quantity'] = $quantity;
             }        
        }       
    }      
}




function show_checkout_button($city, $area, $road, $house)
{
    if(isset($_SESSION['item_quantity']) && $_SESSION['item_quantity'] >= 1)
    {
        
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $randomString = ''; 

        for ($i = 0; $i < 10; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        } 
        $date = date('Y-m-d');
        $status = "not complete";
        $amount = $_SESSION['item_total'];
        
        //echo $randomString;
        
        if($_SESSION['logged_in'] != 1)
        {
            $button = <<<DELIMETER
<a class="btn btn-primary" target="_blank" href="login.php?">Log In To Check Out</a>
DELIMETER;
    
            return $button;
            
        }
        
        else{

        $button = <<<DELIMETER
<a class="btn btn-primary" target="_blank" href="thank_you.php?tx=$randomString&amt=$amount&dt=$date&st=$status&ct=$city&ar=$area&rd=$road&hs=$house">Check Out</a>
DELIMETER;
    
        return $button;
    }
    
}
}





function after_math($b_id, $status)
{
    $total = 0;
    $quantity = 0;
    
    $order_id = $b_id;
    $sts = $status;

    
    
    foreach($_SESSION as $name => $value)
    {
        if($value > 0)
        {
             if(substr($name, 0, 8) == "product_")
             {
                 $length = strlen($name - 8);
                 $id = substr($name, 8, $length);
                 
                 $query = query("SELECT * FROM product WHERE product_id ='".escape_string($id)."' ");
            
                 confirm($query);
    
                 while($row = fetch_array($query))
                 {
                     $sub = $row['product_price'] * $value;
                     $quantity += $value;
                     
                     $updated_quantity = $row['product_quantity'] - $value;
                     
                     echo $updated_quantity;
                     
                     $query = query("INSERT INTO ordered_product (quantity, product_id, status, order_id) VALUES ('$value', '$id', '$sts', '$order_id') ");
                     confirm($query);
                     
                     $query2 = query("UPDATE product SET product_quantity = '$updated_quantity' WHERE product_id = '$row[product_id]' ");
                     confirm($query2);  

                 }

             }        
        }       
    }      
}






?>