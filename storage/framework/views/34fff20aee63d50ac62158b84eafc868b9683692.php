<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <title><?php $__currentLoopData = $settingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($view->app_title); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  </title>
  <!-- Stylesheets -->
  
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/css/bootstrap-fileupload.min.css')); ?>">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"/>

    <script type="text/javascript" src="<?php echo e(URL::asset('public/assets/datatables/jquery-1.12.4.min.js')); ?>"></script>

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">

    <?php echo e(Html::style('public/global/css/bootstrap.min.css')); ?>

    <?php echo e(Html::style('public/global/css/bootstrap-extend.min.css')); ?>


    <?php echo e(Html::style('public/assets/css/site.min.css')); ?>

  
  <!-- Plugins -->
    <?php echo e(Html::style('public/global/vendor/animsition/animsition.css')); ?>

    <?php echo e(Html::style('public/global/vendor/asscrollable/asScrollable.css')); ?>

    <?php echo e(Html::style('public/global/vendor/switchery/switchery.css')); ?>

    <?php echo e(Html::style('public/global/vendor/intro-js/introjs.css')); ?>

    <?php echo e(Html::style('public/global/vendor/slidepanel/slidePanel.css')); ?>

    <?php echo e(Html::style('public/global/vendor/jvectormap/jquery-jvectormap.css')); ?>

    <?php echo e(Html::style('public/assets/examples/css/dashboard/v1.css')); ?>

    <?php echo e(Html::style('public/assets/examples/css/dashboard/analytics.css')); ?>


    <link rel="stylesheet" href="<?php echo e(URL::asset('public/global/vendor/ladda-bootstrap/ladda.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/examples/css/uikit/buttons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/examples/css/uikit/dropdowns.css')); ?>">
   
  <!-- Fonts -->
    <?php echo e(Html::style('public/global/fonts/font-awesome/font-awesome.css')); ?>

    <?php echo e(Html::style('public/global/fonts/weather-icons/weather-icons.css')); ?>

    <?php echo e(Html::style('public/global/fonts/web-icons/web-icons.min.css')); ?>

    <?php echo e(Html::style('public/global/fonts/brand-icons/brand-icons.min.css')); ?>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <!------------------------new mail css-------------------->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/global/vendor/bootstrap-markdown/bootstrap-markdown.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/global/vendor/select2/select2.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/assets/examples/css/apps/mailbox.css')); ?>">
  <!------------------------end new mail css-------------------->
  
	<style>
	/*.page-content {padding: 0px 30px;}*/
    .logoClass{
        font-size: 50px;
        font-weight: 700;
        font-family: auto;
        color: #4B0082;
        text-shadow:
                -5px -2px 3px rgba(255,255,255,.8);
        /*1px 0px 1px rgba(0,0,0,.8);*/
    }
    .lC{
        color:#e98601;
    }
	</style>

    <?php echo e(Html::script('public/global/vendor/modernizr/modernizr.js')); ?>

    <?php echo e(Html::script('public/global/vendor/breakpoints/breakpoints.js')); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.0/angular.min.js"></script>
<!--<script src="<?php echo e(URL::to('assets/js')); ?>/angular.js"></script>-->
    <?php echo e(Html::style('public/assets/css/loaders.css')); ?>

    <?php echo e(Html::style('public/assets/css/loaders.min.css')); ?>

    <script>
  Breakpoints();
  </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
    <?php echo e(Html::script('public/global/vendor/jquery/jquery.js')); ?>

  </head>
