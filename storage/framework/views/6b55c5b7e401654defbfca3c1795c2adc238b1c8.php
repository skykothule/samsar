
<?php $__env->startSection('content'); ?>
    <style>
        .panel-body::-webkit-scrollbar {
            height: 5px;
        }
        .btn-group{
            margin-bottom:10px;
        }
    </style>

    <div class="page-header">
        <h1 class="page-title font_lato"><?php echo e('Company List'); ?></h1>
        <div class="page-header-actions">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/dashboard')); ?>"><?php echo e(trans('app.home')); ?></a></li>
                <li class="active"><?php echo e('company'); ?></li>
            </ol>
        </div>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid" style="width:100%; overflow;hidden;overflow-x:scroll">
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
                        <a href="<?php echo e(URL::to('companyregistration')); ?>" class="btn btn-outline btn-default" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e('Add Company'); ?>"><i class="icon fa-plus" aria-hidden="true"></i> <?php echo e('Add Company'); ?></a>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    

                    <div class="btn-group">
                        <form class="form-inline ng-pristine ng-valid" action="<?php echo e(URL::to('company')); ?>" method="get">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" id="search" placeholder="<?php echo e(trans('app.search_for_action')); ?>" value="<?php echo e(Request::get('search')); ?>">

                                <button type="submit" class="btn btn-outline btn-default"><i class="icon fa-search" aria-hidden="true"></i></button>

                                <?php if(Request::get('search') != ''): ?>
                                    <a href="<?php echo e(URL::to('company')); ?>" class="btn btn-outline btn-danger" type="button">
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
                        <th data-tablesaw-priority="6" class="tablesaw-priority-5 tablesaw-cell-visible"><?php echo e('Profile'); ?></th>
                        <th data-tablesaw-priority="5"><?php echo e('Organisation Name'); ?></th>
                        <th data-tablesaw-priority="4"><?php echo e('Address'); ?></th>
                        <th data-tablesaw-priority="3"><?php echo e('Country'); ?></th>
                        
                        <th data-tablesaw-priority="2"><?php echo e('Created At'); ?></th>
                        <th data-tablesaw-priority="1"><?php echo e('Action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="tablesaw-priority-6 tablesaw-cell-visible"><img class="img-circle img-bordered img-bordered-orange fileupload-new " width="70" height="70" src="<?php echo e(URL::to('uploads/logo')); ?>/<?php echo e($view->company_profile); ?> " alt="..."></td>
                            <td class="tablesaw-priority-5"><?php echo e($view->company_name); ?></td>
                            <td class="tablesaw-priority-4"><?php echo e($view->address); ?></td>
                            <td class="tablesaw-priority-3"><?php echo e($view->country); ?></td>
                            <td class="tablesaw-priority-2"><?php echo e($view->created_at); ?></td>
                            
                            
                            
                            
                            
                            
                            
                            <td class="tablesaw-priority-1">
                                

                                <a title="<?php echo e(trans('app.edit')); ?>" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('app.edit')); ?>" class="btn btn-icon btn-info btn-outline btn-round" href="<?php echo e(URL::to('companyEdit',$view->id)); ?>"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                <button data-placement="top" data-toggle="modal" rel="tooltip" title="<?php echo e(trans('app.delete')); ?>"  data-original-title="<?php echo e(trans('app.delete')); ?>"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="<?php echo e(URL::to('destroy',$view->id)); ?>"><i class="icon fa-remove" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
                <div style="clear:both;"></div><br/>

            
            
            <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div><br/>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>