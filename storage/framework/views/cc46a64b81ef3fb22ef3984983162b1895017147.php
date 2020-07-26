
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/global/vendor/filament-tablesaw/tablesaw.css">
<div class="page-header">
  <h1 class="page-title font_lato">Customer List</h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="<?php echo e(URL::to('/dashboard')); ?>">Home</a></li>
		<li class="active">Customers</li>
	</ol>
  </div>
</div>
<div class="page-content">	
<div class="panel">
<div class="panel-body container-fluid">
<!------------------------start insert, update, delete message ---------------->
<div class="row">
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

 <div class="bs-example" data-example-id="single-button-dropdown" style="float:right; ">
    <div class="btn-group">
    <a href="<?php echo e(URL::to('customerpdf')); ?>" class="btn btn-outline btn-default" data-toggle="tooltip" data-placement="top" data-original-title="Customer PDF"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo e(trans('app.pdf')); ?></a>			
</div>

<div class="btn-group">
	<form class="form-inline ng-pristine ng-valid" action="<?php echo e(URL::to('customers')); ?>" method="get"> 
		<div class="form-group">  
			<input type="text" name="search" class="form-control" id="search" placeholder="<?php echo e(trans('app.search_for_action')); ?>" value="<?php echo e(Request::get('search')); ?>"> 
		
		<button type="submit" class="btn btn-outline btn-default"><i class="icon fa-search" aria-hidden="true"></i></button>
		 
		<?php if(Request::get('search') != ''): ?>
	   <a href="<?php echo e(URL::to('customers')); ?>" class="btn btn-outline btn-danger" type="button">
		  <i class="icon fa-remove" aria-hidden="true"></i>
		</a>
	<?php endif; ?>
	</div>	
</form>
</div>
</div>
<div style="clear:both;"></div><br/>	 
		
	<table class="tablesaw table-striped table-bordered tablesaw-columntoggle" data-tablesaw-mode="columntoggle" data-tablesaw-minimap="" id="table-3973">
		<thead>
		  <tr>
			  <th data-tablesaw-priority="5" class="tablesaw-priority-5 tablesaw-cell-visible"><?php echo e(trans('app.name')); ?></th>
			  <th data-tablesaw-priority="4"><?php echo e(trans('app.username')); ?></th>
			  <th data-tablesaw-priority="3"><?php echo e(trans('app.email_address')); ?></th>	
			  <th id='myColumnId' data-tablesaw-priority="1"><?php echo e(trans('app.actions')); ?></th>
		  </tr>
		</thead>
		<tbody>
		<?php $__currentLoopData = $customerdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
			  <td class="tablesaw-priority-5 tablesaw-cell-visible"><?php echo e($view->first_name); ?> <?php echo e($view->last_name); ?></td>
			  <td class="tablesaw-priority-4"><?php echo e($view->username); ?></td>
			  <td class="tablesaw-priority-3"><?php echo e($view->email); ?></td>	
			  <td class="tablesaw-priority-1">	
                <a title="Customer Details" data-toggle="tooltip" data-placement="top" data-original-title="View details" class="btn btn-icon btn-primary btn-outline btn-round " href="<?php echo e(URL::to('customerdetails',$view->id)); ?>"><i class="icon fa-eye" aria-hidden="true"></i></a> 		 
                <button data-placement="top" data-toggle="modal" rel="tooltip" title="<?php echo e(trans('app.delete')); ?>"  data-original-title="<?php echo e(trans('app.delete')); ?>"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="<?php echo e(URL::to('destroycustomer',$view->id)); ?>"><i class="icon fa-remove" aria-hidden="true"></i></button>
            </td>			
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  
		</tbody>
	  </table>
<div style="clear:both;"></div><br/>

<!--<?php echo e($customerdata->render()); ?>-->
<?php echo e($customerdata->appends(Request::only('search'))->links()); ?>

<!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div><br/>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>