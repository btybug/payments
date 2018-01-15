<?php
$postRepo = new \BtyBugHook\Blog\Repository\PostsRepository();
$post = $postRepo->first()->toArray();
?>

<div class="row">
    <div class="col-xs-12 ">
        <div class="form-group">
            <label for="area1">area1</label>
            <div class="form-group my_rows1 custom_show {{$settings['is_unit_area_1']?'':'custom_hidden'}}">
                <div class="col-sm-8">
                    {!! BBbutton2('unit',"area1","product","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
                </div>
            </div>
            <select name="area1" id="area1" class="form-control custom_remove {{isset($settings['is_unit_area_1']) && $settings['is_unit_area_1']==1?'custom_hidden':''}}">
                <option value="">select option</option>
                @foreach($post as $key => $value)
                    <option value="{{$key}}" {{(isset($settings["area1"]) && $settings["area1"] === $key) ? 'selected' : ''}}>{{$key}}</option>
                @endforeach
            </select>

            <div>
                <p>Is Unit</p>
                yes <input type="radio" value="1" name="is_unit_area_1" class="is_unit" {{ (isset($settings['is_unit_area_1']) && $settings["is_unit_area_1"] === 1) ? 'checked' : '' }}>
                no <input type="radio" value="0" name="is_unit_area_1" class="is_unit" {{ (isset($settings['is_unit_area_1']) && $settings["is_unit_area_1"] === 0) ? 'checked' : '' }}{{ !isset($settings['is_unit_area_1'])?'checked':"" }}>
            </div>
        </div>
        <div class="form-group">
            <label for="area1">area2</label>
            <div class="form-group my_rows1 custom_show {{$settings['is_unit_area_2']?'':'custom_hidden'}}">
                <div class="col-sm-8">
                    {!! BBbutton2('unit',"area2","product","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
                </div>
            </div>
            <select name="area2" id="area2" class="form-control custom_remove {{isset($settings['is_unit_area_2']) && $settings['is_unit_area_2']==1?'custom_hidden':''}}">
                <option value="">select option</option>
                @foreach($post as $key => $value)
                    <option value="{{$key}}" {{(isset($settings["area2"]) && $settings["area2"] === $key) ? 'selected' : ''}}>{{$key}}</option>
                @endforeach
            </select>
            <div>
                <p>Is Unit</p>
                yes <input type="radio" value="1" name="is_unit_area_2" class="is_unit" {{ (isset($settings['is_unit_area_2']) && $settings["is_unit_area_2"] === 1) ? 'checked' : '' }}>
                no <input type="radio" value="0" name="is_unit_area_2" class="is_unit" {{ (isset($settings['is_unit_area_2']) && $settings["is_unit_area_2"] === 0) ? 'checked' : '' }}{{ !isset($settings['is_unit_area_2'])?'checked':"" }}>
            </div>
        </div>
        <div class="form-group">
            <label for="area1">area3</label>
            <div class="form-group my_rows1 custom_show {{$settings['is_unit_area_3']?'':'custom_hidden'}}">
                <div class="col-sm-8">
                    {!! BBbutton2('unit',"area3","product","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
                </div>
            </div>
            <select name="area3" id="area3" class="form-control custom_remove {{isset($settings['is_unit_area_3']) && $settings['is_unit_area_3']==1?'custom_hidden':''}}">
                <option value="">select option</option>
                @foreach($post as $key => $value)
                    <option value="{{$key}}" {{(isset($settings["area3"]) && $settings["area3"] === $key) ? 'selected' : ''}}>{{$key}}</option>
                @endforeach
            </select>
            <div>
                <p>Is Unit</p>
                yes <input type="radio" value="1" name="is_unit_area_3" class="is_unit" {{ (isset($settings['is_unit_area_3']) && $settings["is_unit_area_3"] === 1) ? 'checked' : '' }}>
                no <input type="radio" value="0" name="is_unit_area_3" class="is_unit" {{ (isset($settings['is_unit_area_3']) && $settings["is_unit_area_3"] === 0) ? 'checked' : '' }}{{ !isset($settings['is_unit_area_3'])?'checked':"" }}>
            </div>
        </div>
        <div class="form-group">
            <label for="area4">area4</label>
            <div class="form-group my_rows1 custom_show {{$settings['is_unit_area_4']?'':'custom_hidden'}}">
                <div class="col-sm-8">
                    {!! BBbutton2('unit',"area4","product","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
                </div>
            </div>
            <select name="area4" id="area4" class="form-control custom_remove {{isset($settings['is_unit_area_4']) && $settings['is_unit_area_4']==1?'custom_hidden':''}}">
                <option value="">select option</option>
                @foreach($post as $key => $value)
                    <option value="{{$key}}" {{(isset($settings["area4"]) && $settings["area4"] === $key) ? 'selected' : ''}}>{{$key}}</option>
                @endforeach
            </select>
            <div>
                <p>Is Unit</p>
                yes <input type="radio" value="1" name="is_unit_area_4" class="is_unit" {{ (isset($settings['is_unit_area_4']) && $settings["is_unit_area_4"] === 1) ? 'checked' : '' }}>
                no <input type="radio" value="0" name="is_unit_area_4" class="is_unit" {{ (isset($settings['is_unit_area_4']) && $settings["is_unit_area_4"] === 0) ? 'checked' : '' }}{{ !isset($settings['is_unit_area_4'])?'checked':"" }}>
            </div>
        </div>
        <div class="form-group">
            <label for="area5">area5</label>
            <div class="form-group my_rows1 custom_show {{$settings['is_unit_area_5']?'':'custom_hidden'}}">
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
            </div>
        </div>
    </div>
</div>

{!!  BBstyle($_this->path.'/css/settings.css') !!}
{!!  BBstyle($_this->path.'/css/custom.css') !!}

{!!  BBscript($_this->path.'/js/custom.js') !!}
