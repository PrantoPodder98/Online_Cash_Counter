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
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody"><!-- MAIN CONTENT -->
      <div class="row row-sm">
        

        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="card pd-20 bg-purple">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Products</h6>
               <a class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>       
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
              <span class="sparkline2">9,7,5,6,5,3,9,3,5,2</span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold"><?= $total_products['COUNT(*)'] ?></h3>
            </div><!-- card-body -->
                   
          </div><!-- card -->
        </div><!-- col-3 -->

        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="card pd-20 bg-primary">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Expense</h6>
               <a class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>       
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
              <span class="sparkline2">5,3,,7,3,5,2,9,6,5,9</span>
              <h5 class="mg-b-0 tx-white tx-lato tx-bold">BDT <?= number_format($total_amounts['expense']) ?></h5>
            </div><!-- card-body -->
                   
          </div><!-- card -->
        </div><!-- col-3 -->


        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="card pd-20 bg-danger">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Selling</h6>
               <a class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>       
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
              <span class="sparkline2">9,3,5,6,5,9,7,4,5,2</span>
              <h5 class="mg-b-0 tx-white tx-lato tx-bold">BDT <?= number_format($total_amounts['selling']) ?></h5>
            </div><!-- card-body -->
                   
          </div><!-- card -->
        </div><!-- col-3 -->


        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="card pd-20 bg-sl-primary">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Orders</h6>
                 <a  class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>     
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
              <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold"><?= $total_orders['COUNT(*)'] ?></h3>
            </div><!-- card-body -->
                   
          </div><!-- card -->
        </div><!-- col-3 -->
      </div>


       <div class="row row-sm" style="margin-top: 50px;">

        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="card pd-20 bg-warning">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Profit</h6>
               <a class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>       
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
              <span class="sparkline2">9,3,5,6,5,9,7,4,5,2</span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold"><h5 class="mg-b-0 tx-white tx-lato tx-bold">BDT <?= number_format($total_amounts['profit']) ?></h5></h3>
            </div><!-- card-body -->
                   
          </div><!-- card -->
        </div><!-- col-3 -->


        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="card pd-20 bg-info">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Month's Profit</h6>
               <a class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>       
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
              <span class="sparkline2">9,3,5,1,2,3,7,4,5,2</span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold"><h5 class="mg-b-0 tx-white tx-lato tx-bold">BDT <?= number_format($total_month['profit_month']) ?></h5></h3>
            </div><!-- card-body -->
                   
          </div><!-- card -->
        </div><!-- col-3 -->

        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="card pd-20 bg-success">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Profit</h6>
               <a class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>       
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
              <span class="sparkline2">9,3,5,6,5,9,7,4,5,2</span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold"><h5 class="mg-b-0 tx-white tx-lato tx-bold">BDT <?= number_format($total_today['profit_today']) ?></h5></h3>
            </div><!-- card-body -->
                   
          </div><!-- card -->
        </div><!-- col-3 -->

        


        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
          <div class="card pd-20 bg-secondary">
            <div class="d-flex justify-content-between align-items-center mg-b-10">
              <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Customer</h6>
               <a class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>       
            </div><!-- card-header -->
            <div class="d-flex align-items-center justify-content-between">
              <span class="sparkline2">9,3,5,7,6,5,9,4,5,2</span>
              <h3 class="mg-b-0 tx-white tx-lato tx-bold"><h5 class="mg-b-0 tx-white tx-lato tx-bold"> <?= $total_customer['COUNT(*)'] ?></h5></h3>
            </div><!-- card-body -->
                   
          </div><!-- card -->
        </div><!-- col-3 -->


        

        
      </div>
    </div><!-- sl-pagebody --><!-- END MAIN CONTENT -->


  <?php require 'd_footer.php' ?>
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  <?php require 'd_javascript.php' ?>
  </body>
</html>
