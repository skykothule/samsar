
<?php $__env->startSection('content'); ?>
 <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/global/vendor/blueimp-file-upload/jquery.fileupload.css">
  <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/global/vendor/dropify/dropify.css">
  <div class="page-header">
  <h1 class="page-title font_lato">File Uploads </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="<?php echo e(URL::to('/dashboard')); ?>"><?php echo e(trans('app.home')); ?></a></li>
		<li class="active">File Uploads</li>
	</ol>
  </div>
</div> 
 <div class="page-content">
      <!-- Panel Dropify -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Dropify
            <small><a class="example-plugin-link" href="https://jeremyfagis.github.io/dropify/"
              target="_blank">official website</a></small>
          </h3>
        </div>
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-lg-4 col-sm-6">
              <!-- Example Default -->
              <div class="example-wrap">
                <h4 class="example-title">Your so fresh input file � Default version</h4>
                <div class="example">
                  <input type="file" id="input-file-now" data-plugin="dropify" data-default-file=""
                  />
                </div>
              </div>
              <!-- End Example Default -->
            </div>
            <div class="col-lg-4 col-sm-6">
              <!-- Example Default Value -->
              <div class="example-wrap">
                <h4 class="example-title">You can add a default value</h4>
                <div class="example">
                  <input type="file" id="input-file-now-custom-1" data-plugin="dropify" data-default-file="<?php echo e(URL::to('/')); ?>/global/photos/placeholder.png"
                  />
                </div>
              </div>
              <!-- End Example Default Value -->
            </div>
            <div class="clearfix visible-sm-block visible-md-block"></div>
            <div class="col-lg-4 col-sm-6">
              <!-- Example height -->
              <div class="example-wrap">
                <h4 class="example-title">You can set the height</h4>
                <div class="example">
                  <input type="file" id="input-file-now-custom-2" data-plugin="dropify" data-height="500"
                  />
                </div>
              </div>
              <!-- End Example height -->
            </div>
            <div class="col-lg-4 col-sm-6">
              <!-- Example combine options -->
              <div class="example-wrap">
                <h4 class="example-title">You can combine options</h4>
                <div class="example">
                  <input type="file" id="input-file-now-custom-3" data-plugin="dropify" data-height="500"
                  data-default-file="<?php echo e(URL::to('/')); ?>/global/photos/placeholder.png" />
                </div>
              </div>
              <!-- End Example combine options -->
            </div>
            <div class="clearfix visible-sm-block visible-md-block"></div>
            <div class="col-lg-4 col-sm-6">
              <!-- Example disabled -->
              <div class="example-wrap">
                <h4 class="example-title">You can disabled the input</h4>
                <div class="example">
                  <input type="file" id="input-file-now-disabled-1" data-plugin="dropify" disabled="disabled"
                  />
                </div>
              </div>
              <!-- End Example disabled -->
            </div>
            <div class="col-lg-4 col-sm-6">
              <!-- Example default file -->
              <div class="example-wrap">
                <h4 class="example-title">Also with a default file</h4>
                <div class="example">
                  <input type="file" id="input-file-now-disabled-2" data-plugin="dropify" disabled="disabled"
                  data-default-file="<?php echo e(URL::to('/')); ?>/global/photos/placeholder.png" />
                </div>
              </div>
              <!-- End Example default file -->
            </div>
            <div class="clearfix visible-sm-block visible-md-block"></div>
            <div class="col-lg-4 col-sm-6">
              <!-- Example max file size -->
              <div class="example-wrap">
                <h4 class="example-title">You can add a max file size</h4>
                <div class="example">
                  <input type="file" id="input-file-max-fs" data-plugin="dropify" data-max-file-size="2M"
                  />
                </div>
              </div>
              <!-- End Example max file size -->
            </div>
            <div class="col-lg-4 col-sm-6">
              <!-- Example disable -->
              <div class="example-wrap">
                <h4 class="example-title">You can disable remove button</h4>
                <div class="example">
                  <input type="file" id="input-file-disable-remove" data-plugin="dropify" data-disable-remove="true"
                  />
                </div>
              </div>
              <!-- End Example disable -->
            </div>
            <div class="clearfix visible-sm-block visible-md-block"></div>
            <div class="col-lg-4 col-sm-6">
              <!-- Example events -->
              <div class="example-wrap">
                <h4 class="example-title">You can use events</h4>
                <div class="example">
                  <input type="file" id="input-file-events" class="dropify-event" data-default-file="<?php echo e(URL::to('/')); ?>/global/photos/placeholder.png"
                  />
                </div>
              </div>
              <!-- End Example events -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Panel Dropify -->
      <div class="example-wrap">
        <h3 class="example-title">jQuery File Upload
          <small><a class="example-plugin-link" href="https://blueimp.github.io/jQuery-File-Upload/"
            target="_blank">official website</a></small>
        </h3>
        <form class="upload-form" id="exampleUploadForm" method="POST">
          <input type="file" id="inputUpload" name="files[]" multiple="" />
          <div class="uploader-inline">
            <h3 class="upload-instructions">Click Or Drop Files To Upload. We Use Jquery File Upload, You Can Learn
              More Form
              <A id="uploadlink" href="https://blueimp.github.io/jQuery-File-Upload/" target="_blank">Here</A>.</h3>
          </div>
          <div class="file-wrap container-fluid">
            <div class="file-list row"></div>
          </div>
        </form>
      </div>
    </div>
<br/>
<?php $__env->stopSection(); ?>





 

<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>