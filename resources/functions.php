<?php

//helper functions
//session_start();

function set_message($msg)
{
    if(!empty($msg))
    {
        $_SESSION['message'] = $msg;
    }
    else
    {
        $msg = "";
    }
    
}


function display_message()
{
    if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        
    }
}



function redirect($location)
{
    header("Location: $location");
}



function query($sql)
{
    global $connect;
    
    return mysqli_query($connect, $sql);
}



function confirm($result)
{
    global $connect;
    
    if(!$result)
    {
        die("Query Failed" . mysqli_error($connect));
    }
}


function escape_string($string)
{
    global $connect;
    
    return mysqli_real_escape_string($connect, $string);
}


function fetch_array($result)
{
    return mysqli_fetch_array($result);
}



//get products

function get_products()
{
    $query = query("SELECT * FROM product");
    
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $product = <<<DELIMETER
        
<div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <a href="item.php?id={$row['product_id']}"><img width="50" src="../resources/uploads/{$row['product_image']}" alt="">
            <div class="caption">
                <h4 class="pull-right">&#2547;{$row['product_price']}</h4>
                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                </h4>
                <p>{$row['product_description']}</p>
            </div>
                               <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['product_id']}&page=1">ADD To Cart</a>
        </div>
    </div>
    </div>
DELIMETER;
        
        echo $product;
    }
}


function get_categories()
{
    $query = query("SELECT * FROM category");
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $category_links = <<<DELIMETERS
        <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>
DELIMETERS;
        
        echo $category_links;
    }
}






function get_products_in_cat_page()
{
    $query = query("SELECT * FROM product WHERE cat_id = '".escape_string($_GET['id'])."' ");
    
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $product = <<<DELIMETER
<div class="col-sm-4 col-lg-4 col-md-4">
<div class="thumbnail">
    <a href="item.php?id={$row['product_id']}"><img src="../resources/uploads/{$row['product_image']}" alt="">
    <div class="caption">
        <h4 class="pull-right">&#2547;{$row['product_price']}</h4>
        <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
        </h4>
        <p>{$row['product_description']}</p>
    </div>
                       <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['product_id']}&page=4&cid={$_GET['id']}">ADD To Cart</a>
</div>
</div>
</div>
DELIMETER;
        
        echo $product;
    }
}



function get_products_in_searched_page()
{
    $name =  escape_string($_GET['name']);
    $query = query("SELECT * FROM product WHERE product_title LIKE '%$name%' ");
    
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $product = <<<DELIMETER
<div class="col-sm-4 col-lg-4 col-md-4">
<div class="thumbnail">
    <a href="item.php?id={$row['product_id']}"><img src="../resources/uploads/{$row['product_image']}" alt="">
    <div class="caption">
        <h4 class="pull-right">&#2547;{$row['product_price']}</h4>
        <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
        </h4>
        <p>{$row['product_description']}</p>
    </div>
                       <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['product_id']}&page=5&name=$name">ADD To Cart</a>
</div>
</div>
</div>
DELIMETER;
        
        echo $product;
    }
}



function get_products_in_shop_page()
{
    $query = query("SELECT * FROM product");
    
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $product = <<<DELIMETER
        
<div class="col-md-3 col-sm-6 hero-feature">
    <div class="thumbnail">
        <img src="../resources/uploads/{$row['product_image']}" alt="">
        <div class="caption">
            <h3>Feature Label</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>
                <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
            </p>
        </div>
    </div>
</div>
DELIMETER;
        
        echo $product;
    }
}



