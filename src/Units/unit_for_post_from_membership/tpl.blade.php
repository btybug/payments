<?php
$product = [];
if (isset($source['_page'])) {
    $page = $source['_page'];
    $params = \Request::route()->parameters();
    if (isset($params['param'])) {
        $param = $params['param'];
    }
    $blog = str_replace('-', '_', str_replace_first('single_', '', $page->slug));
    $product = DB::table($blog)->find($param);
}
if (isset($settings["table"]) && ! count($product)) {
    $table = $settings["table"];
    $slug = implode("_", explode("-", $table));
    $product = DB::table($slug)->select("*")->first();
}
?>
@if(!count($product))
    <div class="container all-div">
        <div class="row">
            <div class="head">
                <div class="col-md-5 col-sm-5 col-xs-12 opt1 final-opt1">

                </div>
                <div class="col-md-7 col-sm-7 col-xs-12 right">
                    <div class="opt2 final-opt2">

                    </div>
                    <div class="opt3 final-opt3">

                    </div>
                    <div class="unit1 final-unit1">
                        @if(isset($settings['punit1']))
                            {!! BBRenderUnits($settings['punit1']) !!}
                        @endif
                    </div>
                    <div class="unit2 final-unit2">
                        @if(isset($settings['punit2']))
                            {!! BBRenderUnits($settings['punit2']) !!}
                        @endif
                    </div>
                    <div class="unit2 final-unit2">
                        @if(isset($settings['punit3']))
                            {!! BBRenderUnits($settings['punit3']) !!}
                        @endif
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="bottom">
                <div class="in-bottom">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="opt4 final-opt4">
                            <div class="col-md-12">

                            </div>
                            <div class="col-md-12">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="opt5 final-opt5">

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@else
    <?php $product = collect($product)->toArray();?>
    <div class="container all-div">
        <div class="row">
            <div class="head">
                <div class="col-md-5 col-sm-5 col-xs-12 opt1 {{isset($settings["option_1_container_style"]) ? $settings["option_1_container_style"] : 'final-opt1'}} ">
                    @if(isset($settings["option_1_item_value"]))
                        <img src="{{$product[$settings["option_1_item_value"]]}}" alt=""
                             class=" {{isset($settings['option_1_container_item_style']) ? $settings['option_1_container_item_style'] : 'final-img'}}">
                    @endif
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12 right">
                    <div class="opt2 {{isset($settings["option_2_container_style"]) ? $settings["option_2_container_style"] : 'final-opt2'}} ">
                        <p class="{{isset($settings['option_2_container_item_style']) ? $settings['option_2_container_item_style'] : 'final-title'}} ">
                            {{isset($settings["option_2_item_value"]) ? $product[$settings["option_2_item_value"]] : ''}}
                        </p>
                    </div>
                    <div class="opt3 {{isset($settings["option_3_container_style"]) ? $settings["option_3_container_style"] : 'final-opt3'}} ">
                        <p class="{{isset($settings['option_3_container_item_style']) ? $settings['option_3_container_item_style'] : 'final-desc'}} ">
                            {{isset($settings["option_3_item_value"]) ? $product[$settings["option_3_item_value"]] : ''}}
                        </p>
                    </div>

                    <div class="unit1 final-unit1">
                        @if(isset($settings['punit1']))
                            {!! BBRenderUnits($settings['punit1']) !!}
                        @endif
                    </div>
                    <div class="unit2 final-unit2">
                        @if(isset($settings['punit2']))
                            {!! BBRenderUnits($settings['punit2']) !!}
                        @endif
                    </div>
                    <div class="unit2 final-unit2">
                        @if(isset($settings['punit3']))
                            {!! BBRenderUnits($settings['punit3']) !!}
                        @endif
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="bottom">
                <div class="in-bottom">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="opt4 final-opt4">
                            <div class="col-md-12">
                                @if(isset($settings["unit3"]))
                                    {!! BBRenderUnits($settings['unit3']) !!}
                                @endif
                            </div>
                            <div class="col-md-12">
                                @if(isset($settings["unit4"]))
                                    {!! BBRenderUnits($settings['unit4']) !!}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="opt5 {{isset($settings["option_5_container_style"]) ? $settings["option_5_container_style"] : 'final-opt5'}} ">
                            <p class="{{isset($settings['option_5_container_item_style']) ? $settings['option_5_container_item_style'] : ''}}">
                                {{isset($settings["option_5_item_value"]) ? $product[$settings["option_5_item_value"]] : ''}}
                            </p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endif

{!! BBstyle($_this->path."/css/main2.css") !!}
{!!  BBscript($_this->path.'/js/main.js') !!}
<style>
    .select-plan {
        width: 250px;
        height: 50px;
        color: rgb(255, 255, 255);
        text-transform: uppercase;
        font-size: 18px;
        background-color: rgb(133, 213, 41);
        font-weight: bolder;
        padding: 12px;
        border-width: 0px;
        border-style: initial;
        border-color: initial;
        border-image: initial;
        border-radius: 0px;
        outline: 0px;
        margin: 0px auto;
        transition: all 0.5s ease;
    }
</style>
