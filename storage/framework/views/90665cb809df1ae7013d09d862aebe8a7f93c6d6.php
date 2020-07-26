
<?php $__env->startSection('content'); ?>
    <style>
        #sail {
            background-color: transparent;
            border: 0px solid;
            height: 50px;
            width: 100px;

        }
    </style>
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/global/vendor/filament-tablesaw/tablesaw.css">
    <div class="page-header">
        <h1 class="page-title font_lato"><?php echo e('Order List'); ?></h1>
        <div class="page-header-actions">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/dashboard')); ?>"><?php echo e(trans('app.home')); ?></a></li>
                <li class="active"><?php echo e('Order'); ?></li>
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
                        <a href="<?php echo e(URL::to('orderimport')); ?>" class="btn btn-outline btn-default" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('app.import')); ?>"><span class="glyphicon glyphicon-import" aria-hidden="true"></span> Add new order</a>
                    </div>
                    
                        
                    
                    
                        
                    

                    
                        
                            
                                

                                

                                
                                    
                                        
                                    
                                
                            
                        
                    
                </div>
                <!--<div style="clear:both;"></div><br/>-->

                <table class="tablesaw table-striped table-bordered tablesaw-columntoggle" data-tablesaw-mode="columntoggle" data-tablesaw-minimap="" id="table-3973">
                    <thead>
                    <tr>
                        <th data-tablesaw-priority="5" class="tablesaw-priority-5 tablesaw-cell-visible">Ship Order ID</th>
                        <th data-tablesaw-priority="4">Order Date</th>
                        <th data-tablesaw-priority="3">Sail Date</th>
                        <th data-tablesaw-priority="3">Organisation Name</th>
                        <th data-tablesaw-priority="3">Created By</th>
                        <th data-tablesaw-priority="2">Order Status</th>
                        <th data-tablesaw-priority="2">Shipment Status</th>
                        <th id='myColumnId' data-tablesaw-priority="1">Download Files</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $orderdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="tablesaw-priority-5 tablesaw-cell-visible"><a href="<?php echo e(URL::to('showorder')); ?>/<?php echo e($view->orderid); ?>/<?php echo e($view->orgid); ?>" title="View details" ><?php echo e($view->orderid); ?></a></td>
                            <td class="tablesaw-priority-4"><?php echo e(date('Y-m-d',strtotime($view->created_at))); ?></td>
                            <td class="tablesaw-priority-3"><?php echo e(date('Y-m-d',strtotime($view->sailDate))); ?></td>
                            <td class="tablesaw-priority-3"><?php echo e($view->company_name); ?></td>
                            <td class="tablesaw-priority-3"><?php echo e($view->first_name); ?> <?php echo e($view->last_name); ?></td>
                            <?php if($view->bookingstatus == 'initial'): ?>
                            <td class="tablesaw-priority-1" style="color:#0b98de;font-weight: 700">INITIAL</td>
                            <?php elseif($view->bookingstatus == 'transfer'): ?>
                            <td class="tablesaw-priority-1" style="color:#28a765;font-weight: 700">TRANSFER</td>
                            <?php elseif($view->bookingstatus == 'AtSortFacility-USA'): ?>
                            <td class="tablesaw-priority-1" style="color:#17a2a8;font-weight: 700">AtSortFacility-USA</td>
                            <?php elseif($view->bookingstatus == 'ProcessedAtSort-USA'): ?>
                            <td class="tablesaw-priority-1" style="color:#16b563;font-weight: 700">ProcessedAtSort-USA</td>
                            <?php elseif($view->bookingstatus == 'dispatched'): ?>
                            <td class="tablesaw-priority-1" style="color:#16b583;font-weight: 700">DISPATCHED</td>
                            <?php else: ?>
                            <td class="tablesaw-priority-1" style="color:#000000;font-weight: 700">CLOSED</td>
                            <?php endif; ?>
                            
                            <?php if($view->orderstatus == 'initial'): ?>
                            <td class="tablesaw-priority-1" style="color:#0b98de;font-weight: 700">INITIAL</td>
                            <?php elseif($view->orderstatus == 'confirm'): ?>
                            <td class="tablesaw-priority-1" style="color:#28a745;font-weight: 700">CONFIRM</td>
                            <?php elseif($view->orderstatus == 'booked'): ?>
                            <td class="tablesaw-priority-1" style="color:#17a2b8;font-weight: 700">BOOKED</td>
                            <?php elseif($view->orderstatus == 'dispatched'): ?>
                            <td class="tablesaw-priority-1" style="color:#16b583;font-weight: 700">DISPATCHED</td>
                            <?php else: ?>
                            <td class="tablesaw-priority-1" style="color:#c69500;font-weight: 700">CANCEL</td>
                            <?php endif; ?>
                            <td class="tablesaw-priority-3">
                                
                            <a  data-toggle="tooltip" data-placement="top"  class="btn btn-icon btn-primary btn-outline btn-round " href="<?php echo e(URL::to('exportitem',$view->orderid)); ?>" data-original-title="Download Order"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                            <?php if($view->orderstatus != 'initial' && $view->orderstatus != 'confirm' && $view->orderstatus != 'cancel' && $view->bookingstatus != 'initial'): ?>
                            
                            <a  data-toggle="tooltip" data-placement="top"  class="btn btn-icon btn-info btn-outline btn-round " href="<?php echo e(URL::to('exporttracking',$view->orderid)); ?>" data-original-title="Download Trackings"><i class="fa fa-table" aria-hidden="true"></i></a>
                            <?php endif; ?>
                            <?php if($view->orderstatus != 'initial' && $view->orderstatus != 'cancel' && $view->bookingstatus != 'initial'): ?>
                            <?php if (\Entrust::can('Booking')) : ?>
                            <a  data-toggle="tooltip" data-placement="top"  class="btn btn-icon btn-success btn-outline btn-round " href="<?php echo e(URL::to('trackingimport',$view->orderid)); ?>" data-original-title="Import Trackings"><span class="glyphicon glyphicon-import" aria-hidden="true"></span></a>
                            <?php endif; // Entrust::can ?>
                            <?php endif; ?>
                            
                                
                                    
                                
                                    
                                
                            
                            
                                

                                

                                
                            
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

    <div class="container" >
        <!-- Modal -->
        <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Samsar Shippings </h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>