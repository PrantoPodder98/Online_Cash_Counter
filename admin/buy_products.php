<?php require 'd_header.php' ?>

<!-- ########## START: LEFT PANEL ########## -->
<?php require 'd_leftpanel.php' ?>
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<?php require 'd_headpanel.php' ?>
<!-- ########## END: HEAD PANEL ########## -->

    

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item">Online Cash Counter</a>
      <span class="breadcrumb-item active">Insert Products</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
		<div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product Insert</h6>
          <p class="mg-b-20 mg-sm-b-30">A form for inserting product(s)</p>
          <form action="action.php" method="POST" enctype="multipart/form-data">
            
         
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: </label>
                  <input class="form-control" type="text" name="product_name" placeholder="Enter product name" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Cost Price: </label>
                  <input class="form-control" type="number" name="cost_price" placeholder="Enter Cost Price" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Price:</label>
                  <input class="form-control" type="number" name="selling_price" placeholder="Enter Selling Price" required>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Image: </label>
                  <input class="" type="file" name="fileToUpload" placeholder="Enter product image" required>
                 <?php

                if(isset($_GET['error']))
                {
              ?>

                <p style="font-weight: 700;color: red;"> Image format invalid (jgp, jpeg, png)</p>

              <?php 
                }

              ?>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: </label>
                  <input class="form-control" type="number" name="quantity" placeholder="Enter product quantity" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Company Name:</label>
                  <input class="form-control" type="text" name="company_name" placeholder="Enter Company Name" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Company Address:</label>
                  <input class="form-control" type="text" name="company_address"  placeholder="Enter company address" required>
                </div>
              </div><!-- col-8 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Company Email Address:</label>
                  <input class="form-control" type="text" name="company_email"  placeholder="Enter company email address" required>
                </div>
              </div><!-- col-8 -->

               <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Unit Type:</label>
                 <select class="form-control" name="unit_type">
                    <option >--Select Type--</option>
                    <option value="per_kg">per KG</option>
                    <option value="per_litre">per Litre</option>
                    <option value="per_piece">per Piece</option>
                    <option value="per_unit">per unit</option>
                   

                    
                  </select>
                </div>
              </div><!-- col-8 -->
             
            </div><!-- row -->

            <div class="form-layout-footer">
              <button type="submit" class="btn btn-primary mg-r-5" name="btn-ProductInsert">Insert Product</button>
              <?php

                if(isset($_GET['msg']))
                {
              ?>

                <p style="font-weight: 700;color: green;"> Product Inserted</p>

              <?php 
                }

              ?>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->

          </form>
    </div>      

    </div><!-- sl-pagebody --><!-- END MAIN CONTENT -->


  <?php require 'd_footer.php' ?>
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  <?php require 'd_javascript.php' ?>
  </body>
</html>
