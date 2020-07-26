
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
                <form  name="userForm" action="<?php echo e(URL::to('addEquipmentDetails')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">Add Equipment</p>
                                    <hr style="border: 1px solid black;">
                                </div>

                                <div class="form-group col-sm-6">
                                    <select class = "form-control <?php echo e(($errors->has('trainer_id'))?'errorBox':''); ?>" name="trainer_id" id="trainer_id">
                                        <option value="">Select Trainer </option>
                                        <?php $__currentLoopData = $trainer_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($trainer->id); ?>" <?php echo e((old('trainer_id') == $trainer->id )?"selected":""); ?>><?php echo e($trainer->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <select class = "form-control <?php echo e(($errors->has('school_id'))?'errorBox':''); ?>" name="school_id" id="school_id">
                                        <option value="">Select School </option>
                                        <?php $__currentLoopData = $school_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($school->id); ?>" <?php echo e((old('school_id') == $school->id )?"selected":""); ?>><?php echo e($school->school_name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <select class = "form-control <?php echo e(($errors->has('item_id'))?'errorBox':''); ?>" name="item_id" id="item_id">
                                        <option value="">Select Item </option>
                                        <?php $__currentLoopData = $equip_list_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equip_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($equip_list->id); ?>" <?php echo e((old('item_id') == $equip_list->id )?"selected":""); ?>><?php echo e($equip_list->equip_name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type = "text" class = "form-control" name = "specification" id="specification" placeholder = "Specification(Size/Weight/Valume)"  value="<?php echo e(old('specification')); ?>" readonly>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type = "text" class = "form-control <?php echo e(($errors->has('opening_balance'))?'errorBox':''); ?>" name = "opening_balance" id="opening_balance" placeholder = "Opening Balance"  value="<?php echo e(old('opening_balance')); ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type = "text" class = "form-control <?php echo e(($errors->has('inword_for_month'))?'errorBox':''); ?>" name = "inword_for_month" id="inword_for_month" placeholder = "Inword For Month"  value="<?php echo e(old('inword_for_month')); ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type = "text" class = "form-control mb-3" name = "discre_for_month" id="discre_for_month" placeholder = "Discrepancy for the Month"  value="<?php echo e(old('discre_for_month')); ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type = "text" class = "form-control mb-3" name = "physical_stock" id="physical_stock" placeholder = "Physical Stock(at the end of month)"  value="<?php echo e(old('physical_stock')); ?>">
                                </div>

                                <div style="<?php echo e((!$errors->isEmpty())?'display:block':'display:none'); ?>">
                                    <div class="form-group col-md-4">
                                    </div>
                                    <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                        <p>
                                            <?php if($errors->has('trainer_id')): ?>
                                                <span class="help-block">
                                                    <label style="color:red"><?php echo e($errors->first('trainer_id')); ?></label>
                                                </span>
                                            <?php endif; ?>
                                        </p>
                                        <p>
                                            <?php if($errors->has('school_id')): ?>
                                                <span class="help-block">
                                                    <label style="color:red"><?php echo e($errors->first('school_id')); ?></label>
                                                </span>
                                            <?php endif; ?>
                                        </p>
                                        <p>
                                            <?php if($errors->has('item_id')): ?>
                                                <span class="help-block">
                                                    <label style="color:red"><?php echo e($errors->first('item_id')); ?></label>
                                                </span>
                                            <?php endif; ?>
                                        </p>
                                        <p>
                                            <?php if($errors->has('opening_balance')): ?>
                                                <span class="help-block">
                                                    <label style="color:red"><?php echo e($errors->first('opening_balance')); ?></label>
                                                </span>
                                            <?php endif; ?>
                                        </p>
                                        <p>
                                            <?php if($errors->has('inword_for_month')): ?>
                                                <span class="help-block">
                                                    <label style="color:red"><?php echo e($errors->first('inword_for_month')); ?></label>
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