<body class="dashboard app-mailbox">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
	
  <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
      data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
      data-toggle="collapse">
        <i class="icon wb-more-horizontal" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
        <span class="logoClass">Esport</span>
        
		
        
		
		
      </div>
      <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
      data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon wb-search" aria-hidden="true"></i>
      </button>
    </div>
    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
          <li class="hidden-float" id="toggleMenubar">
            <a data-toggle="menubar" href="#" role="button">
              <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
            </a>
          </li>
          <li class="hidden-xs" id="toggleFullscreen">
            <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
              <span class="sr-only">Toggle fullscreen</span>
            </a>
          </li>
          <li class="hidden-float">
            <a class="icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
            role="button">
              <span class="sr-only">Toggle Search</span>
            </a>
          </li>
		  
        </ul>
        <!-- End Navbar Toolbar -->
        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          
          <li class="dropdown">
            <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" title="<?php echo e(trans('app.my_profile')); ?>"
            data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
              <!--  <img src="<?php echo e(URL::to('/')); ?>/global/portraits/5.jpg" alt="...">-->
			  <?php if(!empty(Auth::user()->image)): ?>				
                <img src="<?php echo e(URL::asset('public/')); ?>/uploads/<?php echo e(Auth::user()->image); ?>" alt="...">
			  <?php else: ?>
				   <img src="<?php echo e(URL::asset('public/')); ?>/images/default.png" alt="...">
				 <?php endif; ?>
                <i></i>
              </span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li role="presentation">
                <a href="<?php echo e(URL::to('profile')); ?>" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> <?php echo e(trans('app.my_profile')); ?></a>
              </li>
              <!--<li role="presentation">
                <a href="javascript:void(0)" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Billing</a>
              </li>-->
			  <?php if(Auth::user()->hasRole('Admin')): ?>
              <li role="presentation">
                <a href="<?php echo e(URL::to('settings')); ?>" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i><?php echo e(trans('app.settings')); ?></a>
              </li>
			  <?php endif; ?>
              <li class="divider" role="presentation"></li>
              <li role="presentation">
			  <a href="<?php echo e(url('/logout')); ?>"
					onclick="event.preventDefault();
							 document.getElementById('logout-form').submit();">
					<?php echo e(trans('app.logout')); ?>

				</a>
				<form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
					<?php echo e(csrf_field()); ?>

				</form>
               <!-- <a href="<?php echo e(URL::to('logout')); ?>" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> <?php echo e(trans('app.logout')); ?></a>-->
              </li>
            </ul>
          </li>
          
          <li class="dropdown">
            <a data-toggle="dropdown" href="javascript:void(0)" title="<?php echo e(trans('app.messages')); ?>" aria-expanded="false"
            data-animation="scale-up" role="button">
              <i class="icon wb-envelope" aria-hidden="true"></i>
			  <?php 
			  use App\Http\Controllers\MessageController;
				$newmessagecount =  MessageController::messagecount()			 
			  ?>
			   <?php if(!empty($newmessagecount)): ?><span class="badge badge-info up"><?php echo e($newmessagecount); ?></span><?php endif; ?>
              <!--<span class="badge badge-info up">3</span>-->
            </a>
            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
              <li class="dropdown-menu-header" role="presentation">
                <h5><?php echo e(trans('app.messages')); ?></h5>
               <?php if(!empty($newmessagecount)): ?> <span class="label label-round label-info"> New <?php echo e($newmessagecount); ?></span><?php endif; ?>
              </li>
              <li class="list-group" role="presentation">
                <div data-role="container">
                  <div data-role="content">
				  <?php  $inboxnewmessages =  MessageController::inboxnewmessage()  ?>
				 
                   <?php $__currentLoopData = $inboxnewmessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				   <a class="list-group-item" href="<?php echo e(URL::to('/inboxDetails')); ?>/<?php echo e($view->id); ?>/<?php echo e($view->replay_id ? $view->replay_id : $view->id); ?>" role="menuitem">
                      <div class="media">
                        <div class="media-left padding-right-10">
                          <span class="avatar avatar-sm avatar-online">
                            <img src="<?php echo e(URL::asset('public/')); ?>/<?php echo e((!empty($view->receiveMessage->image)?'uploads' :'images')); ?>/<?php echo e((!empty($view->receiveMessage->image)?$view->receiveMessage->image :'default.png')); ?>" alt="..." />
                           
                          </span>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading"><?php echo e($view->receiveMessage->first_name); ?> <?php echo e($view->receiveMessage->last_name); ?></h6>
                          <div class="media-meta">
                            <time datetime="2016-06-17T20:22:05+08:00"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $view->created_at)->diffForHumans()); ?></time>
                          </div>
                          <div class="media-detail"><?php echo e((!empty($view->subject))? $view->subject : trans('app.replay_message')); ?></div>
                        </div>
                      </div>
                    </a>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
                  </div>
                </div>
              </li>
              <li class="dropdown-menu-footer" role="presentation">
                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                  <i class="icon wb-settings" aria-hidden="true"></i>
                </a>
                <a href="<?php echo e(URL::to('/message')); ?>" role="menuitem">
                    <?php echo e(trans('app.see_all_messages')); ?> 
                  </a>
              </li>
            </ul>
          </li>
		  <?php if(Auth::user()->hasRole('Admin')): ?>
          <li id="toggleChat">
            <a data-toggle="site-sidebar" href="javascript:void(0)" title="<?php echo e(trans('app.sidebar')); ?>" data-url="<?php echo e(URL::to('SettingController/sidebar/')); ?>">
           
              <!--<i class="icon wb-chat" aria-hidden="true"></i>-->
			  <i class="icon wb-more-vertical" aria-hidden="true"></i>
            </a>
          </li>
		  <?php endif; ?>
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
      <!-- Site Navbar Seach -->
      <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search" action="<?php echo e(URL::to('userlist')); ?>">
          <div class="form-group">
            <div class="input-search">
              <i class="input-search-icon wb-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="search" placeholder="<?php echo e(trans('app.search_for_users')); ?>">
              <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
              data-toggle="collapse" aria-label="Close"></button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Site Navbar Seach -->
    </div>
  </nav>
  <div class="site-menubar">
    <div class="site-menubar-body">
      <div>
        <div>
          <ul class="site-menu">
           <!-- <li class="site-menu-category">General</li>-->
          <br/>
 <!-------------- Dashboard menu --------------->			
	 
            <li class="site-menu-item has-sub <?php echo e(Request::is('dashboard') ? 'active open' : ''); ?>">
                <a class="animsition-link" href="<?php echo e(URL::to('/dashboard')); ?>">
                <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title"><?php echo e(trans('app.dashboard')); ?></span>
              </a>
            </li>
          <!-------------- Manage Trainer  menu --------------->
              <?php if (\Entrust::can('manage_trainer')) : ?>
                  <li class="site-menu-item has-sub <?php echo e(Request::is('addTrainer','listTrainer') ? 'active open' : ''); ?>">
                      <a href="javascript:void(0)">
                      <i class="site-menu-icon fa fa-user" aria-hidden="true"></i>
                      <span class="site-menu-title">Manage Trainer</span>
                      <span class="site-menu-arrow"></span>
                      </a>
                      <ul class="site-menu-sub">
                          <li class="site-menu-item <?php echo e(Request::is('addTrainer') ? 'active' : ''); ?>">
                            <a class="animsition-link" href="<?php echo e(URL::to('addTrainer')); ?>">
                                <span class="site-menu-title">Add Trainer</span>
                            </a>
                          </li>
                          <li class="site-menu-item <?php echo e(Request::is('listTrainer') ? 'active' : ''); ?>">
                              <a class="animsition-link" href="<?php echo e(URL::to('listTrainer')); ?>">
                                  <span class="site-menu-title">Trainer List</span>
                              </a>
                          </li>
                      </ul>
                  </li>
              <?php endif; // Entrust::can ?>
              <?php if (\Entrust::can('manage_school')) : ?>
              <!-------------- Manage School  menu --------------->
              <li class="site-menu-item has-sub <?php echo e(Request::is('addSchool','listSchool') ? 'active open' : ''); ?>">
                  <a href="javascript:void(0)">
                      <i class="site-menu-icon fa fa-building" aria-hidden="true"></i>
                      <span class="site-menu-title">Manage School</span>
                      <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                      <li class="site-menu-item <?php echo e(Request::is('addSchool') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('addSchool')); ?>">
                              <span class="site-menu-title">Add School</span>
                          </a>
                      </li>
                      <li class="site-menu-item <?php echo e(Request::is('listSchool') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('listSchool')); ?>">
                              <span class="site-menu-title">School List</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <?php endif; // Entrust::can ?>
              <?php if (\Entrust::can('trainer_timetable')) : ?>
              <!-------------- Trainer Timetable  menu --------------->
              
                  
                      
                      
                  
              
              <li class="site-menu-item has-sub <?php echo e(Request::is('trainerTimeTable','listTrainerTimeTable') ? 'active open' : ''); ?>">
                  <a href="javascript:void(0)">
                      <i class="site-menu-icon fa fa-calendar" aria-hidden="true"></i>
                      <span class="site-menu-title">Trainer Timetable</span>
                      <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                      <li class="site-menu-item <?php echo e(Request::is('trainerTimeTable') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('trainerTimeTable')); ?>">
                              <span class="site-menu-title">Add Trainer Timetable</span>
                          </a>
                      </li>
                      <li class="site-menu-item <?php echo e(Request::is('listTrainerTimeTable') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('listTrainerTimeTable')); ?>">
                              <span class="site-menu-title">Trainer Timetable List</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <?php endif; // Entrust::can ?>
              <?php if (\Entrust::can('manage_student')) : ?>
              <!-------------- Manage Student  menu --------------->
              <li class="site-menu-item has-sub <?php echo e(Request::is('addStudent','listStudent') ? 'active open' : ''); ?>">
                  <a href="javascript:void(0)">
                      <i class="site-menu-icon fa fa-users" aria-hidden="true"></i>
                      <span class="site-menu-title">Manage Student</span>
                      <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                      <li class="site-menu-item <?php echo e(Request::is('addStudent') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('addStudent')); ?>">
                              <span class="site-menu-title">Add Student</span>
                          </a>
                      </li>
                      <li class="site-menu-item <?php echo e(Request::is('listStudent') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('listStudent')); ?>">
                              <span class="site-menu-title">Student Details</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <?php endif; // Entrust::can ?>
              <?php if (\Entrust::can('manage_event')) : ?>
              <!-------------- Manage Yearly Event menu --------------->
              <li class="site-menu-item has-sub <?php echo e(Request::is('addYearlyEvent','listYearlyEvent') ? 'active open' : ''); ?>">
                  <a href="javascript:void(0)">
                      <i class="site-menu-icon fa fa-users" aria-hidden="true"></i>
                      <span class="site-menu-title">Manage Event</span>
                      <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                      <li class="site-menu-item <?php echo e(Request::is('addYearlyEvent') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('addYearlyEvent')); ?>">
                              <span class="site-menu-title">Add Yearly Event</span>
                          </a>
                      </li>
                      <li class="site-menu-item <?php echo e(Request::is('listYearlyEvent') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('listYearlyEvent')); ?>">
                              <span class="site-menu-title">Event Details</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <?php endif; // Entrust::can ?>
              <?php if (\Entrust::can('manage_enventory')) : ?>
              <!-------------- Equipment Enventory  menu --------------->
              <li class="site-menu-item has-sub <?php echo e(Request::is('addEquipment','listEquipment') ? 'active open' : ''); ?>">
                  <a href="javascript:void(0)">
                      <i class="site-menu-icon fa fa-cubes" aria-hidden="true"></i>
                      <span class="site-menu-title">Equipment Enventory</span>
                      <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                      <li class="site-menu-item <?php echo e(Request::is('addEquipment') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('addEquipment')); ?>">
                              <span class="site-menu-title">Add Equipment</span>
                          </a>
                      </li>
                      <li class="site-menu-item <?php echo e(Request::is('listEquipment') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('listEquipment')); ?>">
                              <span class="site-menu-title">Equipment Details</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <?php endif; // Entrust::can ?>
              <?php if (\Entrust::can('manage_notification')) : ?>
              <!-------------- Manage Notification  menu --------------->
              <li class="site-menu-item has-sub <?php echo e(Request::is('addNotification','listNotification') ? 'active open' : ''); ?>">
                  <a href="javascript:void(0)">
                      <i class="site-menu-icon fa fa-building" aria-hidden="true"></i>
                      <span class="site-menu-title">Manage Notification</span>
                      <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                      <li class="site-menu-item <?php echo e(Request::is('addNotification') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('addNotification')); ?>">
                              <span class="site-menu-title">Add Notification</span>
                          </a>
                      </li>
                      <li class="site-menu-item <?php echo e(Request::is('listNotification') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('listNotification')); ?>">
                              <span class="site-menu-title">Notification List</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <?php endif; // Entrust::can ?>
              <?php if (\Entrust::can('manage_achievemant')) : ?>
              <!-------------- Manage Achievement  menu --------------->
              <li class="site-menu-item has-sub <?php echo e(Request::is('addAchievement','listAchievement') ? 'active open' : ''); ?>">
                  <a href="javascript:void(0)">
                      <i class="site-menu-icon fa fa-building" aria-hidden="true"></i>
                      <span class="site-menu-title">Manage Achievement</span>
                      <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                      <li class="site-menu-item <?php echo e(Request::is('addAchievement') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('addAchievement')); ?>">
                              <span class="site-menu-title">Add Achievement</span>
                          </a>
                      </li>
                      <li class="site-menu-item <?php echo e(Request::is('listAchievement') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('listAchievement')); ?>">
                              <span class="site-menu-title">Achievement List</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <?php endif; // Entrust::can ?>
              <?php if (\Entrust::can('manage_activity')) : ?>
              <!-------------- Post School Activity Management  menu --------------->
              <li class="site-menu-item has-sub <?php echo e(Request::is('uploadActivitySheet') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('uploadActivitySheet')); ?>">
                      <i class="site-menu-icon wb-edit" aria-hidden="true"></i>
                      <span class="site-menu-title">Non Scholastic activity</span>
                  </a>
              </li>
              <?php endif; // Entrust::can ?>
              <?php if (\Entrust::can('manage_gallery')) : ?>

              <!-------------- Manage Gallery  menu --------------->
              <li class="site-menu-item has-sub <?php echo e(Request::is('addPhoto','gallery') ? 'active open' : ''); ?>">
                  <a href="javascript:void(0)">
                      <i class="site-menu-icon fa fa-archive" aria-hidden="true"></i>
                      <span class="site-menu-title">Manage Gallery</span>
                      <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                      <li class="site-menu-item <?php echo e(Request::is('addPhoto') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('addPhoto')); ?>">
                              <span class="site-menu-title">Add Photo</span>
                          </a>
                      </li>
                      <li class="site-menu-item <?php echo e(Request::is('gallery') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('gallery')); ?>">
                              <span class="site-menu-title">Gallery</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <?php endif; // Entrust::can ?>
              <?php if (\Entrust::can('manage_assement')) : ?>
              <!-------------- Assement Management  menu --------------->
              <li class="site-menu-item has-sub <?php echo e(Request::is('addAssement') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('addAssement')); ?>">
                      <i class="site-menu-icon wb-edit" aria-hidden="true"></i>
                      <span class="site-menu-title">Assement Management</span>
                  </a>
              </li>
              <?php endif; // Entrust::can ?>
              <?php if (\Entrust::can('manage_class_ins')) : ?>
              <!-------------- Class Instruction  menu --------------->
              <li class="site-menu-item has-sub <?php echo e(Request::is('classInstruction') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('classInstruction')); ?>">
                      <i class="site-menu-icon fa fa-file" aria-hidden="true"></i>
                      <span class="site-menu-title">Class Instruction</span>
                  </a>
              </li>
              <?php endif; // Entrust::can ?>
              <?php if (\Entrust::can('manage_package')) : ?>
              <!-------------- Manage Package  menu --------------->
              <li class="site-menu-item has-sub <?php echo e(Request::is('addPackage','listPackage') ? 'active open' : ''); ?>">
                  <a href="javascript:void(0)">
                      <i class="site-menu-icon fa fa-archive" aria-hidden="true"></i>
                      <span class="site-menu-title">Manage Package</span>
                      <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                      <li class="site-menu-item <?php echo e(Request::is('addPackage') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('addPackage')); ?>">
                              <span class="site-menu-title">Add Package</span>
                          </a>
                      </li>
                      <li class="site-menu-item <?php echo e(Request::is('listPackage') ? 'active' : ''); ?>">
                          <a class="animsition-link" href="<?php echo e(URL::to('listPackage')); ?>">
                              <span class="site-menu-title">Package Details</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <?php endif; // Entrust::can ?>
              <?php if (\Entrust::can('manage_session')) : ?>
              <!-------------- Manage Session  menu --------------->
              <li class="site-menu-item has-sub <?php echo e(Request::is('addSession') ? 'active open' : ''); ?>">
                  <a href="<?php echo e(URL::to('addSession')); ?>">
                      <i class="site-menu-icon fas fa-history" aria-hidden="true"></i>
                      <span class="site-menu-title">Add Session</span>
                  </a>
                  
                      
                          
                              
                          
                      
                  
              </li>
              <?php endif; // Entrust::can ?>
              <?php if (\Entrust::can('manage_session')) : ?>
              <!-------------- Manage Session  menu --------------->
              <li class="site-menu-item has-sub <?php echo e(Request::is('addSubSession') ? 'active open' : ''); ?>">
                  <a href="<?php echo e(URL::to('addSubSession')); ?>">
                      <i class="site-menu-icon fas fa-history" aria-hidden="true"></i>
                      <span class="site-menu-title">Assessment Criteria</span>
                  </a>
                  
                      
                          
                              
                          
                      
                  
              </li>
              <?php endif; // Entrust::can ?>
              <?php if (\Entrust::can('manage_calendar')) : ?>
              <!-------------- Calender  menu --------------->
              <li class="site-menu-item has-sub <?php echo e(Request::is('') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('')); ?>">
                      <i class="site-menu-icon wb-calendar" aria-hidden="true"></i>
                      <span class="site-menu-title">Calender</span>
                  </a>
              </li>
              <?php endif; // Entrust::can ?>
              <?php if (\Entrust::can('manage_attendance')) : ?>
              <!-------------- Attendance  menu --------------->
              <li class="site-menu-item has-sub <?php echo e(Request::is('') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('')); ?>">
                      <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                      <span class="site-menu-title">Attendance</span>
                  </a>
              </li>
              <?php endif; // Entrust::can ?>

	<!-------------- Users menu --------------->	
 <?php if (\Entrust::can(['users.manage', 'users.activity'])) : ?>	
           
			<li class="site-menu-item has-sub  <?php echo e(Request::is('userlist','registration','activity') ? 'active open' : ''); ?>">
              <a href="javascript:void(0)">
			  <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                <span class="site-menu-title"><?php echo e(trans('app.users')); ?></span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
               <?php if (\Entrust::can('users.manage')) : ?> 
				<li class="site-menu-item <?php echo e(Request::is('registration') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/registration')); ?>">
                    <span class="site-menu-title"><?php echo e(trans('app.add_user')); ?></span>
                  </a>
                </li>
                <li class="site-menu-item <?php echo e(Request::is('userlist') ? 'active' : ''); ?>">
                  <a class="animsition-link " href="<?php echo e(URL::to('userlist')); ?>">
                    <span class="site-menu-title"><?php echo e(trans('app.users')); ?></span>
                  </a>
                </li>
				<?php endif; // Entrust::can ?>
				<?php if (\Entrust::can('users.activity')) : ?> 
                <li class="site-menu-item <?php echo e(Request::is('activity') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('activity')); ?>">
                    <span class="site-menu-title"><?php echo e(trans('app.activity_log')); ?></span>
                  </a>
                </li>  
				<?php endif; // Entrust::can ?>
              </ul>			  
            </li>
			<?php endif; // Entrust::can ?>
	
