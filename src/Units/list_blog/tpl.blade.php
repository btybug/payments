@php
    $blogRepository = new \BtyBugHook\Membership\Repository\BlogRepository();
    $blogs = $blogRepository->getActive();
@endphp
<div class="container">
    <div class="row">
        @if(count($blogs))
            @foreach($blogs as $blog)
                @php
                    $blog = collect($blog)->toArray();
                @endphp
                <div class="block-black text-center">
                    <div class="title">
                        @if(isset($settings["custom_1_item_value"]))
                            {{$blog[$settings["custom_1_item_value"]]}}
                        @endif
                    </div>
                    <div class="header-content text-center">
                        @if(isset($settings["custom_2_item_value"]))
                            {{$blog[$settings["custom_2_item_value"]]}}
                        @endif
                    </div>
                    <div class="block-content">
                        @if(isset($settings["custom_3_item_value"]))
                            {{$blog[$settings["custom_3_item_value"]]}}
                        @endif
                    </div>
                    <div class="text-center">
                        <a class="btn select-plan" href="{!! url($blog["slug"]) !!}">View Product <i class="fa fa-eye" aria-hidden="true"></i></a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
{!! BBstyle($_this->path."/css/main1.css") !!}