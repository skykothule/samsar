@extends('layouts.template')
@section('content')
    <style>
        .panel-body::-webkit-scrollbar {
            height: 5px;
        }
        .btn-group{
            margin-bottom:10px;
        }
    </style>

    <div class="page-header">
        <h1 class="page-title font_lato">{{'Company List'}}</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
                <li class="active">{{'company'}}</li>
            </ol>
        </div>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid" style="width:100%; overflow;hidden;overflow-x:scroll">
                <!------------------------start insert, update, delete message ---------------->
                <div class="row">
                    @if(session('msg_success'))
                        <div class="alert dark alert-icon alert-success alert-dismissible alertDismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="icon wb-check" aria-hidden="true"></i>
                            {{session('msg_success')}}
                        </div>
                    @endif
                    @if(session('msg_update'))
                        <div class="alert dark alert-icon alert-info alert-dismissible alertDismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="icon wb-check" aria-hidden="true"></i>
                            {{session('msg_update')}}
                        </div>
                    @endif
                    @if(session('msg_delete'))
                        <div class="alert dark alert-icon alert-danger alert-dismissible alertDismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="icon wb-check" aria-hidden="true"></i>
                            {{session('msg_delete')}}
                        </div>
                    @endif
                </div>

                <div class="bs-example" data-example-id="single-button-dropdown" style="float:right; ">
                    <div class="btn-group">
                        <a href="{{URL::to('companyregistration')}}" class="btn btn-outline btn-default" data-toggle="tooltip" data-placement="top" data-original-title="{{'Add Company'}}"><i class="icon fa-plus" aria-hidden="true"></i> {{'Add Company'}}</a>
                    </div>
                    {{--<div class="btn-group">--}}
                    {{--<a href="{{URL::to('usersprint')}}" class="btn btn-outline btn-default" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.print')}}"> <i class="icon fa-print" aria-hidden="true"></i> {{ trans('app.print')}}</a>--}}
                    {{--</div>--}}
                    {{--<div class="btn-group">--}}
                    {{--<a href="{{URL::to('import')}}" class="btn btn-outline btn-default" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.import')}}"><span class="glyphicon glyphicon-import" aria-hidden="true"></span> {{ trans('app.import')}}</a>--}}
                    {{--</div>--}}
                    {{--<div class="btn-group">--}}
                    {{--<a href="{{URL::to('pdf')}}" class="btn btn-outline btn-default" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.pdf')}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> {{ trans('app.pdf')}}</a>--}}
                    {{--</div>--}}
                    {{--<div class="btn-group">--}}
                    {{--<a href="{{URL::to('export')}}" class="btn btn-outline btn-default" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.export')}}"><span class="glyphicon glyphicon-export" aria-hidden="true"></span> {{ trans('app.export')}}</a>--}}
                    {{--</div>--}}

                    <div class="btn-group">
                        <form class="form-inline ng-pristine ng-valid" action="{{URL::to('company')}}" method="get">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" id="search" placeholder="{{ trans('app.search_for_action')}}" value="{{Request::get('search')}}">

                                <button type="submit" class="btn btn-outline btn-default"><i class="icon fa-search" aria-hidden="true"></i></button>

                                @if (Request::get('search') != '')
                                    <a href="{{URL::to('company')}}" class="btn btn-outline btn-danger" type="button">
                                        <i class="icon fa-remove" aria-hidden="true"></i>
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
                <div style="clear:both;"></div><br/>

                <table class="tablesaw table-striped table-bordered tablesaw-columntoggle" data-tablesaw-mode="columntoggle" data-tablesaw-minimap="" id="table-3973">
                    <thead>
                    <tr>
                        <th data-tablesaw-priority="6" class="tablesaw-priority-5 tablesaw-cell-visible">{{'Profile'}}</th>
                        <th data-tablesaw-priority="5">{{'Organisation Name'}}</th>
                        <th data-tablesaw-priority="4">{{'Address'}}</th>
                        <th data-tablesaw-priority="3">{{'Country'}}</th>
                        {{--<th data-tablesaw-priority="3">{{'Total Active Users'}}</th>--}}
                        <th data-tablesaw-priority="2">{{'Created At'}}</th>
                        <th data-tablesaw-priority="1">{{'Action'}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($company as $view)
                        <tr>
                            <td class="tablesaw-priority-6 tablesaw-cell-visible"><img class="img-circle img-bordered img-bordered-orange fileupload-new " width="70" height="70" src="{{URL::to('uploads/logo')}}/{{$view->company_profile}} " alt="..."></td>
                            <td class="tablesaw-priority-5">{{$view->company_name}}</td>
                            <td class="tablesaw-priority-4">{{$view->address}}</td>
                            <td class="tablesaw-priority-3">{{$view->country}}</td>
                            <td class="tablesaw-priority-2">{{$view->created_at}}</td>
                            {{--<td class="tablesaw-priority-2">--}}
                            {{--@if($view->status == 'Active')--}}
                            {{--<button ng-if="status == 1" type="button" class="btn btn-floating btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.active')}}">  <i class="icon fa-check" aria-hidden="true"></i></button>--}}
                            {{--@else--}}
                            {{--<button ng-if="status == 0" type="button" class="btn btn-floating btn-warning btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.inactive')}}"><i class="icon fa-close" aria-hidden="true"></i></button>--}}
                            {{--@endif--}}
                            {{--</td>--}}
                            <td class="tablesaw-priority-1">
                                {{--<a title="{{ trans('app.user_details')}}" data-toggle="tooltip" data-placement="top" data-original-title="View details" class="btn btn-icon btn-primary btn-outline btn-round " href="{{URL::to('show',$view->id)}}"><i class="icon fa-eye" aria-hidden="true"></i></a>--}}

                                <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('companyEdit',$view->id)}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('destroy',$view->id)}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div style="clear:both;"></div><br/>

            {{--<!--{{ $userdata->render() }}-->--}}
            {{--{{ $userdata->appends(Request::only('search'))->links() }}--}}
            <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div><br/>
@stop



