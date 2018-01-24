<div class="row">

    <!-- Form Name -->
    <legend>Form Name</legend>

    <!-- Multiple Checkboxes -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="checkboxes">Allow Guest Check Out</label>
        <div class="col-md-4">
            <div class="checkbox">
                <label for="allow_guest">
                    <input type="checkbox" name="allow_guest" id="allow_guest" value="1">
                    Allow
                </label>
            </div>
        </div>
    </div>
    <!-- Form Name -->
    <legend>Available Forms</legend>

    <!-- Multiple Checkboxes -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="checkboxes">Include Forms</label>
        <div class="col-md-4">
            <div class="checkbox">
                <label for="invoice_address">
                    <input type="checkbox" name="forms[]" id="invoice_address"
                           checked="{!! isset($settings['forms']['invoice_address']) !!}" value="invoice_address">
                    invoice address
                </label>
            </div>
            <div class="checkbox">
                <label for="edit_cart">
                    <input type="checkbox" name="forms[]" id="edit_cart"
                           checked="{!! isset($settings['forms']['edit_cart']) !!}" value="edit_cart">
                    edit cart
                </label>
            </div>
            <div class="checkbox">
                <label for="shipping_address">
                    <input type="checkbox" name="forms[]" id="shipping_address"
                           checked="{!! isset($settings['forms']['shipping_address']) !!}" value="shipping_address">
                    shipping address
                </label>
            </div>
        </div>
    </div>

</div>