<?php
$postRepo = new \BtyBugHook\Blog\Repository\PostsRepository();
$post = $postRepo->first()->toArray();
?>

<div class="row">
    <div class="col-xs-12 ">
        <div class="form-group">
            <label for="area1">Image</label>
            <input type="text" class="form-control" placeholder="Image link" value="{{(isset($settings['area1']) ? $settings['area1'] : '')}}" name="area1">
        </div>
        <div class="form-group">
            <label for="area1">Title</label>
            {{--<select name="area2" id="area2" class="form-control">
                <option value="">select option</option>
                @foreach($post as $key => $value)
                    <option value="{{$key}}" {{(isset($settings["area2"]) && $settings["area2"] === $key) ? 'selected' : ''}}>{{$key}}</option>
                @endforeach
            </select>--}}
            <input type="text" class="form-control" placeholder="Title" value="{{(isset($settings['area2']) ? $settings['area2'] : '')}}" name="area2">
        </div>
        <div class="form-group">
            <label for="area3">Sub title</label>
            <input type="text" class="form-control" placeholder="Sub Title" value="{{(isset($settings['area3']) ? $settings['area3'] : '')}}" name="area3">
        </div>
        <div class="form-group">
            <label for="area4">Price and details</label>
            <div class="form-group my_rows1">
                <div class="col-sm-8">
                    {!! BBbutton2('unit',"area4","product","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
            <label for="area4">Button add to card</label>
            <div class="form-group my_rows1">
                <div class="col-sm-8">
                    {!! BBbutton2('unit',"area5","product","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
                </div>
            </div>
            {{--<div class="form-group my_rows1 custom_show {{$settings['is_unit_area_5']?'':'custom_hidden'}}">
                <div class="col-sm-8">
                    {!! BBbutton2('unit',"area5","product","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
                </div>
            </div>
            <select name="area5" id="area5" class="form-control custom_remove {{isset($settings['is_unit_area_5']) && $settings['is_unit_area_5']==1?'custom_hidden':''}}">
                <option value="">select option</option>
                @foreach($post as $key => $value)
                    <option value="{{$key}}" {{(isset($settings["area5"]) && $settings["area5"] === $key) ? 'selected' : ''}}>{{$key}}</option>
                @endforeach
            </select>
            <div>
                <p>Is Unit</p>
                yes <input type="radio" value="1" name="is_unit_area_5" class="is_unit" {{ (isset($settings['is_unit_area_5']) && $settings["is_unit_area_5"] === 1) ? 'checked' : '' }}>
                no <input type="radio" value="0" name="is_unit_area_5" class="is_unit" {{ (isset($settings['is_unit_area_5']) && $settings["is_unit_area_5"] === 0) ? 'checked' : '' }}{{ !isset($settings['is_unit_area_5'])?'checked':"" }}>
            </div>--}}
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
            <label for="area4">Description</label>
            <div class="clearfix"></div>
            <div class="for_append">
                @if(isset($settings["area6"]["titles"]))
                    @foreach($settings["area6"]["titles"] as $key => $title)
                        <div class="single_setting" data-id="{{$key}}">
                            <label for="area6[titles][{{$key}}]">Title</label>
                            <input type="text" placeholder="Insert title" name="area6[titles][{{$key}}]" id="area6[titles][{{$key}}]" class="form-control" value="{{$title}}">

                            <label for="area6[descriptions][{{$key}}]">Content</label>
                            <textarea name="area6[descriptions][{{$key}}]" id="area6[descriptions][{{$key}}]" class="form-control">{{$settings['area6']['descriptions'][$key]}}</textarea>
                            {{--@if(!$loop->first)
                                 <button class="btn btn-danger btn-md pull-right remove_single_setting"></button>
                            @endif--}}
                        </div>
                    @endforeach
                @else
                    <div class="single_setting" data-id="0">
                        <label for="area6[titles][0]">Title</label>
                        <input type="text" placeholder="Insert title" name="area6[titles][0]" id="area6[titles][0]" class="form-control">

                        <label for="area6[descriptions][0]">Content</label>
                        <textarea name="area6[descriptions][0]" id="area6[descriptions][0]" class="form-control"></textarea>
                    </div>
                @endif
            </div>

            <button class="btn btn-md btn-success custom_add_new_desc margin_top_15">Add new</button>
        </div>
    </div>
</div>

{!!  BBstyle($_this->path.'/css/settings.css') !!}
{!!  BBstyle($_this->path.'/css/custom.css') !!}

{!!  BBscript($_this->path.'/js/custom.js') !!}
