<?php
$product = [];
if (isset($settings["blog"]) && !count($product)) {
    $table = $settings["blog"];
    $slug = implode("_", explode("-", $table));
    if (\Schema::hasTable($slug)) {
        $product = DB::table($slug)->select("*")->first();
        $product = collect($product)->toArray();
    }
}
?>
<section id="starter">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 block">
                <div class="block-black text-center">
                    <div class="title">
                        @if(isset($settings["option_1_item_value"]))
                            {{isset($product[$settings["option_1_item_value"]]) ?$product[$settings["option_1_item_value"]] : ''}}
                        @endif
                    </div>
                    <div class="header-content text-center">
                        @if(isset($settings["option_2_item_value"]))
                            {{isset($product[$settings["option_2_item_value"]]) ? $product[$settings["option_2_item_value"]] : ''}}
                        @endif
                    </div>

                    <div class="block-content">
                        @if(isset($settings["option_2_item_value"]))
                            {{isset($product[$settings["option_3_item_value"]]) ? $product[$settings["option_3_item_value"]] : ''}}
                        @endif
                    </div>
                    <div class="text-center">
                        @if(isset($settings['add_to_cart']))
                            {!! BBRenderUnits($settings['add_to_cart'],[],$product) !!}
                        @endif
                        <a href="#" class="btn select-plan">View Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{!! BBstyle($_this->path."/css/main1.css") !!}