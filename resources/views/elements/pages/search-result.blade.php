@extends('layouts.template')
@section('content')
 <link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/magnific-popup/magnific-popup.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/assets/examples/css/pages/gallery.css">
  <div class="page-header">
  <h1 class="page-title font_lato">Search Results </h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
		<li class="active">Search Results</li>
	</ol>
  </div>
</div> 
 <div class="page-content">
      <!-- Panel -->
      <div class="panel">
        <div class="panel-body">
          <form class="page-search-form" role="search">
            <div class="input-search input-search-dark">
              <i class="input-search-icon wb-search" aria-hidden="true"></i>
              <input type="text" class="form-control" id="inputSearch" name="search" placeholder="Search Pages">
              <button type="button" class="input-search-close icon wb-close" aria-label="Close"></button>
            </div>
          </form>
          <h1 class="page-search-title">Search Results For "Web Design"</h1>
          <p class="page-search-count">About
            <span>1,370</span> result (
            <span>0.13</span> seconds)</p>
          <ul class="list-group list-group-full list-group-dividered">
            <li class="list-group-item">
              <h4><a href="https://github.com/amazingSurge?tab=repositories">Eademque Virtutum Laudantium</a></h4>
              <a class="search-result-link" href="https://github.com/amazingSurge?tab=repositories">https://github.com/amazingSurge?tab=repositories</a>
              <p>Praebeat pecunias viveremus probamus opus apeirian haec perveniri,
                memoriter.Praebeat pecunias viveremus probamus opus apeirian haec
                perveniri, memoriter.Praebeat pecunias viveremus probamus opus
                apeirian haec perveniri, memoriter.</p>
            </li>
            <li class="list-group-item">
              <h4><a href="https://github.com/amazingSurge?tab=repositories">Parum Interiret Consequatur</a></h4>
              <a class="search-result-link" href="https://github.com/amazingSurge?tab=repositories">https://github.com/amazingSurge?tab=repositories</a>
              <p>Regula magnosque ait. Rebus intellegimus occulte instituendarum quoniam
                fabulae.Regula magnosque ait. Rebus intellegimus occulte instituendarum
                quoniam fabulae.</p>
            </li>
            <li class="list-group-item">
              <h4><a href="https://github.com/amazingSurge?tab=repositories">Afficitur Nos Veritus</a></h4>
              <a class="search-result-link" href="https://github.com/amazingSurge?tab=repositories">https://github.com/amazingSurge?tab=repositories</a>
              <p>Elaboraret animum primo. Civibus assueverit consequatur affert viros
                scribi.Elaboraret animum primo. Civibus assueverit consequatur
                affert viros scribi.</p>
            </li>
            <li class="list-group-item">
              <h4><a href="https://github.com/amazingSurge?tab=repositories">Tamquam Secumque Nacti</a></h4>
              <a class="search-result-link" href="https://github.com/amazingSurge?tab=repositories">https://github.com/amazingSurge?tab=repositories</a>
              <p>Pronuntiaret liberos probes horribiles acri ita seiunctum aristippus.
                Humili.Pronuntiaret liberos probes horribiles acri ita seiunctum
                aristippus. Humili.Pronuntiaret liberos probes horribiles acri
                ita seiunctum aristippus. Humili.</p>
            </li>
            <li class="list-group-item">
              <h4><a href="https://github.com/amazingSurge?tab=repositories">Aliquo Difficile In</a></h4>
              <a class="search-result-link" href="https://github.com/amazingSurge?tab=repositories">https://github.com/amazingSurge?tab=repositories</a>
              <p>Omnes arbitrer ancillae fictae maximam renovata, fieri pecuniae mundus.Omnes
                arbitrer ancillae fictae maximam renovata, fieri pecuniae mundus.</p>
            </li>
            <li class="list-group-item">
              <h4><a href="https://github.com/amazingSurge?tab=repositories">Quale Momenti Eitam</a></h4>
              <a class="search-result-link" href="https://github.com/amazingSurge?tab=repositories">https://github.com/amazingSurge?tab=repositories</a>
              <p>Perpetiuntur inportuno iudicio errem. Reperire aliud delectus referta
                fruuntur.Perpetiuntur inportuno iudicio errem. Reperire aliud delectus
                referta fruuntur.</p>
            </li>
          </ul>
          <nav>
            <ul data-plugin="paginator" data-total="50" data-skin="pagination-no-border"></ul>
          </nav>
        </div>
      </div>
      <!-- End Panel -->
    </div>
<br/>
@stop

 
