
<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/global/vendor/jt-timepicker/jquery-timepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/examples/css/forms/advanced.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/css/commonDashboardCss.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/global/vendor/filament-tablesaw/tablesaw.css')); ?>">
    <style>
        .tablecls {
            margin: 20px;
        }

        .tablecls  td{
            padding: 10px;
        }
    </style>
    <div class="page-content">
        <div class="panel">
            <?php if(session()->has('AddSchool')): ?>
                <div class="alert dark alert-icon alert-info alert-dismissible alertDismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-bell" style="color:#fff"></i>&nbsp;&nbsp;
                    <?php echo e(Session::get('AddSchool')); ?>

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
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">School List</p>
                                    <hr style="border: 1px solid black;">
                                </div>
                                <div class="form-group col-sm-12">
                                    <table id="example" class="table table-bordered table-bordered table-responsive table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th width="8%">Sr No</th>
                                            <th > School Name</th>
                                            <th >Land Line Number</th>
                                            <th >Email</th>
                                            <th >Package</th>
                                            <th >Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; ?>
                                        <?php $__currentLoopData = $school_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr >
                                                <td><?php echo e($i); ?></td>
                                                <td><?php echo e($school->school_name); ?></td>
                                                <td><?php echo e($school->school_email); ?></td>
                                                <td><?php echo e($school->school_contact); ?></td>
                                                <td><?php echo e($school->package_name); ?></td>
                                                <td><div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-success mr-1" onclick="viewSchoolDetails(<?php echo e($school->id); ?>)" data-toggle="modal" data-target="#myModal">View</button>&nbsp;&nbsp;
                                                        <button type="button" class="btn btn-sm btn-default mr-1" onclick="editSchoolDetails(<?php echo e($school->id); ?>)" data-toggle="modal" data-target="#myEditModal">Edit</button>
                                                    </div></td>
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
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog" >
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class = "model-body p-4">
                    <div class = "row">
                        <div class = "col-lg-12 col">
                            <p style = "color:#00c853;padding-left:20px;"><b>School Details</b></p>
                            <div class = "row">
                                <div class = "col-sm-12">
                                    <table class="tablecls">
                                        <tr>
                                            <td><b>Name  </b></td>
                                            <td id="view_name"> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Land Line</b></td>
                                            <td id="view_contact"> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Email</b></td>
                                            <td id="view_email"> </td>
                                        </tr>

                                        <tr>
                                            <td><b>Principal Email</b></td>
                                            <td id="principal_email"> </td>
                                        </tr>

                                        <tr>
                                            <td><b>Principal Contact</b></td>
                                            <td id="principal_contact"> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Package</b></td>
                                            <td id="view_package"></td>
                                        </tr>
                                        <tr>
                                            <td><b>Contact Person</b></td>
                                            <td id="view_person"></td>
                                        </tr>
                                        <tr>
                                            <td><b>Contact Person Number</b></td>
                                            <td id="view_per_no"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <div class="modal" id="myEditModal">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <form action="<?php echo e(URL::to('updateSchoolDetails')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <p style = "color:#00c853;padding-left:10px;"><b>School Details</b></p>

                    <div class = "row" style="padding: 10px">
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control <?php echo e(($errors->has('school_name'))?'errorBox':''); ?>" placeholder="School Name" name="school_name" id="school_name" value="<?php echo e(old('school_name')); ?>">
                            <input type="hidden" name="shl_id" id="shl_id">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control <?php echo e(($errors->has('school_email'))?'errorBox':''); ?>" placeholder="Email" name="school_email" id="school_email" value="<?php echo e(old('school_email')); ?>">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control <?php echo e(($errors->has('school_contact'))?'errorBox':''); ?>" placeholder="Land Line Number" name="school_contact" id="school_contact" value="<?php echo e(old('school_contact')); ?>">
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
                            <select class = "form-control" name="school_package" id="school_package">
                                <option>Select Package </option>
                                <option>Package 1</option>
                                <option>Package 2</option>
                                <option>Package 3</option>
                                <option>Package 4</option>
                            </select>
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
                ],
                order: ["0", "asc"]
            });
        });
        function viewSchoolDetails(scl_id){
            var base_url= basePath();
            $.ajax({
                url: base_url+'getSchoolDetails/{id}',
                type: 'GET',
                data: {scl_id: scl_id},
                success: function (response) {
                    var obj = JSON.parse(response);
//                    alert(obj.name);
                    $('#view_name').html(obj.school_name);
                    $('#view_contact').html(obj.school_contact);
                    $('#view_email').html(obj.school_email);
                    $('#principal_email').html(obj.principal_email);
                    $('#principal_contact').html(obj.principal_contact);
                    $('#view_package').html(obj.school_package);
                    $('#view_person').html(obj.contact_person_name);
                    $('#view_per_no').html(obj.contact_person_no);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Not Valid School");
                }

            });
        }

        function editSchoolDetails(scl_id){
            var base_url= basePath();
            $.ajax({
                url: base_url+'getSchoolDetails/{id}',
                type: 'GET',
                data: {scl_id: scl_id},
                success: function (response) {
                    var obj = JSON.parse(response);
//                    alert(obj.name);
                    $('#school_name').val(obj.school_name);
                    $('#shl_id').val(obj.id);
                    $('#school_contact').val(obj.school_contact);
                    $('#school_email').val(obj.school_email);
                    $('#principal_email').val(obj.principal_email);
                    $('#principal_contact').val(obj.principal_contact);
                    $('#school_package').val(obj.school_package);
                    $('#contact_person_name').val(obj.contact_person_name);
                    $('#contact_person_no').val(obj.contact_person_no);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Not Valid School");
                }

            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>