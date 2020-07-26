
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
                <div class="row">
                    <?php if(session('success')): ?>
                        <div class="alert dark alert-icon alert-success alert-dismissible alertDismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="icon wb-check" aria-hidden="true"></i>
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                        <div class="alert dark alert-icon alert-danger alert-dismissible alertDismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="icon wb-check" aria-hidden="true"></i>
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <form  name="userForm" action="<?php echo e(URL::to('listTrainerTimeTable')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">Trainer TimeTable List</p>
                                    <hr style="border: 1px solid black;">
                                </div>
                                <div class="form-group col-sm-6">
                                    <select class = "form-control" name="time_table_type" id="time_table_type" required>
                                        <option value="">Select Timetable Type</option>
                                        <option value="Daily" <?php echo e((!empty($time_table_type) && $time_table_type == "Daily")?"selected":""); ?>>Daily</option>
                                        <option value="Monthly" <?php echo e((!empty($time_table_type) && $time_table_type == "Monthly")?"selected":""); ?>>Monthly</option>
                                        <option value="Yearly" <?php echo e((!empty($time_table_type) && $time_table_type == "Yearly")?"selected":""); ?>>Yearly</option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-sm-6">
                                    <select class = "form-control" name="year" id="year" required>
                                        <option value="">Select Year</option>
                                        <?php $y = date('Y'); $count = $y+3; ?>
                                        <option value="<?php echo e(($y-1)."-".$y); ?>"  <?php echo e((!empty($year) && $year == (($y-1)."-".$y))?"selected":""); ?>><?php echo e(($y-1)."-".$y); ?></option>
                                        <?php for($i=$y;$i<=$count;$i++): ?>
                                            <?php $j = $i+1; ?>
                                            <option value="<?php echo e($i."-".$j); ?>" <?php echo e((!empty($year) && $year == ($i."-".$j))?"selected":""); ?>><?php echo e($i."-".$j); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>

                                
                                <div class="form-group col-sm-6">
                                    <select class = "form-control" name="school_name" id="school_name" required>
                                        <option value="">Select School</option>
                                        <?php $__currentLoopData = $school_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($school->school_id); ?>" <?php echo e((!empty($school_name) && $school_name == $school->school_id)?"selected":""); ?>><?php echo e($school->school_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                
                                <div class="form-group col-sm-6">
                                    <select class = "form-control" name="trainer_name" id="trainer_name" required>
                                        <option value="">Select Trainer</option>
                                        <?php $__currentLoopData = $trainer_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($trainer->trainer_id); ?>" <?php echo e((!empty($trainer_name) && $trainer_name == $trainer->trainer_id)?"selected":""); ?>><?php echo e($trainer->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                Show
                                <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                            </button>
                        </div>
                        <?php if(!empty($timetable_list)): ?>
                            <div class="col-sm-12">
                                <hr style="border: 1px solid black;">
                            </div>
                            <div class="col-sm-12">
                                <form  action="<?php echo e(URL::to('deleteTimetable')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="timetable_type" value="<?php echo e((!empty($time_table_type))?$time_table_type:""); ?>">
                                    <input type="hidden" name="timetable_year" value="<?php echo e((!empty($year))?$year:""); ?>">
                                    <input type="hidden" name="timetable_school" value="<?php echo e((!empty($school_name))?$school_name:""); ?>">
                                    <input type="hidden" name="timetable_trainer" value="<?php echo e((!empty($trainer_name))?$trainer_name:""); ?>">
                                    <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-danger ladda-button pull-right" data-plugin="ladda" data-style="expand-left">
                                        Delete This Time Table
                                        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                    </button>
                                </form>
                                <br><br>
                            </div>
                            <div class="col-sm-12">
                                <?php if(!empty($time_table_type) && $time_table_type == "Daily"): ?>
                                    <table class="table" id="example">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Class</th>
                                        <th>Sport Name</th>
                                        <th>Day</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $timetable_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timetable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(date('d-m-Y',strtotime($timetable->date))); ?></td>
                                            <td><?php echo e($timetable->time); ?></td>
                                            <td><?php echo e($timetable->class); ?></td>
                                            <td><?php echo e($timetable->sport_name); ?></td>
                                            <td><?php echo e($timetable->day); ?></td>
                                            <td>
                                                
                                                    
                                                    
                                                    
                                                
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php else: ?>
                                    <table class="table" id="example2">
                                        <thead>
                                            <tr>
                                                <th>Month</th>
                                                <th>Class</th>
                                                <th>Sport Name</th>
                                                <th>Day</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $timetable_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timetable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($month_names[$timetable->month-1]); ?></td>
                                                    <td><?php echo e($timetable->class); ?></td>
                                                    <td><?php echo e($timetable->sport_name); ?></td>
                                                    <td><?php echo e($timetable->day); ?></td>
                                                    <td>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                </table>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div><br/>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                order:false
            });
            $('#example2').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                order:false
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>