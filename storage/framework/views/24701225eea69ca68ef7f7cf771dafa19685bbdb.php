
<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/global/vendor/filament-tablesaw/tablesaw.css">
    <div class="page-header">
        <h1 class="page-title font_lato"><?php echo e('Samsar Shippings'); ?></h1>
        <div class="page-header-actions">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/dashboard')); ?>"><?php echo e(trans('app.home')); ?></a></li>
                <li class="active"><?php echo e('Order Details'); ?></li>
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

                
                    
                        
                    
                    
                    
                    
                    
                        
                    
                    
                    
                    
                    
                    
                    

                    
                    
                    
                    

                    

                    
                    
                    
                    
                    
                    
                    
                    
                
                <div style="clear:both;"></div><br/>
                <div class="row row-lg">
                    <div class="col-sm-12" >
                        <!-- Example Basic Form -->
                        <p class="font-size-20 blue-grey-700">Order Details</p>
                        
                            
                                
                            
                        

                    <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="inputBasicFirstName"><b>Ship Order Id   : </b> </label>
                                <span><?php echo e(empty($orderdata[0]->order_id)?'':$orderdata[0]->order_id); ?></span>
                            </div>
                        <div class="form-group col-sm-6">
                            <label class="control-label" for="inputBasicFirstName"><b>Order Date     : </b> </label>
                            <span><?php echo e(empty($orderdata[0]->order_date)?'':date('Y-m-d',strtotime($orderdata[0]->order_date))); ?></span>
                        </div>
                    </div> <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="inputBasicFirstName"><b>Order Status   : </b> </label>
                                <span><?php echo e(empty($itemdata[0]->bookingstatus)?'':$itemdata[0]->bookingstatus); ?></span>
                                <span>
                                  <?php if(Auth::user()->hasRole('Agent')): ?>  
                                    <?php if($itemdata[0]->bookingstatus == 'transfer'): ?>
                                    <button data-placement="top" data-toggle="modal" rel="tooltip" title="change status"  data-original-title="change status"  class="btn btn-icon btn-outline btn-round btn-sm" data-target=".asf" type="button" data-href="<?php echo e(URL::to('asf',$orderdata[0]->order_id)); ?>" style="color:#ec5d6f;border-color: #dc3545;background-color:#ffffff"> ASF</button>
                                    <?php elseif($itemdata[0]->bookingstatus == 'AtSortFacility-USA'): ?>
                                    <button data-placement="top" data-toggle="modal" rel="tooltip" title="change status"  data-original-title="change status"  class="btn btn-icon btn-outline btn-round btn-sm" data-target=".pas" type="button" data-href="<?php echo e(URL::to('pas',$orderdata[0]->order_id)); ?>" style="color:#e07b39;border-color: #e07b39;background-color:#ffffff">PAS</button>
                                    <?php endif; ?>
                                <?php endif; ?>    
                                </span>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="inputBasicFirstName"><b>Shipment Status    : </b> </label>
                                <span><?php echo e(empty($itemdata[0]->orderstatus)?'':$itemdata[0]->orderstatus); ?></span>
                            </div>
                        </div>
                         
                        <div class="row">

                            <div class="form-group col-sm-6">
                                <label class="control-label" for="inputBasicFirstName"><b>Organisation    : </b> </label>
                                <span><?php echo e(empty($itemdata[0]->company_name)?'':$itemdata[0]->company_name); ?></span>
                            </div>
                            <?php if(Auth::user()->hasRole('Agent')): ?>
                             <div class="form-group col-sm-6">
                                <label class="control-label" for="inputBasicFirstName"><b>Total Items   : </b> </label>
                                <span><?php echo e(empty($orderdata)?'':count($orderdata)); ?></span>
                            </div>
                            <?php else: ?>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="inputBasicFirstName"><b>Total Items   : </b> </label>
                                <span><?php echo e(empty($orderdata)?'':count($orderdata)); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php if(Auth::user()->hasRole('Agent')): ?>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName"><b>Sail Date    : </b> </label>
                                    <span><?php echo e(empty($itemdata[0]->ship_date)?'':date('Y-m-d',strtotime($itemdata[0]->ship_date))); ?></span>
                                </div>
                               <div class="form-group col-sm-6">
                                <label class="control-label" for="inputBasicFirstName"><b>Tracking Id    :</b> </label>
                                <span><?php echo e(empty($itemdata[0]->tracking_id)?'':$itemdata[0]->tracking_id); ?></span>
                            </div>
                            </div>
                            <!-- <div class="row">-->
                            <!--<div class="form-group col-sm-6">-->
                            <!--        <a  data-toggle="tooltip" data-placement="top"  class="btn btn-icon btn-primary btn-outline btn-round " href="<?php echo e(URL::to('bedispatch',$orderdata[0]->order_id)); ?>" data-original-title="Download Order"><i class="fa fa-paper-plane" aria-hidden="true"></i> Begin Dispatch</a>-->
                            <!--        <a  data-toggle="tooltip" data-placement="top"  class="btn btn-icon btn-info btn-outline btn-round " href="<?php echo e(URL::to('dispatch',$orderdata[0]->order_id)); ?>" data-original-title="Download Trackings"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Dispatched</a>-->
                            <!--    </div>-->
                            <!--</div>    -->
                        <?php else: ?>
                            <div class="row">
                                <form method="post" action="<?php echo e(url('saildateupdate')); ?>" >
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo e(empty($orderdata[0]->order_id)?'':$orderdata[0]->order_id); ?>" name="orderid"/>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="inputBasicFirstName"><b>Sail Date  :</b></label>
                                        <span class="">
                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                </span>
                                        <input type="text"  name="sail_date" value="<?php echo e(empty($itemdata[0]->ship_date)?'':date('Y-m-d',strtotime($itemdata[0]->ship_date))); ?>" placeholder="Select date" data-plugin="datepicker">

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="inputBasicFirstName"><b>Tracking Id    : </b> </label>
                                        <input type="text" class="" id="tracking_id" name="tracking_id" placeholder="Enter tracking id" value="<?php echo e(is_null($itemdata[0]->tracking_id)?'':$itemdata[0]->tracking_id); ?>" autocomplete="off">
                                        
                                        <div class="btn-group">
                                        <button data-original-title="item confirm"  class="btn btn-outline btn-success" type="submit" ><span class="icon fa-check" aria-hidden="true"></span> Save</button>
                                        </div>
                                   
                                        <!--<button type="submit" name="submit" class="btn btn-outline btn-info"><i class="icon fa-check" aria-hidden="true"> SAVE</i></button>-->
                                    </div>
                                </form>
                            </div>

                        </div>
                        <?php endif; ?>
                            <form method="post" action="<?php echo e(url('itemstatus')); ?>" id="formfield">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="btype" id="mySubmit">
                                <input type="hidden" name="orderID" value="<?php echo e(empty($orderdata[0]->order_id)?'':$orderdata[0]->order_id); ?>">
                                <input type="hidden" name="orgid11" value="<?php echo e(empty($itemdata[0]->orgid)?'':$itemdata[0]->orgid); ?>" />
                                <div class="bs-example" data-example-id="single-button-dropdown" style="float:left; ">
                                     <?php if(Auth::user()->hasRole('Agent')): ?>
                                     <?php if($itemdata[0]->bookingstatus != 'initial' && $itemdata[0]->orderstatus == 'booked'): ?>
                                    <div class="btn-group">
                                        <button data-placement="top" data-toggle="modal" rel="tooltip" title="item dispatch"  data-original-title="item dispatched"  class="btn btn-outline btn-info" data-target=".dispatch" id="submitBtn" type="button" ><span class="fa fa-paper-plane" aria-hidden="true"></span> Dispatched</button>
                                    </div>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <?php if($itemdata[0]->bookingstatus == 'transfer' || $itemdata[0]->bookingstatus == 'initial'): ?>
                                    <div class="btn-group">
                                        <button data-placement="top" data-toggle="modal" rel="tooltip" title="item confirm"  data-original-title="item confirm"  class="btn btn-outline btn-success" data-target=".confirm" id="submitBtn"  type="button" ><span class="fa fa-check-square" aria-hidden="true"></span> Confirm</button>
                                    </div>
                                    <div class="btn-group">
                                        <button data-placement="top" data-toggle="modal" rel="tooltip" title="item cancel"  data-original-title="item cancel"  class="btn btn-outline btn-warning" data-target=".cancel" id="submitBtn" type="button" ><span class="fa fa-ban" aria-hidden="true"></span> Cancel</button>
                                    </div>
                                    <div class="btn-group">
                                        <button data-placement="top" data-toggle="modal" rel="tooltip" title="item split"  data-original-title="item cancel"  class="btn btn-outline btn-danger" data-target=".split" id="submitBtn" type="button" ><span class="fa fa-columns" aria-hidden="true"></span> Split</button>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                   
                                </div>
                                
                                <div style="clear:both;"></div>

                                <table class="tablesaw table-striped table-bordered tablesaw-columntoggle" data-tablesaw-mode="columntoggle" data-tablesaw-minimap="" id="table-3973">
                                    <thead>
                                    <tr>
                                        <th>&nbsp;&nbsp;
                                            <input type="checkbox" id="ckbCheckAll" />
                                        </th>
                                        <th data-tablesaw-priority="5" class="tablesaw-priority-5 tablesaw-cell-visible">Ship To Order ID</th>
                                        <th data-tablesaw-priority="4">Ship To Name</th>
                                        <th data-tablesaw-priority="3">Ship to Address</th>
                                        <th data-tablesaw-priority="3">Total Weight</th>
                                        <th data-tablesaw-priority="2">Tracking ID</th>
                                        <th data-tablesaw-priority="2">Status</th>
                                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($orderdata)): ?>
                    <?php $__currentLoopData = $orderdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="text-align: center">
                                <input type="checkbox" class="checkBoxClass" id="Checkbox<?php echo e($view->item_id); ?>" name="check_item[]" value="<?php echo e($view->item_id); ?>" />
                            </td>
                            <td class="tablesaw-priority-5 tablesaw-cell-visible"><?php echo e($view->item_id); ?></td>
                            <td class="tablesaw-priority-4"><?php echo e($view->ship_to_name); ?></td>
                            <td class="tablesaw-priority-3">
                                 <?php echo e($view->ship_to_add1); ?>

                                <?php if(is_null($view->ship_to_add2)): ?>

                                <?php else: ?>
                                    <?php echo e($view->ship_to_add2); ?>

                                <?php endif; ?>
                                <?php if(is_null($view->ship_to_add2)): ?>

                                 <?php else: ?>
                                    <?php echo e($view->ship_to_add3); ?>

                                <?php endif; ?>

                                <?php echo e($view->ship_to_city); ?> <?php echo e($view->ship_to_state); ?> <?php echo e($view->ship_to_pincode); ?>

                            </td>
                            <td class="tablesaw-priority-2"><?php echo e($view->total_weight); ?></td>
                            <td class="tablesaw-priority-1"><?php echo e($view->tracking_id); ?></td>
                            <?php if($view->status == 'initial'): ?>
                            <td class="tablesaw-priority-1" style="color:#0b98de;font-weight: 700">INITIAL</td>
                            <?php elseif($view->status == 'confirm'): ?>
                            <td class="tablesaw-priority-1" style="color:#28a745;font-weight: 700">CONFIRM</td>
                            <?php elseif($view->status == 'booked'): ?>
                            <td class="tablesaw-priority-1" style="color:#17a2b8;font-weight: 700">BOOKED</td>
                            <?php elseif($view->status == 'dispatched'): ?>
                            <td class="tablesaw-priority-1" style="color:#16b583;font-weight: 700">DISPATCHED</td>
                            <?php else: ?>
                            <td class="tablesaw-priority-1" style="color:#c69500;font-weight: 700">CANCEL</td>
                            <?php endif; ?>
                            
                            
                            
                            
                            
                            
                            
                            
                            

                            

                            
                            

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
                <div class="modal fade modal-3d-flip-vertical split" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title">Item Split</h4>
                            </div>
                                <div class="modal-body ">
                                    <div class="form-group">
                                        <div>
                                            <label><input type="radio" name="split" value="new" checked>  New order id</label>
                                        </div>
                                        <div class="check-box">
                                            <label><input type="radio" name="split" value="old">  Merge in present order id</label>
                                        </div>
                                    </div>
                                    <div class="form-group selectpicker" style="display:none">
                                        <label class="control-label" for="inputBasicFirstName"><b>Order id list</b></label>
                                        <select class="form-control " name="orgid" ng-init="orgid = '<?php echo e(old('orgid')); ?>'">
                                            <option value="">Select order id</option>
                                            <?php if(!empty($orderlist)): ?>
                                            <?php $__currentLoopData = $orderlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($view->orderid); ?>"><?php echo e($view->orderid); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                    
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default margin-0" data-dismiss="modal"><?php echo e(trans('app.close')); ?></button>
                                <button class="btn btn-danger btn-ok" id="split" >Split Item</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

                <div style="clear:both;"></div><br/>

            
            <?php echo e($orderdata->appends(Request::only('search'))->links()); ?>

            <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div><br/>

    <div class="modal fade modal-3d-flip-vertical confirm" aria-hidden="true"
         aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Item Confirm</h4>
                </div>
                <div class="modal-body">
                    <p> Are you sure that you want to confirm this item's?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default margin-0" data-dismiss="modal"><?php echo e(trans('app.close')); ?></button>
                    <a class="btn btn-success btn-ok" id="confirm">Confirm Item</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-3d-flip-vertical cancel" aria-hidden="true"
         aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Item Cancel</h4>
                </div>
                <div class="modal-body">
                    <p> Are you sure that you want to cancel or split this item's?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default margin-0" data-dismiss="modal"><?php echo e(trans('app.close')); ?></button>
                    <a class="btn btn-warning btn-ok" id="cancel">Cancel Item</a>
                    <button data-dismiss="modal"  class="btn btn-outline btn-danger splitopen" type="button"><span class="fa fa-columns" aria-hidden="true">Split</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade modal-3d-flip-vertical dispatch" aria-hidden="true"
         aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Item Dispatch</h4>
                </div>
                <div class="modal-body">
                    <p> Are you sure that you want to dispatched this item's?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default margin-0" data-dismiss="modal"><?php echo e(trans('app.close')); ?></button>
                    <button class="btn btn-danger btn-ok" id="dispatch">Confirm Item</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-3d-flip-vertical pas" aria-hidden="true"
         aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Change Status</h4>
                </div>
                <div class="modal-body">
                    <p> Are you sure that you want to change status?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default margin-0" data-dismiss="modal"><?php echo e(trans('app.close')); ?></button>
                    <a class="btn btn-danger btn-ok" id="pas">Confirm</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-3d-flip-vertical asf" aria-hidden="true"
         aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Change Status</h4>
                </div>
                <div class="modal-body">
                    <p> Are you sure that you want to change status?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default margin-0" data-dismiss="modal"><?php echo e(trans('app.close')); ?></button>
                    <a class="btn btn-danger btn-ok" id="asf">Confirm</a>
                </div>
            </div>
        </div>
    </div>
        <script type='text/javascript'>
            $('.confirm').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
            $('.cancel').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
            $('.split').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
            $('.dispatch').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
            $('.asf').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
            $('.pas').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
            
            $(document).ready(function() {
                $("body").tooltip({ selector: '[data-toggle=tooltip]' });
            });

            $(document).ready(function () {
                $('#confirm').click(function(){
                    document.getElementById("mySubmit").value = 'confirm';
                    $('#formfield').submit();
                });
                $('#cancel').click(function(){
                    document.getElementById("mySubmit").value = 'cancel';
                    $('#formfield').submit();
                });
                $('#split').click(function(){
                    document.getElementById("mySubmit").value = 'split';
                    $('#formfield').submit();
                });
                $('#dispatch').click(function(){
                    document.getElementById("mySubmit").value = 'dispatch';
                    $('#formfield').submit();
                });
                // $('#split1').click(function(){
                //     document.getElementById("mySubmit").value = 'split';
                //     $('#formfield').submit();
                // });

//                $('#ckbCheckAll').click(function(event) {  //on click
//                    var checked = this.checked;
//                    table.column(0).nodes().to$().each(function(index) {
//                        if (checked) {
//                            $(this).find('.checkBoxClass').prop('checked', 'checked');
//                        } else {
//                            $(this).find('.checkBoxClass').removeProp('checked');
//                        }
//                    });
//                    table.draw();
//                });
                $("#ckbCheckAll").click(function () {
                    $(".checkBoxClass").prop('checked', $(this).prop('checked'));
                });

                $(".checkBoxClass").change(function(){
                    if (!$(this).prop("checked")){
                        $("#ckbCheckAll").prop("checked",false);
                    }
                });
            });
            
        $(document).ready(function () {
            $('.check-box').click(function(){
                    $('.selectpicker').show();
                });
                
            $('.splitopen').click(function(){
                // $('.cancel').hide();
                $(".split").modal();
            });
            });
        </script>
</div>        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>