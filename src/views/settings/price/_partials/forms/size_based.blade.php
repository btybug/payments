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
                        {!! Form::number('min_length',0,['min'=>0]) !!}
                    </div>
                </div>
                <div class="col-md-8">
                    <label class="col-mg-4">maximum length</label>
                    <div class="col-md-8">
                        {!! Form::number('max_length',0,['min'=>0]) !!}
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
                        {!! Form::number('min_height',0,['min'=>0]) !!}
                    </div>
                </div>
                <div class="col-md-8">
                    <label class="col-mg-4">maximum height</label>
                    <div class="col-md-8">
                        {!! Form::number('max_height',0,['min'=>0]) !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(function () {
        var min_length = $('input[name=min_length]').val();
        $('input[name=length]').attr('min', min_length);

        var min_height = $('input[name=min_height]').val();
        $('input[name=height]').attr('min', min_height);

        var max_height = $('input[name=max_height]').val();
        $('input[name=height]').attr('max', max_height);

        var max_length = $('input[name=max_length]').val();
        $('input[name=length]').attr('max', max_length);


        $('input[name=min_height]').on('change', function () {
            min_height = $(this).val();
            if ($('input[name=height]').val() < min_height) {
                $('input[name=height]').val(min_height);
                $('input[name=height]').change();
            }
            ;
            if ($('input[name=max_height]').val() < min_height) {
                $('input[name=max_height]').val(min_height);
                $('input[name=max_height]').change();
            }
            ;
            $('input[name=height]').attr('min', min_height);
        });
        $('input[name=height]').on('keyup', function () {
            if ($(this).val() > max_height) {
                $(this).val(max_height);
            }
        });
        $('input[name=length]').on('keyup', function () {
            if ($(this).val() > max_length) {
                $(this).val(max_length);
            }
        });


        $('input[name=max_height]').on('change', function () {
            max_height = $(this).val();
            if ($('input[name=height]').val() > max_height) {
                $('input[name=height]').val(max_height);
                $('input[name=height]').change();
            }
            ;
            $('input[name=height]').attr('max', max_height);
        });
        $('input[name=max_length]').on('change', function () {
            max_length = $(this).val();
            if ($('input[name=length]').val() > max_length) {
                $('input[name=length]').val(max_length);
                $('input[name=length]').change();
            }
            ;
            $('input[name=length]').attr('max', max_length);
        });

        function heights(e) {

        }

        $('input[name=min_length]').on('change', function () {
            min_length = $(this).val();
            if ($('input[name=length]').val() < min_length) {
                $('input[name=length]').val(min_length);
                $('input[name=length]').change();
            }
            ;
            if ($('input[name=max_length]').val() < min_length) {
                $('input[name=max_length]').val(min_length);
                $('input[name=max_length]').change();
            }
            ;

            $('input[name=length]').attr('min', min_length);
        });
        $('input[name=max_length]').on('keyup', function () {
            if ($(this).val() < min_length) {
                $(this).val(min_length);
            }
        });
        $('input[name=max_height]').on('keyup', function () {
            if ($(this).val() < min_height) {
                $(this).val(min_height);
            }
        });
        $('input[name=length]').on('keyup', function () {
            if ($(this).val() < min_length) {
                $(this).val(min_length);
            }
            if ($(this).val() > max_length) {
                $(this).val(max_length);
            }
        });
        $('input[name=height]').on('keyup', function () {
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