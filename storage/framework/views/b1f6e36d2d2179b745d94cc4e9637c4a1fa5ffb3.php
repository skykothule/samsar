
<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css">
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/global/vendor/jt-timepicker/jquery-timepicker.css">
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/assets/examples/css/forms/advanced.css">

    <style>
        p.redcolor{color:red; font-size:16px;}
        .spancolor{color:red;}
        .help-block{color:red;}
    </style>

    <div class="page-header">
        <h1 class="page-title font_lato">Create New Order</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/dashboard')); ?>"><?php echo e(trans('app.home')); ?></a></li>
                <li><a href="<?php echo e(URL::to('orderlist')); ?>"><?php echo e('Order'); ?></a></li>
                <li class="active"><?php echo e(trans('app.create')); ?></li>
            </ol>
        </div>
    </div>

    <div class="page-content" ng-app="app" ng-cloak>
        <div class="panel">
            <div class="panel-body container-fluid">
                <!------------------------start insert, update, delete message  ---------------->
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
                <form  name="userForm" action="<?php echo e(URL::to('storeorder')); ?>" ng-submit="submitForm(userForm.$valid)" novalidate  id="demo-form2" data-parsley-validate="" method="post" novalidate="">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700">Order Details</p>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Order ID<span class="spancolor">*</span> </label>
                                    <input type="text" class="form-control" id="order_id" ng-model="order_id" name="order_id" ng-init="order_id='<?php echo e(old('order_id')); ?>'" placeholder="Order id" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Order Date</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="icon wb-calendar" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="order_date" value="<?php echo e(old('order_date')); ?>" placeholder="Order date" data-plugin="datepicker">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Order Value</label>
                                    <input type="text" class="form-control" id="order_value" name="order_value" placeholder="Order value" value="<?php echo e(old('order_value')); ?>" autocomplete="off">
                                </div>
                                
                                    
                                    
                                        
                                        
                                            
                                        
                                    
                                
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Requested Service</label>
                                    <input type="text" class="form-control" id="service" name="service" placeholder="Requested service" value="<?php echo e(old('service')); ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Name</label>
                                    <input type="text" class="form-control" id="ship_to_name" name="ship_to_name" placeholder="Name" value="<?php echo e(old('ship_to_name')); ?>" autocomplete="off">
                                </div>
                                
                                    
                                    
                                        
                                        
                                            
                                        
                                    
                                
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Company</label>
                                    <select ng-model="role"  class="form-control" name="ship_to_company" required ng-init="ship_to_company = '<?php echo e(old('ship_to_company')); ?>'">
                                    <option value="">Select Company </option>
                                    <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($view->id); ?>"><?php echo e($view->company_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Address-1</label>
                                    <input type="text" class="form-control" id="ship_to_add1" name="ship_to_add1" placeholder="Address-1" value="<?php echo e(old('ship_to_add1')); ?>" autocomplete="off">
                                </div>
                                
                                    
                                    
                                        
                                            
                                                
                                                
                                            
                                            
                                                
                                                
                                            
                                        
                                    
                                
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Address-2</label>
                                    <input type="text" class="form-control" id="ship_to_add2" name="ship_to_add2" placeholder="Address-2" value="<?php echo e(old('ship_to_add2')); ?>" autocomplete="off">
                                </div>

                                
                                    
                                    
                                        
                                            
                                                
                                                
                                            
                                            
                                                
                                                
                                            
                                        
                                    

                                

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Address-3</label>
                                    <input type="text" class="form-control" id="ship_to_add3" name="ship_to_add3" placeholder="Address-3" value="<?php echo e(old('ship_to_add3')); ?>" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- State/Province</label>
                                    <input type="text" class="form-control" id="ship_to_state" name="ship_to_state" placeholder="State" value="<?php echo e(old('ship_to_state')); ?>" autocomplete="off">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- City</label>
                                    <input type="text" class="form-control" id="ship_to_city" name="ship_to_city" placeholder="City" value="<?php echo e(old('ship_to_city')); ?>" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Postal Code</label>
                                    <input type="text" class="form-control" id="ship_to_pincode" name="ship_to_pincode" placeholder="Postal code" value="<?php echo e(old('ship_to_pincode')); ?>" autocomplete="off">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Country</label>
                                    <input type="text" class="form-control" id="ship_to_country" name="ship_to_country" placeholder="Country" value="<?php echo e(old('ship_to_country')); ?>" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Phone</label>
                                    <input type="text" class="form-control" id="ship_to_phone" name="ship_to_phone" placeholder="Phone" value="<?php echo e(old('ship_to_phone')); ?>" autocomplete="off">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Email</label>
                                    <input type="text" class="form-control" id="ship_to_email" name="ship_to_email" placeholder="Email" value="<?php echo e(old('ship_to_email')); ?>" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Total Weight in Oz</label>
                                    <input type="text" class="form-control" id="total_weight" name="total_weight" placeholder="Weight" value="<?php echo e(old('total_weight')); ?>" autocomplete="off">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Dimensions Length</label>
                                    <input type="text" class="form-control" id="dimensions_length" name="dimensions_length" placeholder="Dimensions length" value="<?php echo e(old('dimensions_length')); ?>" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Dimensions Width</label>
                                    <input type="text" class="form-control" id="dimensions_width" name="dimensions_width" placeholder="Dimensions width" value="<?php echo e(old('dimensions_width')); ?>" autocomplete="off">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Dimensions Height</label>
                                    <input type="text" class="form-control" id="dimensions_height" name="dimensions_height" placeholder="Dimensions height" value="<?php echo e(old('dimensions_height')); ?>" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Customer Note</label>
                                    <input type="text" class="form-control" id="customer_notes" name="customer_notes" placeholder="Customer note" value="<?php echo e(old('customer_notes')); ?>" autocomplete="off">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Internal Notes</label>
                                    <input type="text" class="form-control" id="internal_notes" name="internal_notes" placeholder="Internal notes" value="<?php echo e(old('internal_notes')); ?>" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Gift Wrap</label>
                                    <input type="text" class="form-control" id="gift_wrap" name="gift_wrap" placeholder="Gift wrap" value="<?php echo e(old('gift_wrap')); ?>" autocomplete="off">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Gift Message</label>
                                    <input type="text" class="form-control" id="gift_messages" name="gift_messages" placeholder="Gift message" value="<?php echo e(old('gift_messages')); ?>" autocomplete="off">
                                </div>


                            </div>

                        </div>


                        <div style="clear:both"></div>
                        <div class="form-group col-sm-6">
                            <button type="submit" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                <i class="fa fa-save"></i>  <?php echo e('Place Order'); ?>

                                <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                            </button>

                        </div>
                    </div>
                </form>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div><br/>

    <script>
        var app = angular.module('app', []);

        app.directive("matchPassword", function () {
            return {
                require: "ngModel",
                scope: {
                    otherModelValue: "=matchPassword"
                },
                link: function(scope, element, attributes, ngModel) {

                    ngModel.$validators.matchPassword = function(modelValue) {
                        return modelValue == scope.otherModelValue;
                    };

                    scope.$watch("otherModelValue", function() {
                        ngModel.$validate();
                    });
                }
            };
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>