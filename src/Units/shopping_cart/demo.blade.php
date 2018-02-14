<div class="container">
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
                <tr>
                    <td>
                        <div class="product-cart-image">
                            <img src="https://s.cdpn.io/3/dingo-dog-bones.jpg" alt="" class="">
                        </div>
                    </td>
                    <td>
                        <div class="product-cart-details">
                            <div class="product-title">
                                <p class=" ">
                                    Product with Vat
                                </p>
                            </div>
                            <p class="product-description  ">
                                The best dog bones of all time. Holy crap. Your dog will be begging
                                for these things! I got curious once and ate one myself. I'm a fan.</p>
                        </div>
                    </td>
                    <td>
                        <div class="product-cart-price  ">
                            100
                        </div>
                    </td>
                    <td>
                        <div class="product-cart-discount  ">
                            0%
                        </div>
                    </td>
                    <td>
                        <div class="product-cart-vat  ">
                            0
                        </div>
                    </td>
                    <td>
                        <div class="product-cart-quantity">
                            <input type="number" value="1" min="1">
                        </div>
                    </td>
                    <td>
                        <div class="product-cart-line-price">100</div>
                    </td>
                    <td>
                        <div class="product-cart-removal">
                            <button class="btn btn-danger">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
        <div class="totals">
            <div class="col-md-9">
                <div class="row">

                </div>
                <div class="row">
                    <div class="shipping-calc">
                        <div class="title">
                            Shipping Calculator
                        </div>
                        <div class="content">
                        </div>
                    </div>
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
                    <a href="http://forms.albumbugs.com/check-out" class="checkout  ">Checkout</a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        {{--<h1>Shopping Cart</h1>--}}
        {{--<div class="shopping-cart">--}}
            {{--<div class="column-labels">--}}
                {{--<label class="product-image">Image</label>--}}
                {{--<label class="product-details">Product</label>--}}
                {{--<label class="product-price">Price</label>--}}
                {{--<label class="product-discount">Discount</label>--}}
                {{--<label class="product-vat">VAT</label>--}}
                {{--<label class="product-quantity">Quantity</label>--}}
                {{--<label class="product-line-price">Total</label>--}}
                {{--<label class="product-removal">Remove</label>--}}
            {{--</div>--}}

            {{--<div class="product">--}}
                {{--<div class="product-image">--}}
                    {{--<img src="https://s.cdpn.io/3/dingo-dog-bones.jpg" alt="" class="">--}}
                {{--</div>--}}
                {{--<div class="product-details">--}}
                    {{--<div class="product-title">--}}
                        {{--<p class=" ">--}}
                            {{--Product with Vat--}}
                        {{--</p>--}}
                    {{--</div>--}}
                    {{--<p class="product-description  ">--}}
                        {{--The best dog bones of all time. Holy crap. Your dog will be begging--}}
                        {{--for these things! I got curious once and ate one myself. I'm a fan.</p>--}}
                {{--</div>--}}
                {{--<div class="product-price  ">--}}
                    {{--100--}}
                {{--</div>--}}
                {{--<div class="product-discount  ">--}}
                    {{--0%--}}
                {{--</div>--}}
                {{--<div class="product-vat  ">--}}
                    {{--0--}}
                {{--</div>--}}
                {{--<div class="product-quantity">--}}
                    {{--<input type="number" value="1" min="1">--}}
                {{--</div>--}}

                {{--<div class="product-line-price">100</div>--}}
                {{--<div class="product-removal">--}}
                    {{--<button class=" ">--}}
                        {{--Remove--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="totals">--}}
                {{--<div class="col-md-6">--}}
                    {{--<div class="col-md-12">--}}

                    {{--</div>--}}
                    {{--<div class="col-md-12">--}}
                        {{--<div class="shipping-calc">--}}
                            {{--<div class="title">--}}
                                {{--Shipping Calculator--}}
                            {{--</div>--}}
                            {{--<div class="content">--}}

                            {{--</div>--}}

                        {{--</div>--}}

                    {{--</div>--}}

                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--<div class="totals-item">--}}
                        {{--<label>Subtotal</label>--}}
                        {{--<div class="totals-value" id="cart-subtotal">100.00</div>--}}
                    {{--</div>--}}
                    {{--<div class="totals-item">--}}
                        {{--<label>Tax (5%)</label>--}}
                        {{--<div class="totals-value" id="cart-tax">21.00</div>--}}
                    {{--</div>--}}
                    {{--<div class="totals-item">--}}
                        {{--<label>Voucher </label>--}}
                        {{--<div class="totals-value" id="cart-shipping">15.00</div>--}}
                    {{--</div>--}}
                    {{--<div class="totals-item">--}}
                        {{--<label>Discount</label>--}}
                        {{--<div class="totals-value" id="cart-shipping">10.00</div>--}}
                    {{--</div>--}}
                    {{--<div class="totals-item totals-item-total">--}}
                        {{--<label>Grand Total</label>--}}
                        {{--<div class="totals-value" id="cart-total">121.00</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<a href="http://forms.albumbugs.com/check-out" class="checkout  ">Checkout</a>--}}

        {{--</div>--}}

    </div>
</div>

{!! BBstyle($_this->path."/css/main.css") !!}
{!! BBstyle($_this->path."/css/custom.css") !!}

{!! BBstyle($_this->path."/css/text.css") !!}
{!! BBstyle($_this->path."/css/image.css") !!}
{!! BBstyle($_this->path."/css/button.css") !!}
{!! BBstyle($_this->path."/css/container.css") !!}


{!!  BBscript($_this->path.'/js/main.js') !!}