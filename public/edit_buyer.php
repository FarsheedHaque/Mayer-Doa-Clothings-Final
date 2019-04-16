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
    
    
    $query = query("UPDATE buyer SET buyer_name = '$_SESSION[name]', buyer_phone = '$_SESSION[phone]', buyer_dob = '$_SESSION[dob]', email = '$_SESSION[email]' WHERE buyer_id = '$_SESSION[buyer_id]' ");
    
    confirm($query);
    
    $query2 = query("UPDATE address SET city = '$_SESSION[city]', area = '$_SESSION[area]', road = '$_SESSION[road]', house = '$_SESSION[house]' WHERE address_id = '$_SESSION[address_id]' ");
    
    confirm($query2);

    
    $query3 = query("UPDATE users SET email = '$_SESSION[email]' WHERE user_id = '$_SESSION[user_id]' ");

    confirm($query3);

    
    set_message("Account has been updated");
    redirect("buyer.php");
    
}

?>


 <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="section-heading">Edit Acount</h1>
              
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="" id="contactForm" method="post" >
                        
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
                                                                     <div class="form-group">
                                    <input type="tel" name="phone" class="form-control" placeholder="Phone No." id="phone" required data-validation-required-message="Please enter your Phone No.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email ID." id="email" required data-validation-required-message="Please enter your Email ID.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                     <div id="success"></div>
                                <button type="submit" name="register" class="btn btn-xl">Update</button>
                            </div>
                            </div>
          


                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>






<?php include(TEMPLATES_FRONT.DS."footer.php");   ?>