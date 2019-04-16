<?php require_once("../../resources/config.php"); ?>

<?php include(TEMPLATES_BACK . "/header.php"); ?>


        <div id="page-wrapper">

            <div class="container-fluid">


                <!-- /.row -->
                
                
                <?php
                
                if($_SERVER['REQUEST_URI'] == "/ISD/public/admin/" || $_SERVER['REQUEST_URI'] == "/ISD/public/admin/index.php" )
                {
                    include(TEMPLATES_BACK . "/admin_content.php"); 
                }
                
                if(isset($_GET['orders']))
                {
                    include(TEMPLATES_BACK . "/orders.php");
                    
                }
                
                if(isset($_GET['products']))
                {
                    include(TEMPLATES_BACK . "/products.php");
                    
                }
                
                if(isset($_GET['ordered_products']))
                {
                    include(TEMPLATES_BACK . "/ordered_products.php");
                    
                }
                
                
                if(isset($_GET['buyers']))
                {
                    include(TEMPLATES_BACK . "/buyers.php");
                    
                }
                
                
                if(isset($_GET['sellers']))
                {
                    include(TEMPLATES_BACK . "/sellers.php");
                    
                }
                
                
                if(isset($_GET['address']))
                {
                    include(TEMPLATES_BACK . "/address.php");
                    
                }
                
                                
                if(isset($_GET['categories']))
                {
                    include(TEMPLATES_BACK . "/categories.php");
                    
                }
                

                
                
                

                
                ?>

                 <!-- FIRST ROW WITH PANELS -->



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php include(TEMPLATES_BACK . "/footer.php"); ?>

   