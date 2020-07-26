@extends('layouts.template')
@section('content')
    <div class="page-header">
        <h1 class="page-title font_lato">Order Import</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
                <li><a href="{{URL::to('orderlist')}}">Order</a></li>
                <li class="active">{{ trans('app.import')}}</li>
            </ol>
        </div>
    </div>
    <!------------------------start insert, update, delete message ---------------->
    <div class="page-content" ng-app="">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="col-lg-12">
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


                <form name="userForm" action="{{URL::to('orderimportcsv')}}" ng-submit="submitForm(userForm.$valid)"  method="post" accept-charset="utf-8" enctype="multipart/form-data" class="ng-pristine ng-valid">
                    {{ csrf_field() }}

                    <div class="col-md-4">
                        <div class="input file"><label for="submittedfile">{{ trans('app.import_upload_xlscsv_specified')}}</label>
                            <input ng-model="file" type="file" name="file" class="form-control" >
                        </div>
                    </div>
                    @if (Auth::user()->hasRole('I-Customer'))
                    <div class="form-group col-sm-4">
                        <label class="control-label" for="inputBasicFirstName">Company</label>
                        <select class="form-control" name="orgid" ng-init="orgid = '{{ old('orgid') }}'">
                            <option value="">Select Company </option>
                            @foreach($company as $view)
                                <option value="{{$view->id}}">{{$view->company_name}}</option>
                            @endforeach
                        </select>

                    </div>
                    @endif
                    <div style="clear:both;"></div>
                    <div class="col-md-6">
                        <br>
                        <div class="bs-example" data-example-id="single-button-dropdown">
                            <div class="btn-group">
                                <a href="{{URL::to('orderlist')}}" class="btn btn-info btn-group"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back</a>  </div>
                            <div class="btn-group">
                                <a class="btn btn-default" href="{{URL::to('public/images/sample.csv')}}"><span class="glyphicon glyphicon-download-alt"></span>  Dowload Sample</a>
                            </div>
                            <div class="btn-group">
                                <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary btn-group loadingclick" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Loading.."><i class="fa fa-save"></i>  Submit</button>
                            </div>

                        </div>
                    </div>
                </form>
                <div style="clear:both"></div>
            </div>
        </div>
    </div><br/>
@stop