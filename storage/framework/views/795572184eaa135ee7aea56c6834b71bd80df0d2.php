<?php $__env->startSection('content'); ?>
<div class="frontend_content">
        <div class="slider-page"></div>




    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="about-text">
                        <form method="POST" action="<?php echo e(URL::to('/resetpassword')); ?>" accept-charset="UTF-8">                        
                        <?php echo e(csrf_field()); ?>	
                        <div class="form-group">
                            <label for="email" class="title">Email Address</label>
                            <input required="" class="form-control" placeholder="Enter Email" name="email" type="text" id="email">
                        </div>
                        

                        <div class="form-group">
                            <label class="login-bar">
                                <input type="checkbox" name="remember">
                                Remember Me
                            </label>
                        </div>

            <div class="form-group">
                <input class="btn btn-success" type="submit" value="Sign In">

                <a class="btn btn-link" href="<?php echo e(URL::to('/customerlogin')); ?>">
                    Go to login
                </a>
            </div>
            </form>                   
             </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>