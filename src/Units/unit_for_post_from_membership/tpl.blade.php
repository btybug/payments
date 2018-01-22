<div class="container all-div">
    <div class="row">
            <div class="head">
                <div class="col-md-5 col-sm-5 col-xs-12 opt1 {{isset($settings["option_1_container_style"]) ? $settings["option_1_container_style"] : ''}} final-opt1">
                    @if(isset($settings["option_1_item_value"]))
                        <img src="{{$settings["option_1_item_value"]}}" alt="" class="final-img {{isset($settings['option_1_container_item_style']) ? $settings['option_1_container_item_style'] : ''}}">
                    @endif
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12 right">
                    <div class="opt2 {{isset($settings["option_2_container_style"]) ? $settings["option_2_container_style"] : ''}} final-opt2">
                        <p class="{{isset($settings['option_2_container_item_style']) ? $settings['option_2_container_item_style'] : ''}} final-title">
                            {{isset($settings["option_2_item_value"]) ? $settings["option_2_item_value"] : ''}}
                        </p>
                    </div>
                    <div class="opt3 {{isset($settings["option_3_container_style"]) ? $settings["option_3_container_style"] : ''}} final-opt3">
                        <p class="{{isset($settings['option_3_container_item_style']) ? $settings['option_3_container_item_style'] : ''}} final-desc">
                            {{isset($settings["option_3_item_value"]) ? $settings["option_3_item_value"] : ''}}
                        </p>
                    </div>
                    <div class="unit1 final-unit1">
                        @if(isset($settings["unit1"]))
                            {!! BBRenderUnits($settings['unit1']) !!}
                        @endif
                    </div>
                    <div class="unit2 final-unit2">
                        @if(isset($settings["unit2"]))
                            {!! BBRenderUnits($settings['unit2']) !!}
                        @endif
                    </div>
                    <div class="text-center custom_margin_top_30">
                        <button class="btn btn-success btn-lg">Add to cart</button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        <div class="bottom">
            <div class="in-bottom">
                <div class="col-md-5 col-sm-5 col-xs-12">
                   {{-- <div class="opt4 {{isset($settings["option_4_container_style"]) ? $settings["option_4_container_style"] : ''}}">
                        <p class="{{isset($settings['option_4_container_item_style']) ? $settings['option_4_container_item_style'] : ''}}">
                            {{isset($settings["option_4_item_value"]) ? $settings["option_4_item_value"] : ''}}
                        </p>
                    </div>--}}
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
                    <div class="opt5 {{isset($settings["option_5_container_style"]) ? $settings["option_5_container_style"] : ''}} final-opt5">
                        <p class="{{isset($settings['option_5_container_item_style']) ? $settings['option_5_container_item_style'] : ''}}">
                            {{isset($settings["option_5_item_value"]) ? $settings["option_5_item_value"] : ''}}
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>





{{--<section class="product-single-head">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-6 col-sm-6 col-xs-12 left-product">--}}
{{--@if(isset($settings["area1"]))--}}
{{--<div class="img">--}}
 {{--https://ak1.ostkcdn.com/images/products/8818677/Samsung-Galaxy-S4-I337-16GB-AT-T-Unlocked-GSM-Android-Cell-Phone-85e3430e-6981-4252-a984-245862302c78_600.jpg--}}
{{--<img src="{{$settings["area1"]}}" alt="">--}}
{{--</div>--}}
{{--@endif--}}
{{--</div>--}}
{{--<div class="col-md-6 col-sm-6 col-xs-12 right-product">--}}
{{--<div class="product-title">--}}
{{--@if(isset($settings["area2"]))--}}
{{--<h1>{{$settings["area2"]}}</h1>--}}
{{--@endif--}}
{{--</div>--}}
{{--<div class="product-name">--}}
{{--@if(isset($settings["area3"]))--}}
{{--<p>{{$settings["area3"]}}</p>--}}
{{--@endif--}}
{{--</div>--}}


{{--<div class="product-add-form">--}}
{{--<form>--}}
{{--@if(isset($settings["area4"]))--}}
{{--{!! BBRenderUnits($settings['area4']) !!}--}}
{{--@endif--}}
{{--<div class="product-price">--}}
{{--<span>$399</span>--}}
{{--</div>--}}
{{--<fieldset class="color">--}}
{{--<div>--}}
{{--<h6>COLOR</h6>--}}
{{--<label class="gray"><input name="product-color" type="radio"><span></span></label>--}}
{{--<label class="black"><input name="product-color" type="radio"><span></span></label>--}}
{{--</div>--}}
{{--</fieldset>--}}
{{--<fieldset class="size">--}}
{{--<div>--}}
{{--<h6>CAPACIDAD</h6>--}}
{{--<label><input name="product-size" type="radio"><span>16 GB</span></label>--}}
{{--<label><input name="product-size" type="radio"><span>32 GB</span></label>--}}
{{--</div>--}}
{{--</fieldset>--}}
{{--<fieldset class="add-count">--}}
{{--<div class="count">--}}
{{--<h6>CANTIDAD</h6>--}}
{{--<input type="number" value="1" min="1">--}}
{{--</div>--}}
{{--</fieldset>--}}
{{--<div class="clearfix"></div>--}}
{{--@if(isset($settings["area5"]))--}}
{{--{!! BBRenderUnits($settings['area5']) !!}--}}
{{--@endif--}}
{{--<fieldset class="add-count">--}}
{{--<div class="buy-product">--}}
{{--<button><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>--}}
{{--Agregar--}}
{{--al carro--}}
{{--</button>--}}
{{--</div>--}}
{{--</fieldset>--}}
{{--<div class="add-list">--}}
{{--<a href="#"><span class="glyphicon glyphicon-heart-empty"></span> Agregar a lista de deseos</a>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</section>--}}
{{--<section class="product-single-detail">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="product_tabs">--}}
{{--@if(isset($settings["area6"]) && count($settings["area6"]["titles"]))--}}
{{--<ul class="nav nav-tabs">--}}
{{--@foreach($settings["area6"]["titles"] as $uniq_key => $title)--}}
{{--<li class="{{$loop->first ? 'active' : ''}}">--}}
{{--<a href="#tab-{{$uniq_key}}" data-toggle="tab" aria-expanded="false">--}}
{{--{{$title}}--}}
{{--</a>--}}
{{--</li>--}}
{{--@endforeach--}}
{{--</ul>--}}
{{--@endif--}}
{{--<div class="tab-content">--}}
{{--@if(isset($settings["area6"]) && count($settings["area6"]["descriptions"]))--}}
{{--@foreach($settings["area6"]["descriptions"] as $key => $description)--}}
{{--<div class="{{$loop->first ? 'tab-pane active' : 'tab-pane'}}" id="tab-{{$key}}">--}}
{{--<p>{{$description}}</p>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</section>--}}

{!! BBstyle($_this->path."/css/main2.css") !!}
{!!  BBscript($_this->path.'/js/main.js') !!}
