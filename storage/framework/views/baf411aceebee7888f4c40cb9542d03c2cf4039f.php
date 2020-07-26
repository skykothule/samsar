
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
                <form  name="userForm" action="<?php echo e(URL::to('addAchievement')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">New Achievement</p>
                                    <hr style="border: 1px solid black;">
                                </div>

                                <div class="form-group col-sm-6">
                                    <select class = "form-control <?php echo e(($errors->has('school_id'))?'errorBox':''); ?>" name="school_id" id="school_id" required>
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
                                    <select class = "form-control <?php echo e(($errors->has('stud_class'))?'errorBox':''); ?>" name = "stud_class" id = "stud_class" required>
                                        <option value="">Select Class</option>
                                        <?php $__currentLoopData = $class_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($data['class']); ?>"><?php echo e(strtoupper($data['class'])); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6"><br><br>
                                </div>
                                <div class="form-group col-sm-6">
                                    <select class = "form-control <?php echo e(($errors->has('stud_div'))?'errorBox':''); ?>" name = "stud_div" id = "stud_div" onchange="getStudentDetails(this.value)" required>
                                        <option value="">Select Division</option>
                                        <?php $__currentLoopData = $div_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($data2['division']); ?>"><?php echo e(strtoupper($data2['division'])); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6"><br><br>
                                </div>
                                
                                    
                                        

                                        
                                    
                                    
                                        
                                    
                                
                                <div id="studentDiv" style="display: none">
                                    <div class="form-group col-sm-6" >
                                        <select class = "form-control <?php echo e(($errors->has('student_id'))?'errorBox':''); ?>" name="student_id" id="student_id" required>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <br><br>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <input type="text" class = "form-control <?php echo e(($errors->has('competition_name'))?'errorBox':''); ?>" name="competition_name" id="competition_name" placeholder="Enter Competition Name" value="<?php echo e(old('competition_name')); ?>" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <br><br>
                                </div>

                                <div class="form-group col-sm-6">
                                    <input type="text" class = "form-control <?php echo e(($errors->has('rank'))?'errorBox':''); ?>" name="rank" id="rank" placeholder="Enter Rank" value="<?php echo e(old('rank')); ?>" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <br><br>
                                </div>

                                <div class="form-group col-sm-6">
                                    <input type="text" class = "form-control <?php echo e(($errors->has('competation_level'))?'errorBox':''); ?>" name="competation_level" id="competation_level" placeholder="Enter Competition Level" value="<?php echo e(old('competation_level')); ?>" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <br><br>
                                </div>

                                <div class="form-group col-sm-6">
                                    <select class = "form-control <?php echo e(($errors->has('year'))?'errorBox':''); ?>" name="year" id="year" required>
                                        <option value="">Select Year</option>
                                        <?php $year = date('Y'); $count = $year+3; ?>
                                        <option value="<?php echo e(($year-1)."-".$year); ?>"><?php echo e(($year-1)."-".$year); ?></option>
                                        <?php for($i=$year;$i<=$count;$i++): ?>
                                            <?php $j = $i+1; ?>
                                            <option value="<?php echo e($i."-".$j); ?>"><?php echo e($i."-".$j); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <br><br>
                                </div>

                                <div class="form-group col-sm-6">
                                    <input type="file" class = "form-control <?php echo e(($errors->has('grade'))?'errorBox':''); ?>" name="upload_file" id="upload_file"  value="<?php echo e(old('upload_file')); ?>" required>
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

        function getClassDetails(school_id){
            var base_url= basePath();
            $.ajax({
                url: base_url+'getClassData/{id}',
                type: 'GET',
                data: {school_id: school_id},
                success: function (response) {
//                    alert(response);
                    $('#class').html(response);
                    $('#classDiv').show();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Not Valid School");
                }

            });
        }

        function getStudentDetails(divName){
            var stud_class = $('#stud_class').val();
            var school_id = $('#school_id').val();
            var className = stud_class+" "+divName;
            var base_url= basePath();
            $.ajax({
                url: base_url+'getStudentData/{id}',
                type: 'GET',
                data: {school_id: school_id,className:className},
                success: function (response) {
//                    alert(response);
                    $('#student_id').html(response);
                    $('#studentDiv').show();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Not Valid Class Or Student Data Not Found");
                }

            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>