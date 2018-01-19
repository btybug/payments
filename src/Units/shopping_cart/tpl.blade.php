<div class="container">
    <div class="row">
        <h1>Shopping Cart</h1>

        <div class="shopping-cart">

            <div class="column-labels">
                <label class="product-image">Image</label>
                <label class="product-details">Product</label>
                <label class="product-price">Price</label>
                <label class="product-quantity">Quantity</label>
                <label class="product-removal">Remove</label>
                <label class="product-line-price">Total</label>
            </div>

            <div class="product">
                <div class="product-image">
                    <img src="https://s.cdpn.io/3/dingo-dog-bones.jpg" alt="" class="{{isset($settings['option_1_container_item_style']) ? $settings['option_1_container_item_style'] : ''}}">
                </div>
                <div class="product-details">
                    <div class="product-title">
                        <p class="{{isset($settings['option_2_container_item_style']) ? $settings['option_2_container_item_style'] : ''}} {{isset($settings['option_3_container_item_style']) ? $settings['option_3_container_item_style'] : ''}}">
                            Dingo Dog Bones
                        </p>
                    </div>
                    <p class="product-description {{isset($settings['option_4_container_item_style']) ? $settings['option_4_container_item_style'] : ''}} {{isset($settings['option_5_container_item_style']) ? $settings['option_5_container_item_style'] : ''}}">The best dog bones of all time. Holy crap. Your dog will be begging
                        for these things! I got curious once and ate one myself. I'm a fan.</p>
                </div>
                <div class="product-price {{isset($settings['option_6_container_item_style']) ? $settings['option_6_container_item_style'] : ''}} {{isset($settings['option_7_container_item_style']) ? $settings['option_7_container_item_style'] : ''}}">12.99</div>
                <div class="product-quantity">
                    <input type="number" value="2" min="1">
                </div>
                <div class="product-removal">
                    <button class="{{isset($settings['option_8_container_item_style']) ? $settings['option_8_container_item_style'] : ''}} {{isset($settings['option_9_container_item_style']) ? $settings['option_9_container_item_style'] : ''}}">
                        Remove
                    </button>
                </div>
                <div class="product-line-price">25.98</div>
            </div>

            <div class="product">
                <div class="product-image">
                    <img src="https://s.cdpn.io/3/large-NutroNaturalChoiceAdultLambMealandRiceDryDogFood.png" class="{{isset($settings['option_1_container_item_style']) ? $settings['option_1_container_item_style'] : ''}}">
                </div>
                <div class="product-details">
                    <div class="product-title">
                        <p class="{{isset($settings['option_2_container_item_style']) ? $settings['option_2_container_item_style'] : ''}} {{isset($settings['option_3_container_item_style']) ? $settings['option_3_container_item_style'] : ''}}">Nutro™ Adult Lamb and Rice Dog Food</p>
                    </div>
                    <p class="product-description {{isset($settings['option_4_container_item_style']) ? $settings['option_4_container_item_style'] : ''}} {{isset($settings['option_5_container_item_style']) ? $settings['option_5_container_item_style'] : ''}}">Who doesn't like lamb and rice? We've all hit the halal cart at 3am
                        while quasi-blackout after a night of binge drinking in Manhattan. Now it's your dog's turn!</p>
                </div>
                <div class="product-price {{isset($settings['option_6_container_item_style']) ? $settings['option_6_container_item_style'] : ''}} {{isset($settings['option_7_container_item_style']) ? $settings['option_7_container_item_style'] : ''}}">45.99</div>
                <div class="product-quantity">
                    <input type="number" value="1" min="1">
                </div>
                <div class="product-removal">
                    <button class="{{isset($settings['option_8_container_item_style']) ? $settings['option_8_container_item_style'] : ''}} {{isset($settings['option_9_container_item_style']) ? $settings['option_9_container_item_style'] : ''}}">
                        Remove
                    </button>
                </div>
                <div class="product-line-price">45.99</div>
            </div>

            <div class="totals">
                <div class="totals-item">
                    <label>Subtotal</label>
                    <div class="totals-value" id="cart-subtotal">71.97</div>
                </div>
                <div class="totals-item">
                    <label>Tax (5%)</label>
                    <div class="totals-value" id="cart-tax">3.60</div>
                </div>
                <div class="totals-item">
                    <label>Shipping</label>
                    <div class="totals-value" id="cart-shipping">15.00</div>
                </div>
                <div class="totals-item totals-item-total">
                    <label>Grand Total</label>
                    <div class="totals-value" id="cart-total">90.57</div>
                </div>
            </div>

            <button class="checkout {{isset($settings['option_10_container_item_style']) ? $settings['option_10_container_item_style'] : ''}} {{isset($settings['option_11_container_item_style']) ? $settings['option_11_container_item_style'] : ''}}">Checkout</button>

        </div>

    </div>
</div>

{!! BBstyle($_this->path."/css/main.css") !!}


{!! BBstyle($_this->path."/css/text.css") !!}
{!! BBstyle($_this->path."/css/image.css") !!}
{!! BBstyle($_this->path."/css/button.css") !!}


{!!  BBscript($_this->path.'/js/main.js') !!}