<!-------------- roles and permission  menu --------------->
		 <?php if (\Entrust::can(['roles.manage', 'permissions.manage'])) : ?>
			 <li class="site-menu-item has-sub <?php echo e(Request::is('permissions','roles') ? 'active open' : ''); ?>">
              <a href="javascript:void(0)">
			  <i class="site-menu-icon fa-lock" aria-hidden="true"></i>
                <span class="site-menu-title"><?php echo e(trans('app.roles_and_permissions')); ?></span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
			   <?php if (\Entrust::can('roles.manage')) : ?>
                <li class="site-menu-item <?php echo e(Request::is('roles') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/roles')); ?>">
                    <span class="site-menu-title"><?php echo e(trans('app.roles')); ?></span>
                  </a>
                </li>
				<?php endif; // Entrust::can ?>
				 <?php if (\Entrust::can('roles.manage')) : ?>
				<li class="site-menu-item <?php echo e(Request::is('permissions') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/permissions')); ?>">
                    <span class="site-menu-title"><?php echo e(trans('app.permissions')); ?></span>
                  </a>
                </li>
				<?php endif; // Entrust::can ?>
              </ul>
            </li>
		<?php endif; // Entrust::can ?>
<!-------------- Settings  menu --------------->
		<?php if (\Entrust::can('settings.general')) : ?>
			 <li class="site-menu-item has-sub <?php echo e(Request::is('settings') ? 'active open' : ''); ?>">
              <a href="javascript:void(0)">
			  <i class="site-menu-icon wb-settings" aria-hidden="true"></i>
                <span class="site-menu-title"><?php echo e(trans('app.settings')); ?></span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item <?php echo e(Request::is('settings') ? 'active' : ''); ?>">
                  <a class="animsition-link" href="<?php echo e(URL::to('/settings')); ?>">
                    <span class="site-menu-title"><?php echo e(trans('app.general_settings')); ?></span>
                  </a>
                </li>
              </ul>
            </li>			
         <?php endif; // Entrust::can ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="site-menubar-footer">
	<a href="<?php echo e(URL::to('profileEdit')); ?>" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo e(trans('app.edit_profile')); ?>">
       <i class="icon wb-pencil" aria-hidden="true"></i>
      </a>
       <?php if(Auth::user()->hasRole('Admin')): ?>
	  <a href="<?php echo e(URL::to('settings')); ?>" class="fold-show" data-placement="top" data-toggle="tooltip"
      data-original-title="<?php echo e(trans('app.settings')); ?>">
        <span class="icon wb-settings" aria-hidden="true"></span>
      </a>
	  <?php else: ?>
	  <a class="fold-show" data-placement="top" data-toggle="tooltip"
      data-original-title="">
        &nbsp;
      </a>
	  <?php endif; ?>
      <a href="<?php echo e(url('/logout')); ?>"
			onclick="event.preventDefault();
					 document.getElementById('logout-form').submit();" data-placement="top" data-toggle="tooltip" data-original-title="<?php echo e(trans('app.logout')); ?>">
			<span class="icon wb-power" aria-hidden="true"></span>
		</a>
		<form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
			<?php echo e(csrf_field()); ?>

		</form>
    </div>
  </div>
