 <?php
    require_once 'db_config.php';
   
?>




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
      <a class="breadcrumb-item" href="index.php">Online Cash Counter</a>
      <span class="breadcrumb-item active">Cart</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
           <?php

            if(isset($_GET['singledelete']))
            {
          ?>

           <div class="alert alert-success alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
             Product Removed from Cart!
          </div>
          <?php 
            }
          ?>


          <?php

            if(isset($_GET['alldelete']))
            {
          ?>

           <div class="alert alert-success alert-dismissible" style="height: 50px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
             All Products Removed from Cart!
          </div>
          <?php 
            }
          ?>
       <div class="table-responsive mt-2">
          <table class="table table-bordered tab;e-striped text-center">
            <thead>
              <tr>
              <td colspan="7" style="background-color: black;">
                <h4 class="text-center text-info m-0">Products in you cart</h4>
                
              </td>

            </tr>

            <tr >
              <th class="text-center">No.</th>
              <th class="text-center">Image</th>
              <th class="text-center">Product</th>
              <th class="text-center">Price (BDT)</th>
              <th class="text-center">Quantity</th>
              <th class="text-center">Total Price (BDT)</th>
              <th class="text-center">
                <a href="action.php?allproduct_delte=all" class="badge-danger badge p-2" onclick="return confirm('Are you sure want to remove all items from CART?')"><i class="fa fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
              </th>

            </tr>
            
            </thead>

            <tbody>
              <?php
               
                $sql=$db->prepare("Select * from cart ");
                $sql->execute();
                $result= $sql->get_result();
                $grand_total=0;
                $i=1;
                while ($row = $result->fetch_assoc()):
              ?>

              <tr>
                <td><?= $i ?></td>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <td><img src="<?= $row['product_image'] ?>" width="50"></td>
                <td><?= $row['product_name']?></td>
                <td><?= number_format($row['product_selling_price'])?></td>
                
                <input type="hidden" class="pprice" value="<?= $row['product_selling_price'] ?>">
                <input type="hidden" class="p2price" value="<?= $row['product_cost_price'] ?>">

                <!-- Auto update with quantity in cart page---> 
                <td align="center"><input type="number" class="form-control itemQty" value="<?= $row['quantity'] ?>" style="width:75px;">
                </td>

               
                <td> <?= number_format($row['selling_total_price']); ?></td>

                <td>
                <a href="action.php?cart_singleproduct_remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure to Remove this ITEM?');"><i class="fa fa-trash"></i></a>
                </td>
              </tr >

              <?php $grand_total+= $row['selling_total_price']; ?>
            <?php 

              $i=$i+1;

             endwhile; ?>

            <tr>
              <td colspan="3">
                <a href="sell_products_list.php" class="btn btn-success"><i class="fa fa-cart-plus"></i>&nbsp; Continue Shopping</a>

                <a href="cart.php" class="btn btn-dark">&nbsp; Update Cart</a>
                
              </td>

              <td colspan="2"><b>Grand Total</b> </td>
              <td style="font-size: 20px;"><b>BDT = <?= number_format($grand_total); ?></b></td>
              <td>
                <a href="checkout.php" class="btn btn-info <?= ($grand_total>1)?"":"disabled"; ?>"><i class="fa fa-credit-card"></i>&nbsp;&nbsp; Billing</a>

               
              </td>
            </tr>
            </tbody>
          </table>
          
      </div>
      

      
    </div><!-- sl-pagebody --><!-- END MAIN CONTENT -->


  <?php require 'd_footer.php' ?>
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){



      ///this funxtion works with updating the quantity update in the cart table


      $(".itemQty").on('change', function(){
        var $el =$(this).closest('tr');

        var pid = $el.find(".pid").val();
        var pprice = $el.find(".pprice").val();
        var p2price = $el.find(".p2price").val();
        var qty = $el.find(".itemQty").val() ;
        location.reload(true);


        $.ajax({
          url: 'action.php',
          method: 'post',
          cache : false,
          data: {qty:qty, pid:pid, pprice:pprice, p2price:p2price},
          success: function(response){

            console.log(response);
          }
        });
      });
      



    });


  </script>
  <?php require 'd_javascript.php' ?>
  </body>
</html>
