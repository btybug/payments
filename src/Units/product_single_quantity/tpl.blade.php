<div class="product-single-quantity">
    <p>Quantity:</p>

    {!!  \BtyBugHook\Payments\Models\PriceHTML::get(issetReturn($data,'price',null)); !!}
</div>
{!! BBstyle($_this->path."/css/main.css") !!}
{!!  BBscript($_this->path.'/js/main.js') !!}