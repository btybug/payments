@php
use BtyBugHook\Payments\Repository\TaxServiceRepository;
$taxRepo = new TaxServiceRepository();
$services = $taxRepo->getBy('amount_type','services');
@endphp

@if(count($services))
    <h3>Services</h3>
    @foreach($services as $service)
        <div class="checkbox">
            <label for="checkboxes-{!! $service->slug !!}">
                <input type="checkbox" name="{!! $service->slug !!}"
                       id="checkboxes-{!! $service->slug !!}" value="1">
                {!! $service->name !!}(+{!! $service->amount !!})
            </label>
        </div>
    @endforeach
@else
    <div>
        No Services
    </div>
@endif