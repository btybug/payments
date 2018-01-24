@include($_this->slug.'::functions',compact('_this'))

<div class="container wrapper">
    <div class="row cart-head">
        <div class="container">
            <div class="row">
                <p></p>
            </div>
            <div class="row">
                <p></p>
            </div>
        </div>
    </div>
    @if(show_content($settings))
        <div class="row cart-body">
            <form class="form-horizontal" method="post" action="">
                {!! include_forms($settings,$_this) !!}
            </form>
        </div>
    @else
        <a class="" href="{!! url('login') !!}">Please Login For Check Out</a>
    @endif
</div>

{!! BBstyle($_this->path."/css/main.css") !!}