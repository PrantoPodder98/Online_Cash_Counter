<?php require 'd_header.php' ?>

<!-- ########## START: LEFT PANEL ########## -->
<?php require 'd_leftpanel.php' ?>
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<?php require 'd_headpanel.php' ?>
<!-- ########## END: HEAD PANEL ########## -->

<?php require 'calculation.php'; ?>


  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.php">Online Cash Counter</a>
      <span class="breadcrumb-item active">Order History</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
      <div class="table-wrapper">
            <table id="myTable" class="table display responsive nowrap">
              <thead>
                <tr>
                  
                  <th class="wd-10p">Order ID</th>

                  <th class="wd-10p">Name</th>
                  <th class="wd-10p">Phone</th>
                  <th class="wd-10p">Products</th>
                  <th class="wd-10p">Payment</th>
                  <th class="wd-10p">Amount Paid </th>
                  <th class="wd-10p">Order Date</th>

                </tr>
              </thead>
              <tbody>
                
                <?php

                    foreach ($order_list as $key => $data) {
                ?>  

                    <tr>
                     
                       
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['phone']; ?></td>
                        <td><?php echo $data['products']; ?></td>
                        <td><?php echo $data['pmode']; ?></td>

                        <td>BDT <?php echo number_format($data['amount_paid']); ?></td>
                        <td><?php echo $data['order_date_time']; ?></td>
                      

                      </tr>

                 
                <?php
                    }

                ?>
               
                
               
              </tbody>
            </table>
          </div><!-- table-wrapper -->
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
