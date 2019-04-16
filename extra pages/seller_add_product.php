<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATES_FRONT.DS."header.php"); ?>



         <!-- Contact Section -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Add Product</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="addProduct" id="addProductForm" method="post" >
                        
                        <?php add_product_from_seller_page() ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="title"class="form-control" placeholder="Product Title *" id="title" required data-validation-required-message="Please enter product title.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="price"class="form-control" placeholder="Product Price *" id="price" required data-validation-required-message="Please enter product price.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="quantity" class="form-control" placeholder="Product Quantity *" id="quantity" required data-validation-required-message="Please enter product quantity.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="description" placeholder="Product Description *" id="description" required data-validation-required-message="Please enter product description."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                
                                <div class="form-group">
                                    <select name="category">
                                      <option value="1">Pant</option>
                                      <option value="2">Shirt</option>
                                      <option value="3">T-Shirt</option>
                                    </select>
                                </div>
                                
                                
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" name="add_product" class="btn btn-xl">ADD</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



<?php include(TEMPLATES_FRONT.DS."footer.php"); ?>