function login_user()
{
    if(isset($_POST['submit']))
    {
        $email = escape_string($_POST['email']);
        $password = escape_string($_POST['password']);
        
        $query = query("SELECT * FROM users WHERE email = '$email'");
        
        confirm($query);
        
        if(mysqli_num_rows($query) == 0)
        {
            set_message("User with that email does not exist!");
            redirect("login.php");
        }
        
        else
        {
            $row = $query->fetch_assoc();

            if ( password_verify($password, $row['password']) )
            {
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['type'] = $row['type'];
                $_SESSION['logged_in'] = true;
                
                //$flag = 1;

                
                if($_SESSION['type'] == "seller")
                {
                  /*  $sql2 = query("SELECT * FROM seller WHERE email = '$email'");
                    confirm($sql2);
                    //$row1 = $query->fetch_assoc();
                    while($row1 = fetch_array($sql2)){
                    $_SESSION['dob'] = $row1['seller_dob'];
                    $_SESSION['name'] = $row1['seller_name'];
                    //$_SESSION['dob'] = $row1['seller_dob'];
                    $_SESSION['phone'] = $row1['seller_phone'];
                    $_SESSION['address_id'] = $row1['address_id'];
                    $_SESSION['seller_id'] = $row1['seller_id']; }
                    
                    
                    
                    $sql3 = query("SELECT * FROM address WHERE address_id = '$_SESSION[address_id]' ");
                    confirm($sql3);
                    while($row2 = fetch_array($sql3)){
                    
                    $_SESSION['city'] = $row2['city'];
                    $_SESSION['area'] = $row2['area'];
                    $_SESSION['road'] = $row2['road'];
                    $_SESSION['house'] = $row2['house'];  } */
                                    
                    redirect("seller_add_product.php");
                }
                
                
                if($_SESSION['type'] == "buyer")
                {
                   /* $sql2 = query("SELECT * FROM buyer WHERE email = '$_SESSION[email]' ");
                    confirm($sql2);
                    $row1 = $query->fetch_assoc();
                    
                    $_SESSION['name'] = $row1['name'];
                    $_SESSION['dob'] = $row1['dob'];
                    $_SESSION['phone'] = $row1['phone'];
                    $_SESSION['address_id'] = $row1['address_id'];
                    
                    $sql3 = query("SELECT * FROM address WHERE address_id = '$_SESSION[address_id]' ");
                    confirm($sql3);
                    $row2 = $query->fetch_assoc();
                    
                    $_SESSION['city'] = $row2['city'];
                    $_SESSION['area'] = $row1['area'];
                    $_SESSION['road'] = $row1['road'];
                    $_SESSION['house'] = $row1['house'];  */
                    
                    redirect("index.php");
                }
                
                
                if($_SESSION['type'] == "admin")
                {
                    $_SESSION['name'] = "Admin";
                    redirect("admin/index.php");
                }


            }
            else
            {
                set_message("You have entered wrong password, try again!");
                redirect("login.php");
                
            }
        }
        
        
    }
    
    
}



function send_message()
{
    if(isset($_POST['submit']))
    {
        $to = "huhu@dre.com";
        $name = escape_string($_POST['name']);
        $email = escape_string($_POST['email']);
        $subject = escape_string($_POST['subject']);
        $message = escape_string($_POST['message']);
        
        $headers = "From: {$name} {$email}";
        
        $result = mail($to, $subject, $message, $headers);
        
        if(!$result)
        {
            echo "error";
        }
        else
        {
            echo "sent";
        }
    }
}


function add_product_from_seller_page()
{
    if(isset($_POST['add']))
    {
        $title = escape_string($_POST['title']);
        $price = escape_string($_POST['price']);
        $quantity = escape_string($_POST['quantity']);
        $description = escape_string($_POST['description']);
        $category = escape_string($_POST['category']);
        /*$image = escape_string(($_FILES['file']['name']));
        $name = $_FILES['file']['name'];
        $image_temp_location = escape_string($_FILES['file']['tmp_name']);
        $dir = "../../recources/uploads/".$image;
        
        move_uploaded_file($image_temp_location, $dir);*/
        
        $image = $_FILES['file']['name'];
        $loc = $_FILES['file']['tmp_name'];
        $dir = "../resources/uploads/".$image;
    
        move_uploaded_file($loc, $dir);
        
        
        $query = query("INSERT INTO product (product_title, product_price, product_quantity, product_description, product_image, seller_id, cat_id) VALUES ('$title', '$price', '$quantity', '$description', '$image', '$_SESSION[seller_id]', '$category') ");
        
        confirm($query);
        set_message("New Product Added");
        redirect("seller_add_product.php");
        
        
    }
    
            
}


