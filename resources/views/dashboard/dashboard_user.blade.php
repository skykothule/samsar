@extends('layouts.template')
@section('content')
<style>
canvas{
	width: 95% !important;
	max-width: 100%;
	height: auto !important;
}
</style>
<div class="page-content padding-20 container-fluid">
<!------------------------------ Start Alert message--------------->
<div class="alert alert-primary alert-dismissible alertDismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">×</span>
  </button>
 {{ trans('app.welcome')}}  {{Auth::user()->first_name}} {{Auth::user()->last_name}} !
</div>
<!-------------------------------- End alert message--------------->
	

</div>

@stop
