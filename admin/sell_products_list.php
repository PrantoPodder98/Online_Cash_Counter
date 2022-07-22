<?php require 'd_header.php' ?>

<!-- ########## START: LEFT PANEL ########## -->
<?php require 'd_leftpanel.php' ?>
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<?php require 'd_headpanel.php' ?>
<!-- ########## END: HEAD PANEL ########## -->

<?php require 'calculation.php' ?>


  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item">Online Cash Counter</a>
      <span class="breadcrumb-item active">List of Products</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product Details</h6>
            <?php

              if(isset($_GET['singledelete2']))
              {
            ?>

             <div class="alert alert-danger alert-dismissible" style="height: 50px;">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
               Product Removed from Cart!
            </div>
            <?php 
              }
            ?>

            <?php

            if(isset($_GET['msg']))
            {
          ?>

           <div class="alert alert-success alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
             Product Added to Cart!
          </div>
          <?php 
            }
          ?>


          <?php

            if(isset($_GET['exist']))
            {
          ?>

           <div class="alert alert-danger alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
             Product Already Added to Cart!
          </div>
          <?php 
            }
          ?>

          <div class="table-wrapper">
            <table id="myTable" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-10p">SL</th>
                  <th class="wd-10p">Product ID</th>
                  <th class="wd-10p">Product name</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-10p">Selling </th>
                  <th class="wd-10p">Available Qty</th>
                  <th class="wd-15p">Unit Type</th>
                  <th class="wd-20p">Choose Qty</th>
                  <th class="wd-10p">Action</th>
                </tr>
              </thead>
              <tbody>
                
                <?php

                    foreach ($product_list as $key => $data) {
                ?>  

                  
                    
                  
                    <tr>
                      <form action="action.php" method="POST">
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['product_name']; ?></td>
                        <td><img src="<?php echo $data['product_image']; ?>" width=50></td>
                        <td>BDT. <?php echo $data['selling_price']; ?></td>
                        <td><?php echo $data['quantity']; ?></td>
                      

                        <td><?php echo $data['unit_type']; ?></td>
                        <td><input type="number" name="choose_quantity" value="1" min="1" max="<?= $data['quantity']; ?>" style="width: 50px;"></td>
                        <td>
                          <button class="btn btn-success" type="submit" name="btn-addToCart">Add to Cart</button>
                        </td>



                        <input type="hidden" name="product_name" value="<?= $data['product_name']  ?>">
                        <input type="hidden" name="product_selling_price" value="<?= $data['selling_price']  ?>">
                        <input type="hidden" name="product_cost_price" value="<?= $data['cost_price']  ?>">
                        <input type="hidden" name="product_image" value="<?= $data['product_image']  ?>">
                        <input type="hidden" name="product_id" value="<?= $data['id']  ?>">



                      </form>
                    </tr>

                 
                <?php
                    }

                ?>
               
                
               
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div>		



         <div class="card pd-20 pd-sm-40" style="margin-top: 50px;">
          <h6 class="card-body-title">Product Added to Cart</h6>

            
          <div class="table-wrapper">
            <table id="myTable" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-10p">SL</th>
                  
                  <th class="wd-10p">Product name</th>                  
                  <th class="wd-10p">Selling </th>                  
                  
                  <th class="wd-20p">Choose Qty</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                
                <?php

                    foreach ($products_in_CART as $key => $data) {
                ?>  

                  
                    
                  
                    <tr>
                    
                        <td><?php echo $key+1; ?></td>
                        
                        <td><?php echo $data['product_name']; ?></td>
                        <td>BDT. <?php echo $data['product_selling_price']; ?></td>
                       
                        <td><?php echo $data['quantity']; ?></td>
                        <td>
                          <a href="action.php?cart_singleproduct_remove2=<?= $data['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                      
                    </tr>

                 
                <?php
                    }

                ?>
               
                
               
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div>    





    </div><!-- sl-pagebody --><!-- END MAIN CONTENT -->


  <?php require 'd_footer.php' ?>
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  <?php require 'd_javascript.php' ?>


  <script>
    $('#myTable').DataTable({
    bLengthChange: true,
    searching: true,
    responsive: true
  });
  </script>
  </body>
</html>
