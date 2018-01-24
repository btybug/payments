@php
  //  $postRepo = new \BtyBugHook\Blog\Repository\PostsRepository();
   // $posts = $postRepo->paginationSettings($settings);
   // $all_posts = json_encode($postRepo->getPublished());
   // $page = \Btybug\btybug\Services\RenderService::getFrontPageByURL();

    $col_md_x = "col-md-4";
    if (isset($settings["custom_list"]) && !isset($settings["custom_grid"])){
        $col_md_x = "col-md-12";
    }

$product = [];
if(isset($settings["blog"]) && !count($product)){
    $table = $settings["blog"];
    $slug = implode("_",explode("-",$table));
    $product = DB::table($slug)->select("*")->first();
    $product = collect($product)->toArray();
}

$all_posts = json_encode($product);
@endphp

<section id="blog-section">
    <form class="navbar-form text-center search-form" id="custom_form_search" role="search">
    <input type="hidden" name="settings_for_ajax" value="{{serialize($settings)}}">
    <nav class="navbar bty-navbar-blog">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        @if(isset($settings["custom_sort"]))
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">Sort<span class="caret"></span></a>

                            @if(isset($settings["custom_sort_by"]))
                                <ul class="dropdown-menu" role="menu">
                                    @foreach($settings["custom_sort_by"] as $key => $sort_by)
                                        <li>
                                            <a href="#" class="custom_a_for_click_sort" data-by="{{$sort_by['by']}}" data-how="{{$sort_by['how']}}">
                                                {{ $sort_by["fail_name"] ? $sort_by["fail_name"] : $sort_by["by"] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                        @endif
                    </li>
                    @if(isset($settings["custom_list"]))
                        <li>
                            <input name="radionav" type="radio" class="bty-navradio nv-1 custom_grid_change" value="list"
                                   id="bty-navradio-1" {{ !isset($settings["custom_grid"]) ? "checked" : ""}}>
                            <label for="bty-navradio-1">
                                <i class="fa {{isset($settings['custom_list_icon']) ? $settings['custom_list_icon'] : 'fa-th-list'}}" aria-hidden="true"></i>
                            </label>
                        </li>
                    @endif
                    @if(isset($settings["custom_grid"]))
                        <li>
                            <input name="radionav" type="radio" class="bty-navradio nv-2 custom_grid_change" value="grid"
                                   id="bty-navradio-2" checked>
                            <label for="bty-navradio-2">
                                <i class="fa {{isset($settings['custom_grid_icon']) ? $settings['custom_grid_icon'] : 'fa-th'}}" aria-hidden="true"></i>
                            </label>
                        </li>
                    @endif
                </ul>
                @if(isset($settings["custom_search"]))
                    <div class="col-md-offset-3 col-md-6 search-head">
                    <input type="search" name="term" class="form-control" placeholder="Search"/>
                    </div>
                    <input type="hidden" name="search_by" value="{{isset($settings['custom_search_by']) ? json_encode($settings['custom_search_by']) : ''}}"/>
                @endif
                <input type="hidden" name="settings_for_ajax_search" value="{{serialize($settings)}}">
                <input type="hidden" name="all_posts" value="{{$all_posts}}">
                <input type="hidden" name="limit_per_page_for_ajax" value="{{isset($settings["custom_limit_per_page"]) ? $settings["custom_limit_per_page"] : "" }}">
                <input type="hidden" name="custom_get_col" value="{{(isset($settings["custom_list"]) && !isset($settings["custom_grid"])) ? 'col-md-12' : 'col-md-4'}}">
            </div>
        </div>
    </nav>
    </form>
    <div class="custom_append_post">
        <div class="bty-all-blog">
            <input type="hidden" class="custom_get_bootstrap_col" value="{{$col_md_x}}">
            <div class="container">
                <div class="row">
                    @if(count($product))
                        <section id="starter">
                            <div class="container">
                                <div class="row">
                                    <div class="block {{$col_md_x}} ">
                                        <div class="block-black text-center">
                                            <div class="title">
                                                @if(isset($settings["option_1_item_value"]))
                                                    @if($settings["option_1_item_value"] == "image")
                                                        <img src="{{$product[$settings["option_1_item_value"]]}}" alt="">
                                                    @else
                                                        {{$product[$settings["option_1_item_value"]]}}
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="header-content text-center">
                                                @if(isset($settings["option_2_item_value"]))
                                                    @if($settings["option_2_item_value"] == "image")
                                                        <img src="{{$product[$settings["option_2_item_value"]]}}" alt="">
                                                    @else
                                                        {{$product[$settings["option_2_item_value"]]}}
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="block-content">
                                                @if(isset($settings["option_3_item_value"]))
                                                    @if($settings["option_3_item_value"] == "image")
                                                        <img src="{{$product[$settings["option_3_item_value"]]}}" alt="">
                                                    @else
                                                        {{$product[$settings["option_3_item_value"]]}}
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="text-center">
                                                <button class="btn select-plan add-to-cart" data-id="{{count($product) ? $product['id'] : ''}}">Add To Cart</button>
                                                <a href="#" class="btn select-plan">View Product</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>
{!! BBstyle($_this->path."/css/main.css") !!}
{!! BBstyle($_this->path."/css/main1.css") !!}
{!!  BBscript($_this->path.'/js/main.js') !!}