<form action="{!! route('order_stripe') !!}" method="GET">
    <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{!! Config::get('services.stripe.key') !!}"
            data-amount="999"
            data-name="Demo Site"
            data-description="Widget"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto">
    </script>
</form>