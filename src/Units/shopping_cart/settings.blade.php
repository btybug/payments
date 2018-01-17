<?php
$postRepo = new \BtyBugHook\Blog\Repository\PostsRepository();
$post = $postRepo->first()->toArray();
?>
<div class="row">
    <div class="col-xs-12 ">
        {{--<div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#general"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">General</span>
                </a>
            </div>
            <div id="general" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div class="general-head">
                        <div>
                            <h5>Show search input:</h5>
                            <input name="custom_search" type="checkbox" class="show_search_input bty-input-checkbox-5"
                                   id="bty-checkbox-search-set">
                            <label for="bty-checkbox-search-set"></label>
                        </div>
                        <div class="grid-list">
                            <div>
                                <input name="grid_system" value="grid" type="radio" class="bty-input-radio-1" id="bty-sort-grid" {{(isset($settings["grid_system"]) && $settings["grid_system"] === "grid")?"checked":""}} {{ !isset($settings["grid_system"])?"checked":"" }}>
                                <label for="bty-sort-grid">GRID</label>
                            </div>
                            <div>
                                <input name="grid_system" value="list" type="radio" class="bty-input-radio-1" id="bty-sort-list" {{(isset($settings["grid_system"]) && $settings["grid_system"] === "list")?"checked":""}}>
                                <label for="bty-sort-list">LIST</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom_search_div_for_append {{!isset($settings["custom_search"])?"custom_hidden_for_search_div":""}}">
                        <h6>Search by:</h6>
                        <div class="select-search">
                            <select name="custom_search_by[]" class="form-control" id="custom_search_by"
                                    multiple="multiple">
                                <option value="id" selected>ID</option>
                                @foreach($post as $key => $val)
                                    @if($key === 'id')
                                        @continue
                                    @endif
                                    @if(isset($settings["custom_search_by"]) && count($settings["custom_search_by"]) && in_array($key,$settings["custom_search_by"]))
                                        <option value="{{$key}}" selected>{{$key}}</option>
                                    @else
                                        <option value="{{$key}}">{{$key}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}

        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#general1"
                   aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Styles</span>
                </a>
            </div>
            <div id="general1" class="collapse in" aria-expanded="true" style="">
                <div class="content bty-settings-panel">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Image styles</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_1_container_item_style" class="form-control">
                                <option value="">select option</option>
                                <option value="image-1">border</option>
                                <option value="image-2">image round</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Title styles</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_2_container_item_style" class="form-control">
                                <option value="">select option</option>
                                <option value="title-1">font 16px, bold</option>
                                <option value="title-2">font 18px, bold,blue</option>
                                <option value="title-3">font 20px, bold, black</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Description styles</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_3_container_item_style" class="form-control">
                                <option value="">select option</option>
                                <option value="description-1">font 16px, black</option>
                                <option value="description-2">font 18px, gray</option>
                                <option value="description-3">font 20px, bold</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Price styles</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_2_container_item_style" class="form-control">
                                <option value="">select option</option>
                                <option value="price-1">font 16px, bold, blue</option>
                                <option value="price-2">font 20px, bold, red</option>
                            </select>
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
