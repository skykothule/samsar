
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
            <?php if(session()->has('AddClass')): ?>
                <div class="alert dark alert-icon alert-info alert-dismissible alertDismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-bell" style="color:#fff"></i>&nbsp;&nbsp;
                    <?php echo e(Session::get('AddClass')); ?>

                </div>
            <?php endif; ?>
            <div class="panel-body container-fluid">
                <form  name="userForm" action="<?php echo e(URL::to('')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">Achievement List</p>
                                    <hr style="border: 1px solid black;">
                                </div>
                                <div class="form-group col-sm-12">
                                    <table id="example" class="table table-bordered table-bordered table-responsive table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            
                                            <th> School Name</th>
                                            <th> Student Name</th>
                                            <th> Competition Name</th>
                                            <th> Rank</th>
                                            <th> Competition Level</th>
                                            <th> Year</th>
                                            <th> Image</th>
                                            <th> Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; ?>
                                        <?php $__currentLoopData = $achivement_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $achivement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                
                                                <td><?php echo e($achivement->school_name); ?></td>
                                                <td><?php echo e($achivement->student_name); ?></td>
                                                <td><?php echo e($achivement->competition_name); ?></td>
                                                <td><?php echo e($achivement->rank); ?></td>
                                                <td><?php echo e($achivement->competation_level); ?></td>
                                                <td><?php echo e($achivement->year); ?></td>
                                                <td><a href="<?php echo e($achivement->competation_pic); ?>" target="_blank">Click Here..</a></td>
                                                <td>
                                                    <div class="btn-group">
                                                        
                                                        
                                                        <button data-placement="top" data-toggle="modal" rel="tooltip" title="<?php echo e(trans('app.delete')); ?>"  data-original-title="<?php echo e(trans('app.delete')); ?>"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="<?php echo e(URL::to('destroyAchievement',$achivement->id)); ?>"><i class="icon fa-remove" aria-hidden="true"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
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
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
        function editClassDetails(cls_id){
            var base_url= basePath();
            $.ajax({
                url: base_url+'getClassDetails/{id}',
                type: 'GET',
                data: {cls_id: cls_id},
                success: function (response) {
                    var obj = JSON.parse(response);
//                    alert(obj.name);
                    $('#school_id').val(obj.school_name);
                    $('#cls_id').val(obj.id);
                    $('#class_name').val(obj.class_name);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Not Valid School");
                }

            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>