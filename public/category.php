<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATES_FRONT.DS."header.php"); ?>


    <!-- Page Content -->
    <div class="container">
        
        
        <?php    
    if(isset($_POST['submit']))
    {
        $name = escape_string($_POST['name']);
        redirect("searched_item.php?name=$name");

    }

?>



                <form name="search" id="" method="post" >
                                <div class="form-group"><label for="">
                        <input type="text" name="name" class="form-control" placeholder="Search..."></label>
                                    <input type="submit" name="submit" value="Search"class="btn btn-primary"  >
                    </div>

                </form>
        
        
        
        
        
        <?php include(TEMPLATES_FRONT.DS."side_nav.php"); ?>


        <hr>
        
        <div class="col-md-9">

        <!-- Title -->
        <div class="row">
            <div class="col-lg-9">
                <h3>Latest Products</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

           <?php  get_products_in_cat_page(); ?>

           
        </div>
        <!-- /.row -->


    </div>
</div>
    <!-- /.container -->

<?php include(TEMPLATES_FRONT.DS."footer.php"); ?>
 
