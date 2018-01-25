<div class="post-item-icon">
    <div class="plan-box">
        <div class="plan-options">
            <div class="plan-price">
                @if(isset($settings["option_1_item_value"]))
                    <strong>
                        {{$settings['product'][$settings["option_1_item_value"]]}}
                    </strong>
                @endif
            </div>

            <div class="plan-icon">
                @if(isset($settings["option_2_item_value"]))
                    <img src="http://www.smlclebanon.com/Content/uploads/ProductType/439~product1.jpg" alt="">
                @endif
            </div>
            <div class="plan-name">
                @if(isset($settings["option_3_item_value"]))
                    {{$settings['product'][$settings["option_3_item_value"]]}}
                @endif
            </div>
            <div class="button">
                <a data-id="" class="btn select-plan add-to-cart" href="#">Add To Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                <a class="btn select-plan" href="#">View Product<i class="fa fa-eye" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
{!! BBstyle($_this->path."/css/main.css") !!}
{!!  BBscript($_this->path.'/js/main.js') !!}