
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
                <form  name="userForm" action="<?php echo e(URL::to('')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">Session List</p>
                                    <hr style="border: 1px solid black;">
                                </div>
                                <div class="form-group col-sm-12">
                                    <table id="example" class="table table-bordered table-responsive table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th style = "" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Roll No</th>
                                            <th style = "" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> Session Name</th>
                                            <th style = "" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> Assigned Trainer Name</th>
                                            <th style = "" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> Trainer Number</th>
                                            <th style = "" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> Trainer Email</th>
                                            <th style = "" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>Yoga</td>
                                            <td>Sahil Warma</td>
                                            <td>9876543210</td>
                                            <td>sahil@gmail.com</td>
                                            <td><div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-sm mr-2">Edit</button>
                                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                                </div></td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">2</td>
                                            <td>Cricket</td>
                                            <td>Rajes Waghmare</td>
                                            <td>9809876543</td>
                                            <td>waghmare@gmail.com</td>
                                            <td><div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-sm mr-2">Edit</button>
                                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                                </div></td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">3</td>
                                            <td>Football</td>
                                            <td>Deepak Wale</td>
                                            <td>7709865432</td>
                                            <td>deepak@gmail.com</td>
                                            <td><div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-sm mr-2">Edit</button>
                                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                                </div></td>
                                        </tr>
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
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class = "model-body p-4">

                    <p style = "color:#00c853;"><b>Trainer Details</b></p>
                    <div class = "row">
                        <div class = "col">
                            <p><b>Name  </b></p>
                            <p><b>Heighest Education  </b></p>
                            <p><b>Experience  </b></p>
                            <p><b>Heighest Sports Achievements</b></p>
                            <p><b>Primary Game</b></p>
                            <p><b>Last Employee</b></p>
                            <p><b>Email    </b></p>
                            <p><b>Mobile    </b></p>
                            <p><b>Address    </b></p>
                            <p><b>Photo</b></p>
                            <p><b>Resume    </b></p>
                        </div>
                        <div class = "col">
                            <p>Mohan Patil</p>
                            <p>BA</p>
                            <p>2 Years</p>
                            <p>1st pirce at state level as trainer.</p>
                            <p>Cricket</p>
                            <p>XYZ Pvt Ltd</p>
                            <p>mohan@gmail.com</p>
                            <p>9876543210 </p>
                            <p>Pune</p>
                            <img src="dist/img/user2-160x160.jpg" height = "40"><br>
                            <img src="dist/img/esports/resume.jpg" height = "40">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
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
                ],
                order: ["0", "desc"]
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>