
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
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">Notification List</p>
                                    <hr style="border: 1px solid black;">
                                </div>
                                <div class="form-group col-sm-12">
                                    <table id="example" class="table table-bordered table-bordered table-responsive table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th width="5%"> Sr No</th>
                                            <th> School Name</th>
                                            <th> Heading</th>
                                            <th> Date</th>
                                            <th> Time</th>
                                            <th> Garde</th>
                                            <th> Description</th>
                                            <th> Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; ?>
                                        <?php $__currentLoopData = $notification_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($i); ?></td>
                                                <td><?php echo e($notification->school_name); ?></td>
                                                <td><?php echo e($notification->heading); ?></td>
                                                <td><?php echo e(date('d-m-Y',strtotime($notification->date))); ?></td>
                                                <td><?php echo e(date('h:i A',strtotime($notification->time))); ?></td>
                                                <td><?php echo e($notification->garde); ?></td>
                                                <td><?php echo e($notification->description); ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        
                                                        
                                                        <button data-placement="top" data-toggle="modal" rel="tooltip" title="<?php echo e(trans('app.delete')); ?>"  data-original-title="<?php echo e(trans('app.delete')); ?>"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="<?php echo e(URL::to('destroyNotification',$notification->id)); ?>"><i class="icon fa-remove" aria-hidden="true"></i></button>
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
    <div class="modal" id="myEditModal">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <form action="<?php echo e(URL::to('updateNotification')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <p style = "color:#00c853;padding-left:10px;"><b>Class Details</b></p>

                    <div class = "row" style="padding: 10px">
                        <div class="form-group col-sm-12">
                            <input type="text" class="form-control " placeholder="Class Name" name="school_id" id="school_id">
                            <input type="hidden" name="cls_id" id="cls_id">
                        </div>
                        <div class="form-group col-sm-12">
                            <input type="text" class="form-control" placeholder="Email" name="class_name" id="class_name" >
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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