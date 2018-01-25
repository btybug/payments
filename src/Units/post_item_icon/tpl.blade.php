@php
$col = posts_url_manager()
@endphp

<div class="post-item-icon">
    <div class="plan-box">
        <div class="plan-options">
            <div class="plan-price">
                @if(isset($settings["option_1_item_value"]))
                    @if($settings["option_1_item_value"] == "image")
                        <img src="{{$settings['product'][$settings["option_1_item_value"]]}}" alt="">
                    @else
                        <strong>
                            {{$settings['product'][$settings["option_1_item_value"]]}}
                        </strong>
                    @endif
                @endif
            </div>

            <div class="plan-icon">
                @if(isset($settings["option_2_item_value"]))
                    @if($settings["option_2_item_value"] == "image")
                        <img src="{{$settings['product'][$settings["option_2_item_value"]]}}" alt="">
                    @else
                        {{$settings['product'][$settings["option_2_item_value"]]}}
                    @endif
                @endif
            </div>
            <div class="plan-name">
                @if(isset($settings["option_3_item_value"]))
                    @if($settings["option_3_item_value"] == "image")
                        <img src="{{$settings['product'][$settings["option_3_item_value"]]}}" alt="">
                    @else
                        {{$settings['product'][$settings["option_3_item_value"]]}}
                    @endif
                @endif
            </div>
            <div class="button">
                <a data-id="{{$settings['product']['id']}}" class="btn select-plan add-to-cart" href="#">Add To Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                <a class="btn select-plan" href="{!! url(str_replace('-','_',$settings["blog"]),$settings['product'][$col]) !!}">View Product<i class="fa fa-eye" aria-hidden="true"></i></a>
                {{--<a class="btn select-plan" href="{!! url(get_blog_slug_in_page(),$settings['product'][$col]) !!}">View Product<i class="fa fa-eye" aria-hidden="true"></i></a>--}}
            </div>
        </div>
    </div>
</div>
{!! BBstyle($_this->path."/css/main.css") !!}
{!!  BBscript($_this->path.'/js/main.js') !!}