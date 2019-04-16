<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATES_FRONT.DS."header.php"); ?>


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


<?php


echo get_products_in_searched_page();

?>


<?php

include(TEMPLATES_FRONT.DS."footer.php");

?>
