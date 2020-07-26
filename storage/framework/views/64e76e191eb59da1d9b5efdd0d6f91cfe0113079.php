
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
            <?php if(session()->has('AddTrainer')): ?>
                <div class="alert dark alert-icon alert-info alert-dismissible alertDismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-bell" style="color:#fff"></i>&nbsp;&nbsp;
                    <?php echo e(Session::get('AddTrainer')); ?>

                </div>
            <?php endif; ?>
            <div class="panel-body container-fluid">
                <form  name="userForm" action="<?php echo e(URL::to('addAssement')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">New Assement</p>
                                    <hr style="border: 1px solid black;">
                                </div>
                                <?php if(empty($school_data) && empty($student_data)): ?>
                                <div class="form-group col-sm-6">
                                    <select class = "form-control <?php echo e(($errors->has('session_type'))?'errorBox':''); ?>" name = "session_type" required>
                                        <option value="">Select Activity</option>
                                        <?php $__currentLoopData = $all_sesion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($data->id); ?>"><?php echo e(ucwords($data->session_name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6"><br><br>
                                </div>
                                <div class="form-group col-sm-6">
                                    <select class = "form-control <?php echo e(($errors->has('stud_class'))?'errorBox':''); ?>" name = "stud_class" required>
                                        <option value="">Select Class</option>
                                        <?php $__currentLoopData = $class_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($data['class']); ?>"><?php echo e(strtoupper($data['class'])); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6"><br><br>
                                </div>
                                <div class="form-group col-sm-6">
                                    <select class = "form-control <?php echo e(($errors->has('stud_div'))?'errorBox':''); ?>" name = "stud_div" required>
                                        <option value="">Select Division</option>
                                        <?php $__currentLoopData = $div_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($data2['division']); ?>"><?php echo e(strtoupper($data2['division'])); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6"><br><br>
                                </div>

                                <div class="form-group col-sm-6">
                                    <button type="submit" name="submit" value="nextSubmit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                         Next
                                        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                    </button>
                                </div>
                                <div class="form-group col-sm-6"><br><br>
                                </div>

                                <?php else: ?>

                                    <div class="form-group col-sm-6">
                                        <p class="font-size-20 blue-grey-700" style="color: #4F0800;">
                                            Activity Name -  <?php $__currentLoopData = $all_sesion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(($session_id == $data->id)?ucwords($data->session_name):""); ?>


                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </p>
                                    </div>
                                    <div class="form-group col-sm-6"><br><br>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <select class = "form-control <?php echo e(($errors->has('term'))?'errorBox':''); ?>" name = "term" required>
                                            <option value="">Select Term</option>
                                            <option value="term 1">Term 1</option>
                                            <option value="term 2">Term 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6"><br><br>
                                        <input type="hidden" name="school_id" id="school_id" value="<?php echo e($school_data->school_id); ?>">
                                        <input type="hidden" name="session_id" id="session_id" value="<?php echo e($session_id); ?>">
                                        <input type="hidden" name="class_div_name" id="class_div_name" value="<?php echo e($class_div_name); ?>">
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <table class="table" width="100%">
                                            <thead>
                                            <th>Student Name</th>
                                            <?php $__currentLoopData = $sub_sesion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_sesion_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <th><?php echo e($sub_sesion_data->sub_session_name); ?></th>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <th>Total</th>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $student_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stud_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($stud_data->student_name); ?></td>
                                                        <?php $__currentLoopData = $sub_sesion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_sesion_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <td>
                                                                <input type="text" class="form-control" name="<?php echo e($sub_sesion_data->sub_session_name."_".$stud_data->student_id."_txt"); ?>" id="<?php echo e($sub_sesion_data->sub_session_name."_".$stud_data->student_id."_txt"); ?>" required>
                                                            </td>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <td>
                                                            <input type="text" class="form-control" name="<?php echo e($sub_sesion_data->sub_session_name."_".$stud_data->student_id."_total"); ?>" id="<?php echo e($sub_sesion_data->sub_session_name."_".$stud_data->student_id."_total"); ?>" readonly>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>

                                        </table>
                                    </div>
                                    <div class="form-group col-sm-6">
                                    <button type="submit" name="submit" value="addSubmit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                        <i class="fa fa-save"></i>  Submit
                                        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                    </button>
                                </div>
                                <?php endif; ?>
                                <div style="<?php echo e((!$errors->isEmpty())?'display:block':'display:none'); ?>">

                                    <div class="form-group col-md-4">
                                    </div>
                                    <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                        <p>
                                            <?php if($errors->has('session_type')): ?>
                                                <span class="help-block">
                                                    <label style="color:red"><?php echo e($errors->first('session_type')); ?></label>
                                                </span>
                                            <?php endif; ?>
                                        </p>
                                        <p>
                                            <?php if($errors->has('sub_session_type')): ?>
                                                <span class="help-block">
                                                    <label style="color:red"><?php echo e($errors->first('sub_session_type')); ?></label>
                                                </span>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    <div class="form-group col-md-4"></div>
                                </div>

                            </div>
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