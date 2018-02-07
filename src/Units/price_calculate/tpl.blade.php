<div class="product-single-price">
    <h6>Price</h6>
    <p>$ {{ \BtyBugHook\Payments\Models\Calculator::price($data['price'],1) }}</p>
</div>
{!! BBstyle($_this->path."/css/main.css") !!}
{!!  BBscript($_this->path.'/js/main.js') !!}