
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
                <form  name="userForm" action="<?php echo e(URL::to('addClassDetails')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">Add Class</p>
                                    <hr style="border: 1px solid black;">
                                </div>

                                <div class="form-group col-sm-6">
                                    <select class = "form-control <?php echo e(($errors->has('school_id'))?'errorBox':''); ?>" name="school_id" id="school_id">
                                        <option >Select School</option>
                                        <?php $__currentLoopData = $school_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($school->id); ?>" <?php echo e((old('school_id')==$school->id)?"selected":""); ?>><?php echo e($school->school_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <br><br>
                                </div>
                                <div class="form-group">
                                    <div class="field_wrapper1">
                                        <div class="form-group mainDivCls clonedInput1" id="fhMainDiv_1">
                                            <div class="form-group col-sm-6">
                                                <input type = "text" class = "form-control" placeholder = "Class Name" id = "school_class"  name = "school_class[]">
                                            </div>
                                            <div class="col-sm-6">
                                                <a href="javascript:void(0);" class="add_button1" title="Add field"><i class="fa fa-plus icon1" id="addIconFH">&nbsp;</i></a>
                                                <br><br>
                                            </div>
                                        </div>
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
                                            <?php if($errors->has('school_id')): ?>
                                                <span class="help-block">
                                								<label style="color:red"><?php echo e($errors->first('school_id')); ?></label>
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
            var maxField = 11; //Input fields increment limitation
            var minField1 = 8;
            var minField2 = 10;
            var x = 1; //Initial field counter is 1

            //Once add button is clicked for first half
            $('.add_button1').click(function () {
                var num1 = $('.clonedInput1').length;
                var newNum1 = new Number(num1 + 1);
                var fieldHTML = '   <div class="form-group col-sm-6">\n\
                                      \n\
                                     </div>\n\
                                     <div class="form-group mainDivCls clonedInput1" id="fhMainDiv' + newNum1 + '">\n\
                                    <div class="form-group col-sm-6">\n\
                                        <input type = "text" class = "form-control" placeholder = "Class Name" id = "school_class"  name = "school_class[]">\n\
                                    </div>\n\
                                    <div class="col-md-2">\n\
                                        <a href="javascript:void(0);" class="remove_button1" id="fhRemoveDiv_' + newNum1 + '"><i class="fa fa-minus icon2" >&nbsp;</i></a>\n\
                                        <br><br>\n\
                                    </div>\n\
                                </div>'; //New input field html
                //Check maximum number of input fields

                if (x < maxField) {
                    x++; //Increment field counter
                    $('.field_wrapper1').append(fieldHTML); //Add field html
    //                    $("#addIconFH").hide()
                } else {
                    alert("Can not added more than 10 fields");
                }
            });

            //Once remove button is clicked for first half
            $('.field_wrapper1').on('click', '.remove_button1', function (e) {
                var num1 = $('.clonedInput1').length;
                var id = $(this).attr('id');
                var res = id.split("_");
                var divId1 = "#fhMainDiv" + num1;
                e.preventDefault();
                if (num1 == res[1]) {
                    $(divId1).remove(); //Remove field html
                    $("#addIconFH").show()
                } else {
                    alert("Only last field you should delete");
                }
                //num--;
                x--; //Decrement field counter
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>