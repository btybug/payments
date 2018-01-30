@include($_this->slug.'::functions',compact('_this'))

<div class="container wrapper">
    <div class="row cart-body">
            {!! include_forms($settings,$_this) !!}
    </div>
</div>

{!! BBstyle($_this->path."/css/main.css") !!}