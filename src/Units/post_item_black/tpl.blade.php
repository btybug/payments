@php
    $col = posts_url_manager();
@endphp
<div class="block-black text-center">
    <div class="title">
        @if(isset($settings["option_1_item_value"]))
            @if($settings["option_1_item_value"] == "image")
                <img src="{{$settings["product"][$settings["option_1_item_value"]]}}" alt="">
            @else
                {{$settings["product"][$settings["option_1_item_value"]]}}
            @endif
        @endif
    </div>
    <div class="header-content text-center">
        @if(isset($settings["option_2_item_value"]))
            @if($settings["option_2_item_value"] == "image")
                <img src="{{$settings["product"][$settings["option_2_item_value"]]}}" alt="">
            @else
                {{$settings["product"][$settings["option_2_item_value"]]}}
            @endif
        @endif
    </div>
    <div class="block-content">
        @if(isset($settings["option_3_item_value"]))
            @if($settings["option_3_item_value"] == "image")
                <img src="{{$settings["product"][$settings["option_3_item_value"]]}}" alt="">
            @else
                {{$settings["product"][$settings["option_3_item_value"]]}}
            @endif
        @endif
    </div>
    <div class="block-bottom  text-center">
        <button class="btn select-plan add-to-cart" data-id="{!! $settings['product']["id"] !!}">Add To Cart</button>
        <a class="btn select-plan" href="{!! url($settings["blog"],$settings['product'][$col]) !!}">View Product</a>
        {{--<a href="{!! url(get_blog_slug_in_page(),$plan[$col]) !!}" class="btn select-plan">View Product</a>--}}
    </div>
</div>
{!! BBstyle($_this->path."/css/main1.css") !!}