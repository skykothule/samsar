@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/filament-tablesaw/tablesaw.css">
    <div class="page-header">
        <h1 class="page-title font_lato">{{'Samsar Shippings'}}</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
                <li class="active">{{'Order Details'}}</li>
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

                {{--<div class="bs-example" data-example-id="single-button-dropdown" style="float:right; ">--}}
                    {{--<div class="btn-group">--}}
                        {{--<a href="{{URL::to('createorder')}}" class="btn btn-outline btn-default" data-toggle="tooltip" data-placement="top" data-original-title="{{'Place order'}}"><i class="icon fa-plus" aria-hidden="true"></i> {{'Place Order'}}</a>--}}
                    {{--</div>--}}
                    {{--<div class="btn-group">--}}
                    {{--<a href="{{URL::to('usersprint')}}" class="btn btn-outline btn-default" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.print')}}"> <i class="icon fa-print" aria-hidden="true"></i> {{ trans('app.print')}}</a>--}}
                    {{--</div>--}}
                    {{--<div class="btn-group">--}}
                        {{--<a href="{{URL::to('orderimport')}}" class="btn btn-outline btn-default" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.import')}}"><span class="glyphicon glyphicon-import" aria-hidden="true"></span> {{ trans('app.import')}}</a>--}}
                    {{--</div>--}}
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
                {{--</div>--}}
                <div style="clear:both;"></div><br/>
                <div class="row row-lg">
                    <div class="col-sm-12" >
                        <!-- Example Basic Form -->
                        <p class="font-size-20 blue-grey-700">Order Details</p>
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-12">--}}
                                {{----}}
                            {{--</div>--}}
                        {{--</div>--}}

                    <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="inputBasicFirstName"><b>Ship Order Id   : </b> </label>
                                <span>{{empty($orderdata[0]->order_id)?'':$orderdata[0]->order_id}}</span>
                            </div>
                        <div class="form-group col-sm-6">
                            <label class="control-label" for="inputBasicFirstName"><b>Order Date     : </b> </label>
                            <span>{{empty($orderdata[0]->order_date)?'':date('Y-m-d',strtotime($orderdata[0]->order_date))}}</span>
                        </div>
                    </div> <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="inputBasicFirstName"><b>Order Status   : </b> </label>
                                <span>{{empty($itemdata[0]->bookingstatus)?'':$itemdata[0]->bookingstatus}}</span>
                                <span>
                                  @if (Auth::user()->hasRole('Agent'))  
                                    @if($itemdata[0]->bookingstatus == 'transfer')
                                    <button data-placement="top" data-toggle="modal" rel="tooltip" title="change status"  data-original-title="change status"  class="btn btn-icon btn-outline btn-round btn-sm" data-target=".asf" type="button" data-href="{{URL::to('asf',$orderdata[0]->order_id)}}" style="color:#ec5d6f;border-color: #dc3545;background-color:#ffffff"> ASF</button>
                                    @elseif($itemdata[0]->bookingstatus == 'AtSortFacility-USA')
                                    <button data-placement="top" data-toggle="modal" rel="tooltip" title="change status"  data-original-title="change status"  class="btn btn-icon btn-outline btn-round btn-sm" data-target=".pas" type="button" data-href="{{URL::to('pas',$orderdata[0]->order_id)}}" style="color:#e07b39;border-color: #e07b39;background-color:#ffffff">PAS</button>
                                    @endif
                                @endif    
                                </span>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="inputBasicFirstName"><b>Shipment Status    : </b> </label>
                                <span>{{empty($itemdata[0]->orderstatus)?'':$itemdata[0]->orderstatus}}</span>
                            </div>
                        </div>
                         
                        <div class="row">

                            <div class="form-group col-sm-6">
                                <label class="control-label" for="inputBasicFirstName"><b>Organisation    : </b> </label>
                                <span>{{empty($itemdata[0]->company_name)?'':$itemdata[0]->company_name}}</span>
                            </div>
                            @if (Auth::user()->hasRole('Agent'))
                             <div class="form-group col-sm-6">
                                <label class="control-label" for="inputBasicFirstName"><b>Total Items   : </b> </label>
                                <span>{{empty($orderdata)?'':count($orderdata)}}</span>
                            </div>
                            @else
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="inputBasicFirstName"><b>Total Items   : </b> </label>
                                <span>{{empty($orderdata)?'':count($orderdata)}}</span>
                            </div>
                            @endif
                        </div>
                        @if (Auth::user()->hasRole('Agent'))
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName"><b>Sail Date    : </b> </label>
                                    <span>{{empty($itemdata[0]->ship_date)?'':date('Y-m-d',strtotime($itemdata[0]->ship_date))}}</span>
                                </div>
                               <div class="form-group col-sm-6">
                                <label class="control-label" for="inputBasicFirstName"><b>Tracking Id    :</b> </label>
                                <span>{{empty($itemdata[0]->tracking_id)?'':$itemdata[0]->tracking_id}}</span>
                            </div>
                            </div>
                            <!-- <div class="row">-->
                            <!--<div class="form-group col-sm-6">-->
                            <!--        <a  data-toggle="tooltip" data-placement="top"  class="btn btn-icon btn-primary btn-outline btn-round " href="{{URL::to('bedispatch',$orderdata[0]->order_id)}}" data-original-title="Download Order"><i class="fa fa-paper-plane" aria-hidden="true"></i> Begin Dispatch</a>-->
                            <!--        <a  data-toggle="tooltip" data-placement="top"  class="btn btn-icon btn-info btn-outline btn-round " href="{{URL::to('dispatch',$orderdata[0]->order_id)}}" data-original-title="Download Trackings"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Dispatched</a>-->
                            <!--    </div>-->
                            <!--</div>    -->
                        @else
                            <div class="row">
                                <form method="post" action="{{url('saildateupdate')}}" >
                                    @csrf
                                    <input type="hidden" value="{{empty($orderdata[0]->order_id)?'':$orderdata[0]->order_id}}" name="orderid"/>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="inputBasicFirstName"><b>Sail Date  :</b></label>
                                        <span class="">
                                <i class="icon wb-calendar" aria-hidden="true"></i>
                                </span>
                                        <input type="text"  name="sail_date" value="{{empty($itemdata[0]->ship_date)?'':date('Y-m-d',strtotime($itemdata[0]->ship_date))}}" placeholder="Select date" data-plugin="datepicker">

                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label" for="inputBasicFirstName"><b>Tracking Id    : </b> </label>
                                        <input type="text" class="" id="tracking_id" name="tracking_id" placeholder="Enter tracking id" value="{{is_null($itemdata[0]->tracking_id)?'':$itemdata[0]->tracking_id}}" autocomplete="off">
                                        
                                        <div class="btn-group">
                                        <button data-original-title="item confirm"  class="btn btn-outline btn-success" type="submit" ><span class="icon fa-check" aria-hidden="true"></span> Save</button>
                                        </div>
                                   
                                        <!--<button type="submit" name="submit" class="btn btn-outline btn-info"><i class="icon fa-check" aria-hidden="true"> SAVE</i></button>-->
                                    </div>
                                </form>
                            </div>

                        </div>
                        @endif
                            <form method="post" action="{{url('itemstatus')}}" id="formfield">
                                @csrf
                                <input type="hidden" name="btype" id="mySubmit">
                                <input type="hidden" name="orderID" value="{{empty($orderdata[0]->order_id)?'':$orderdata[0]->order_id}}">
                                <input type="hidden" name="orgid11" value="{{empty($itemdata[0]->orgid)?'':$itemdata[0]->orgid}}" />
                                <div class="bs-example" data-example-id="single-button-dropdown" style="float:left; ">
                                     @if (Auth::user()->hasRole('Agent'))
                                     @if($itemdata[0]->bookingstatus != 'initial' && $itemdata[0]->orderstatus == 'booked')
                                    <div class="btn-group">
                                        <button data-placement="top" data-toggle="modal" rel="tooltip" title="item dispatch"  data-original-title="item dispatched"  class="btn btn-outline btn-info" data-target=".dispatch" id="submitBtn" type="button" ><span class="fa fa-paper-plane" aria-hidden="true"></span> Dispatched</button>
                                    </div>
                                    @endif
                                    @else
                                    @if($itemdata[0]->bookingstatus == 'transfer' || $itemdata[0]->bookingstatus == 'initial')
                                    <div class="btn-group">
                                        <button data-placement="top" data-toggle="modal" rel="tooltip" title="item confirm"  data-original-title="item confirm"  class="btn btn-outline btn-success" data-target=".confirm" id="submitBtn"  type="button" ><span class="fa fa-check-square" aria-hidden="true"></span> Confirm</button>
                                    </div>
                                    <div class="btn-group">
                                        <button data-placement="top" data-toggle="modal" rel="tooltip" title="item cancel"  data-original-title="item cancel"  class="btn btn-outline btn-warning" data-target=".cancel" id="submitBtn" type="button" ><span class="fa fa-ban" aria-hidden="true"></span> Cancel</button>
                                    </div>
                                    <div class="btn-group">
                                        <button data-placement="top" data-toggle="modal" rel="tooltip" title="item split"  data-original-title="item cancel"  class="btn btn-outline btn-danger" data-target=".split" id="submitBtn" type="button" ><span class="fa fa-columns" aria-hidden="true"></span> Split</button>
                                    </div>
                                    @endif
                                    @endif
                                   
                                </div>
                                
                                <div style="clear:both;"></div>

                                <table class="tablesaw table-striped table-bordered tablesaw-columntoggle" data-tablesaw-mode="columntoggle" data-tablesaw-minimap="" id="table-3973">
                                    <thead>
                                    <tr>
                                        <th>&nbsp;&nbsp;
                                            <input type="checkbox" id="ckbCheckAll" />
                                        </th>
                                        <th data-tablesaw-priority="5" class="tablesaw-priority-5 tablesaw-cell-visible">Ship To Order ID</th>
                                        <th data-tablesaw-priority="4">Ship To Name</th>
                                        <th data-tablesaw-priority="3">Ship to Address</th>
                                        <th data-tablesaw-priority="3">Total Weight</th>
                                        <th data-tablesaw-priority="2">Tracking ID</th>
                                        <th data-tablesaw-priority="2">Status</th>
                                        {{--<th id='myColumnId' data-tablesaw-priority="1">{{ trans('app.actions')}}</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($orderdata))
                    @foreach($orderdata as $view)
                        <tr>
                            <td style="text-align: center">
                                <input type="checkbox" class="checkBoxClass" id="Checkbox{{$view->item_id}}" name="check_item[]" value="{{$view->item_id}}" />
                            </td>
                            <td class="tablesaw-priority-5 tablesaw-cell-visible">{{$view->item_id}}</td>
                            <td class="tablesaw-priority-4">{{$view->ship_to_name}}</td>
                            <td class="tablesaw-priority-3">
                                 {{$view->ship_to_add1}}
                                @if(is_null($view->ship_to_add2))

                                @else
                                    {{$view->ship_to_add2}}
                                @endif
                                @if(is_null($view->ship_to_add2))

                                 @else
                                    {{$view->ship_to_add3}}
                                @endif

                                {{$view->ship_to_city}} {{$view->ship_to_state}} {{$view->ship_to_pincode}}
                            </td>
                            <td class="tablesaw-priority-2">{{$view->total_weight}}</td>
                            <td class="tablesaw-priority-1">{{$view->tracking_id}}</td>
                            @if($view->status == 'initial')
                            <td class="tablesaw-priority-1" style="color:#0b98de;font-weight: 700">INITIAL</td>
                            @elseif($view->status == 'confirm')
                            <td class="tablesaw-priority-1" style="color:#28a745;font-weight: 700">CONFIRM</td>
                            @elseif($view->status == 'booked')
                            <td class="tablesaw-priority-1" style="color:#17a2b8;font-weight: 700">BOOKED</td>
                            @elseif($view->status == 'dispatched')
                            <td class="tablesaw-priority-1" style="color:#16b583;font-weight: 700">DISPATCHED</td>
                            @else
                            <td class="tablesaw-priority-1" style="color:#c69500;font-weight: 700">CANCEL</td>
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
                    @endif
                    </tbody>
                </table>
                <div class="modal fade modal-3d-flip-vertical split" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title">Item Split</h4>
                            </div>
                                <div class="modal-body ">
                                    <div class="form-group">
                                        <div>
                                            <label><input type="radio" name="split" value="new" checked>  New order id</label>
                                        </div>
                                        <div class="check-box">
                                            <label><input type="radio" name="split" value="old">  Merge in present order id</label>
                                        </div>
                                    </div>
                                    <div class="form-group selectpicker" style="display:none">
                                        <label class="control-label" for="inputBasicFirstName"><b>Order id list</b></label>
                                        <select class="form-control " name="orgid" ng-init="orgid = '{{ old('orgid') }}'">
                                            <option value="">Select order id</option>
                                            @if(!empty($orderlist))
                                            @foreach($orderlist as $view)
                                                <option value="{{$view->orderid}}">{{$view->orderid}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                    
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default margin-0" data-dismiss="modal">{{ trans('app.close')}}</button>
                                <button class="btn btn-danger btn-ok" id="split" >Split Item</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

                <div style="clear:both;"></div><br/>

            {{--<!--{{ $userdata->render() }}-->--}}
            {{ $orderdata->appends(Request::only('search'))->links() }}
            <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div><br/>

    <div class="modal fade modal-3d-flip-vertical confirm" aria-hidden="true"
         aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Item Confirm</h4>
                </div>
                <div class="modal-body">
                    <p> Are you sure that you want to confirm this item's?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default margin-0" data-dismiss="modal">{{ trans('app.close')}}</button>
                    <a class="btn btn-success btn-ok" id="confirm">Confirm Item</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-3d-flip-vertical cancel" aria-hidden="true"
         aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Item Cancel</h4>
                </div>
                <div class="modal-body">
                    <p> Are you sure that you want to cancel or split this item's?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default margin-0" data-dismiss="modal">{{ trans('app.close')}}</button>
                    <a class="btn btn-warning btn-ok" id="cancel">Cancel Item</a>
                    <button data-dismiss="modal"  class="btn btn-outline btn-danger splitopen" type="button"><span class="fa fa-columns" aria-hidden="true">Split</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade modal-3d-flip-vertical dispatch" aria-hidden="true"
         aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Item Dispatch</h4>
                </div>
                <div class="modal-body">
                    <p> Are you sure that you want to dispatched this item's?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default margin-0" data-dismiss="modal">{{ trans('app.close')}}</button>
                    <button class="btn btn-danger btn-ok" id="dispatch">Confirm Item</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-3d-flip-vertical pas" aria-hidden="true"
         aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Change Status</h4>
                </div>
                <div class="modal-body">
                    <p> Are you sure that you want to change status?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default margin-0" data-dismiss="modal">{{ trans('app.close')}}</button>
                    <a class="btn btn-danger btn-ok" id="pas">Confirm</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-3d-flip-vertical asf" aria-hidden="true"
         aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Change Status</h4>
                </div>
                <div class="modal-body">
                    <p> Are you sure that you want to change status?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default margin-0" data-dismiss="modal">{{ trans('app.close')}}</button>
                    <a class="btn btn-danger btn-ok" id="asf">Confirm</a>
                </div>
            </div>
        </div>
    </div>
        <script type='text/javascript'>
            $('.confirm').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
            $('.cancel').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
            $('.split').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
            $('.dispatch').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
            $('.asf').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
            $('.pas').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
            
            $(document).ready(function() {
                $("body").tooltip({ selector: '[data-toggle=tooltip]' });
            });

            $(document).ready(function () {
                $('#confirm').click(function(){
                    document.getElementById("mySubmit").value = 'confirm';
                    $('#formfield').submit();
                });
                $('#cancel').click(function(){
                    document.getElementById("mySubmit").value = 'cancel';
                    $('#formfield').submit();
                });
                $('#split').click(function(){
                    document.getElementById("mySubmit").value = 'split';
                    $('#formfield').submit();
                });
                $('#dispatch').click(function(){
                    document.getElementById("mySubmit").value = 'dispatch';
                    $('#formfield').submit();
                });
                // $('#split1').click(function(){
                //     document.getElementById("mySubmit").value = 'split';
                //     $('#formfield').submit();
                // });

//                $('#ckbCheckAll').click(function(event) {  //on click
//                    var checked = this.checked;
//                    table.column(0).nodes().to$().each(function(index) {
//                        if (checked) {
//                            $(this).find('.checkBoxClass').prop('checked', 'checked');
//                        } else {
//                            $(this).find('.checkBoxClass').removeProp('checked');
//                        }
//                    });
//                    table.draw();
//                });
                $("#ckbCheckAll").click(function () {
                    $(".checkBoxClass").prop('checked', $(this).prop('checked'));
                });

                $(".checkBoxClass").change(function(){
                    if (!$(this).prop("checked")){
                        $("#ckbCheckAll").prop("checked",false);
                    }
                });
            });
            
        $(document).ready(function () {
            $('.check-box').click(function(){
                    $('.selectpicker').show();
                });
                
            $('.splitopen').click(function(){
                // $('.cancel').hide();
                $(".split").modal();
            });
            });
        </script>
</div>        
@stop