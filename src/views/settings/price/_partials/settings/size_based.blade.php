{!! Form::open() !!}
<div class="row">
    <div class="col-md-6">
        <div class="col-md-5"><label class="col-md-4">Length</label>
            <div class="col-md-8">{!! Form::number('length',null,['class'=>'form-control base-size','min'=>0]) !!}</div>
        </div>
        <div class="col-md-2">X</div>
        <div class="col-md-5"><label class="col-md-4">Height</label>
            <div class="col-md-8">{!! Form::number('height',null,['class'=>'form-control base-size']) !!}</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-3"><label class="col-md-4">Total</label>
            <div class="col-md-8">{!! Form::text('total',null,['class'=>'form-control base-total','readonly'=>true]) !!}</div>
        </div>
    </div>
    <div>
        <div class="col-md-8">
            <label class="col-mg-8">Length</label>
            <div class="col-md-12">
                <div class="col-md-8">
                    <label class="col-mg-4">minimum length</label>
                    <div class="col-md-8">
                        {!! Form::number('min_length') !!}
                    </div>
                </div>
                <div class="col-md-8">
                    <label class="col-mg-4">maximum length</label>
                    <div class="col-md-8">
                        {!! Form::number('max_length') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <label class="col-mg-8">Height</label>
            <div class="col-md-12">
                <div class="col-md-8">
                    <label class="col-mg-4">minimum height</label>
                    <div class="col-md-8">
                        {!! Form::number('min_height') !!}
                    </div>
                </div>
                <div class="col-md-8">
                    <label class="col-mg-4">maximum height</label>
                    <div class="col-md-8">
                        {!! Form::number('max_height') !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
{!! Form::close() !!}
@push('javascript')
    <script>
        $(function () {
            var min_length = $('input[name=min_length]').val();
            $('input[name=length]').attr('min', min_length);

            var min_height = $('input[name=min_height]').val();
            $('input[name=height]').attr('min', min_height);

            $('input[name=min_height]').on('change', function () {
                var min_height = $(this).val();
                if ($('input[name=height]').val() < min_height) {
                    $('input[name=height]').val(min_height);
                    $('input[name=height]').change();
                };
                $('input[name=height]').attr('min', min_height);
            });

            $('input[name=min_length]').on('change', function () {
                var min_length = $(this).val();
                if ($('input[name=length]').val() < min_length) {
                    $('input[name=length]').val(min_length);
                    $('input[name=length]').change();
                }
                ;
                $('input[name=length]').attr('min', min_length);
            });
            $('.base-size').on('change', function () {
                var el1 = $('.base-size')[0];
                var el2 = $('.base-size')[1];
                var total = $(el1).val() * $(el2).val();
                $('.base-total').val(total)
            });
        });
    </script>
@endpush