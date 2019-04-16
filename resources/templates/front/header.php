<?php require_once("../resources/config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    
    <link href="css/search-bar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        
<?php 

                    
if ($_SESSION['logged_in'] != 1) {
  //$_SESSION['message'] = "You must log in before viewing your profile page!";
  include(TEMPLATES_FRONT . DS . "top_nav.php");   
}

else
{
    if($_SESSION['type'] == "buyer"){
        
        
$query = query("SELECT * FROM buyer WHERE email = '$_SESSION[email]' ");
confirm($query);

   while($row = fetch_array($query))
   {
        $_SESSION['name'] = $row['buyer_name']; 
        $_SESSION['dob'] = $row['buyer_dob'];
        $_SESSION['phone'] = $row['buyer_phone'];
        $_SESSION['address_id'] = $row['address_id'];
        $_SESSION['buyer_id'] = $row['buyer_id'];
       
   }



$query1 = query("SELECT * FROM address WHERE address_id = '$_SESSION[address_id]' ");
confirm($query1);

   while($row = fetch_array($query1))
   {
        $_SESSION['city'] = $row['city']; 
        $_SESSION['area'] = $row['area'];
        $_SESSION['road'] = $row['road'];
        $_SESSION['house'] = $row['house'];
       
   }

            include(TEMPLATES_FRONT . DS . "logged_in_top_nav.php");
    }
    else
    {
        if($_SESSION['type'] == "seller")
        {
            redirect("seller.php");
            
        }
        
        if($_SESSION['type'] == "admin")
        {
            redirect("admin/index.php");
            
        }
    }
    
}


?>

        <!-- /.container -->
    </nav>
    
    
    