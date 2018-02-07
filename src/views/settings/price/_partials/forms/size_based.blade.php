@php
    $slug = str_replace('-', '_', \Request::route("slug"))
@endphp
<div class="row">
    <div class="col-md-6">
        <div class="col-md-5"><label class="col-md-4">Length</label>
            <div class="col-md-8">{!! Form::number($slug.'_price[length]',null,['class'=>'form-control base-size length','min'=>0]) !!}</div>
        </div>
        <div class="col-md-2">X</div>
        <div class="col-md-5"><label class="col-md-4">Height</label>
            <div class="col-md-8">{!! Form::number($slug.'_price[height]',null,['class'=>'form-control base-size height']) !!}</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-3"><label class="col-md-4">Total</label>
            <div class="col-md-8">{!! Form::text($slug.'_price[total]',null,['class'=>'form-control base-total','readonly'=>true]) !!}</div>
        </div>
    </div>
    <div>
        <div class="col-md-8">
            <label class="col-mg-8">Length</label>
            <div class="col-md-12">
                <div class="col-md-8">
                    <label class="col-mg-4">minimum length</label>
                    <div class="col-md-8">
                        {!! Form::number($slug.'_price[min_length]',0,['min'=>0,'class' => 'min_length']) !!}
                    </div>
                </div>
                <div class="col-md-8">
                    <label class="col-mg-4">maximum length</label>
                    <div class="col-md-8">
                        {!! Form::number($slug.'_price[max_length]',0,['min'=>0,'class' => 'max_length']) !!}
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
                        {!! Form::number($slug.'_price[min_height]',0,['min'=>0,'class' => 'min_height']) !!}
                    </div>
                </div>
                <div class="col-md-8">
                    <label class="col-mg-4">maximum height</label>
                    <div class="col-md-8">
                        {!! Form::number($slug.'_price[max_height]',0,['min'=>0,'class' => 'max_height']) !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(function () {
        var min_length = $('.min_length').val();
        $('.length').attr('min', min_length);

        var min_height = $('.min_height').val();
        $('.height').attr('min', min_height);

        var max_height = $('.max_height').val();
        $('.height').attr('max', max_height);

        var max_length = $('.max_length').val();
        $('.length').attr('max', max_length);


        $('.min_height').on('change', function () {
            min_height = $(this).val();
            if ($('.height').val() < min_height) {
                $('.height').val(min_height);
                $('.height').change();
            }
            ;
            if ($('.max_height').val() < min_height) {
                $('.max_height').val(min_height);
                $('.max_height').change();
            }
            ;
            $('.height').attr('min', min_height);
        });
        $('.height').on('keyup', function () {
            if ($(this).val() > max_height) {
                $(this).val(max_height);
            }
        });
        $('.length').on('keyup', function () {
            if ($(this).val() > max_length) {
                $(this).val(max_length);
            }
        });


        $('.max_height').on('change', function () {
            max_height = $(this).val();
            if ($('.height').val() > max_height) {
                $('.height').val(max_height);
                $('.height').change();
            }

            $('.height').attr('max', max_height);
        });
        $('.max_length').on('change', function () {
            max_length = $(this).val();
            if ($('.length').val() > max_length) {
                $('.length').val(max_length);
                $('.length').change();
            }
            ;
            $('.length').attr('max', max_length);
        });

        function heights(e) {

        }

        $('.min_length').on('change', function () {
            min_length = $(this).val();
            if ($('.length').val() < min_length) {
                $('.length').val(min_length);
                $('.length').change();
            }
            ;
            if ($('.max_length').val() < min_length) {
                $('.max_length').val(min_length);
                $('.max_length').change();
            }
            ;

            $('.length').attr('min', min_length);
        });
        $('.max_length').on('keyup', function () {
            if ($(this).val() < min_length) {
                $(this).val(min_length);
            }
        });
        $('.max_height').on('keyup', function () {
            if ($(this).val() < min_height) {
                $(this).val(min_height);
            }
        });
        $('.length').on('keyup', function () {
            if ($(this).val() < min_length) {
                $(this).val(min_length);
            }
            if ($(this).val() > max_length) {
                $(this).val(max_length);
            }
        });
        $('.height').on('keyup', function () {
            if ($(this).val() < min_height) {
                $(this).val(min_height);
            }
            if ($(this).val() > max_height) {
                $(this).val(max_height);
            }
        });
        $('.base-size').on('change', function () {
            var el1 = $('.base-size')[0];
            var el2 = $('.base-size')[1];
            var total = $(el1).val() * $(el2).val();
            $('.base-total').val(total)
        });
    });
</script>