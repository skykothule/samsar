
<?php $__env->startSection('content'); ?>
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
                        <a href="<?php echo e(URL::to('createorder')); ?>" class="btn btn-outline btn-default" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e('Place order'); ?>"><i class="icon fa-plus" aria-hidden="true"></i> <?php echo e('Place Order'); ?></a>
                    </div>
                    
                        
                    
                    <div class="btn-group">
                        <a href="<?php echo e(URL::to('orderimport')); ?>" class="btn btn-outline btn-default" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(trans('app.import')); ?>"><span class="glyphicon glyphicon-import" aria-hidden="true"></span> <?php echo e(trans('app.import')); ?></a>
                    </div>
                    
                        
                    
                    
                        
                    

                    
                        
                            
                                

                                

                                
                                    
                                        
                                    
                                
                            
                        
                    
                </div>
                <div style="clear:both;"></div><br/>

                <table class="tablesaw table-striped table-bordered tablesaw-columntoggle" data-tablesaw-mode="columntoggle" data-tablesaw-minimap="" id="table-3973">
                    <thead>
                    <tr>
                        <th data-tablesaw-priority="5" class="tablesaw-priority-5 tablesaw-cell-visible">Ship Order ID</th>
                        <th data-tablesaw-priority="4">Order Date</th>
                        <th data-tablesaw-priority="3">Sail Date</th>
                        <th data-tablesaw-priority="2">Booking Status</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $orderdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="tablesaw-priority-5 tablesaw-cell-visible"><a href="<?php echo e(URL::to('showorder')); ?>/<?php echo e($view->id); ?>" title="View details" ><?php echo e($view->order_id); ?></a></td>
                            <td class="tablesaw-priority-4"><?php echo e(date('Y-m-d',strtotime($view->order_date))); ?></td>
                            <td class="tablesaw-priority-3"><?php echo e(date('Y-m-d',strtotime($view->created_at))); ?></td>
                            <td class="tablesaw-priority-3">Waiting for API response</td>
                            
                                
                                    
                                
                                    
                                
                            
                            
                                

                                

                                
                            
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
        <script type='text/javascript'>
            $(document).ready(function(){

                $('.orderview').click(function(){
                    var id = $(this).data('id');
                    // AJAX request
                    $.ajax({
                        url: 'http://ptcaredev.in/samsar_dev_env/ordershow',
                        type: 'get',
                        data: {id: id},
                        success: function(response){
                            // Add response in Modal body
                            $('.modal-body').html(response);
                            console.log(response);
                            // Display Modal
                            $('#empModal').modal('show');
                        }
                    });
                });
            });
        </script>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>