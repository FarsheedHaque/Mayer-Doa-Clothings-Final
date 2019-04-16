<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATES_FRONT.DS."header.php"); ?>

<?php
if (isset($_POST['register'])) { 


    $_SESSION['email'] = escape_string($_POST['email']);
    $_SESSION['name'] = escape_string($_POST['name']);
    $_SESSION['city'] = escape_string($_POST['city']);
    $_SESSION['area'] = escape_string($_POST['area']);
    $_SESSION['road'] = escape_string($_POST['road']);
    $_SESSION['house'] = escape_string($_POST['house']);
    $_SESSION['dob'] = escape_string($_POST['dob']);
    $_SESSION['phone'] = escape_string($_POST['phone']);
    $_SESSION['type'] = escape_string($_POST['type']);
    $password = escape_string((password_hash($_POST['password'], PASSWORD_BCRYPT)));
    
    $query = query("SELECT * FROM users WHERE email= '".escape_string($_POST['email'])."' ");
    
    confirm($query);

    if ( mysqli_num_rows($query) > 0 ) {

        set_message("User Is Already Exist!");
        redirect("registration.php");
    }
    else { 
        $sql = query("INSERT INTO users (email, password, type) VALUES ('$_SESSION[email]','$password', '$_SESSION[type]') ");

        confirm($sql);
            
        $_SESSION['logged_in'] = true; 

        $sql1 = query("INSERT INTO address (city, area, road, house) VALUES ('$_SESSION[city]','$_SESSION[area]', '$_SESSION[road]', '$_SESSION[house]') ");
        
        confirm($sql1);
        
        $sql2 = query("SELECT address_id FROM address WHERE city = '".escape_string($_POST['city'])."' AND area = '".escape_string($_POST['area'])."' AND road = '".escape_string($_POST['road'])."' AND house = '".escape_string($_POST['house'])."' ");
    
        confirm($sql2);
        
        while($row = fetch_array($sql2))
        {
            
            $address_id = $row['address_id'];
            
            //echo $address_id;
            
            if($_SESSION['type'] == "buyer"){
            
            $sql3 = query("INSERT INTO buyer (buyer_name, buyer_dob, email, buyer_phone, address_id) VALUES ('$_SESSION[name]','$_SESSION[dob]', '$_SESSION[email]', '$_SESSION[phone]', '$address_id') ");
                
            confirm($sql3);
                set_message("Registration is Successful");
                redirect("index.php");
            }
            
            if($_SESSION['type'] == "seller"){
            
            $sql4 = query("INSERT INTO seller (seller_name, seller_dob, email, seller_phone, address_id) VALUES ('$_SESSION[name]','$_SESSION[dob]', '$_SESSION[email]', '$_SESSION[phone]', '$address_id') ");
                
            confirm($sql4);
                set_message("Registration is Successful");
                redirect("seller.php");
            }
            
        } 
        
    } 

}

?>



         <!-- Contact Section -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="section-heading">Registration Form</h1>
                    <h2 class="text-center"><?php display_message(); ?></h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="registrationForm" id="contactForm" method="post" >
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name"class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your Name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="date" name="dob"class="form-control" placeholder="Date Of Birth" id="dob" required data-validation-required-message="Please enter your Date Of Birth.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="city" class="form-control" placeholder="City" id="city" required data-validation-required-message="Please enter your City name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="area" class="form-control" placeholder="Area" id="area" required data-validation-required-message="Please enter your Area name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="road" class="form-control" placeholder="Road No." id="road" required data-validation-required-message="Please enter your Road No.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="house" class="form-control" placeholder="House No." id="house" required data-validation-required-message="Please enter your House No.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                             <div class="form-group">
                                <select name="type">
                                    <option value="">Select User Type</option>
                                    <option value="buyer">Buyer</option>
                                    <option value="seller">Seller</option>
                                </select>
                                </div>
                                <div class="form-group">
                                    <input type="tel" name="phone" class="form-control" placeholder="Phone No." id="phone" required data-validation-required-message="Please enter your Phone No.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email ID." id="email" required data-validation-required-message="Please enter your Email ID.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" id="password" required data-validation-required-message="Please enter your Password.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            <div id="success"></div>
                                <button type="submit" name="register" class="btn btn-xl">Register</button>
                            </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>


<?php

include(TEMPLATES_FRONT.DS."footer.php");

?>