<?php

if (isset($settings_for_ajax)) {
    $settings = $settings_for_ajax;
}

$col_md_x = "col-md-4";
if (isset($settings["custom_list"]) && ! isset($settings["custom_grid"])) {
    $col_md_x = "col-md-12";
}
?>

<div class="bty-all-blog">
    <input type="hidden" class="custom_get_bootstrap_col" value="{{$col_md_x}}">
    <div class="container">
        <div class="row">
            @if(count($posts))
                <section id="starter">
                    <div class="container">
                        <div class="row custom_append_post_to_ul">
                            @foreach($posts as $product)
                                @php
                                    $product = collect($product)->toArray();
                                    $settings['product'] = $product;
                                @endphp

                                @if(isset($settings["unit_for_post"]))
                                    <div class="block {{$col_md_x}} custom_class_for_change_col">
                                        {!! BBRenderUnits($settings["unit_for_post"],$settings) !!}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
            <div class="clearfix"></div>
            @if(isset($settings["custom_pagination"]))
                @if($settings["custom_pagination"] === "php")
                    <?php
                    $limit_page = 10;
                    if (isset($settings["custom_limit_per_page"])) {
                        $limit_page = $settings["custom_limit_per_page"];
                    }
                    ?>
                    <div class="custom_pagination">
                        @if(count($posts) >= $limit_page)
                            {!! $posts->links() !!}
                        @endif
                    </div>
                @elseif($settings["custom_pagination"] === "scroll")
                    <div class="ajax-load text-center" style="display:none">
                        <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
                    </div>
                    <input type="hidden" id="custom_limit_per_page_for_ajax"
                           value="{{isset($settings["custom_limit_per_page"]) ? $settings["custom_limit_per_page"] : "" }}">
                @else
                    <div class="text-center blog-load-more">
                        <button class="custom_load_more">Load More</button>
                    </div>
                    <div class="ajax-load-button text-center" style="display:none">
                        <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
                    </div>
                    <input type="hidden" id="custom_limit_per_page_for_ajax"
                           value="{{isset($settings["custom_limit_per_page"]) ? $settings["custom_limit_per_page"] : "" }}">
                @endif
            @endif
        </div>
    </div>
</div>