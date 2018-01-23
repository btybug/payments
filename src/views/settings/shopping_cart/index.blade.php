@extends('btybug::layouts.mTabs',['index'=>'payment_settings'])
<!-- Nav tabs -->
@section('tab')
    <div class="container-fluid">
        <h2>Sopping Cart Settings</h2>
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
                                        {!! BBbutton2('unit','shopping_cart_unit','shopping_cart',(isset($settings['shopping_cart_unit']))?'Change':'Select',['class'=>'btn btn-default change-layout','copy'=>'1','model'=>isset($settings['shopping_cart_unit'])?$settings['shopping_cart_unit']:null]) !!}
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{!!isset($settings['shopping_cart_unit'])? route('uploads_settings',$settings['shopping_cart_unit']):'#' !!}" class="btn btn-warning" target="_blank">Customize</a>
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
    <script>

    </script>
@stop
