{!! Form::open() !!}
<div class="row">
    <div class="col-md-6">
        <div class="col-md-5"><label class="col-md-4">Length</label>
            <div class="col-md-8">{!! Form::number('length',null,['class'=>'form-control']) !!}</div>
        </div>
        <div class="col-md-2">X</div>
        <div class="col-md-5"><label class="col-md-4">Height</label>
            <div class="col-md-8">{!! Form::number('height',null,['class'=>'form-control']) !!}</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-3"><label class="col-md-4">Total</label>
            <div class="col-md-8">{!! Form::number('total',null,['class'=>'form-control']) !!}</div>
        </div>
    </div>
    <div>
        <div class="col-md-8">
            <label class="col-mg-8">Length</label>
            <div class="col-md-12">
                <div class="col-md-8">
                    <label class="col-mg-4">minimum length</label>
                    <div class="col-md-8">
                        {!! Form::number('max_length') !!}
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
                        {!! Form::number('max_height') !!}
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