<?php

require_once("../resources/config.php"); ?>

<?php


include(TEMPLATES_FRONT.DS."header.php");


?>

    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Sign In</h1>
          
            <h2><?php display_message(); ?></h2>
          
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">
                
                <?php login_user(); ?>
                
                <div class="form-group"><label for="">
                    Email<input type="email" name="email" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="password" name="password" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" value="Login"class="btn btn-primary"  >
                <div class="change_link"><br>
					Don't have an account yet ?
					<a href="registration.php">Sign Up</a>
				</div>
                </div>
            </form>
        </div>  


    </header>


        </div>

  <?php

include(TEMPLATES_FRONT.DS."footer.php");

?>