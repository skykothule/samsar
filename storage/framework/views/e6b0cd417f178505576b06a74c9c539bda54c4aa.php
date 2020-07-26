
<?php $__env->startSection('content'); ?>
<style>
canvas{
	width: 95% !important;
	max-width: 100%;
	height: auto !important;
}
</style>
<div class="page-content padding-20 container-fluid">
<!------------------------------ Start Alert message--------------->
<div class="alert alert-primary alert-dismissible alertDismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">×</span>
  </button>
 <?php echo e(trans('app.welcome')); ?>  <?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?> !
</div>
<!-------------------------------- End alert message--------------->
	

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>