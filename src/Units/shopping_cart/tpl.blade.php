@php
    use Gloudemans\Shoppingcart\Facades\Cart;
@endphp

<div class="container" style="color: black;">
    <div class="row">
        <h1>Shopping Cart</h1>
        <div class="table-responsive product">
            <table class="table">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>VAT</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody>
                @if(Cart::count())
                    @foreach(Cart::content() as $item)
                        <tr>
                            <td>
                                <div class="product-cart-image">
                                    <img src="https://s.cdpn.io/3/dingo-dog-bones.jpg" alt=""
                                         class="{{isset($settings['option_1_container_item_style']) ? $settings['option_1_container_item_style'] : ''}}">
                                </div>
                            </td>
                            <td>
                                <div class="product-cart-details">
                                    <div class="product-title">
                                        <p class=" ">
                                            {!! $item->name !!}
                                        </p>
                                    </div>
                                    <p class="product-description  ">
                                        The best dog bones of all time. Holy crap. Your dog will be begging
                                        for these things!</p>
                                </div>
                            </td>
                            <td>
                                <div class="product-cart-price  ">
                                    {!! $item->price !!}
                                </div>
                            </td>
                            <td>
                                <div class="product-cart-discount  ">
                                    0%
                                </div>
                            </td>
                            <td>
                                <div class="product-cart-vat  ">
                                    {!! (isset($item->options['vat']['amount']))?$item->options['vat']['amount']:0 !!}
                                </div>
                            </td>
                            <td>
                                <div class="product-cart-quantity">
                                    <input type="number" value="{!! $item->qty !!}" min="1">
                                </div>
                            </td>
                            <td>
                                @php
                                    $price=isset($item->options['vat']['price'])?$item->options['vat']['price']:$item->price;
                                @endphp
                                <div class="product-cart-line-price">{!! $item->qty *$price  !!}</div>
                            </td>
                            <td>
                                <div class="product-cart-removal">
                                    <button class="btn btn-danger">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="totals">
            <div class="col-md-9">
                <div class="row">

                </div>
                <div class="row">
                    {!! isset($settings['pym_shipping']) ? BBRenderUnits($settings['pym_shipping']) : ''!!}
                </div>

            </div>
            <div class="col-md-3">
                <div class="total-all-item">
                    <div class="totals-item">
                        <label>Subtotal</label>
                        <div class="totals-value" id="cart-subtotal">100.00</div>
                    </div>
                    <div class="totals-item">
                        <label>Tax (5%)</label>
                        <div class="totals-value" id="cart-tax">21.00</div>
                    </div>
                    <div class="totals-item">
                        <label>Voucher </label>
                        <div class="totals-value" id="cart-shipping">15.00</div>
                    </div>
                    <div class="totals-item">
                        <label>Discount</label>
                        <div class="totals-value" id="cart-shipping">10.00</div>
                    </div>
                    <div class="totals-item totals-item-total">
                        <label>Grand Total</label>
                        <div class="totals-value" id="cart-total">121.00</div>
                    </div>
                    <div class="clearfix"></div>
                    <a href="/check-out" class="checkout  ">Checkout</a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

{!! BBstyle($_this->path."/css/main.css") !!}

{!! BBstyle($_this->path."/css/text.css") !!}
{!! BBstyle($_this->path."/css/image.css") !!}
{!! BBstyle($_this->path."/css/button.css") !!}
{!! BBstyle($_this->path."/css/container.css") !!}
{!!  BBscript($_this->path.'/js/main.js') !!}