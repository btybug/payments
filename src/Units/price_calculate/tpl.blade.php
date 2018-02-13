@php
if(isset($data['price'])){
    $adminsettingRepository=new \Btybug\btybug\Repositories\AdminsettingRepository();
    $pym_settings=$adminsettingRepository->getSettings('pym_settings','general',true);
    $original_price = $adminsettingRepository->getSettings('general', 'original_price', true);
    $fullTaxes=getTax($data);
    $price=product_price(json_decode($data['price'],true));
    $taxOrService=isset($original_price['original_price'])?(isset($fullTaxes[$original_price['original_price']])?$fullTaxes[$original_price['original_price']]['price']:$price):$price;
}
@endphp
@if(isset($data['price']))
<div class="product-single-price">
    <h6>Price</h6>
    <p>{!! $taxOrService !!}{!! $pym_settings['currency'] or null !!}</p>
</div>
@else
<div class="product-single-price">
    <h6>Price</h6>
    <p>100 USD</p>
</div>
@endif
{!! BBstyle($_this->path."/css/main.css") !!}
{!!  BBscript($_this->path.'/js/main.js') !!}