<!-------------------- logo click menu---------------->
  <div class="site-gridmenu">
    <div>
      <div>
        <ul>
		 <li>
            <a href="<?php echo e(URL::to('/dashboard')); ?>">
              <i class="icon wb-dashboard"></i>
              <span><?php echo e(trans('app.dashboard')); ?></span>
            </a>
          </li>
		  <?php if (\Entrust::can('users.manage')) : ?>
		  <li>
            <a href="<?php echo e(URL::to('userlist')); ?>">
              <i class="icon wb-users" aria-hidden="true"></i>
              <span><?php echo e(trans('app.users')); ?></span>
            </a>
          </li>
		  <?php endif; // Entrust::can ?>
		  
		   <?php if (\Entrust::can('message.messages')) : ?>
          <li>
            <a href="<?php echo e(URL::to('message')); ?>">
              <i class="icon wb-envelope"></i>
              <span><?php echo e(trans('app.messages')); ?></span>
            </a>
          </li> 
			 <?php endif; // Entrust::can ?>
			 <?php if (\Entrust::can('permissions.manage')) : ?>
          <li>
            <a href="<?php echo e(URL::to('permissions')); ?>">
              <i class="icon wb-lock"></i>
              <span><?php echo e(trans('app.permissions')); ?></span>
            </a>
          </li>
          <?php endif; // Entrust::can ?>
		  <?php if (\Entrust::can('settings.general')) : ?>
          <li>
            <a href="<?php echo e(URL::to('settings')); ?>">
              <i class="icon wb-settings" aria-hidden="true"></i>
              <span><?php echo e(trans('app.settings')); ?></span>
            </a>
          </li>
         <?php endif; // Entrust::can ?>
		
        </ul>
      </div>
    </div>
  </div>
  <!-- Page -->
 
 <maindd>
