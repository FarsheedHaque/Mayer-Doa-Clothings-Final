<?php require_once("../resources/config.php"); ?>

<?php 


$query = query("SELECT * FROM buyer WHERE email = '$_SESSION[email]' ");
confirm($query);

   while($row = fetch_array($query))
   {
        $_SESSION['name'] = $row['buyer_name']; 
        $_SESSION['dob'] = $row['buyer_dob'];
        $_SESSION['phone'] = $row['buyer_phone'];
        $_SESSION['address_id'] = $row['address_id'];
        $_SESSION['seller_id'] = $row['buyer_id'];
       
   }
echo $_SESSION['logged_in'];
        echo "<br>";
echo $_SESSION['name']; 
     echo "<br>";
echo $_SESSION['dob']; 
     echo "<br>";
echo $_SESSION['phone']; 
     echo "<br>";
echo $_SESSION['seller_id']; 
     echo "<br>";
echo $_SESSION['address_id']; 
     echo "<br>";


$query1 = query("SELECT * FROM address WHERE address_id = '$_SESSION[address_id]' ");
confirm($query1);

   while($row = fetch_array($query1))
   {
        $_SESSION['city'] = $row['city']; 
        $_SESSION['area'] = $row['area'];
        $_SESSION['road'] = $row['road'];
        $_SESSION['house'] = $row['house'];
       
   }

echo $_SESSION['city']; 
     echo "<br>";
echo $_SESSION['area']; 
     echo "<br>";
echo $_SESSION['road']; 
     echo "<br>";
echo $_SESSION['house']; 



?> 


