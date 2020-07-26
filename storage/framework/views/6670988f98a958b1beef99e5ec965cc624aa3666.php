
<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/global/vendor/jt-timepicker/jquery-timepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/examples/css/forms/advanced.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/css/commonDashboardCss.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/global/vendor/filament-tablesaw/tablesaw.css')); ?>">
    <style>

    </style>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <form  name="userForm" action="<?php echo e(URL::to('addPackageDetails')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">Add Package</p>
                                    <hr style="border: 1px solid black;">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control <?php echo e(($errors->has('package_name'))?'errorBox':''); ?>" placeholder="Name" name = "package_name" id="package_name" value="<?php echo e(old('package_name')); ?>">
                                </div>
                                <div class="form-group col-sm-6"><br><br>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control <?php echo e(($errors->has('package_amount'))?'errorBox':''); ?>" placeholder="Amount" name = "package_amount" id="package_amount" value="<?php echo e(old('package_amount')); ?>">
                                </div>
                                <div class="form-group col-sm-6"><br><br>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="password" class="form-control" placeholder="Discription" name = "package_description" id="package_description" value="<?php echo e(old('package_description')); ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <br><br>
                                </div>
                                <div style="<?php echo e((!$errors->isEmpty())?'display:block':'display:none'); ?>">
                                    <div class="form-group col-md-4">
                                    </div>
                                    <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                        <p>
                                            <?php if($errors->has('package_name')): ?>
                                                <span class="help-block">
                                                    <label style="color:red"><?php echo e($errors->first('package_name')); ?></label>
                                                </span>
                                            <?php endif; ?>
                                        </p>
                                        <p>
                                            <?php if($errors->has('package_amount')): ?>
                                                <span class="help-block">
                                                    <label style="color:red"><?php echo e($errors->first('package_amount')); ?></label>
                                                </span>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    <div class="form-group col-md-4"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                <i class="fa fa-save"></i>  Save
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>