/***************Back End*****************/


function display_orders()
{
    $query = query("SELECT * FROM orders");
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $orders = <<<DELIMETER
<tr>
<td>{$row['order_id']}</td>
<td>{$row['amount']}</td>
<td>{$row['transaction_id']}</td>
<td>{$row['city']}</td>
<td>{$row['area']}</td>
<td>{$row['road']}</td>
<td>{$row['house']}</td>
<td>{$row['status']}</td>
<td><a class='btn btn-warning' href="../../resources/templates/back/order_status.php?id={$row['order_id']}">Change<span ></span></a></td>
<td>{$row['entry_date']}</td>
<td>{$row['buyer_id']}</td>

<td><a class='btn btn-danger' href="../../resources/templates/back/delete_orders.php?id={$row['order_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
</tr>
DELIMETER;
        
        echo $orders;
    }
    
}



function display_buyers()
{
    $id;
    $query = query("SELECT * FROM buyer");
    confirm($query);
    
    while($row = fetch_array($query))
    {

            $buyers = <<<DELIMETER
<tr>
<td>{$row['buyer_id']}</td>
<td>{$row['buyer_name']}</td>
<td>{$row['buyer_dob']}</td>
<td>{$row['email']}</td>
<td>{$row['buyer_phone']}</td>
DELIMETER;
        
            echo $buyers;
        $id = $row['buyer_id'];
        $a_ID = $row['buyer_id'];
        $query1 = query("SELECT * FROM address WHERE address_id ='".$a_ID."' ");
        confirm($query1);
        
        while($row = fetch_array($query1))
        {
            $address = <<<DELIMETER
<td>{$row['city']}</td>
<td>{$row['area']}</td>
<td>{$row['road']}</td>
<td>{$row['house']}</td>
<td><a class='btn btn-danger' href="../../resources/templates/back/delete_buyer.php?id=$id"><span class='glyphicon glyphicon-remove'></span></a></td>
</tr>
DELIMETER;
            echo $address;
        
        }

    
    }
    
}



function display_sellers()
{
    $id;
    $query = query("SELECT * FROM seller");
    confirm($query);
    
    while($row = fetch_array($query))
    {

            $seller = <<<DELIMETER
<tr>
<td>{$row['seller_id']}</td>
<td>{$row['seller_name']}</td>
<td>{$row['email']}</td>
<td>{$row['seller_phone']}</td>
DELIMETER;
        
            echo $seller;
        $id = $row['seller_id'];
        $a_ID = $row['seller_id'];
        $query1 = query("SELECT * FROM address WHERE address_id ='".$a_ID."' ");
        confirm($query1);
        
        while($row = fetch_array($query1))
        {
            $address = <<<DELIMETER
<td>{$row['city']}</td>
<td>{$row['area']}</td>
<td>{$row['road']}</td>
<td>{$row['house']}</td>
<td><a class='btn btn-danger' href="../../resources/templates/back/delete_seller.php?id=$id"><span class='glyphicon glyphicon-remove'></span></a></td>
</tr>
DELIMETER;
            echo $address;
        
        }

    
    }
    
}



