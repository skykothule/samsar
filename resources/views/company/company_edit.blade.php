@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="{{URL::to('/')}}/public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/public/global/vendor/jt-timepicker/jquery-timepicker.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/public/assets/examples/css/forms/advanced.css">

    <style>
        p.redcolor{color:red; font-size:16px;}
        .spancolor{color:red;}
        .help-block{color:red;}
    </style>

    <div class="page-header">
        <h1 class="page-title font_lato">{{'Edit Company'}}</h1>
        <div class="page-header-actions">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
                <li><a href="{{URL::to('company')}}">{{'Company List'}}</a></li>
                <li class="active">{{ trans('app.create')}}</li>
            </ol>
        </div>
    </div>

    <div class="page-content" ng-app="app">
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
                <form  name="userForm" action="{{URL::to('companyUpdate')}}" ng-submit="submitForm(userForm.$valid)" novalidate enctype="multipart/form-data"  id="demo-form2" data-parsley-validate="" method="post" novalidate="">
                    {{ csrf_field() }}
                    <input type="hidden" name="comapny_id" value="{{$company_data->id}}">
                    <div class="row row-lg">
                        <div class="col-sm-12" >
                            <!-- Example Basic Form -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="font-size-20 blue-grey-700">Company Details</p>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">{{'Company Name'}}<span class="spancolor">*</span> </label>
                                    <input type="text" class="form-control" id="comapny_name" ng-model="comapny_name" name="comapny_name" ng-init="comapny_name='{{ old('comapny_name') }}'" placeholder="{{'Enter Company Name'}}" value="{{$company_data->company_name}}" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label" for="inputBasicFirstName">{{ trans('app.address')}}</label>
                                    <textarea class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="{{ trans('app.address')}}" autocomplete="off">{{$company_data->address}}</textarea>
                                </div>
                            </div>


                            <div class="row">

                                <div class="form-group col-sm-6">
                                    <label class="control-label">{{ trans('app.country')}} <span class="spancolor">*</span></label>
                                    <select ng-model="country"  class="form-control" name="country" required ng-init="country = '{{ old('country') }}'">
                                        <option value="">{{ trans('app.select_country')}} </option>
                                        @foreach($country as $data)
                                            <option value="{{$data->nicename}}" {{($company_data->country == $data->nicename)?"selected":""}}>{{$data->nicename}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-sm-6">
                                    <!-----------image crop------->
                                    <label class="control-label">{{'Company Logo'}} <span class="spancolor">*</span></label>
                                    <input type="file" class="form-control" id="image" ng-model="image" name="image" ng-init="image='{{ old('image') }}'" required>

                                </div>
                            </div>

                            <div style="clear:both"></div>
                            <div class="form-group col-sm-6">
                                <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                    <i class="fa fa-save"></i> Update
                                    <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                </button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div><br/>

    <script type="text/javascript">
        $uploadCrop = $('#upload-demo').croppie({
            enableExif: true,
            viewport: {
                width: 200,
                height: 200,
                type: 'circle'
            },
            boundary: {
                width: 300,
                height: 300
            }
        });

        $('#upload').on('change', function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function(){
                    //alert(123);
                    $("#uploadimage").hide();
                    $("#saveCancenimage").show();
                    console.log('jQuery bind complete');
                });

            }
            reader.readAsDataURL(this.files[0]);
        });

        {{--$('.upload-result').on('click', function (ev) {--}}
            {{--$uploadCrop.croppie('result', {--}}
                {{--type: 'canvas',--}}
                {{--size: 'viewport'--}}
            {{--}).then(function (resp) {--}}
                {{--var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}
                {{--$.ajax({--}}
                    {{--//url: "{{URL::to('upload')}}/{{$company->id}}",--}}
                    {{--url: "{{URL::to('upload')}}/{{$company->id}}",--}}
                    {{--//data: {_token: CSRF_TOKEN},--}}
                    {{--type: "POST",--}}
                    {{--data: {"image":resp, '_token': CSRF_TOKEN},--}}
                    {{--success: function (data) {--}}
                        {{--console.log(data);--}}
                        {{--html = '<img src="' + resp + '" />';--}}
                        {{--$("#upload-demo-i").html(html);--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}
        {{--});--}}

        $(document).ready(function(){
            $("#cancelbutton").click(function(){
                //console.log(123);
                $("#uploadimage").show();
                $("#saveCancenimage").hide();
                $('.cr-image').attr('src', '');
            });
            $(".upload-result").click(function(){
                setTimeout(function () {
                    location.reload(1);
                    //setInterval(auto_refresh, 3000);
                }, 3000);
            });
        });
    </script>

@stop