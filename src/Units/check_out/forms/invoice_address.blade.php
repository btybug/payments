<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <!--SHIPPING METHOD-->
    <div class="panel panel-info">
        <div class="panel-heading">Invoice Address</div>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-md-12">
                    <h4>Invoice Address</h4>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12"><strong>Country:</strong></div>
                <div class="col-md-12">
                    {{ $user->country }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-xs-12">
                    <strong>First Name:</strong>
                    {{ $user->f_name }}
                </div>
                <div class="span1"></div>
                <div class="col-md-6 col-xs-12">
                    <strong>Last Name:</strong>
                    {{ $user->l_name }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12"><strong>Address:</strong></div>
                <div class="col-md-12">
                    {{ $user->address }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12"><strong>City:</strong></div>
                <div class="col-md-12">
                    {{ $user->city }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12"><strong>State:</strong></div>
                <div class="col-md-12">
                    {{ $user->state }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                <div class="col-md-12">
                    {{ $user->post_code }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12"><strong>Phone Number:</strong></div>
                <div class="col-md-12">
                    {{ $user->phone_number }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12"><strong>Email Address:</strong></div>
                <div class="col-md-12">{{ $user->email }}</div>
            </div>
        </div>
    </div>


</div>