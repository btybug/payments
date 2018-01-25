@php
use BtyBugHook\Payments\Repository\TaxServiceRepository;
$taxRepo = new TaxServiceRepository();
$taxes = $taxRepo->getBy('amount_type','vat');
@endphp

@if(count($taxes))
    <h3>Taxes</h3>
    @foreach($taxes as $tax)
        <div class="radio">
            <label for="radios-{{ $tax->slug }}">
                <input type="radio" name="tax"
                       id="radios-{!! $tax->slug !!}" value="{!!  $tax->amount !!}" >
                {!! $tax->name !!}({!! $tax->amount !!}%)
            </label>
        </div>
    @endforeach
@else
    <div>
        No Taxes
    </div>
@endif