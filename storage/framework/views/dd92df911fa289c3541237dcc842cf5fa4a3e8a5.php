<?php $__env->startSection('content'); ?>
<div class="frontend_content">
    <div class="slider-page"></div>

    <div class="about-area">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <?php if(session()->get('error')): ?>
                    <div class="alert alert-danger">
                    <?php echo session()->get('error'); ?>

                    </div>
                <?php endif; ?>
                <?php if(session()->get('status')): ?>
                    <div class="alert alert-success">
                    <?php echo session()->get('status'); ?>

                    </div>
                <?php endif; ?>
            </div>

                <div class="col-md-5">
                    <div class="about-text">
                        <form method="POST" action="<?php echo e(URL::to('/customerlogin')); ?>" accept-charset="UTF-8">                        
                        <?php echo e(csrf_field()); ?>	
                        <div class="form-group">
                            <label for="email" class="title">Email Address</label>
                            <input required="" class="form-control" placeholder="Enter Email" name="email" type="text" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sub_title">Password</label>
                            <input class="form-control" placeholder="Enter Password" name="password" type="password" value="" id="password">
                        </div>

                        <div class="form-group">
                            <label class="login-bar">
                                <input type="checkbox" name="remember">
                                Remember Me
                            </label>
                        </div>

            <div class="form-group">
                <input class="btn btn-success" type="submit" value="Sign In">
                <a class="btn btn-link" href="<?php echo e(URL::to('/createaccount')); ?>">
                    Create New Account?
                </a>
                <a class="btn btn-link" href="<?php echo e(URL::to('/reset_password')); ?>">
                    Forgot Your Password?
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