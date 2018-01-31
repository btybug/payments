<form action="{!! url('/admin/payments/test-call-back') !!}" method="GET">
    <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_zr3Wfst8jb4GrKU8BcLEUkh9"
            data-amount="999"
            data-name="Demo Site"
            data-description="Widget"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto">
    </script>
</form>