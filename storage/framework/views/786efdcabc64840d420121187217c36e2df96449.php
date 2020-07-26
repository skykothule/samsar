<?php $__env->startSection('content'); ?>
<div class="frontend_content">
        <div class="slider-page">
        <div class="single-slider-page">
            <div class="single-slider-page-table">
                <div class="single-slider-page-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="services-text">


                                    <h1 class="services-tailte-text">Login</h1>
                                    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs"><li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class=""><a itemprop="item" href="http://ozcleaners.com.au"><span itemprop="name">Home</span></a><meta itemprop="position" content="1"> <span class="divider"> » &nbsp;</span></li><li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class=" active"><span itemprop="name">Login</span><meta itemprop="position" content="2"></li></ul>                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




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
            
            <h1>Customer Dahsboard Page here </h1>
               <!-- <a href="<?php echo e(URL::to('/customerlogout')); ?>">Log Out</a>            -->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>