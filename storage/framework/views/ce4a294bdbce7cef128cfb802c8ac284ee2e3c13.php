
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
                <form  name="userForm" action="<?php echo e(URL::to('addInstructionDetails')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">Add Class Instruction</p>
                                    <hr style="border: 1px solid black;">
                                </div>
                                <div class="form-group col-sm-6">
                                    <select class = "form-control mb-3 <?php echo e(($errors->has('session_id'))?'errorBox':''); ?>" name="session_id" id="session_id">
                                        <option value="">Select Session</option>
                                        <?php $__currentLoopData = $session_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($session->id); ?>"><?php echo e($session->session_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6"><br><br>
                                </div>
                                <div class="form-group col-sm-6">
                                    <div class="input-group input-file" name="Fichier1">
                                        <input type="text" class="form-control <?php echo e(($errors->has('session_file'))?'errorBox':''); ?>" placeholder='Choose a file...'  id="session_file" name="session_file" value="<?php echo e(old('session_file')); ?>"/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-default btn-choose" type="button">Select File</button>
                                        </span>
                                    </div>
                                </div>
                                <div class ="form-group col-sm-6">
                                    <br><br>
                                </div>

                                <div style="<?php echo e((!$errors->isEmpty())?'display:block':'display:none'); ?>">

                                    <div class="form-group col-md-4">
                                    </div>
                                    <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                        <p>
                                            <?php if($errors->has('session_id')): ?>
                                                <span class="help-block">
                                                    <label style="color:red"><?php echo e($errors->first('session_id')); ?></label>
                                                </span>
                                            <?php endif; ?>
                                        </p>
                                        <p>
                                            <?php if($errors->has('session_file')): ?>
                                                <span class="help-block">
                                                    <label style="color:red"><?php echo e($errors->first('session_file')); ?></label>
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
    <script>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>