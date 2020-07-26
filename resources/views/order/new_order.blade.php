@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/global/vendor/jt-timepicker/jquery-timepicker.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/assets/examples/css/forms/advanced.css">

    <style>
        p.redcolor{color:red; font-size:16px;}
        .spancolor{color:red;}
        .help-block{color:red;}
    </style>

    <div class="page-header">
        <h1 class="page-title font_lato">Create New Order</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
                <li><a href="{{URL::to('orderlist')}}">{{'Order'}}</a></li>
                <li class="active">{{ trans('app.create')}}</li>
            </ol>
        </div>
    </div>

    <div class="page-content" ng-app="app" ng-cloak>
        <div class="panel">
            <div class="panel-body container-fluid">
                <!------------------------start insert, update, delete message  ---------------->
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
                <form  name="userForm" action="{{URL::to('storeorder')}}" ng-submit="submitForm(userForm.$valid)" novalidate  id="demo-form2" data-parsley-validate="" method="post" novalidate="">
                    {{ csrf_field() }}
                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700">Order Details</p>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Order ID<span class="spancolor">*</span> </label>
                                    <input type="text" class="form-control" id="order_id" ng-model="order_id" name="order_id" ng-init="order_id='{{ old('order_id') }}'" placeholder="Order id" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Order Date</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="icon wb-calendar" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="order_date" value="{{ old('order_date') }}" placeholder="Order date" data-plugin="datepicker">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Order Value</label>
                                    <input type="text" class="form-control" id="order_value" name="order_value" placeholder="Order value" value="{{ old('order_value') }}" autocomplete="off">
                                </div>
                                {{--<div class="form-group col-sm-6">--}}
                                    {{--<label class="control-label">{{ trans('app.select_role')}} <span class="text-danger">*</span></label>--}}
                                    {{--<select ng-model="role"  class="form-control" name="role" required ng-init="role = '{{ old('role') }}'">--}}
                                        {{--<option value="">{{ trans('app.select_role')}} </option>--}}
                                        {{--@foreach($roles as $view)--}}
                                            {{--<option value="{{$view->name}}">{{$view->display_name}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Requested Service</label>
                                    <input type="text" class="form-control" id="service" name="service" placeholder="Requested service" value="{{ old('service') }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Name</label>
                                    <input type="text" class="form-control" id="ship_to_name" name="ship_to_name" placeholder="Name" value="{{ old('ship_to_name') }}" autocomplete="off">
                                </div>
                                {{--<div class="form-group col-sm-6">--}}
                                    {{--<label class="control-label">{{ trans('app.country')}} <span class="spancolor">*</span></label>--}}
                                    {{--<select ng-model="country"  class="form-control" name="country" required ng-init="country = '{{ old('country') }}'">--}}
                                        {{--<option value="">{{ trans('app.select_country')}} </option>--}}
                                        {{--@foreach($country as $data)--}}
                                            {{--<option value="{{$data->nicename}}">{{$data->nicename}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Company</label>
                                    <select ng-model="role"  class="form-control" name="ship_to_company" required ng-init="ship_to_company = '{{ old('ship_to_company') }}'">
                                    <option value="">Select Company </option>
                                    @foreach($company as $view)
                                    <option value="{{$view->id}}">{{$view->company_name}}</option>
                                    @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Address-1</label>
                                    <input type="text" class="form-control" id="ship_to_add1" name="ship_to_add1" placeholder="Address-1" value="{{ old('ship_to_add1') }}" autocomplete="off">
                                </div>
                                {{--<div class="form-group col-sm-6">--}}
                                    {{--<label class="control-label">{{ trans('app.status')}}</label>--}}
                                    {{--<div>--}}
                                        {{--<div class="btn-group" data-toggle="buttons" role="group">--}}
                                            {{--<label class="btn btn-outline btn-primary  {{ ((old('status')== 'Active')?'active': '')}} {{ (empty(old('status'))?'active': '')}}">--}}
                                                {{--<input type="radio" name="status" autocomplete="off"  value="Active"  checked="">--}}
                                                {{--<i class="icon wb-check text-active" aria-hidden="true"></i>  {{ trans('app.active')}}--}}
                                            {{--</label>--}}
                                            {{--<label class="btn btn-outline btn-primary {{ ((old('status')== 'Inactive')?'active': '')}}">--}}
                                                {{--<input type="radio" name="status" autocomplete="off" value="Inactive" {{ ((old('status') == 'Inactive')?'checked' : '')}} >--}}
                                                {{--<i class="icon wb-check text-active" aria-hidden="true"></i> {{ trans('app.inactive')}}--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Address-2</label>
                                    <input type="text" class="form-control" id="ship_to_add2" name="ship_to_add2" placeholder="Address-2" value="{{ old('ship_to_add2') }}" autocomplete="off">
                                </div>

                                {{--<div class="form-group col-sm-6">--}}
                                    {{--<label class="control-label">{{ trans('app.gender')}}</label>--}}
                                    {{--<div>--}}
                                        {{--<div class="btn-group" data-toggle="buttons" role="group">--}}
                                            {{--<label class="btn btn-outline btn-primary  {{ ((old('gender')== 'Male')?'active': '')}} {{ (empty(old('gender'))?'active': '')}}">--}}
                                                {{--<input type="radio" name="gender" autocomplete="off"  value="Male"  checked="">--}}
                                                {{--<i class="icon wb-check text-active" aria-hidden="true"></i>  {{ trans('app.male')}}--}}
                                            {{--</label>--}}
                                            {{--<label class="btn btn-outline btn-primary {{ ((old('gender')== 'Female')?'active': '')}}">--}}
                                                {{--<input type="radio" name="gender" autocomplete="off" value="Female" {{ ((old('gender') == 'Female')?'checked' : '')}} >--}}
                                                {{--<i class="icon wb-check text-active" aria-hidden="true"></i> {{ trans('app.female')}}--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                {{--</div>--}}

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Address-3</label>
                                    <input type="text" class="form-control" id="ship_to_add3" name="ship_to_add3" placeholder="Address-3" value="{{ old('ship_to_add3') }}" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- State/Province</label>
                                    <input type="text" class="form-control" id="ship_to_state" name="ship_to_state" placeholder="State" value="{{ old('ship_to_state') }}" autocomplete="off">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- City</label>
                                    <input type="text" class="form-control" id="ship_to_city" name="ship_to_city" placeholder="City" value="{{ old('ship_to_city') }}" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Postal Code</label>
                                    <input type="text" class="form-control" id="ship_to_pincode" name="ship_to_pincode" placeholder="Postal code" value="{{ old('ship_to_pincode') }}" autocomplete="off">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Country</label>
                                    <input type="text" class="form-control" id="ship_to_country" name="ship_to_country" placeholder="Country" value="{{ old('ship_to_country') }}" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Phone</label>
                                    <input type="text" class="form-control" id="ship_to_phone" name="ship_to_phone" placeholder="Phone" value="{{ old('ship_to_phone') }}" autocomplete="off">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Ship to- Email</label>
                                    <input type="text" class="form-control" id="ship_to_email" name="ship_to_email" placeholder="Email" value="{{ old('ship_to_email') }}" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Total Weight in Oz</label>
                                    <input type="text" class="form-control" id="total_weight" name="total_weight" placeholder="Weight" value="{{ old('total_weight') }}" autocomplete="off">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Dimensions Length</label>
                                    <input type="text" class="form-control" id="dimensions_length" name="dimensions_length" placeholder="Dimensions length" value="{{ old('dimensions_length') }}" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Dimensions Width</label>
                                    <input type="text" class="form-control" id="dimensions_width" name="dimensions_width" placeholder="Dimensions width" value="{{ old('dimensions_width') }}" autocomplete="off">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Dimensions Height</label>
                                    <input type="text" class="form-control" id="dimensions_height" name="dimensions_height" placeholder="Dimensions height" value="{{ old('dimensions_height') }}" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Customer Note</label>
                                    <input type="text" class="form-control" id="customer_notes" name="customer_notes" placeholder="Customer note" value="{{ old('customer_notes') }}" autocomplete="off">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Internal Notes</label>
                                    <input type="text" class="form-control" id="internal_notes" name="internal_notes" placeholder="Internal notes" value="{{ old('internal_notes') }}" autocomplete="off">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Gift Wrap</label>
                                    <input type="text" class="form-control" id="gift_wrap" name="gift_wrap" placeholder="Gift wrap" value="{{ old('gift_wrap') }}" autocomplete="off">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">Gift Message</label>
                                    <input type="text" class="form-control" id="gift_messages" name="gift_messages" placeholder="Gift message" value="{{ old('gift_messages') }}" autocomplete="off">
                                </div>


                            </div>

                        </div>


                        <div style="clear:both"></div>
                        <div class="form-group col-sm-6">
                            <button type="submit" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                <i class="fa fa-save"></i>  {{'Place Order'}}
                                <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                            </button>

                        </div>
                    </div>
                </form>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div><br/>

    <script>
        var app = angular.module('app', []);

        app.directive("matchPassword", function () {
            return {
                require: "ngModel",
                scope: {
                    otherModelValue: "=matchPassword"
                },
                link: function(scope, element, attributes, ngModel) {

                    ngModel.$validators.matchPassword = function(modelValue) {
                        return modelValue == scope.otherModelValue;
                    };

                    scope.$watch("otherModelValue", function() {
                        ngModel.$validate();
                    });
                }
            };
        });
    </script>
@stop