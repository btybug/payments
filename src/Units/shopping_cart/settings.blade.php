<?php
$postRepo = new \BtyBugHook\Blog\Repository\PostsRepository();
$post = $postRepo->first()->toArray();
$text_styles = \App\Http\Controllers\PhpJsonParser::getClasses(base_path('public/dinamiccss/text.css'));
$image_styles = \App\Http\Controllers\PhpJsonParser::getClasses(base_path('public/dinamiccss/image.css'));
$button_styles = \App\Http\Controllers\PhpJsonParser::getClasses(base_path('public/dinamiccss/button.css'));
$container_styles = \App\Http\Controllers\PhpJsonParser::getClasses(base_path('public/dinamiccss/container.css'));
?>
<div class="row">
    <div class="col-xs-12 ">
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#general1"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Image</span>
                </a>
            </div>
            <div id="general1" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Image container class</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_1_container_item_style" class="form-control">
                                <option value="">select option</option>
                                {!! $image_styles !!}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#general2"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Title</span>
                </a>
            </div>
            <div id="general2" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Title container class</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_2_container_item_style" class="form-control">
                                <option value="">select option</option>
                                {!! $container_styles !!}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Text class</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_3_container_item_style" class="form-control">
                                <option value="">select option</option>
                                {!! $text_styles !!}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#general1"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Description</span>
                </a>
            </div>
            <div id="general1" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Description container class</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_4_container_item_style" class="form-control">
                                <option value="">select option</option>
                                {!! $container_styles !!}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Text class</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_5_container_item_style" class="form-control">
                                <option value="">select option</option>
                                {!! $text_styles !!}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#general1"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Price</span>
                </a>
            </div>
            <div id="general1" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Price container class</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_6_container_item_style" class="form-control">
                                <option value="">select option</option>
                                {!! $container_styles !!}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Text class</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_7_container_item_style" class="form-control">
                                <option value="">select option</option>
                                {!! $text_styles !!}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#general1"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Remove button</span>
                </a>
            </div>
            <div id="general1" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Remove button container class</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_8_container_item_style" class="form-control">
                                <option value="">select option</option>
                                {!! $button_styles !!}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Remove button text class</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_9_container_item_style" class="form-control">
                                <option value="">select option</option>
                                {!! $text_styles !!}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#general1"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Checkout button</span>
                </a>
            </div>
            <div id="general1" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Checkout button container class</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_10_container_item_style" class="form-control">
                                <option value="">select option</option>
                                {!! $button_styles !!}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Checkout button text class</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_11_container_item_style" class="form-control">
                                <option value="">select option</option>
                                {!! $text_styles !!}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsepymshipping"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Shipping Calculator</span>
                </a>
            </div>
            <div id="collapsepymshipping" class="collapse in" aria-expanded="true" style="">
                <div class="content">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Shipping calc</label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group my_rows1">
                                <div class="col-sm-8">
                                    {!! BBbutton2('unit',"pym_shipping","pym_shipping","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
{!!  BBstyle($_this->path.'/css/settings.css') !!}
{!!  BBstyle($_this->path.'/css/custom.css') !!}

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

{!!  BBscript($_this->path.'/js/custom.js') !!}
