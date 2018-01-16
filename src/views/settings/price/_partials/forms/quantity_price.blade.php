@php
    $data = get_qty_data();
@endphp

@if(isset($data['qty_option']))
<div class="col-md-12">
    @if($data['qty_option'] == 'select')
        <select name="price" class="form-control">
            <option value="">Select</option>
            @if(isset($data['qty']) && count($data['qty']))
                @foreach($data['qty'] as $key => $val)
                    <option value="{{ $val['qty'] }}">{{ $val['qty'] }}</option>
                @endforeach
            @endif
        </select>
    @elseif($data['qty_option'] == 'radio')
        @if(isset($data['qty']) && count($data['qty']))
            @foreach($data['qty'] as $key => $val)
                <input type="radio" name="price" value="{{ $val['qty'] }}">{{ $val['qty'] }}
            @endforeach
        @endif
    @endif
</div>
@else
    <a href="{!! url(route('payments_settings_price_form','quantity_price')) !!}"> configure settings </a>
@endif