<div class="loadersjew">
	<div class="loaderjew"><div class="line-scale"><div></div><div></div><div></div><div></div><div></div></div></div>
	<!--<div class="loaderjew"><div class="line-scale-party"><div></div><div></div><div></div><div></div></div></div>-->
	<!--<div class="loader"><div class="line-scale-pulse-out"><div></div><div></div><div></div><div></div><div></div></div></div>
	<div class="loader"><div class="line-scale-pulse-out-rapid"><div></div><div></div><div></div><div></div><div></div></div></div>-->
	</div>
</maindd>

  <div class="page" style="animation-duration: 800ms; opacity: 1;">
   <!-- page content -->
   
	<?php echo $__env->yieldContent('content'); ?>
	<!-- /page content -->
  </div>
  <!-- End Page -->
  <!-- Footer -->
  <footer class="site-footer">
    <div class="site-footer-legal">© <?php echo e(date('Y')); ?> <a href="<?php echo e(URL::to('/')); ?>"><?php $__currentLoopData = $settingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($view->app_name); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></a></div>
    <div class="site-footer-right">
     <?php echo e(trans('app.email')); ?> <i class="red-600 wb wb-heart"></i>  <?php $__currentLoopData = $settingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($view->app_email); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </div>
  </footer>
 <!-- Core  -->

  <?php echo e(Html::script('public/global/vendor/bootstrap/bootstrap.js')); ?>

  <?php echo e(Html::script('public/global/vendor/animsition/animsition.js')); ?>

  <?php echo e(Html::script('public/global/vendor/asscroll/jquery-asScroll.js')); ?>

  <?php echo e(Html::script('public/global/vendor/mousewheel/jquery.mousewheel.js')); ?>

  <?php echo e(Html::script('public/global/vendor/asscrollable/jquery.asScrollable.all.js')); ?>

  <?php echo e(Html::script('public/global/vendor/ashoverscroll/jquery-asHoverScroll.js')); ?>


  <!-- Plugins -->
  <?php echo e(Html::script('public/global/vendor/switchery/switchery.min.js')); ?>

  <?php echo e(Html::script('public/global/vendor/intro-js/intro.js')); ?>

  <?php echo e(Html::script('public/global/vendor/screenfull/screenfull.js')); ?>

  <?php echo e(Html::script('public/global/vendor/slidepanel/jquery-slidePanel.js')); ?>

  <?php echo e(Html::script('public/global/vendor/skycons/skycons.js')); ?>

  <?php echo e(Html::script('public/global/vendor/aspieprogress/jquery-asPieProgress.min.js')); ?>

  <?php echo e(Html::script('public/global/vendor/jvectormap/jquery.jvectormap.min.js')); ?>

  <?php echo e(Html::script('public/global/vendor/jvectormap/maps/jquery-jvectormap-au-mill-en.js')); ?>

  <?php echo e(Html::script('public/global/vendor/matchheight/jquery.matchHeight-min.js')); ?>

  <!-- Scripts -->
  <?php echo e(Html::script('public/global/js/core.js')); ?>

  <?php echo e(Html::script('public/assets/js/site.js')); ?>

  <?php echo e(Html::script('public/assets/js/sections/menu.js')); ?>

  <?php echo e(Html::script('public/assets/js/sections/menubar.js')); ?>

  <?php echo e(Html::script('public/assets/js/sections/gridmenu.js')); ?>

  <?php echo e(Html::script('public/assets/js/sections/sidebar.js')); ?>

  <?php echo e(Html::script('public/global/js/configs/config-colors.js')); ?>

  <?php echo e(Html::script('public/assets/js/configs/config-tour.js')); ?>

  <?php echo e(Html::script('public/global/js/components/asscrollable.js')); ?>

  <?php echo e(Html::script('public/global/js/components/animsition.js')); ?>

  <?php echo e(Html::script('public/global/js/components/slidepanel.js')); ?>

  <script src="<?php echo e(URL::asset('public/global/vendor/filament-tablesaw/tablesaw.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/filament-tablesaw/tablesaw-init.js')); ?>"></script>

  <script src="<?php echo e(URL::asset('public/global/vendor/ladda-bootstrap/spin.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/ladda-bootstrap/ladda.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/ladda-bootstrap.js')); ?>"></script>

  <?php echo e(Html::script('public/global/js/components/switchery.js')); ?>

  <?php echo e(Html::script('public/global/js/components/matchheight.js')); ?>

  <?php echo e(Html::script('public/global/js/components/jvectormap.js')); ?>

  <script src="<?php echo e(URL::asset('public/global/vendor/jquery-ui/jquery-ui.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/blueimp-tmpl/tmpl.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/blueimp-load-image/load-image.all.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/blueimp-file-upload/jquery.fileupload.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/blueimp-file-upload/jquery.fileupload-process.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/blueimp-file-upload/jquery.fileupload-image.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/blueimp-file-upload/jquery.fileupload-audio.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/blueimp-file-upload/jquery.fileupload-video.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/blueimp-file-upload/jquery.fileupload-validate.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/blueimp-file-upload/jquery.fileupload-ui.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/dropify/dropify.min.js')); ?>"></script>

  <script src="<?php echo e(URL::asset('public/global/vendor/asprogress/jquery-asProgress.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/asrange/jquery-asRange.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/examples/js/uikit/icon.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/js/bootstrap-fileupload.min.js')); ?>"></script>

  <script src="<?php echo e(URL::asset('public/global/vendor/owl-carousel/owl.carousel.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/slick-carousel/slick.js')); ?>"></script>
  <!-- New for mail box -->
  <script src="<?php echo e(URL::asset('public/global/vendor/select2/select2.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/bootstrap-markdown/bootstrap-markdown.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/webui-popover/jquery.webui-popover.min.js')); ?>"></script>


  <script src="<?php echo e(URL::asset('public/global/vendor/isotope/isotope.pkgd.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/magnific-popup/jquery.magnific-popup.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/filterable.js')); ?>"></script>
  <!--<script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/pages/gallery.js"></script>-->

  <script src="<?php echo e(URL::asset('public/global/vendor/toolbar/jquery.toolbar.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/webui-popover.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/toolbar.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/examples/js/uikit/tooltip-popover.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/magnific-popup/jquery.magnific-popup.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/raty/jquery.raty.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/toastr/toastr.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/html5sortable/html.sortable.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/nestable/jquery.nestable.js')); ?>"></script>


  <script src="<?php echo e(URL::asset('public/global/vendor/bootbox/bootbox.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/select2.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/plugins/action-btn.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/plugins/selectable.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/selectable.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/material.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/bootbox.js')); ?>"></script>

  <script src="<?php echo e(URL::asset('public/assets/js/app.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/examples/js/apps/mailbox.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/input-group-file.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/asprogress.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/examples/js/uikit/progress-bars.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/examples/js/pages/faq.js')); ?>"></script>

  <script src="<?php echo e(URL::asset('public/assets/examples/js/advanced/animation.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/magnific-popup.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/examples/js/advanced/lightbox.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/examples/js/advanced/scrollable.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/raty.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/toastr.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/html5sortable.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/nestable.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/tasklist.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/bootstrap-sweetalert.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/examples/js/advanced/bootbox-sweetalert.js')); ?>"></script>

  <script src="<?php echo e(URL::asset('public/global/vendor/jquery-wizard/jquery-wizard.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/formvalidation/formValidation.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/formvalidation/framework/bootstrap.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/jquery-wizard.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/examples/js/forms/wizard.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/examples/js/forms/validation.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/formatter-js/jquery.formatter.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/formatter-js.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/cropper/cropper.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/examples/js/forms/image-cropping.js')); ?>"></script>


  <script src="<?php echo e(URL::asset('public/global/js/components/dropify.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/examples/js/forms/uploads.js')); ?>"></script>
   
   
   <script type="text/javascript">	
	/* tab storage */
	$(function() { 
		// for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			// save the latest tab; use cookies if you like 'em better:
			localStorage.setItem('lastTab', $(this).attr('href'));
		});

		// go to the latest tab, if it exists:
		var lastTab = localStorage.getItem('lastTab');
		if (lastTab) {
			$('[href="' + lastTab + '"]').tab('show');
		}
	});

	/* Activity info */
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover();   
	});
	</script>
  <div class="modal fade modal-3d-flip-vertical exampleNiftyFlipVertical" id="exampleNiftyFlipVertical" aria-hidden="true"
  aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		  </button>
		  <h4 class="modal-title"><?php echo e(trans('app.delete_confirm')); ?></h4>
		</div>
		<div class="modal-body">
		  <p> Are you sure that you want to delete this?</p>
		
		  
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default margin-0" data-dismiss="modal"><?php echo e(trans('app.close')); ?></button>
		  <a class="btn btn-danger btn-ok">Yes,delete</a>
		</div>
	  </div>
	</div>
  </div>
  <!-- End Modal -->
  <script>
  $('.exampleNiftyFlipVertical').on('show.bs.modal', function(e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});	
	/* for loading button */
	$('.loadingclick').on('click', function() {
		var $this = $(this);
	  $this.button('loading');
		setTimeout(function() {
		   $this.button('reset');
	   }, 22000);
	});
  $("[rel='tooltip']").tooltip();
	
