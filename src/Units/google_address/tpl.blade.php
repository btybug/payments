<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<style>
    #locationField, #controls {
        position: relative;
        width: 480px;
    }
    #autocomplete {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 99%;
    }
    .label {
        text-align: right;
        font-weight: bold;
        width: 100px;
        color: #303030;
    }
    #address {
        border: 1px solid #000090;
        background-color: #f0f0ff;
        width: 480px;
        padding-right: 2px;
    }
    #address td {
        font-size: 10pt;
    }
    .field {
        width: 99%;
    }
    .slimField {
        width: 80px;
    }
    .wideField {
        width: 200px;
    }
    #locationField {
        height: 20px;
        margin-bottom: 2px;
    }
    .custom_hide{
        display:none;
    }
</style>

<div>
    <h2>My addresses</h2>
    <div>
        <?php
        $addresses = json_decode(auth()->user()->shipping_address,true);
        ?>
        @if(count($addresses))
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tbody>
                    @foreach($addresses as $key => $address)
                        <tr>
                            <td class="text-left">
                                {{isset($address['general']) ? $address['general'] : ''}}<br>
                                {{isset($address['street_address']) ? $address['street_address'] : ''}}<br>
                                {{isset($address['street_name']) ? $address['street_name'] : ''}}<br>
                                {{isset($address['city']) ? $address['city'] : ''}}<br>
                                {{isset($address['state']) ? $address['state'] : ''}}<br>
                                {{isset($address['zip_code']) ? $address['zip_code'] : ''}}<br>
                                {{isset($address['country']) ? $address['country'] : ''}}<br>
                            </td>
                            <td class="text-right">
                                <button type="button" class="btn btn-info edit_address" data-url="{{route('edit_shipping_address',$key)}}" data-key="{{$key}}">Edit</button>
                                &nbsp; <a href="{{route('remove_shipping_address',$key)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <button class="btn btn-primary custom_add_new_address pull-right">Add new</button>
    </div>
</div>



<div class="main_lay_cont custom_hide">
    {!! Form::open(['url'=>route('edit_shipping_address_save',isset($key) ? $key : 0),'class'=>'form-horizontal remove_values']) !!}
        <div class="form-group">
            <label for="general">General</label>
            {!! Form::text('general',null,["id" => "general","class"=>"form-control"]) !!}
        </div>
        <div class="form-group">
            <label for="street_address">Street address</label>
            {!! Form::text('street_address',null,["id" => "street_address","class"=>"form-control"]) !!}
        </div>
        <div class="form-group">
            <label for="street_name">Street name</label>
            {!! Form::text('street_name',null,["id" => "street_name","class"=>"form-control"]) !!}
        </div>
        <div class="form-group">
            <label for="city">City</label>
            {!! Form::text('city',null,["id" => "city","class"=>"form-control"]) !!}
        </div>
        <div class="form-group">
            <label for="state">State</label>
            {!! Form::text('state',null,["id" => "state","class"=>"form-control"]) !!}
        </div>
        <div class="form-group">
            <label for="zip_code">Zip code</label>
            {!! Form::text('zip_code',null,["id" => "zip_code","class"=>"form-control"]) !!}
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            {!! Form::text('country',null,["id" => "country","class"=>"form-control"]) !!}
        </div>
        <div class="form-group">
            <button class="btn btn-primary pull-right">Save</button>
        </div>
    {!! Form::close() !!}
</div>




<div class="custom_for_google custom_hide">
    {!! Form::open(['url'=>route('save_shipping_address')]) !!}

    <div id="locationField">
        <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text" name="general">
    </div>
    <table id="address">
        <tr>
            <td class="label">Street address</td>
            <td class="slimField">
                <input class="field" id="street_number" disabled="true" name="street_number">
            </td>
            <td class="wideField" colspan="2">
                <input class="field" id="route" disabled="true" name="street_address">
            </td>
        </tr>
        <tr>
            <td class="label">City</td>
            <td class="wideField" colspan="3">
                <input class="field" id="locality" disabled="true" name="city">
            </td>
        </tr>
        <tr>
            <td class="label">State</td>
            <td class="slimField">
                <input class="field" id="administrative_area_level_1" disabled="true" name="state">
            </td>
            <td class="label">Zip code</td>
            <td class="wideField">
                <input class="field" id="postal_code" disabled="true" name="zip_code">
            </td>
        </tr>
        <tr>
            <td class="label">Country</td>
            <td class="wideField" colspan="3">
                <input class="field" id="country" disabled="true" name="country">
            </td>
        </tr>
    </table>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
    {!! Form::close() !!}
</div>

<script>
    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
</script>

<script>
    window.onload = function (){
        $("body").delegate(".edit_address","click",function(){
            var token = $("input[name=_token]").val();
            var url = $(this).data("url");
            var key = $(this).data('key');

            var full_url = window.location.origin + '/admin/payments/user-payments/edit/save/'+key;
            $("form.remove_values input").not("input[name='_token']").val("");
            $("form.remove_values").attr("action",full_url);

            $.ajax({
                type:'post',
                url:url,
                data:{_token:token},
                success:function(data){
                    var key = data.key;
                    var arr = data.data;
                    $("#general").val(arr.general);
                    $("#street_number").val(arr.street_number);
                    $("#route").val(arr.street_address);
                    $("#city").val(arr.city);
                    $("#state").val(arr.state);
                    $("#zip_code").val(arr.zip_code);
                    $("#country").val(arr.country);

                    $(".custom_for_google").addClass("custom_hide");
                    $(".main_lay_cont").removeClass("custom_hide");
                }
            });
        });
        $("body").delegate(".custom_add_new_address","click",function(){
            $(".main_lay_cont").addClass("custom_hide");
            $(".custom_for_google").removeClass("custom_hide");
        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBP5WutMrM_j9ubit8CT9xocuxTvULEXSI&libraries=places&callback=initAutocomplete" async defer></script>
{!! BBstyle($_this->path."/css/main.css") !!}