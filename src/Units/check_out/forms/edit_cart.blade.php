<div class="col-md-6">
    <!--REVIEW ORDER-->
    <div class="panel panel-info">
        <div class="panel-heading">
            Review Order
            <div class="pull-right">
                <small><a class="afix-1" href="#">Edit Cart</a></small>
            </div>
        </div>
        <div class="panel-body" style="COLOR: black;">

            @foreach($cart::content() as $item)
                <div class="form-group">
                    <div class="col-sm-3 col-xs-3">
                        <img class="img-responsive"
                             src="//c1.staticflickr.com/1/466/19681864394_c332ae87df_t.jpg"/>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <div class="col-xs-12"> {!! $item->name !!}</div>
                        <div class="col-xs-12">
                            <small>Quantity:<span>{!! $item->qty !!}</span></small>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-3 text-right">
                        <h6><span>$</span>  {!! $item->price !!}</h6>
                    </div>
                </div>
                <div class="form-group">
                    <hr/>
                </div>
            @endforeach

            <div class="form-group">
                <div class="col-xs-12">
                    <strong>Subtotal</strong>
                    <div class="pull-right"><span>$</span><span>{!! $cart::subtotal() !!}</span></div>
                </div>
            </div>
            <div class="form-group">
                <hr/>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <strong>Order Total</strong>
                    <div class="pull-right"><span>$</span><span>{!! $cart::total() !!}</span></div>
                </div>
            </div>
        </div>
    </div>
    <!--REVIEW ORDER END-->
</div>