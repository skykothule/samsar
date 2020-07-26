
<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css">
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/public/global/vendor/jt-timepicker/jquery-timepicker.css">
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/public/assets/examples/css/forms/advanced.css">

    <style>
        p.redcolor{color:red; font-size:16px;}
        .spancolor{color:red;}
        .help-block{color:red;}
    </style>

    <div class="page-header">
        <h1 class="page-title font_lato"><?php echo e('Edit Company'); ?></h1>
        <div class="page-header-actions">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(URL::to('/dashboard')); ?>"><?php echo e(trans('app.home')); ?></a></li>
                <li><a href="<?php echo e(URL::to('company')); ?>"><?php echo e('Company List'); ?></a></li>
                <li class="active"><?php echo e(trans('app.create')); ?></li>
            </ol>
        </div>
    </div>

    <div class="page-content" ng-app="app">
        <div class="panel">
            <div class="panel-body container-fluid">
                <!------------------------start insert, update, delete message  ---------------->
                <div class="row">
                    <?php if(session('msg_success')): ?>
                        <div class="alert dark alert-icon alert-success alert-dismissible alertDismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="icon wb-check" aria-hidden="true"></i>
                            <?php echo e(session('msg_success')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('msg_update')): ?>
                        <div class="alert dark alert-icon alert-info alert-dismissible alertDismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="icon wb-check" aria-hidden="true"></i>
                            <?php echo e(session('msg_update')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('msg_delete')): ?>
                        <div class="alert dark alert-icon alert-danger alert-dismissible alertDismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="icon wb-check" aria-hidden="true"></i>
                            <?php echo e(session('msg_delete')); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <form  name="userForm" action="<?php echo e(URL::to('companyUpdate')); ?>" ng-submit="submitForm(userForm.$valid)" novalidate enctype="multipart/form-data"  id="demo-form2" data-parsley-validate="" method="post" novalidate="">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="comapny_id" value="<?php echo e($company_data->id); ?>">
                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700">Company Details</p>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName"><?php echo e('Company Name'); ?><span class="spancolor">*</span> </label>
                                    <input type="text" class="form-control" id="comapny_name" ng-model="comapny_name" name="comapny_name" ng-init="comapny_name='<?php echo e(old('comapny_name')); ?>'" placeholder="<?php echo e('Enter Company Name'); ?>" value="<?php echo e($company_data->company_name); ?>" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName"><?php echo e(trans('app.address')); ?></label>
                                    <textarea class="form-control" id="address" name="address" value="<?php echo e(old('address')); ?>" placeholder="<?php echo e(trans('app.address')); ?>" autocomplete="off"><?php echo e($company_data->address); ?></textarea>
                                </div>
                            </div>


                            <div class="row">

                                <div class="form-group col-sm-6">
                                    <label class="control-label"><?php echo e(trans('app.country')); ?> <span class="spancolor">*</span></label>
                                    <select ng-model="country"  class="form-control" name="country" required ng-init="country = '<?php echo e(old('country')); ?>'">
                                        <option value=""><?php echo e(trans('app.select_country')); ?> </option>
                                        <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($data->nicename); ?>" <?php echo e(($company_data->country == $data->nicename)?"selected":""); ?>><?php echo e($data->nicename); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>


                                <div class="form-group col-sm-6">
                                    <!-----------image crop------->
                                    <label class="control-label"><?php echo e('Company Logo'); ?> <span class="spancolor">*</span></label>
                                    <input type="file" class="form-control" id="image" ng-model="image" name="image" ng-init="image='<?php echo e(old('image')); ?>'" required>

                                </div>
                            </div>

                            <div style="clear:both"></div>
                            <div class="form-group col-sm-6">
                                <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                    <i class="fa fa-save"></i> Update
                                    <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                </button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div><br/>

    <script type="text/javascript">
        $uploadCrop = $('#upload-demo').croppie({
            enableExif: true,
            viewport: {
                width: 200,
                height: 200,
                type: 'circle'
            },
            boundary: {
                width: 300,
                height: 300
            }
        });

        $('#upload').on('change', function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function(){
                    //alert(123);
                    $("#uploadimage").hide();
                    $("#saveCancenimage").show();
                    console.log('jQuery bind complete');
                });

            }
            reader.readAsDataURL(this.files[0]);
        });

        
            
                
                
            
                
                
                    
                    
                    
                    
                    
                    
                        
                        
                        
                    
                
            
        

        $(document).ready(function(){
            $("#cancelbutton").click(function(){
                //console.log(123);
                $("#uploadimage").show();
                $("#saveCancenimage").hide();
                $('.cr-image').attr('src', '');
            });
            $(".upload-result").click(function(){
                setTimeout(function () {
                    location.reload(1);
                    //setInterval(auto_refresh, 3000);
                }, 3000);
            });
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>