function display_products()
{
    $id;
    $query = query("SELECT * FROM product");
    confirm($query);
    
    while($row = fetch_array($query))
    {

            $product = <<<DELIMETER
<tr>
<td>{$row['product_id']}</td>
<td>{$row['product_title']}</td>
<td>{$row['product_price']}</td>
<td>{$row['product_quantity']}</td>
<td>{$row['product_description']}</td>
<td><img width="320" src="../../resources/uploads/{$row['product_image']}" alt=""></td>
<td>{$row['seller_id']}</td>
DELIMETER;
        
            echo $product;
        $id = $row['product_id'];
        $c_ID = $row['cat_id'];
        $query1 = query("SELECT * FROM category WHERE cat_id ='".$c_ID."' ");
        confirm($query1);
        
        while($row = fetch_array($query1))
        {
            $category = <<<DELIMETER
<td>{$row['cat_title']}</td>
<td><a class='btn btn-danger' href="../../resources/templates/back/delete_product.php?id=$id"><span class='glyphicon glyphicon-remove'></span></a></td>
</tr>
DELIMETER;
            echo $category;
        
        }

    
    }
}



function display_ordered_products()
{
    $query = query("SELECT * FROM ordered_product");
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $ordered_products = <<<DELIMETER
<tr>
<td>{$row['ordered_product_id']}</td>
<td>{$row['product_id']}</td>
<td>{$row['quantity']}</td>
<td>{$row['status']}</td>
<td>{$row['order_id']}</td>
<td><a class='btn btn-danger' href="../../resources/templates/back/delete_ordered_products.php?id={$row['ordered_product_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
</tr>
DELIMETER;
        
        echo $ordered_products;
    }
    
}


function show_categories_add_product_page()
{
    $query = query("SELECT * FROM category");
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $category_options = <<<DELIMETERS
        <option value="{$row['cat_id']}">{$row['cat_title']}</option>
DELIMETERS;
        
        echo $category_options;
        //echo "sadljhljfhl";
    }
}



function display_slider_image()
{
    
    
    $query = query("SELECT * FROM slider_image");
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $sliderimage = <<<DELIMETER
<tr>
<td>{$row['slider_image_id']}</td>
<td>{$row['name']}</td>
<td><img width="320" src="../../resources/slider_image/{$row['name']}" alt=""></td>
<td><a class='btn btn-danger' href="../../resources/templates/back/delete_orders.php?id={$row['slider_image_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
</tr>
DELIMETER;
        
        echo $sliderimage;
    }   
}



function display_slider_image_in_indes()
{
    
    
    $query = query("SELECT * FROM slider_image");
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $sliderimage = <<<DELIMETER
<div class="carousel-inner">
<div class="item active">
<img class="slide-image" src="../resources/slider_image/{$row['name']}" alt="">
</div>
</div>
DELIMETER;
        
        echo $sliderimage;
    }   
}


function display_product_of_a_seller()
{
    $id;
    $query = query("SELECT * FROM product WHERE seller_id = '$_SESSION[seller_id]'");
    confirm($query);
    
    while($row = fetch_array($query))
    {

            $product = <<<DELIMETER
<tr>
<td>{$row['product_id']}</td>
<td>{$row['product_title']}</td>
<td>{$row['product_price']}</td>
<td>{$row['product_quantity']}</td>
<td>{$row['product_description']}</td>
<td><img width="320" src="../resources/uploads/{$row['product_image']}" alt=""></td>
DELIMETER;
        
            echo $product;
        
        $id = $row['product_id'];
        
        $c_ID = $row['cat_id'];
        $query1 = query("SELECT * FROM category WHERE cat_id ='".$c_ID."' ");
        confirm($query1);
        
        while($row = fetch_array($query1))
        {
            $category = <<<DELIMETER
<td>{$row['cat_title']}</td>
<td><a class='btn btn-danger' href="delete_product_of_a_seller.php?id=$id"><span class='glyphicon glyphicon-remove'></span></a></td>
</tr>
DELIMETER;
            echo $category;
        
        }

    
    }
}


function display_categories()
{
    $query = query("SELECT * FROM category");
    confirm($query);
    
    while($row = fetch_array($query))
    {

            $category = <<<DELIMETER
<tr>
<td>{$row['cat_id']}</td>
<td>{$row['cat_title']}</td>
<td><a class='btn btn-danger' href="../../resources/templates/back/delete_category.php?id={$row['cat_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
</tr>
DELIMETER;

        echo $category;

        
        }

    
    }








?> 