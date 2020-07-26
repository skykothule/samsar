<?php $__env->startSection('content'); ?>
<div class="row">
<div class="slidePanel slidePanel-right slidePanel-show" style="transform: translate3d(0%, 0px, 0px); top: 68px; bottom: 0;width: 79%;"><div class="slidePanel-scrollable scrollable is-enabled scrollable-vertical" style="position: relative;"><div class="scrollable-container"><div class="slidePanel-content scrollable-content">
<header class="slidePanel-header" style="padding:25px 30px">
  <div class="slidePanel-actions" style="min-height:0px;" aria-label="actions" role="group">
    <a href="<?php echo e(URL::to('/message')); ?>"><button type="button" style="top:12px;" class="btn btn-icon btn-pure btn-inverse slidePanel-close actions-top icon wb-close" aria-hidden="true"></button></a>
  </div>
  <?php $__currentLoopData = $messagedetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <h1 class="mailbox-panel-title"><?php echo e((!empty($view->subject)?$view->subject : trans('app.replay_message'))); ?></h1>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </header>
<div class="slidePanel-inner">
  <div class="slidePanel-main"></div>
  <div class="slidePanel-messages">
  
   <?php $__currentLoopData = $messagedetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <section class="slidePanel-inner-section">
	  <div class="mail-header"><div class="mail-header-main">
	  <a class="avatar" href="javascript:void(0)"><img src="<?php echo e(URL::to('/')); ?>/<?php echo e((!empty($view->receiveMessage->image)?'uploads' :'images')); ?>/<?php echo e((!empty($view->receiveMessage->image)?$view->receiveMessage->image :'default.png')); ?>" alt="..."></a>
	  <div>
	  <span class="name"><?php echo e($view->receiveMessage->first_name); ?> <?php echo e($view->receiveMessage->last_name); ?></span></div>
	  <div><a href="javascript:void(0)" class="mailbox-panel-email"><?php echo e($view->receiveMessage->email); ?></a>
	  to <a class="margin-right-10">me</a></div></div><div class="mail-header-right">
	  <span class="time"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $view->created_at)->diffForHumans()); ?></span>
	  <div class="btn-group actions" role="group">
	  <button type="button" class="btn btn-icon btn-pure btn-default"></button></div></div>
	  </div>
	  <div class="mail-content"><p><?php echo e($view->description); ?></p></div>
  </section>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php $__currentLoopData = $replaymessage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <section class="slidePanel-inner-section">
  <div class="mail-header">
  <div class="mail-header-main">  
  <a class="avatar" href="javascript:void(0)"> <img src="<?php echo e(URL::to('/')); ?>/<?php echo e((!empty($view->receiveMessage->image)?'uploads' :'images')); ?>/<?php echo e((!empty($view->receiveMessage->image)?$view->receiveMessage->image :'default.png')); ?>" alt="..."></a>
  
  <div><span class="name"><?php echo e($view->receiveMessage->first_name); ?> <?php echo e($view->receiveMessage->last_name); ?></span></div>
  <div><a href="javascript:void(0)" class="mailbox-panel-email"><?php echo e($view->receiveMessage->email); ?></a> to <a href="javascript:void(0)" class="margin-right-10"> <?php echo e(((Auth::user()->id == $view->receiveMessage->id)?$messagedetails[0]->receiveMessage->first_name.' '.$messagedetails[0]->receiveMessage->last_name : 'me')); ?></a>
  <!--<span class="identity"> <i class="wb-medium-point red-600" aria-hidden="true"></i>Work</span>-->
  </div></div><div class="mail-header-right"><span class="time"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $view->created_at)->diffForHumans()); ?></span>
  <div class="btn-group actions" role="group"><button type="button" class="btn btn-icon btn-pure btn-default">
  <!--<i class="icon wb-star" aria-hidden="true"></i></button><button type="button" class="btn btn-icon btn-pure btn-default"><i class="icon wb-reply" aria-hidden="true"></i></button>-->
  </div></div></div><div class="mail-content">
  <p><?php echo e($view->description); ?></p></div>  
  </section>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <form class="form-horizontal" role="form" method="post" action="<?php echo e(URL::to('/MessageController/save/')); ?>">	
		<?php echo e(csrf_field()); ?>	
  <?php $__currentLoopData = $messagedetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="slidePanel-comment">
  <input type="hidden" name="messageid" value="<?php echo e($view->id); ?>"/>
  <input type="hidden" name="replay_id_condition" value="<?php if(!empty($view->replay_id)): ?><?php echo e($view->replay_id); ?><?php elseif(!empty($view->replay_ref_id)): ?><?php echo e($view->replay_ref_id); ?><?php else: ?> replaycondi <?php endif; ?>"/>
  <input type="hidden" name="replay_id" value="<?php if(!empty($view->replay_id)): ?>
  <?php echo e($view->replay_id); ?>

  <?php elseif($view->replay_ref_id): ?>
  <?php echo e($view->replay_ref_id); ?>

  <?php else: ?>
  <?php echo e($view->id); ?>

<?php endif; ?> "/>
  <input type="hidden" name="receiver_id[]" value="<?php echo e($view->sender_id); ?>"/>
  <input type="hidden" name="sender_id" value="<?php echo e($view->receiver_id); ?>"/>
  <input type="hidden" name="subject" value=""/>  
    <textarea class="maxlength-textarea form-control mb-sm margin-bottom-20" name="description" rows="4" required></textarea>
    <button class="btn btn-primary loadingclick" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Loading.."  type="submit"> <?php echo e(trans('app.replay')); ?> </button>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</form>
</div>
</div>
<div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide" draggable="false"><div class="scrollable-bar-handle" style="height: 77.989px; transform: translate3d(0px, 0px, 0px);"></div></div></div>
<div class="slidePanel-handler"></div>
<div class="slidePanel-loading"><div class="loader loader-default"></div></div>
</div>
</div>
<br/>
<div style="clearboth;"></div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>