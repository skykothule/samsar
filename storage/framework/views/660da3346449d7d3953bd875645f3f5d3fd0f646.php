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
                <form action="<?php echo e(URL::to('addTrainerDetails')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">Trainer Details</p>
                                    <hr style="border: 1px solid black;">
                                </div>

                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control <?php echo e(($errors->has('name'))?'errorBox':''); ?>" placeholder="Full name" id="name" name="name"  value="<?php echo e(old('name')); ?>" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="email" class="form-control <?php echo e(($errors->has('email'))?'errorBox':''); ?>" placeholder="Email" id="email" name="email"  value="<?php echo e(old('email')); ?>" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="number" class="form-control <?php echo e(($errors->has('contact'))?'errorBox':''); ?>" placeholder="Mobile Number" id="contact" name="contact"  value="<?php echo e(old('contact')); ?>" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control" placeholder="Higher Education Degree" id="education" name="education" value="<?php echo e(old('education')); ?>">
                                 </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control" placeholder="Experience(In Year)" id="experience" name="experience" value="<?php echo e(old('experience')); ?>">
                                 </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control" placeholder="Heighest Sports Achievements" id="sport_achievement" name="sport_achievement" value="<?php echo e(old('sport_achievement')); ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control" placeholder="Primary Game" id="primary_game" name="primary_game" value="<?php echo e(old('primary_game')); ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control" placeholder="Last Employee" id="last_employee" name="last_employee" value="<?php echo e(old('last_employee')); ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control" placeholder="Address" id="address" name="address" value="<?php echo e(old('address')); ?>">
                                </div>
                                <div class ="form-group col-sm-6">
                                    <select class="form-control" name="school_id" required>
                                        <option value="">Select School</option>
                                        <?php $__currentLoopData = $school_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($school_data->school_id); ?>"><?php echo e($school_data->school_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <div class="input-group input-file" name="Fichier1">
                                        <input type="text" class="form-control" placeholder='Choose a file...'  id="profile_photo" name="profile_photo" value="<?php echo e(old('profile_photo')); ?>"/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default btn-choose" type="button">Select Photo</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <div class="input-group input-file" name="Fichier1">
                                        <input type="text" class="form-control" placeholder='Choose a file...' id="resume" name="resume"  value="<?php echo e(old('resume')); ?>"/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default btn-choose" type="button">Selecte Resume</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control"  placeholder="Trainer Date Of Birth" onfocus="(this.type='date')"   name="trainer_dob" id="trainer_dob"  value="<?php echo e(old('trainer_dob')); ?>">
                                </div>
                                <div class ="form-group col-sm-6">
                                    <input type="password" class="form-control <?php echo e(($errors->has('password'))?'errorBox':''); ?>" placeholder="Password" id="password" name="password"  value="<?php echo e(old('password')); ?>" required>
                                </div>

                                <div id="sameEmailError" style="display: none">
                                    <div class="form-group col-md-4">
                                    </div>
                                    <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                        <p>
                                            <span class="help-block">
                                                <label style="color:red">Email Already Exist</label>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="form-group col-md-4">
                                    </div>
                                </div>

                                <div style="<?php echo e((!$errors->isEmpty())?'display:block':'display:none'); ?>">

                                    <div class="form-group col-md-4">
                                    </div>
                                    <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                        <p>
                                            <?php if($errors->has('name')): ?>
                                                <span class="help-block">
                                								<label style="color:red"><?php echo e($errors->first('name')); ?></label>
                                							</span>
                                            <?php endif; ?>
                                        </p>
                                        <p>
                                            <?php if($errors->has('email')): ?>
                                                <span class="help-block">
																	<label style="color:red"><?php echo e($errors->first('email')); ?></label>
																</span>
                                            <?php endif; ?>
                                        </p>
                                        <p>
                                            <?php if($errors->has('contact')): ?>
                                                <span class="help-block">
																	<label style="color:red"><?php echo e($errors->first('contact')); ?></label>
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
                                            <?php if($errors->has('password')): ?>
                                                <span class="help-block">
																	<label style="color:red"><?php echo e($errors->first('password')); ?></label>
																</span>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    <div class="form-group col-md-4"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" id="submit" data-plugin="ladda" data-style="expand-left">
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
    <script>
        $(document).ready(function (){
            $("#contact").on('blur',function () {
                var email = $("#email").val();
                if(email == ""){
                    $("#sameEmailError").show();
                    $("#email").val(" ");
                }else{
                    var base_url= basePath();
                    $.ajax({
                        url: base_url+'checkTrainerEmail/{id}',
                        type: 'GET',
                        data: {email: email},
                        success: function (response) {
                            if(parseInt(response) == 1){
                                $("#sameEmailError").show();
                                $("#email").val(" ");
                            }else {
                                $("#sameEmailError").hide();
                            }
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            $("#sameEmailError").show();
                            $("#email").val(" ");
                        }
                    });
                }
            });

            $("#email").on('blur',function () {
                var email = $("#email").val();
                if(email == ""){
                    $("#sameEmailError").show();
                    $("#email").val(" ");
                }else{
                    var base_url= basePath();
                    $.ajax({
                        url: base_url+'checkTrainerEmail/{id}',
                        type: 'GET',
                        data: {email: email},
                        success: function (response) {
                            if(parseInt(response) == 1){
                                $("#sameEmailError").show();
                                $("#email").val(" ");
                            }else {
                                $("#sameEmailError").hide();
                            }
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            $("#sameEmailError").show();
                            $("#email").val(" ");
                        }
                    });
                }
            });
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