
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
                <form  name="userForm" action="<?php echo e(URL::to('addYearlyEvent')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">Yealry Event Details</p>
                                    <hr style="border: 1px solid black;">
                                </div>

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
                                    <input type="text" class = "form-control" name="event" id="event" placeholder="Enter Event Name " required>
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
                                    <input type="file" class = "form-control <?php echo e(($errors->has('uploadFile'))?'errorBox':''); ?>" name="uploadFile" id="uploadFile"  value="<?php echo e(old('uploadFile')); ?>" required>
                                    
                                        
                                            
                                            
                                        
                                    
                                </div>
                                <div class="form-group col-sm-6"><br><br></div>
                                <div class="form-group">
                                    <a href = "#" id = "download1"><b>Download Sample Event Excel Format</b></a>
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
            var url = base_url+"public/assets/format_excelsheet/event_format_sheet.xlsx";
            e.preventDefault();
            window.location.href = url;
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>