/* for message timeout */
$(document).ready(function(){	
	 $(".alertDismissible").fadeTo(3000, 800).slideUp(1000, function(){
       $(".alertDismissible").slideUp(1000);
	   });
});
</script>
  <script src="<?php echo e(URL::asset('public/global/js/components/owl-carousel.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/examples/js/uikit/carousel.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/table.js')); ?>"></script>

  <script src="<?php echo e(URL::asset('public/global/vendor/editable-table/mindmup-editabletable.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/editable-table/numeric-input-example.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/editable-table.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/examples/js/tables/editable.js')); ?>"></script>

  <script src="<?php echo e(URL::asset('public/global/vendor/jsgrid/jsgrid.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/examples/js/tables/jsgrid-db.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/assets/examples/js/tables/jsgrid.js')); ?>"></script>

  <!----------- for datepicker ------------->
  <script src="<?php echo e(URL::asset('public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/jt-timepicker/jquery.timepicker.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/datepair-js/datepair.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/vendor/datepair-js/jquery.datepair.min.js')); ?>"></script>

  <script src="<?php echo e(URL::asset('public/global/js/components/bootstrap-datepicker.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/jt-timepicker.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('public/global/js/components/datepair-js.js')); ?>"></script>
  <!--<script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/forms/advanced.js')}}"></script> -->

  <!--<div class="loader-fb"></div> https://code.jquery.com/jquery-3.3.1.js -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js" ></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<!--<script src="<?php echo e(URL::to('/')); ?>/assets/examples/js/forms/advanced.js"></script> -->
    
  <!--<div class="loader-fb"></div>-->
<script>
    function basePath(){
        return "http://puretechproject.com/esport/";
    }
 $(window).load(function() {		
  $(".loadersjew").fadeOut("slow");;
 });
</script>
   
</body>
</html>








