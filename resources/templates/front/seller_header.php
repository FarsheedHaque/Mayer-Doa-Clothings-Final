

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
<?php
            
            
if ($_SESSION['logged_in'] != 1) {
  //$_SESSION['message'] = "You must log in before viewing your profile page!";
  redirect("index.php");    
}

else
{
    if($_SESSION['type'] == "seller"){


$query = query("SELECT * FROM seller WHERE email = '$_SESSION[email]' ");
confirm($query);

   while($row = fetch_array($query))
   {
        $_SESSION['name'] = $row['seller_name']; 
        $_SESSION['dob'] = $row['seller_dob'];
        $_SESSION['phone'] = $row['seller_phone'];
        $_SESSION['address_id'] = $row['address_id'];
        $_SESSION['seller_id'] = $row['seller_id'];
       
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
include(TEMPLATES_FRONT . "/seller_top_nav.php"); 
include(TEMPLATES_FRONT . "/seller_side_nav.php"); 

    
}
    
    else{
        
        redirect("index.php"); 
    }
}
            
            
?>

            
            
          
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
 
        </nav>