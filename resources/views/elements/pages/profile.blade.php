@extends('layouts.template')
@section('content')
 <link rel="stylesheet" href="{{URL::to('/')}}/assets/examples/css/pages/profile.css">
  <div class="page-header">
  <h1 class="page-title font_lato">Profile </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
		<li class="active">Profile</li>
	</ol>
  </div>
</div> 
 <div class="page-content container-fluid">
      <div class="row">
        <div class="col-md-3">
          <!-- Page Widget -->
          <div class="widget widget-shadow text-center">
            <div class="widget-header">
              <div class="widget-header-content">
                <a class="avatar avatar-lg" href="javascript:void(0)">
                  <img src="{{URL::to('/')}}/global/portraits/5.jpg" alt="...">
                </a>
                <h4 class="profile-user">Terrance arnold</h4>
                <p class="profile-job">Art director</p>
                <p>Hi! I'm Adrian the Senior UI Designer at AmazingSurge. We hope
                  you enjoy the design and quality of Social.</p>
                <div class="profile-social">
                  <a class="icon bd-twitter" href="javascript:void(0)"></a>
                  <a class="icon bd-facebook" href="javascript:void(0)"></a>
                  <a class="icon bd-dribbble" href="javascript:void(0)"></a>
                  <a class="icon bd-github" href="javascript:void(0)"></a>
                </div>
                <button type="button" class="btn btn-primary">Follow</button>
              </div>
            </div>
            <div class="widget-footer">
              <div class="row no-space">
                <div class="col-xs-4">
                  <strong class="profile-stat-count">260</strong>
                  <span>Follower</span>
                </div>
                <div class="col-xs-4">
                  <strong class="profile-stat-count">180</strong>
                  <span>Following</span>
                </div>
                <div class="col-xs-4">
                  <strong class="profile-stat-count">2000</strong>
                  <span>Tweets</span>
                </div>
              </div>
            </div>
          </div>
          <!-- End Page Widget -->
        </div>
        <div class="col-md-9">
          <!-- Panel -->
          <div class="panel">
            <div class="panel-body nav-tabs-animate nav-tabs-horizontal">
              <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                <li class="active" role="presentation"><a data-toggle="tab" href="#activities" aria-controls="activities"
                  role="tab">Activities <span class="badge badge-danger">5</span></a></li>
                <li role="presentation"><a data-toggle="tab" href="#profile" aria-controls="profile" role="tab">Profile</a></li>
                <li role="presentation"><a data-toggle="tab" href="#messages" aria-controls="messages"
                  role="tab">Messages</a></li>
                <li class="dropdown" role="presentation" style="display: none;">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <span class="caret"></span>Menu </a>
                  <ul class="dropdown-menu" role="menu">
                    <li role="presentation" style="display: none;"><a data-toggle="tab" href="#activities" aria-controls="activities"
                      role="tab">Activities <span class="badge label-danger">5</span></a></li>
                    <li role="presentation" style="display: none;"><a data-toggle="tab" href="#profile" aria-controls="profile"
                      role="tab">Profile</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#messages" aria-controls="messages"
                      role="tab">Messages</a></li>
                  </ul>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active animation-slide-left" id="activities" role="tabpanel">
                  <ul class="list-group">
                    <li class="list-group-item">
                      <div class="media">
                        <div class="media-left">
                          <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/2.jpg" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Ida Fleming
                            <span>posted an updated</span>
                          </h4>
                          <small>active 14 minutes ago</small>
                          <div class="profile-brief">�Check if it can be corrected with overflow : hidden�</div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="media">
                        <div class="media-left">
                          <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/3.jpg" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Julius
                            <span>uploaded 4 photos</span>
                          </h4>
                          <small>active 14 minutes ago</small>
                          <div class="profile-brief">
                            <img class="profile-uploaded" src="{{URL::to('/')}}/global/photos/placeholder.png" alt="...">
                            <img class="profile-uploaded" src="{{URL::to('/')}}/global/photos/placeholder.png" alt="...">
                            <img class="profile-uploaded" src="{{URL::to('/')}}/global/photos/placeholder.png" alt="...">
                            <img class="profile-uploaded" src="{{URL::to('/')}}/global/photos/placeholder.png" alt="...">
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="media">
                        <div class="media-left">
                          <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/4.jpg" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Owen Hunt
                            <span>posted a new note</span>
                          </h4>
                          <small>active 14 minutes ago</small>
                          <div class="profile-brief">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Integer nec odio. Praesent libero. Sed cursus ante
                            dapibus diam. Sed nisi. Nulla quis sem at nibh elementum
                            imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce
                            nec tellus sed augue semper porta. Mauris massa.</div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="media media-lg">
                        <div class="media-left">
                          <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/5.jpg" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Terrance Arnold
                            <span>posted a new blog</span>
                          </h4>
                          <small>active 14 minutes ago</small>
                          <div class="profile-brief">
                            <div class="media">
                              <a class="media-left">
                                <img class="media-object" src="{{URL::to('/')}}/global/photos/placeholder.png" alt="...">
                              </a>
                              <div class="media-body padding-left-20">
                                <h4 class="media-heading">Getting Started</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                  elit. Integer nec odio. Praesent libero. Sed
                                  cursus ante dapibus diam. Sed nisi. Nulla quis
                                  sem at nibh elementum imperdiet. Duis sagittis
                                  ipsum. Praesent mauris.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="media">
                        <div class="media-left">
                          <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/2.jpg" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Ida Fleming
                            <span>posted an new activity comment</span>
                          </h4>
                          <small>active 14 minutes ago</small>
                          <div class="profile-brief">Cras sit amet nibh libero, in gravida nulla. Nulla vel
                            metus.</div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="media">
                        <div class="media-left">
                          <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/3.jpg" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Julius
                            <span>posted an updated</span>
                          </h4>
                          <small>active 14 minutes ago</small>
                          <div class="profile-brief">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Integer nec odio. Praesent libero. Sed cursus ante
                            dapibus diam.</div>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <a class="btn btn-block btn-default profile-readMore" href="javascript:void(0)"
                  role="button">Show more</a>
                </div>
                <div class="tab-pane animation-slide-left" id="profile" role="tabpanel">
                  <ul class="list-group">
                    <li class="list-group-item">
                      <div class="media media-lg">
                        <div class="media-left">
                          <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/5.jpg" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Terrance Arnold
                            <span>posted a new blog</span>
                          </h4>
                          <small>active 14 minutes ago</small>
                          <div class="profile-brief">
                            <div class="media">
                              <a class="media-left">
                                <img class="media-object" src="{{URL::to('/')}}/global/photos/placeholder.png" alt="...">
                              </a>
                              <div class="media-body padding-left-20">
                                <h4 class="media-heading">Getting Started</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                  elit. Integer nec odio. Praesent libero. Sed
                                  cursus ante dapibus diam. Sed nisi. Nulla quis
                                  sem at nibh elementum imperdiet. Duis sagittis
                                  ipsum. Praesent mauris.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="media">
                        <div class="media-left">
                          <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/2.jpg" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Ida Fleming
                            <span>posted an updated</span>
                          </h4>
                          <small>active 14 minutes ago</small>
                          <div class="profile-brief">�Check if it can be corrected with overflow : hidden�</div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="media">
                        <div class="media-left">
                          <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/4.jpg" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Owen Hunt
                            <span>posted a new note</span>
                          </h4>
                          <small>active 14 minutes ago</small>
                          <div class="profile-brief">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Integer nec odio. Praesent libero. Sed cursus ante
                            dapibus diam. Sed nisi. Nulla quis sem at nibh elementum
                            imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce
                            nec tellus sed augue semper porta. Mauris massa.</div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="media">
                        <div class="media-left">
                          <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/2.jpg" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Ida Fleming
                            <span>posted an new activity comment</span>
                          </h4>
                          <small>active 14 minutes ago</small>
                          <div class="profile-brief">Cras sit amet nibh libero, in gravida nulla. Nulla vel
                            metus.</div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="media">
                        <div class="media-left">
                          <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/3.jpg" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Julius
                            <span>uploaded 4 photos</span>
                          </h4>
                          <small>active 14 minutes ago</small>
                          <div class="profile-brief">
                            <img class="profile-uploaded" src="{{URL::to('/')}}/global/photos/placeholder.png" alt="...">
                            <img class="profile-uploaded" src="{{URL::to('/')}}/global/photos/placeholder.png" alt="...">
                            <img class="profile-uploaded" src="{{URL::to('/')}}/global/photos/placeholder.png" alt="...">
                            <img class="profile-uploaded" src="{{URL::to('/')}}/global/photos/placeholder.png" alt="...">
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="tab-pane animation-slide-left" id="messages" role="tabpanel">
                  <ul class="list-group">
                    <li class="list-group-item">
                      <div class="media">
                        <div class="media-left">
                          <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/2.jpg" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Ida Fleming
                            <span>posted an updated</span>
                          </h4>
                          <small>active 14 minutes ago</small>
                          <div class="profile-brief">�Check if it can be corrected with overflow : hidden�</div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="media media-lg">
                        <div class="media-left">
                          <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/5.jpg" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Terrance Arnold
                            <span>posted a new blog</span>
                          </h4>
                          <small>active 14 minutes ago</small>
                          <div class="profile-brief">
                            <div class="media">
                              <a class="media-left">
                                <img class="media-object" src="{{URL::to('/')}}/global/photos/placeholder.png" alt="...">
                              </a>
                              <div class="media-body padding-left-20">
                                <h4 class="media-heading">Getting Started</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                  elit. Integer nec odio. Praesent libero. Sed
                                  cursus ante dapibus diam. Sed nisi. Nulla quis
                                  sem at nibh elementum imperdiet. Duis sagittis
                                  ipsum. Praesent mauris.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="media">
                        <div class="media-left">
                          <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/4.jpg" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Owen Hunt
                            <span>posted a new note</span>
                          </h4>
                          <small>active 14 minutes ago</small>
                          <div class="profile-brief">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Integer nec odio. Praesent libero. Sed cursus ante
                            dapibus diam. Sed nisi. Nulla quis sem at nibh elementum
                            imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce
                            nec tellus sed augue semper porta. Mauris massa.</div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="media">
                        <div class="media-left">
                          <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="{{URL::to('/')}}/global/portraits/3.jpg" alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">Julius
                            <span>posted an updated</span>
                          </h4>
                          <small>active 14 minutes ago</small>
                          <div class="profile-brief">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Integer nec odio. Praesent libero. Sed cursus ante
                            dapibus diam.</div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- End Panel -->
        </div>
      </div>
    </div>
<br/>
@stop

 
