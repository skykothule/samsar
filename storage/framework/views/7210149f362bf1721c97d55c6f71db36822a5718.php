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
                <form  name="userForm" action="<?php echo e(URL::to('addTrainerTimeTable')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">Trainer TimeTable</p>
                                    <hr style="border: 1px solid black;">
                                </div>
                                <div class="form-group col-sm-6">
                                    <select class = "form-control" name="time_table_type" id="time_table_type" required>
                                        <option value="">Select Timetable Type</option>
                                        <option value="Daily">Daily</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="Yearly">Yearly</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6"><br><br></div>
                                <div class="form-group col-sm-6">
                                    <select class = "form-control" name="year" id="year" required>
                                        <option value="">Select Year</option>
                                        <?php $year = date('Y'); $count = $year+3; ?>
                                        <option value="<?php echo e(($year-1)."-".$year); ?>"><?php echo e(($year-1)."-".$year); ?></option>
                                        <?php for($i=$year;$i<=$count;$i++): ?>
                                            <?php $j = $i+1; ?>
                                            <option value="<?php echo e($i."-".$j); ?>"><?php echo e($i."-".$j); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>

                                <div class="form-group col-sm-6"><br><br></div>
                                <div class="form-group col-sm-6">
                                    <select class = "form-control" name="school_name" id="school_name" required>
                                        <option value="">Select School</option>
                                        <?php $__currentLoopData = $school_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($school->school_id); ?>" <?php echo e((old('school_name')==$school->school_id)?"selected":""); ?>><?php echo e($school->school_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group col-sm-6"><br><br></div>
                                <div class="form-group col-sm-6">
                                    <select class = "form-control" name="trainer_name" id="trainer_name" required>
                                        <option value="">Select Trainer</option>
                                        <?php $__currentLoopData = $trainer_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($trainer->trainer_id); ?>" <?php echo e((old('trainer_name')==$trainer->trainer_id)?"selected":""); ?>><?php echo e($trainer->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6"><br><br></div>
                                <div class="form-group col-sm-6">
                                    <input type="file" class = "form-control <?php echo e(($errors->has('uploadFile'))?'errorBox':''); ?>" name="uploadFile" id="uploadFile"  value="<?php echo e(old('uploadFile')); ?>" required>
                                    
                                        
                                            
                                            
                                        
                                    
                                </div>

                                <div class="form-group col-sm-6"><br><br></div>
                                <div class="form-group">
                                    <a href = "#" id = "download1"><b>Download Sample Trainer Daily TimeTable Excel Format</b></a>
                                </div>
                                <div class="form-group">
                                    <a href = "#" id = "download2"><b>Download Sample Trainer Monthly TimeTable Excel Format</b></a>
                                </div>
                                <div class="form-group">
                                    <a href = "#" id = "download3"><b>Download Sample Trainer Yearly TimeTable Excel Format</b></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                <i class="fa fa-save"></i>  Upload
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>
        $('#download1').click(function(e) {
            var base_url = basePath();
            var url = base_url+"public/assets/format_excelsheet/DailyTraninerTimetable.xlsx";
            e.preventDefault();
            window.location.href = url;
        });
        $('#download2').click(function(e) {
            var base_url = basePath();
            var url = base_url+"public/assets/format_excelsheet/MonthTimeTable.xlsx";
            e.preventDefault();
            window.location.href = url;
        });
        $('#download3').click(function(e) {
            var base_url = basePath();
            var url = base_url+"public/assets/format_excelsheet/YearlyTimeTable.xlsx";
            e.preventDefault();
            window.location.href = url;
        });

        function bs_input_file() {
            $(".input-file").before(
                function() {
                    if ( ! $(this).prev().hasClass('input-ghost') ) {
                        var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                        element.attr("name",$(this).attr("name"));
                        element.change(function(){
                            element.next(element).find('input').val((element.val()).split('\\').pop());
                        });
                        $(this).find("button.btn-choose").click(function(){
                            element.click();
                        });
                        $(this).find("button.btn-reset").click(function(){
                            element.val(null);
                            $(this).parents(".input-file").find('input').val('');
                        });
                        $(this).find('input').css("cursor","pointer");
                        $(this).find('input').mousedown(function() {
                            $(this).parents('.input-file').prev().click();
                            return false;
                        });
                        return element;
                    }
                }
            );
        }
        $(function() {
            bs_input_file();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>