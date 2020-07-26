
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
                <form  name="userForm" action="<?php echo e(URL::to('addSchoolDetails')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">Add School</p>
                                    <hr style="border: 1px solid black;">
                                </div>

                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control <?php echo e(($errors->has('school_name'))?'errorBox':''); ?>" placeholder="School Name" name="school_name" id="school_name" value="<?php echo e(old('school_name')); ?>" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control <?php echo e(($errors->has('school_email'))?'errorBox':''); ?>" placeholder="Email" name="school_email" id="school_email" value="<?php echo e(old('school_email')); ?>" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control <?php echo e(($errors->has('school_contact'))?'errorBox':''); ?>" placeholder="School Contact Number" name="school_contact" id="school_contact" value="<?php echo e(old('school_contact')); ?>"required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control <?php echo e(($errors->has('principal_email'))?'errorBox':''); ?>" placeholder="Principal Email" name="principal_email" id="principal_email" value="<?php echo e(old('principal_email')); ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control" placeholder="Contact Person Name" name="contact_person_name" id="contact_person_name" value="<?php echo e(old('contact_person_name')); ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control <?php echo e(($errors->has('principal_contact'))?'errorBox':''); ?>" placeholder="Principal Contact" name="principal_contact" id="principal_contact" value="<?php echo e(old('principal_contact')); ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="number" class="form-control"  placeholder="Contact Person Number" name="contact_person_no" id="contact_person_no" value="<?php echo e(old('contact_person_no')); ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <select class = "form-control" name="school_package" id="school_package" required>
                                        <option value="">Select Package </option>
                                        <?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($package_data->id); ?>"><?php echo e($package_data->package_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                
                                    
                                

                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control"  placeholder="Principal Date Of Birth" onfocus="(this.type='date')"   name="principale_dob" id="principale_dob"  value="<?php echo e(old('principale_dob')); ?>">
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text" class="form-control <?php echo e(($errors->has('school_password'))?'errorBox':''); ?>" placeholder="Password"  name="school_password" id="school_password"  value="<?php echo e(old('school_password')); ?>">
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
                                    <div class="form-group col-md-4"></div>
                                </div>

                                <div style="<?php echo e((!$errors->isEmpty())?'display:block':'display:none'); ?>">

                                    <div class="form-group col-md-4">
                                    </div>
                                    <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                        <p>
                                            <?php if($errors->has('school_name')): ?>
                                                <span class="help-block">
                                								<label style="color:red"><?php echo e($errors->first('school_name')); ?></label>
                                							</span>
                                            <?php endif; ?>
                                        </p>
                                        <p>
                                            <?php if($errors->has('school_email')): ?>
                                                <span class="help-block">
																	<label style="color:red"><?php echo e($errors->first('school_email')); ?></label>
																</span>
                                            <?php endif; ?>
                                        </p>
                                        <p>
                                            <?php if($errors->has('school_contact')): ?>
                                                <span class="help-block">
																	<label style="color:red"><?php echo e($errors->first('school_contact')); ?></label>
																</span>
                                            <?php endif; ?>
                                        </p>
                                        <p>
                                            <?php if($errors->has('school_password')): ?>
                                                <span class="help-block">
																	<label style="color:red"><?php echo e($errors->first('school_password')); ?></label>
																</span>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    <div class="form-group col-md-4"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" id="submit"  data-style="expand-left">
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
    <script>
        $(document).ready(function (){
            $("#school_contact").on('blur',function () {
                var email = $("#school_email").val();
                if(email == ""){
                    $("#sameEmailError").show();
                    $("#school_email").val(" ");
//                    $('#submit').prop('disabled', false);
                }else{
                    var base_url= basePath();
                    $.ajax({
                        url: base_url+'checkTrainerEmail/{id}',
                        type: 'GET',
                        data: {email: email},
                        success: function (response) {

                            if(parseInt(response) == 1){
                                $("#sameEmailError").show();
                                $("#school_email").val(" ");
//                                $('#submit').prop('disabled', false);
                            }else {
//                                $('#submit').prop('disabled', true);
                                $("#sameEmailError").hide();
                            }

                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            $("#sameEmailError").show();
                            $("#school_email").val(" ");
//                            $('#submit').prop('disabled', false);
                        }

                    });
                }
            });

            $("#school_email").on('blur',function () {
                var email = $("#school_email").val();
                if(email == ""){
                    $("#sameEmailError").show();
                    $("#school_email").val(" ");
//                    $('#submit').prop('disabled', false);
                }else{
                    var base_url= basePath();
                    $.ajax({
                        url: base_url+'checkTrainerEmail/{id}',
                        type: 'GET',
                        data: {email: email},
                        success: function (response) {

                            if(parseInt(response) == 1){
                                $("#sameEmailError").show();
                                $("#school_email").val(" ");
//                                $('#submit').prop('disabled', false);
                            }else {
                                $("#sameEmailError").hide();
//                                document. getElementById("submit"). disabled = true
//                                $('#submit').prop('disabled', true);
                            }

                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            $("#sameEmailError").show();
                            $("#school_email").val(" ");
//                            $('#submit').prop('disabled', false);
                        }

                    });
                }
            });
        });
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>