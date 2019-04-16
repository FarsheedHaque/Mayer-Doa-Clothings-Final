<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATES_FRONT.DS."header.php"); ?>

<?php
if (isset($_POST['checkout'])) 
{
    $c = escape_string($_POST['city']);
    $a = escape_string($_POST['area']);
    $r = escape_string($_POST['road']);
    $h = escape_string($_POST['house']);
    
     echo show_checkout_button($c, $a, $r, $h);
    
    
    
}



?>



         <!-- Contact Section -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="section-heading">Shipping Address Form</h1>
                    <h2 class="text-center"><?php display_message(); ?></h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="registrationForm" id="contactForm" method="post" >
                        
                        <div class="row">
                            <div class="col-md-6"><br><br>
               
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
                                     <div id="success"></div>
                                <button type="submit" name="checkout" class="btn btn-xl">Change</button>
                            </div>
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