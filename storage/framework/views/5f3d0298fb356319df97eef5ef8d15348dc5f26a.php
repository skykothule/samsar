
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
            <?php if(!empty($message)): ?>
                <div class="alert dark alert-icon alert-info alert-dismissible alertDismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-bell" style="color:#fff"></i>&nbsp;&nbsp;
                    <?php echo e($message); ?>

                </div>
            <?php endif; ?>
            <div class="panel-body container-fluid">

                <form  name="userForm" action="<?php echo e(URL::to('listStudent')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;">Student List</p>
                                    <hr style="border: 1px solid black;">
                                    <div class="form-group col-sm-6">
                                        <select class = "form-control" name="school_name" id="school_name" required>
                                            <option value="">Select School</option>
                                            <?php if(!empty($school_id)): ?>
                                                <?php $__currentLoopData = $school_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($school->school_id); ?>" <?php echo e(($school_id == $school->school_id)?"selected":""); ?>><?php echo e($school->school_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <?php $__currentLoopData = $school_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($school->school_id); ?>" <?php echo e((old('school_name')==$school->school_id)?"selected":""); ?>><?php echo e($school->school_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6"><br><br></div>
                                    <div class="form-group col-sm-6">
                                        <select class = "form-control" name="year" id="year" required>
                                            <option value="">Select Year</option>
                                            <?php $year = date('Y'); $count = $year+3; ?>
                                            <option value="<?php echo e(($year-1)."-".$year); ?>"><?php echo e(($year-1)."-".$year); ?></option>
                                            <?php for($i=$year;$i<=$count;$i++): ?>
                                                <?php $j = $i+1; ?>
                                                <option value="<?php echo e($i."-".$j); ?>"><?php echo e($i."-".$j); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6"><br><br></div>
                                    
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        
                                    
                                    <div class = "form-group col-sm-1">
                                        <button type = "Submit" class = "btn btn-success" id = "display_details">Show</button>
                                    </div>
                                </div>
                                <?php if(!empty($student_list)): ?>
                                <div class="col-sm-12">
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th>Roll No</th>
                                                <th>Name</th>
                                                <th>Class</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $student_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($student->roll_no); ?></td>
                                                    <td><?php echo e($student->student_name); ?></td>
                                                    <td><?php echo e($student->class); ?></td>
                                                    
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-success mr-1" onclick="viewStudentDetails(<?php echo e($student->student_id); ?>)" data-toggle="modal" data-target="#myModal" >View</button>
                                                            <button type="button" class="btn btn-sm btn-default mr-1" onclick="editStudentDetails(<?php echo e($student->student_id); ?>)" data-toggle="modal" data-target="#myEditModal" >Edit</button>
                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-lg" >
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class = "model-body p-4">

                        <p style = "color:#00c853;padding-left:10px;"><b>Student Details</b></p>
                        <div class = "row">
                            <div class = "col-sm-12">
                                <table class="tablecls">
                                    <tr>
                                        <td><b>Roll No  </b></td>
                                        <td id="view_roll_no"> </td>
                                    </tr>
                                    <tr>
                                        <td><b>Name  </b></td>
                                        <td id="view_name"> </td>
                                    </tr>
                                    <tr>
                                        <td><b>School Name  </b></td>
                                        <td id="view_school"> </td>
                                    </tr>
                                    <tr>
                                        <td><b>Class  </b></td>
                                        <td id="view_class"> </td>
                                    </tr>
                                    <tr>
                                        <td><b>DOB  </b></td>
                                        <td id="view_dob"> </td>
                                    </tr>
                                    <tr>
                                        <td><b>Parent Number  </b></td>
                                        <td id="view_parent_no"> </td>
                                    </tr>
                                    <tr>
                                        <td><b>Student Address  </b></td>
                                        <td id="view_stud_add"> </td>
                                    </tr>
                                </table>
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

        <!-- The Modal -->
        <div class="modal" id="myEditModal">
            <div class="modal-dialog modal-lg" >
                <div class="modal-content">
                    <form action="<?php echo e(URL::to('updateStudentDetails')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <p style = "color:#00c853;padding-left:10px;"><b>Student Details</b></p>

                        <div class = "row" style="padding: 10px">
                            <div class="form-group col-sm-6">
                                <label class="control-label"> Student Name</label>
                                <input type="text" class="form-control <?php echo e(($errors->has('name'))?'errorBox':''); ?>" placeholder="Full name" id="student_name" name="student_name"  value="<?php echo e(old('name')); ?>" required>
                                <input type="hidden" name="student_id" id="student_id">
                                <input type="hidden" name="school_id" id="school_id">
                                <input type="hidden" name="add_year" id="add_year">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label"> Student Roll No</label>
                                <input type="text" class="form-control" placeholder="Roll Number" id="roll_no" name="roll_no" value="<?php echo e(old('roll_no')); ?>">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label"> Parent Number</label>
                                <input type="text" class="form-control" placeholder="Parent Number" id="parent_number" name="parent_number" value="<?php echo e(old('parent_number')); ?>">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label"> Date Of Birth </label>
                                <input type="date" class="form-control" placeholder="Date Of Birth" id="date_of_birth" name="date_of_birth" value="<?php echo e(old('date_of_birth')); ?>">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label"> Student Address</label>
                                <input type="text" class="form-control" placeholder="Student Address" id="address" name="address" value="<?php echo e(old('address')); ?>">
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
    </div><br/>


    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
            });
        });

        function viewStudentDetails(student_id){
            var base_url= basePath();
            $.ajax({
                url: base_url+'getStudentDetails/{id}',
                type: 'GET',
                data: {student_id: student_id},
                success: function (response) {
                    var obj = JSON.parse(response);
//                    alert(obj.name);
                    $('#view_roll_no').html(obj.roll_no);
                    $('#view_name').html(obj.student_name);
                    $('#view_school').html(obj.school_name);
                    $('#view_class').html(obj.class);
                    $('#view_dob').html(obj.date_of_birth);
                    $('#view_parent_no').html(obj.parent_number);
                    $('#view_stud_add').html(obj.address);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Not Valid Student");
                }

            });
        }
        function editStudentDetails(student_id){
            var base_url= basePath();
            $.ajax({
                url: base_url+'getStudentDetails/{id}',
                type: 'GET',
                data: {student_id: student_id},
                success: function (response) {
                    var obj = JSON.parse(response);
//                    alert(obj.year);
                    $('#student_id').val(obj.student_id);
                    $('#school_id').val(obj.school_id);
                    $('#add_year').val(obj.year);
                    $('#roll_no').val(obj.roll_no);
                    $('#student_name').val(obj.student_name);
                    $('#date_of_birth').val(obj.date_of_birth);
                    $('#parent_number').val(obj.parent_number);
                    $('#address').val(obj.address);


                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Not Valid Student");
                }

            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>