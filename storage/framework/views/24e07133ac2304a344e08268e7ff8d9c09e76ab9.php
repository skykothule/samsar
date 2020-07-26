<?php $__env->startSection('content'); ?>
<div class="page-header">
  <h1 class="page-title font_lato"><?php echo e(trans('app.update_role')); ?></h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="<?php echo e(URL::to('/dashboard')); ?>"><?php echo e(trans('app.home')); ?></a></li>
		<li><a href="<?php echo e(URL::to('/roles')); ?>"><?php echo e(trans('app.roles')); ?></a></li>
		<li class="active"><?php echo e(trans('app.edit')); ?></li>
	</ol>
  </div>
</div>

<div class="page-content" ng-app="">	
<div class="panel">
<div class="panel-body container-fluid">
<!------------------------start insert, update, delete message ---------------->
<div class="col-lg-12">
<?php if(session('msg_success')): ?>
	<div class="alert dark alert-icon alert-success alert-dismissible alertDismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	  </button>
	  <i class="icon wb-check" aria-hidden="true"></i> 
	  <?php echo e(session('msg_success')); ?>

	</div>
<?php endif; ?>
<?php if(session('msg_update')): ?>
	<div class="alert dark alert-icon alert-info alert-dismissible alertDismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	  </button>
	  <i class="icon wb-check" aria-hidden="true"></i> 
	  <?php echo e(session('msg_update')); ?>

	</div>
<?php endif; ?>
<?php if(session('msg_delete')): ?>
	<div class="alert dark alert-icon alert-danger alert-dismissible alertDismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	  </button>
	  <i class="icon wb-check" aria-hidden="true"></i> 
	  <?php echo e(session('msg_delete')); ?>

	</div>
<?php endif; ?>
</div>

<form name="userForm" action="<?php echo e(URL::to('RoleController/update')); ?>/<?php echo e($roledata->id); ?>" method="post" novalidate="">
<?php echo e(csrf_field()); ?>


<div class="col-md-6">
	<div class="form-group">
		<label class="control-label"><?php echo e(trans('app.role_name')); ?></label>
		<input type="text" required class="form-control" ng-model="name" id="name" name="name" ng-init="name = '<?php echo e($roledata->name); ?>'"  value="<?php echo e($roledata->name); ?>">
	</div>
	<div class="form-group">
		<label class="control-label"><?php echo e(trans('app.display_name')); ?></label>
		<input type="text" required class="form-control" ng-model="display_name" id="display_name" name="display_name" ng-init="display_name = '<?php echo e($roledata->display_name); ?>'" value="<?php echo e($roledata->display_name); ?>">
	</div>
	<div class="form-group">
		<label class="control-label"><?php echo e(trans('app.description')); ?></label>
		<textarea name="description"  ng-model="description" id="description" class="form-control" ng-init="description = '<?php echo e($roledata->description); ?>'"><?php echo e($roledata->description); ?></textarea>
	</div>
	<div class="bs-example" data-example-id="single-button-dropdown">
		<button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left"> 
		<span aria-hidden="true" class="glyphicon glyphicon-refresh"></span> <?php echo e(trans('app.update_role')); ?> 
		<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
		</button>  
	</div>
</div>	



</form>	

<div style="clear:both;"></div>
</div>
</div>
</div><br/>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>