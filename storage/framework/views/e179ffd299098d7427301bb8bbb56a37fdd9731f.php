
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
                <form  name="userForm" action="<?php echo e(URL::to('addSubSession')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">New Assessment Criteria</p>
                                    <hr style="border: 1px solid black;">
                                </div>
                                <div class="form-group col-sm-6">
                                    <select class = "form-control <?php echo e(($errors->has('session_type'))?'errorBox':''); ?>" name = "session_type">
                                        <option value="">Select Session</option>
                                        <?php $__currentLoopData = $all_sesion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($data->id); ?>"><?php echo e(ucwords($data->session_name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6"><br><br>
                                </div>

                                <div class="form-group col-sm-6">
                                    <input type = "text" class = "form-control <?php echo e(($errors->has('sub_session_type'))?'errorBox':''); ?>" name = "sub_session_type" placeholder = "Enter Assessment Criteria Name" value="<?php echo e(old('sub_session_type')); ?>">
                                </div>
                                <div class="form-group col-sm-6"><br><br>
                                </div>
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
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                    <div class="col-sm-12" >
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="font-size-20 blue-grey-700" style="color: #4F0800;">Criteria List</p>
                                <hr style="border: 1px solid black;">
                            </div>
                            <div class="form-group col-sm-12">
                                <table id="example" class="table table-bordered table-responsive table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                    <tr role="row">
                                        <th>Session Name</th>
                                        <th>Assessment Criteria</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($all_criteria)): ?>
                                        <?php $__currentLoopData = $all_criteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $criteria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($criteria->session_name); ?></td>
                                                <td><?php echo e($criteria->sub_session_name); ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        
                                                        <a href="<?php echo e(url("deleteCriteria",base64_encode($criteria->criteria_id))); ?>" class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>