
<?php $__env->startSection('content'); ?>
<div class="page-content padding-20 container-fluid">
<style>
@media  screen and (max-width: 1200px) {
    .clearbothsub{
	clear:both !important;
	}
	.clearbothmain{
	width:100% !important;
	}
}
canvas{
        width: 95% !important;
        max-width: 100%;
        height: auto !important;
    }
	.box1{
		box-shadow: 6px 6px 6px 2px darkgrey;
		background-color: #17a2b8;
		color: #fff;
	}
	.box2{
		box-shadow: 6px 6px 6px 2px darkgrey;
		background-color: #dc3545;
		color: #fff;
	}
	.box3{
		box-shadow: 6px 6px 6px 2px darkgrey;
		background-color: #ffc107;
		color: #fff;
	}
	.box4{
		box-shadow: 6px 6px 6px 2px darkgrey;
		background-color: #28a745;
		color: #fff;
	}
</style>
<!------------------------------ Start Alert message--------------->
<div class="alert alert-primary alert-dismissible alertDismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">×</span>
  </button>
Welcome  <?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?> !
</div>
<!-------------------------------- End alert message--------------->

<!-------------------------------- Start first step graph--------------->
<div class="row" data-plugin="matchHeight" data-by-row="true">
<div class="col-lg-3 col-sm-6 col-xs-12 info-panel">
  <div class="widget widget-shadow">
	<div class="widget-content bg-white padding-20 box1">
	  <button type="button" class="btn btn-floating btn-sm btn-primary">
		<i class="icon wb-home" aria-hidden="true"></i>
	  </button>
	  <span class="margin-left-15 font-weight-400 example-title">Total Schools</span>
	  <div class="content-text text-center margin-bottom-0">
		<span class="font-size-40 font-weight-100">10</span>
		
	  </div>
	</div>
  </div>
</div>
<div class="col-lg-3 col-sm-6 col-xs-12 info-panel">
  <div class="widget widget-shadow">
	<div class="widget-content bg-white padding-20 box2">
	  <button type="button" class="btn btn-floating btn-sm btn-primary">
		<i class="icon wb-user" aria-hidden="true"></i>
	  </button>
	  <span class="margin-left-15 font-weight-400 example-title"> Total Trainers</span>
	  <div class="content-text text-center margin-bottom-0">
		<span class="font-size-40 font-weight-100">10</span>
		
	  </div>
	</div>
  </div>
</div>
<div class="col-lg-3 col-sm-6 col-xs-12 info-panel">
  <div class="widget widget-shadow">
	<div class="widget-content bg-white padding-20 box3">
	  <button type="button" class="btn btn-floating btn-sm btn-primary">
		<i class="icon wb-users"></i>
	  </button>
	  <span class="margin-left-15 font-weight-400 example-title">Total Students</span>
	  <div class="content-text text-center margin-bottom-0">
		<span class="font-size-40 font-weight-100">1000</span>
	  </div>
	</div>
  </div>
</div>
<div class="col-lg-3 col-sm-6 col-xs-12 info-panel">
  <div class="widget widget-shadow">
	<div class="widget-content bg-white padding-20 box4">
	  <button type="button" class="btn btn-floating btn-sm btn-primary">
		<i class="icon wb-pie-chart" aria-hidden="true"></i>
	  </button>
	  <span class="margin-left-15 font-weight-400 example-title">Total Yearly Events</span>
	  <div class="content-text text-center margin-bottom-0">
		<span class="font-size-40 font-weight-100">100</span>
	  </div>
	</div>
  </div>
</div>
</div>
<!-------------------------------- end first step graph--------------->

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>