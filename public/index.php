<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATES_FRONT.DS."header.php"); ?>






    <!-- Page Content -->
    <div class="container">
        <div class="row">
            
            
            
            
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
            
    
           

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        
     <?php //include(TEMPLATES_FRONT.DS."slider.php"); ?>
                        <div id="mycarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#mycarousel" data-slide-to="1"></li>
                                <li data-target="#mycarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="../resources/slider_image/image3.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="../resources/slider_image/image1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="../resources/slider_image/image2.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#mycarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#mycarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                        
                    </div>
                    

                </div>
                


                <div class="row">

                        
                        
                    </h1>


                    

                    

                </div>
                

            

            </div>
            
            

        </div>

    </div>
    <!-- /.container -->

 <?php get_products(); ?> 

 




<?php include(TEMPLATES_FRONT.DS."footer.php");   ?>


   