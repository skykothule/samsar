@extends('layouts.template')
@section('content')
    <style>
        #sail {
            background-color: transparent;
            border: 0px solid;
            height: 50px;
            width: 100px;

        }
    </style>
    <link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/filament-tablesaw/tablesaw.css">
    <div class="page-header">
        <h1 class="page-title font_lato">{{'Order List'}}</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
                <li class="active">{{'Order'}}</li>
            </ol>
        </div>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
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
                    {{--<div class="btn-group">--}}
                        {{--<a href="{{URL::to('createorder')}}" class="btn btn-outline btn-default" data-toggle="tooltip" data-placement="top" data-original-title="{{'Place order'}}"><i class="icon fa-plus" aria-hidden="true"></i> {{'Place Order'}}</a>--}}
                    {{--</div>--}}
                    {{--<div class="btn-group">--}}
                        {{--<a href="{{URL::to('usersprint')}}" class="btn btn-outline btn-default" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.print')}}"> <i class="icon fa-print" aria-hidden="true"></i> {{ trans('app.print')}}</a>--}}
                    {{--</div>--}}
                    <div class="btn-group">
                        <a href="{{URL::to('orderimport')}}" class="btn btn-outline btn-default" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.import')}}"><span class="glyphicon glyphicon-import" aria-hidden="true"></span> Add new order</a>
                    </div>
                    {{--<div class="btn-group">--}}
                        {{--<a href="{{URL::to('pdf')}}" class="btn btn-outline btn-default" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.pdf')}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> {{ trans('app.pdf')}}</a>--}}
                    {{--</div>--}}
                    {{--<div class="btn-group">--}}
                        {{--<a href="{{URL::to('export')}}" class="btn btn-outline btn-default" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.export')}}"><span class="glyphicon glyphicon-export" aria-hidden="true"></span> {{ trans('app.export')}}</a>--}}
                    {{--</div>--}}

                    {{--<div class="btn-group">--}}
                        {{--<form class="form-inline ng-pristine ng-valid" action="{{URL::to('userlist')}}" method="get">--}}
                            {{--<div class="form-group">--}}
                                {{--<input type="text" name="search" class="form-control" id="search" placeholder="{{ trans('app.search_for_action')}}" value="{{Request::get('search')}}">--}}

                                {{--<button type="submit" class="btn btn-outline btn-default"><i class="icon fa-search" aria-hidden="true"></i></button>--}}

                                {{--@if (Request::get('search') != '')--}}
                                    {{--<a href="{{URL::to('userlist')}}" class="btn btn-outline btn-danger" type="button">--}}
                                        {{--<i class="icon fa-remove" aria-hidden="true"></i>--}}
                                    {{--</a>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                </div>
                <!--<div style="clear:both;"></div><br/>-->

                <table class="tablesaw table-striped table-bordered tablesaw-columntoggle" data-tablesaw-mode="columntoggle" data-tablesaw-minimap="" id="table-3973">
                    <thead>
                    <tr>
                        <th data-tablesaw-priority="5" class="tablesaw-priority-5 tablesaw-cell-visible">Ship Order ID</th>
                        <th data-tablesaw-priority="4">Order Date</th>
                        <th data-tablesaw-priority="3">Sail Date</th>
                        <th data-tablesaw-priority="3">Organisation Name</th>
                        <th data-tablesaw-priority="3">Created By</th>
                        <th data-tablesaw-priority="2">Order Status</th>
                        <th data-tablesaw-priority="2">Shipment Status</th>
                        <th id='myColumnId' data-tablesaw-priority="1">Download Files</th>
                        {{--<th id='myColumnId' data-tablesaw-priority="1">{{ trans('app.actions')}}</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orderdata as $view)
                        <tr>
                            <td class="tablesaw-priority-5 tablesaw-cell-visible"><a href="{{URL::to('showorder')}}/{{$view->orderid }}/{{$view->orgid }}" title="View details" >{{$view->orderid}}</a></td>
                            <td class="tablesaw-priority-4">{{date('Y-m-d',strtotime($view->created_at))}}</td>
                            <td class="tablesaw-priority-3">{{date('Y-m-d',strtotime($view->sailDate))}}</td>
                            <td class="tablesaw-priority-3">{{$view->company_name}}</td>
                            <td class="tablesaw-priority-3">{{$view->first_name}} {{$view->last_name}}</td>
                            @if($view->bookingstatus == 'initial')
                            <td class="tablesaw-priority-1" style="color:#0b98de;font-weight: 700">INITIAL</td>
                            @elseif($view->bookingstatus == 'transfer')
                            <td class="tablesaw-priority-1" style="color:#28a765;font-weight: 700">TRANSFER</td>
                            @elseif($view->bookingstatus == 'AtSortFacility-USA')
                            <td class="tablesaw-priority-1" style="color:#17a2a8;font-weight: 700">AtSortFacility-USA</td>
                            @elseif($view->bookingstatus == 'ProcessedAtSort-USA')
                            <td class="tablesaw-priority-1" style="color:#16b563;font-weight: 700">ProcessedAtSort-USA</td>
                            @elseif($view->bookingstatus == 'dispatched')
                            <td class="tablesaw-priority-1" style="color:#16b583;font-weight: 700">DISPATCHED</td>
                            @else
                            <td class="tablesaw-priority-1" style="color:#000000;font-weight: 700">CLOSED</td>
                            @endif
                            
                            @if($view->orderstatus == 'initial')
                            <td class="tablesaw-priority-1" style="color:#0b98de;font-weight: 700">INITIAL</td>
                            @elseif($view->orderstatus == 'confirm')
                            <td class="tablesaw-priority-1" style="color:#28a745;font-weight: 700">CONFIRM</td>
                            @elseif($view->orderstatus == 'booked')
                            <td class="tablesaw-priority-1" style="color:#17a2b8;font-weight: 700">BOOKED</td>
                            @elseif($view->orderstatus == 'dispatched')
                            <td class="tablesaw-priority-1" style="color:#16b583;font-weight: 700">DISPATCHED</td>
                            @else
                            <td class="tablesaw-priority-1" style="color:#c69500;font-weight: 700">CANCEL</td>
                            @endif
                            <td class="tablesaw-priority-3">
                                {{--<a href="{{URL::to('exportitem',$view->orderid)}}" data-title="Download Total Items"><i class="fa fa-file-excel-o" aria-hidden="true" style="font-size: 30px;"></i></a></td>--}}
                            <a  data-toggle="tooltip" data-placement="top"  class="btn btn-icon btn-primary btn-outline btn-round " href="{{URL::to('exportitem',$view->orderid)}}" data-original-title="Download Order"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                            @if($view->orderstatus != 'initial' && $view->orderstatus != 'confirm' && $view->orderstatus != 'cancel')
                            
                            <a  data-toggle="tooltip" data-placement="top"  class="btn btn-icon btn-info btn-outline btn-round " href="{{URL::to('exporttracking',$view->orderid)}}" data-original-title="Download Trackings"><i class="fa fa-table" aria-hidden="true"></i></a>
                            @endif
                            @if($view->orderstatus != 'initial' && $view->orderstatus != 'cancel')
                            @permission('Booking')
                            <a  data-toggle="tooltip" data-placement="top"  class="btn btn-icon btn-success btn-outline btn-round " href="{{URL::to('trackingimport',$view->orderid)}}" data-original-title="Import Trackings"><span class="glyphicon glyphicon-import" aria-hidden="true"></span></a>
                            @endpermission
                            @endif
                            {{--<td class="tablesaw-priority-2">--}}
                                {{--@if($view->status == 'Active')--}}
                                    {{--<button ng-if="status == 1" type="button" class="btn btn-floating btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.active')}}">  <i class="icon fa-check" aria-hidden="true"></i></button>--}}
                                {{--@else--}}
                                    {{--<button ng-if="status == 0" type="button" class="btn btn-floating btn-warning btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.inactive')}}"><i class="icon fa-close" aria-hidden="true"></i></button>--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            {{--<td class="tablesaw-priority-1">--}}
                                {{--<a title="{{ trans('app.user_details')}}" data-toggle="tooltip" data-placement="top" data-original-title="View details" class="btn btn-icon btn-primary btn-outline btn-round " href="{{URL::to('show',$view->id)}}"><i class="icon fa-eye" aria-hidden="true"></i></a>--}}

                                {{--<a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('edit',$view->id)}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>--}}

                                {{--<button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('destroy',$view->id)}}"><i class="icon fa-remove" aria-hidden="true"></i></button>--}}
                            {{--</td>--}}
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

    <div class="container" >
        <!-- Modal -->
        <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Samsar Shippings </h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
@stop