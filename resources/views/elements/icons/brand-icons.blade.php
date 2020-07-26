@extends('layouts.template')
@section('content')
<link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/flag-icon-css/flag-icon.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/asrange/asRange.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/assets/examples/css/uikit/icon.css">
  <!-- Fonts -->
  <link rel="stylesheet" href="{{URL::to('/')}}/global/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/global/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
  
<div class="page-header">
  <h1 class="page-title font_lato">Brand Icon </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/icons')}}">Icons</a></li>
		<li class="active">Brand Icon</li>
	</ol>
  </div>
</div> 
 <div class="page-content container-fluid">
      <div class="row padding-vertical-30">
        <div class="col-sm-12 text-center">
          <h2>Search from Brand Icon.</h2>
          <form role="search">
            <div class="input-search">
              <input type="text" class="form-control round" placeholder="Search icon...">
              <button type="submit" class="input-search-btn">
                <i class="icon wb-search" aria-hidden="true"></i>
              </button>
            </div>
          </form>
          <div class="margin-bottom-25">
            <div class="asRange" id="icon_change" data-plugin="asRange" data-namespace="rangeUi"
            data-step="1" data-min="16" data-max="64" data-value="24"></div>
            <span id="icon_size">24px</span>
          </div>
        </div>
      </div>
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row">
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="behance">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-behance" aria-hidden="true"></i>
                <div class="icon-title">behance</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="blogger">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-blogger" aria-hidden="true"></i>
                <div class="icon-title">blogger</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="delicious">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-delicious" aria-hidden="true"></i>
                <div class="icon-title">delicious</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="deviantart">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-deviantart" aria-hidden="true"></i>
                <div class="icon-title">deviantart</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="dribbble">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-dribbble" aria-hidden="true"></i>
                <div class="icon-title">dribbble</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="facebook">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-facebook" aria-hidden="true"></i>
                <div class="icon-title">facebook</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="flickr">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-flickr" aria-hidden="true"></i>
                <div class="icon-title">flickr</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="foursquare">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-foursquare" aria-hidden="true"></i>
                <div class="icon-title">foursquare</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="github">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-github" aria-hidden="true"></i>
                <div class="icon-title">github</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="google-plus">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-google-plus" aria-hidden="true"></i>
                <div class="icon-title">google-plus</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="instagram">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-instagram" aria-hidden="true"></i>
                <div class="icon-title">instagram</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="lastfm">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-lastfm" aria-hidden="true"></i>
                <div class="icon-title">lastfm</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="linkedin">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-linkedin" aria-hidden="true"></i>
                <div class="icon-title">linkedin</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="pinterest">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-pinterest" aria-hidden="true"></i>
                <div class="icon-title">pinterest</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="quora">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-quora" aria-hidden="true"></i>
                <div class="icon-title">quora</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="stackoverflow">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-stackoverflow" aria-hidden="true"></i>
                <div class="icon-title">stackoverflow</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="rdio">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-rdio" aria-hidden="true"></i>
                <div class="icon-title">rdio</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="reddit">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-reddit" aria-hidden="true"></i>
                <div class="icon-title">reddit</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="soundcloud">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-soundcloud" aria-hidden="true"></i>
                <div class="icon-title">soundcloud</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="spotify">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-spotify" aria-hidden="true"></i>
                <div class="icon-title">spotify</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="stumbleupon">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-stumbleupon" aria-hidden="true"></i>
                <div class="icon-title">stumbleupon</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="tumblr">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-tumblr" aria-hidden="true"></i>
                <div class="icon-title">tumblr</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="twitter">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-twitter" aria-hidden="true"></i>
                <div class="icon-title">twitter</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="viadeo">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-viadeo" aria-hidden="true"></i>
                <div class="icon-title">viadeo</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="vimeo">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-vimeo" aria-hidden="true"></i>
                <div class="icon-title">vimeo</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="vine">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-vine" aria-hidden="true"></i>
                <div class="icon-title">vine</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="yelp">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-yelp" aria-hidden="true"></i>
                <div class="icon-title">yelp</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="openid">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-openid" aria-hidden="true"></i>
                <div class="icon-title">openid</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="vk">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-vk" aria-hidden="true"></i>
                <div class="icon-title">vk</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="yahoo">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-yahoo" aria-hidden="true"></i>
                <div class="icon-title">yahoo</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="xing">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-xing" aria-hidden="true"></i>
                <div class="icon-title">xing</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="youtube">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-youtube" aria-hidden="true"></i>
                <div class="icon-title">youtube</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="android">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-android" aria-hidden="true"></i>
                <div class="icon-title">android</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="apple">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-apple" aria-hidden="true"></i>
                <div class="icon-title">apple</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="windows">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-windows" aria-hidden="true"></i>
                <div class="icon-title">windows</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="linux">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-linux" aria-hidden="true"></i>
                <div class="icon-title">linux</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="wordpress">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-wordpress" aria-hidden="true"></i>
                <div class="icon-title">wordpress</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="drupal">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-drupal" aria-hidden="true"></i>
                <div class="icon-title">drupal</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="joomla">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-joomla" aria-hidden="true"></i>
                <div class="icon-title">joomla</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="squarespace">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-squarespace" aria-hidden="true"></i>
                <div class="icon-title">squarespace</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="medium">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-medium" aria-hidden="true"></i>
                <div class="icon-title">medium</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="dropbox">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-dropbox" aria-hidden="true"></i>
                <div class="icon-title">dropbox</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="codepen">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-codepen" aria-hidden="true"></i>
                <div class="icon-title">codepen</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="jsfiddle">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-jsfiddle" aria-hidden="true"></i>
                <div class="icon-title">jsfiddle</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="evernote">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-evernote" aria-hidden="true"></i>
                <div class="icon-title">evernote</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="envato">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-envato" aria-hidden="true"></i>
                <div class="icon-title">envato</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="skype">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-skype" aria-hidden="true"></i>
                <div class="icon-title">skype</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="paypal">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-paypal" aria-hidden="true"></i>
                <div class="icon-title">paypal</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="feed">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-feed" aria-hidden="true"></i>
                <div class="icon-title">feed</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="html5">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-html5" aria-hidden="true"></i>
                <div class="icon-title">html5</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="css3">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-css3" aria-hidden="true"></i>
                <div class="icon-title">css3</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="webchat">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-webchat" aria-hidden="true"></i>
                <div class="icon-title">webchat</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="qq">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-qq" aria-hidden="true"></i>
                <div class="icon-title">qq</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="zhihu">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-zhihu" aria-hidden="true"></i>
                <div class="icon-title">zhihu</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="weibo">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-weibo" aria-hidden="true"></i>
                <div class="icon-title">weibo</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="douban">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-douban" aria-hidden="true"></i>
                <div class="icon-title">douban</div>
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4 icondemo-wrap vertical-align" data-name="baidu">
              <div class="icondemo vertical-align-middle">
                <i class="icon bd-baidu" aria-hidden="true"></i>
                <div class="icon-title">baidu</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<br/>
	
	@stop
	