@php
$col = posts_url_manager();
$data = get_all_blog_posts();
@endphp
@if((!isset($settings['grid_system']) || $settings['grid_system']!=2 ) || (isset($settings['grid_system']) && $settings['grid_system']==1 ))
    <section id="starter">
    <div class="container">
        <div class="row">
            @foreach($data as $plan)
            <div class="col-sm-4 block">
                <div class="block-black text-center">
                    <div class="title">
                        {!! $plan->title !!}
                    </div>
                    <div class="header-content text-center">
                        <b>
                            {{--{!! $plan->amount.' '.$plan->currency !!}--}}
                        </b><br>
                        <small>
                            {{--{!! $plan->interval.'ly' !!}--}}
                        </small>
                    </div>
                    <div class="block-content">
                        {!! $plan->description !!}
                    </div>
                    <div class="text-center">
                        <button class="btn select-plan add-to-cart" data-id="{!! $plan->id !!}">Add To Cart</button>
                        <a href="{!! url(get_blog_slug_in_page(),$plan->$col) !!}" class="btn select-plan">View Product</a>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>
</section>

{!! BBstyle($_this->path."/css/main1.css") !!}
@endif