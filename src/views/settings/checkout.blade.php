@extends('btybug::layouts.mTabs',['index'=>'payment_settings'])
<!-- Nav tabs -->
@section('tab')
    <div class="container-fluid">
        <h2>Check Out Settings</h2>
        <div class="col-md-12">
            <div class="panel panelSettingData">
                <div class="panel-heading" role="tab" id="urlManager">
                    <h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion"
                                               href="#urlManagerCol" aria-expanded="true" aria-controls="urlManagerCol">
                            <i
                                    class="glyphicon glyphicon-chevron-right"></i>Manager</a></h4>
                </div>
                <div id="urlManagerCol" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="urlManager">
                    <div class="panel-body">
                        {!! Form::model(null,['url' => route('payments_settings_sopping_cart_manager')]) !!}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 m-b-10">
                                    <div class="col-sm-4 p-l-0">Sopping Cart</div>
                                    <div class="col-md-5">
                                        {!! BBbutton2('unit','check_out_unit','check_out',($page->template)?'Change':'Select',['class'=>'btn btn-default change-layout','copy'=>'1','model'=>$page->template]) !!}
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{!! route('uploads_settings',$page->template) !!}" class="btn btn-warning" target="_blank">Customize</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::submit("Save",['class' => 'btn settingBtn pull-right']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('resources::assests.magicModal')
    <div class="container-fluid">
        <h2>Checkout options</h2>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">General</h4>
                </div>
                <div class="panel-body">
                    {!! Form::model(null,[]) !!}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-sm-4 p-l-0">allow guest check out</div>
                                {!! Form::radio('checkout[allow]',0,true) !!}
                            </div>
                            <div class="col-md-6">
                                <div class="col-sm-4 p-l-0">Only members</div>
                                {!! Form::radio('checkout[allow]',1,null) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::submit("Save",['class' => 'btn settingBtn pull-right']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">Allow these payment options on check out page</h4>
                </div>
                <div class="panel-body">
                    {!! Form::model(null,[]) !!}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 m-b-10">
                                <div class="col-sm-4 p-l-0">Stripe</div>
                                {!! Form::checkbox('checkout[stripe]',1,null) !!}
                            </div>
                        </div>
                    </div><div class="form-group">
                        <div class="row">
                            <div class="col-md-12 m-b-10">
                                <div class="col-sm-4 p-l-0">Cash payment</div>
                                {!! Form::checkbox('checkout[cash]',1,null) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::submit("Save",['class' => 'btn settingBtn pull-right']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop
@section('CSS')
    <style>
        .panel-heading {
            z-index: 99999999
        }

        .panelSettingData {
            background-color: #85d8d7;
        }

        .panelSettingData .panel-heading {
            background-color: #1c1c1c;
        }

        .panelSettingData label {
            color: #000000;
        }

        .panelSettingData h4 a {
            color: #fff;
        }

        .panelSettingData h4 a:hover, .panelSettingData h4 a:focus {
            text-decoration: none;
        }

        .panelSettingData h4 a i {
            transition: all 0.3s;
            -moz-transition: all 0.3s;
            -webkit-transition: all 0.3s;
            -o-transition: all 0.3s;
            margin-right: 10px;
        }

        .panelSettingData h4 a[aria-expanded="true"] i {
            -ms-transform: rotate(90deg);
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
        }

        .settingBtn {
            background-color: #292929;
            color: #fff;
        }

        .settingBtn:hover, .settingBtn:focus {
            color: #fff;
        }

        .form-control {
            background-color: #000000 !important;
            border: none;
            color: #fff
        }
    </style>
@stop
@section('JS')
    {!! HTML::script("public/js/UiElements/bb_styles.js") !!}
@stop