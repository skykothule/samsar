
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
                                    <p class="font-size-20 blue-grey-700" style="color: #4F0800;padding-left:5px;">Trainer List</p>
                                    <hr style="border: 1px solid black;">
                                </div>
                                <div class="form-group col-sm-12">
                                    <table id="example" class="table table-bordered  table-responsive table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th width="6%">Sr No</th>
                                            <th > Trainer Name</th>
                                            <th >School Name</th>
                                            <th >Mobile Number</th>
                                            <th >Email</th>
                                            <th >Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; ?>
                                            <?php $__currentLoopData = $trainer_set; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="sorting_1"><?php echo e($i); ?></td>
                                                    <td><?php echo e($trainer->name); ?></td>
                                                    <td><?php echo e($trainer->school_name); ?></td>
                                                    <td><?php echo e($trainer->contact); ?></td>
                                                    <td><?php echo e($trainer->email); ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-success mr-1" onclick="viewTraniverDetails(<?php echo e($trainer->id); ?>)" data-toggle="modal" data-target="#myModal" >View</button>
                                                            <button type="button" class="btn btn-sm btn-default mr-1" onclick="editTraniverDetails(<?php echo e($trainer->id); ?>)" data-toggle="modal" data-target="#myEditModal" >Edit</button>
                                                            <button type="button" class="btn btn-sm btn-danger">Delete</button>
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
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class = "model-body p-4">

                    <p style = "color:#00c853;padding-left:10px;"><b>Trainer Details</b></p>
                    <div class = "row">
                        <div class = "col-sm-12">
                            <table class="tablecls">
                                <tr>
                                    <td><b>Name  </b></td>
                                    <td id="view_name"> </td>
                                </tr>
                                <tr>
                                    <td><b>School Name  </b></td>
                                    <td id="view_school"> </td>
                                </tr>
                                <tr>
                                    <td><b>School Address  </b></td>
                                    <td id="view_school_add"> </td>
                                </tr>
                                <tr>
                                    <td><b>Heighest Education  </b></td>
                                    <td id="view_edu"> </td>
                                </tr>
                                <tr>
                                    <td><b>Experience  </b></td>
                                    <td id="view_exp"> </td>
                                </tr>
                                <tr>
                                    <td><b>Heighest Sports Achievements</b></td>
                                    <td id="view_achiv"></td>
                                </tr>
                                <tr>
                                    <td><b>Primary Game</b></td>
                                    <td id="view_game"></td>
                                </tr>
                                <tr>
                                    <td><b>Last Employee</b></td>
                                    <td id="view_lst_emp"></td>
                                </tr>
                                <tr>
                                    <td><b>Email    </b></td>
                                    <td id="view_email"></td>
                                </tr>
                                <tr>
                                    <td><b>Mobile    </b></td>
                                    <td id="view_contact"> </td>
                                </tr>
                                <tr>
                                    <td><b>Address    </b></td>
                                    <td id="view_add"></td>
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
                <form action="<?php echo e(URL::to('updateTrainerDetails')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                    <p style = "color:#00c853;padding-left:10px;"><b>Trainer Details</b></p>

                    <div class = "row" style="padding: 10px">
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control <?php echo e(($errors->has('name'))?'errorBox':''); ?>" placeholder="Full name" id="name" name="name"  value="<?php echo e(old('name')); ?>" required>
                            <input type="hidden" name="trn_id" id="trn_id">
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
                            <input type="email" class="form-control <?php echo e(($errors->has('email'))?'errorBox':''); ?>" placeholder="Email" id="email" name="email"  value="<?php echo e(old('email')); ?>" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="number" class="form-control <?php echo e(($errors->has('contact'))?'errorBox':''); ?>" placeholder="Mobile Number" id="contact" name="contact"  value="<?php echo e(old('contact')); ?>" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" placeholder="Address" id="address" name="address" value="<?php echo e(old('address')); ?>">
                        </div>
                        <div class="form-group col-sm-6">
                            <div class="input-group input-file" name="Fichier1">
                                <input type="text" class="form-control" placeholder='Choose a file...'  id="profile_photo" name="profile_photo" value="<?php echo e(old('profile_photo')); ?>"/>
                                <span class="input-group-btn">
                                            <button class="btn btn-default btn-choose" type="button">Select Photo</button>
                                        </span>
                            </div>
                        </div>
                        <div class ="form-group col-sm-6">
                            <input type="text" class="form-control" placeholder="ID" id = "id" disabled>
                        </div>
                        <div class="form-group col-sm-6">
                            <div class="input-group input-file" name="Fichier1">
                                <input type="text" class="form-control" placeholder='Choose a file...' id="resume" name="resume"  value="<?php echo e(old('resume')); ?>"/>
                                <span class="input-group-btn">
                                            <button class="btn btn-default btn-choose" type="button">Selecte Resume</button>
                                        </span>
                            </div>
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

        function viewTraniverDetails(trn_id){
            var base_url= basePath();
            $.ajax({
                url: base_url+'getTrainerDetails/{id}',
                type: 'GET',
                data: {trn_id: trn_id},
                success: function (response) {
                    var obj = JSON.parse(response);
//                    alert(obj.name);
                    $('#view_name').html(obj.name);
                    $('#view_edu').html(obj.education);
                    $('#view_school').html(obj.school_name);
                    $('#view_school_add').html(obj.school_address);
                    $('#view_exp').html(obj.experience);
                    $('#view_achiv').html(obj.sport_achievement);
                    $('#view_game').html(obj.primary_game);
                    $('#view_lst_emp').html(obj.last_employee);
                    $('#view_email').html(obj.email);
                    $('#view_contact').html(obj.contact);
                    $('#view_add').html(obj.address);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Not Valid Trainer");
                }

            });
        }
        function editTraniverDetails(trn_id){
            var base_url= basePath();
            $.ajax({
                url: base_url+'getTrainerDetails/{id}',
                type: 'GET',
                data: {trn_id: trn_id},
                success: function (response) {
                    var obj = JSON.parse(response);
//                    alert(obj.name);
                    $('#name').val(obj.name);
                    $('#trn_id').val(obj.id);
                    $('#education').val(obj.education);
                    $('#experience').val(obj.experience);
                    $('#sport_achievement').val(obj.sport_achievement);
                    $('#primary_game').val(obj.primary_game);
                    $('#last_employee').val(obj.last_employee);
                    $('#email').val(obj.email);
                    $('#contact').val(obj.contact);
                    $('#address').val(obj.address);


                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Not Valid Trainer");
                }

            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>