<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATES_FRONT.DS."seller_header.php"); ?>


        <div id="page-wrapper">

            <div class="container-fluid">






<div class="col-md-12">

<div class="row">
<h1 class="page-header"><br>
   Add Product

</h1>
    
    <h3><?php display_message(); ?></h3>
</div>
               


<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="title" class="form-control">
       
    </div>


    <div class="form-group">
           <label for="product-description">Product Description</label>
      <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="price" class="form-control" size="60">
      </div>
        

    </div>




    
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
          <hr>
        <select name="category">
            <option value="">Select Category</option>
            
<?php show_categories_add_product_page(); ?>

           
        </select>


</div>
    
<div class="form-group">
         <label for="product-quantity">Product Quantity</label>
          <hr>
        <input type="number" name="quantity" class="form-control" size="60">


</div>
    




    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="file">
      
    </div>
    
         <div class="form-group">

        <input type="submit" name="add" class="btn btn-primary btn-lg" value="ADD">
    </div>




</aside><!--SIDEBAR-->


    
</form>

<?php add_product_from_seller_page(); ?>

                



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
