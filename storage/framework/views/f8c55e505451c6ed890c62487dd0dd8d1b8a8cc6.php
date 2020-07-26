
<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/global/vendor/jt-timepicker/jquery-timepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/examples/css/forms/advanced.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/css/commonDashboardCss.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/global/vendor/filament-tablesaw/tablesaw.css')); ?>">
    <style>
        .icon1{
            font-size:20px;
            color:green;
            margin-top: 5px;
        }
        .icon2{
            font-size:20px;
            color:red;
            margin-top: 5px;
        }
    </style>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <form  name="userForm" action="<?php echo e(URL::to('addNotification')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">New Notification</p>
                                    <hr style="border: 1px solid black;">
                                </div>

                                <div class="form-group col-sm-6">
                                    <select class = "form-control <?php echo e(($errors->has('school_id'))?'errorBox':''); ?>" name="school_id" id="school_id">
                                        <option >Select School</option>
                                        <?php $__currentLoopData = $school_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($school->school_id); ?>" <?php echo e((old('school_id')==$school->school_id)?"selected":""); ?>><?php echo e($school->school_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <br><br>
                                </div>

                                <div class="form-group col-sm-6">
                                    <input type="text" class = "form-control <?php echo e(($errors->has('heading'))?'errorBox':''); ?>" name="heading" id="heading" placeholder="Notification Heading" value="<?php echo e(old('heading')); ?>" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <br><br>
                                </div>

                                <div class="form-group col-sm-6">
                                    <input type="date" class = "form-control <?php echo e(($errors->has('date'))?'errorBox':''); ?>" name="date" id="date" placeholder="Enter Date" value="<?php echo e(old('date')); ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <br><br>
                                </div>

                                <div class="form-group col-sm-6">
                                    <input type="time" class = "form-control <?php echo e(($errors->has('time'))?'errorBox':''); ?>" name="time" id="time" placeholder="Enter Time" value="<?php echo e(old('time')); ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <br><br>
                                </div>

                                <div class="form-group col-sm-6">
                                    <input type="text" class = "form-control <?php echo e(($errors->has('grade'))?'errorBox':''); ?>" name="grade" id="grade" placeholder="Enter Grade" value="<?php echo e(old('grade')); ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <br><br>
                                </div>

                                <div class="form-group col-sm-6">
                                    <textarea class = "form-control <?php echo e(($errors->has('description'))?'errorBox':''); ?>" name="description" id="description" placeholder="Notification Description" value="<?php echo e(old('description')); ?>" ></textarea>
                                </div>
                                <div class="form-group col-sm-6">
                                    <br><br>
                                </div>


                                <div style="<?php echo e((!$errors->isEmpty())?'display:block':'display:none'); ?>">

                                    <div class="form-group col-md-4">
                                    </div>
                                    <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                        <p>
                                            <?php if($errors->has('school_id')): ?>
                                                <span class="help-block">
                                								<label style="color:red"><?php echo e($errors->first('school_id')); ?></label>
                                							</span>
                                            <?php endif; ?>
                                        </p>
                                        <p>
                                            <?php if($errors->has('heading')): ?>
                                                <span class="help-block">
                                								<label style="color:red"><?php echo e($errors->first('heading')); ?></label>
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
                                <i class="fa fa-save"></i> Save
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
    <script>
        $(document).ready(function() {

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>