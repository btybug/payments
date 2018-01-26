<?php
//$json = json_decode(file_get_contents($_this->path.DS."db.json"), true);

$table = "";
$columns = [];
if(isset($settings["table"])){
    $table = $settings["table"];
}
$blogs = BtyBugHook\Membership\Models\Blog::select("title","slug")->get();
if($table){
    $slug = implode("_",explode("-",$table));
    $columns = \DB::select('SHOW COLUMNS FROM ' . $slug);
}


function renderOptions($columns){
    $html = '';
    if(count($columns)){
        foreach($columns as $key => $data){
            if($data->Field == "image"){
                continue;
            }else{
                $html .= '<option value="'.$data->Field.'">'.$data->Field.'</option>';
            }
        }
    }
    return $html;
}
?>

<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            <div class="col-md-6">
                <label for="">Select Blog</label>
            </div>
            <div class="col-md-6" style="margin-bottom:15px">
                <select name="table" class="form-control">
                    <option value="">select option</option>
                    @if(count($blogs))
                        @foreach($blogs as $blog)
                            <option value="{{$blog->slug}}">{{$blog->title}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Image options</span>
                </a>
            </div>
            <div id="collapseOne" class="collapse in" aria-expanded="true" style="">
                <div class="content">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Item</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_1_item_value" class="form-control">
                                <option value="">select option</option>
                                @if(count($columns))
                                    @foreach($columns as $key => $data)
                                        @if($data->Field == "image")
                                            <option value="{{$data->Field}}">Image</option>
                                        @else
                                            @continue
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Container style</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_1_container_style" class="form-control">
                                <option value="">select option</option>
                                <option value="option-1">bg-brown, p-15, border-1, shadow</option>
                                <option value="option-2">bg-lightblue, p-15, border-1, shadow</option>
                                <option value="option-3">bg-gray, p-15, border-1</option>
                                <option value="option-4">bg-lightviolet, p-20</option>
                                <option value="option-5">bg-lightgreen, p-20, radius-4</option>
                                <option value="option-6">bg-lightred, p-24, radius-8, shadow</option>
                                <option value="option-7">bg-white, p-24, radius-8, shadow</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Item style</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_1_container_item_style" class="form-control">
                                <option value="">select option</option>
                                <option value="img-1">radius-4, p-5, hover</option>
                                <option value="img-2">p-5, radius-50, filter</option>
                                <option value="img-3">radius-20, blur</option>
                                <option value="img-4">black-white, hover-color</option>
                                <option value="img-5">radius-5, shadow</option>
                                <option value="img-6">border, shadow</option>
                                <option value="img-7">hover contrast</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">First holder data</span>
                </a>
            </div>
            <div id="collapse1" class="collapse in" aria-expanded="true" style="">
                <div class="content">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Item</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_2_item_value" class="form-control">
                                <option value="">select option</option>
                                {!! renderOptions($columns) !!}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Container style</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_2_container_style" class="form-control">
                                <option value="">select option</option>
                                <option value="option-1">bg-brown, p-15, border-1, shadow</option>
                                <option value="option-2">bg-lightblue, p-15, border-1, shadow</option>
                                <option value="option-3">bg-gray, p-15, border-1</option>
                                <option value="option-4">bg-lightviolet, p-20</option>
                                <option value="option-5">bg-lightgreen, p-20, radius-4</option>
                                <option value="option-6">bg-lightred, p-24, radius-8, shadow</option>
                                <option value="option-7">bg-white, p-24, radius-8, shadow</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Item style</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_2_container_item_style" class="form-control">
                                <option value="">select option</option>
                                <option value="font-1">font 16px</option>
                                <option value="font-2">16px bold</option>
                                <option value="font-3">18px</option>
                                <option value="font-4">18px bold</option>
                                <option value="font-5">20px bold</option>
                                <option value="font-6">16px white</option>
                                <option value="font-7">16px white-bold</option>
                                <option value="font-8">18px white-bold</option>
                                <option value="font-9">16px red</option>
                                <option value="font-10">18px red-bold</option>
                                <option value="font-11">20px red-bold</option>
                                <option value="font-12">16px blue</option>
                                <option value="font-13">18px blue-bold</option>
                                <option value="font-14">20px blue-bold</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Second holder data</span>
                </a>
            </div>
            <div id="collapse2" class="collapse in" aria-expanded="true" style="">
                <div class="content">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Item</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_3_item_value" class="form-control">
                                <option value="">select option</option>
                                {!! renderOptions($columns) !!}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Container style</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_3_container_style" class="form-control">
                                <option value="">select option</option>
                                <option value="option-1">bg-brown, p-15, border-1, shadow</option>
                                <option value="option-2">bg-lightblue, p-15, border-1, shadow</option>
                                <option value="option-3">bg-gray, p-15, border-1</option>
                                <option value="option-4">bg-lightviolet, p-20</option>
                                <option value="option-5">bg-lightgreen, p-20, radius-4</option>
                                <option value="option-6">bg-lightred, p-24, radius-8, shadow</option>
                                <option value="option-7">bg-white, p-24, radius-8, shadow</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Item style</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_3_container_item_style" class="form-control">
                                <option value="">select option</option>
                                <option value="font-1">font 16px</option>
                                <option value="font-2">16px bold</option>
                                <option value="font-3">18px</option>
                                <option value="font-4">18px bold</option>
                                <option value="font-5">20px bold</option>
                                <option value="font-6">16px white</option>
                                <option value="font-7">16px white-bold</option>
                                <option value="font-8">18px white-bold</option>
                                <option value="font-9">16px red</option>
                                <option value="font-10">18px red-bold</option>
                                <option value="font-11">20px red-bold</option>
                                <option value="font-12">16px blue</option>
                                <option value="font-13">18px blue-bold</option>
                                <option value="font-14">20px blue-bold</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Product unit 1</span>
                </a>
            </div>
            <div id="collapse3" class="collapse in" aria-expanded="true" style="">
                <div class="content">
                    <div class="form-group my_rows1">
                        <div class="col-sm-8">
                            {!! BBbutton2('unit',"unit1","product_single","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
                        </div>
                    </div>
                    <div class="form-group my_rows1">
                        <div class="col-sm-8">
                            {!! BBbutton2('unit',"unit5","product_single","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Product unit 2</span>
                </a>
            </div>
            <div id="collapse4" class="collapse in" aria-expanded="true" style="">
                <div class="content">
                    <div class="form-group my_rows1">
                        <div class="col-sm-8">
                            {!! BBbutton2('unit',"unit2","single_post","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Extra units</span>
                </a>
            </div>


            <div id="collapse5" class="collapse in" aria-expanded="true" style="">
                <div class="content">
                    <div class="form-group my_rows1">
                        <div class="col-sm-8">
                            {!! BBbutton2('unit',"unit3","for_post","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
                        </div>
                    </div>
                    <div class="form-group my_rows1">
                        <div class="col-sm-8">
                            {!! BBbutton2('unit',"unit4","for_post","Change",['class'=>'btn btn-default change-layout','data-type'=>'frontend_sidebar','model'=>$settings]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Product information</span>
                </a>
            </div>
            <div id="collapse6" class="collapse in" aria-expanded="true" style="">
                <div class="content">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Item</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_5_item_value" class="form-control">
                                <option value="">select option</option>
                                {!! renderOptions($columns) !!}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Container style</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_5_container_style" class="form-control">
                                <option value="">select option</option>
                                <option value="option-1">bg-brown, p-15, border-1, shadow</option>
                                <option value="option-2">bg-lightblue, p-15, border-1, shadow</option>
                                <option value="option-3">bg-gray, p-15, border-1</option>
                                <option value="option-4">bg-lightviolet, p-20</option>
                                <option value="option-5">bg-lightgreen, p-20, radius-4</option>
                                <option value="option-6">bg-lightred, p-24, radius-8, shadow</option>
                                <option value="option-7">bg-white, p-24, radius-8, shadow</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="">Item style</label>
                        </div>
                        <div class="col-md-6">
                            <select name="option_5_container_item_style" class="form-control">
                                <option value="">select option</option>
                                <option value="font-1">font 16px</option>
                                <option value="font-2">16px bold</option>
                                <option value="font-3">18px</option>
                                <option value="font-4">18px bold</option>
                                <option value="font-5">20px bold</option>
                                <option value="font-6">16px white</option>
                                <option value="font-7">16px white-bold</option>
                                <option value="font-8">18px white-bold</option>
                                <option value="font-9">16px red</option>
                                <option value="font-10">18px red-bold</option>
                                <option value="font-11">20px red-bold</option>
                                <option value="font-12">16px blue</option>
                                <option value="font-13">18px blue-bold</option>
                                <option value="font-14">20px blue-bold</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!!  BBstyle($_this->path.'/css/settings.css') !!}
{!!  BBstyle($_this->path.'/css/custom.css') !!}

{!!  BBscript($_this->path.'/js/custom.js') !!}
