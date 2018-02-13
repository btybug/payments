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
                    <div class="block-bottom text-center">
                        @if(isset($settings['add_to_cart']))
                            {!! BBRenderUnits($settings['add_to_cart'],[],$product) !!}
                        @endif
                        <a href="#" class="btn select-plan">View Product</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 block">
                <div class="block-black text-center">
                    <div class="title">
                        @if(isset($settings["option_1_item_value"]))
                            {{isset($product[$settings["option_1_item_value"]]) ?$product[$settings["option_1_item_value"]] : ''}}
                        @endif
                    </div>
                    <div class="header-content text-center">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aspernatur beatae delectus ea
                        eaque eius illum laboriosam necessitatibus similique voluptate? Dignissimos nisi tenetur
                        voluptatum! Aliquid perspiciatis quaerat recusandae soluta tempore? Lorem ipsum dolor sit
                        amet, consectetur adipisicing elit. Cumque dolor est facilis illo ipsum libero mollitia
                        neque possimus quibusdam, repellat sed tenetur velit. Ad maiores quaerat quidem repellat
                        soluta, tenetur!
                        lum laboriosam necessitatibus similique voluptate? Dignissimos nisi tenetur voluptatum!
                        Aliquid perspiciatis quaerat recusandae soluta tempore? Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit. Cumque dolor est facilis illo ipsum libero mollitia neque
                        possimus quibusdam, repellat sed tenetur velit. Ad maiores quaerat quidem repellat soluta,
                        tenetur!
                    </div>

                    <div class="block-content">
                        @if(isset($settings["option_2_item_value"]))
                            {{isset($product[$settings["option_3_item_value"]]) ? $product[$settings["option_3_item_value"]] : ''}}
                        @endif
                    </div>
                    <div class="block-bottom text-center">
                        @if(isset($settings['add_to_cart']))
                            {!! BBRenderUnits($settings['add_to_cart'],[],$product) !!}
                        @endif
                        <a href="#" class="btn select-plan">View Product</a>
                    </div>
                </div>
            </div>
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
                    <div class="block-bottom text-center">
                        @if(isset($settings['add_to_cart']))
                            {!! BBRenderUnits($settings['add_to_cart'],[],$product) !!}
                        @endif
                        <a href="#" class="btn select-plan">View Product</a>
                    </div>
                </div>
            </div>
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
                    <div class="block-bottom text-center">
                        @if(isset($settings['add_to_cart']))
                            {!! BBRenderUnits($settings['add_to_cart'],[],$product) !!}
                        @endif
                        <a href="#" class="btn select-plan">View Product</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 block">
                <div class="block-black text-center">
                    <div class="title">
                        @if(isset($settings["option_1_item_value"]))
                            {{isset($product[$settings["option_1_item_value"]]) ?$product[$settings["option_1_item_value"]] : ''}}
                        @endif
                    </div>
                    <div class="header-content text-center">
                        <div class="col-md-5">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci doloremque fuga
                            laudantium, magni nesciunt numquam placeat possimus quo rerum voluptates. Blanditiis,
                            dolorum, maxime? Culpa, dolores, laudantium. Cum et nisi perspiciatis.
                        </div>
                    </div>

                    <div class="block-content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur fuga inventore ipsum
                        itaque molestiae quod sed tempore. Eos facilis fugit officia porro praesentium quam unde velit
                        voluptatibus? Enim, reiciendis!
                    </div>
                    <div class="block-bottom text-center">
                        @if(isset($settings['add_to_cart']))
                            {!! BBRenderUnits($settings['add_to_cart'],[],$product) !!}
                        @endif
                        <a href="#" class="btn select-plan">View Product</a>
                    </div>
                </div>
            </div>
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
                    <div class="block-bottom text-center">
                        @if(isset($settings['add_to_cart']))
                            {!! BBRenderUnits($settings['add_to_cart'],[],$product) !!}
                        @endif
                        <a href="#" class="btn select-plan">View Product</a>
                    </div>
                </div>
            </div>
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
                    <div class="block-bottom text-center">
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