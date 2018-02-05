@php
    $col_md_x = "col-md-4";
    if (isset($settings["custom_list"]) && !isset($settings["custom_grid"])){
        $col_md_x = "col-md-12";
    }
    $posts = [];
    if(isset($settings["blog"])){
        $table = $settings["blog"];
        $slug = str_replace('-',"_",$table);
        $posts = DB::table($slug)->select("*")->get();
    }

    $all_posts = json_encode($posts);
    $limit_per_page = isset($settings["custom_limit_per_page"]) ? $settings["custom_limit_per_page"] : 10;
    $posts = new \Btybug\btybug\Models\Universal\Paginator($limit_per_page,6,'bty-pagination-2',$posts);
@endphp

<section id="blog-section">
    <form class="navbar-form text-center search-form" id="custom_form_search" role="search">
        <input type="hidden" name="settings_for_ajax" value="{{json_encode($settings,true)}}">
        <input type="hidden" name="table" value="{{isset($settings['blog']) ? $settings['blog'] : ''}}">
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
                                                <a href="#" class="custom_a_for_click_sort" data-by="{{$sort_by['by']}}"
                                                   data-how="{{$sort_by['how']}}">
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
                                <input name="radionav" type="radio" class="bty-navradio nv-1 custom_grid_change"
                                       value="list"
                                       id="bty-navradio-1" {{ !isset($settings["custom_grid"]) ? "checked" : ""}}>
                                <label for="bty-navradio-1">
                                    <i class="fa {{isset($settings['custom_list_icon']) ? $settings['custom_list_icon'] : 'fa-th-list'}}"
                                       aria-hidden="true"></i>
                                </label>
                            </li>
                        @endif
                        @if(isset($settings["custom_grid"]))
                            <li>
                                <input name="radionav" type="radio" class="bty-navradio nv-2 custom_grid_change"
                                       value="grid"
                                       id="bty-navradio-2" checked>
                                <label for="bty-navradio-2">
                                    <i class="fa {{isset($settings['custom_grid_icon']) ? $settings['custom_grid_icon'] : 'fa-th'}}"
                                       aria-hidden="true"></i>
                                </label>
                            </li>
                        @endif
                    </ul>
                    @if(isset($settings["custom_search"]))
                        <div class="col-md-offset-3 col-md-6 search-head">
                            <input type="search" name="term" class="form-control" placeholder="Search"/>
                        </div>
                        <input type="hidden" name="search_by"
                               value="{{isset($settings['custom_search_by']) ? json_encode($settings['custom_search_by']) : ''}}"/>
                    @endif
                    <input type="hidden" name="all_posts" value="{{$all_posts}}">
                    <input type="hidden" name="limit_per_page_for_ajax"
                           value="{{isset($settings["custom_limit_per_page"]) ? $settings["custom_limit_per_page"] : "" }}">
                    <input type="hidden" name="custom_get_col"
                           value="{{(isset($settings["custom_list"]) && !isset($settings["custom_grid"])) ? 'col-md-12' : 'col-md-4'}}">
                </div>
            </div>
        </nav>
    </form>
    <div class="custom_append_post">
        @include('payments::_partial.render-for-post')
    </div>
</section>
{!! BBstyle($_this->path."/css/main.css") !!}
{!! BBstyle($_this->path."/css/main1.css") !!}
{!!  BBscript($_this->path.'/js/main.js') !!}