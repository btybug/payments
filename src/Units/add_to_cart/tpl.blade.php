
<button class="btn select-plan add-to-cart" data-id="{!! is_object($data)?$data->id: issetReturn($data,'id',0) !!}">Add To Cart</button>
{{--{!! (isset($data['id'])) ? $data['id'] : NULL !!}--}}