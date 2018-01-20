<?php
$blogRepository = new \BtyBugHook\Membership\Repository\BlogRepository();
$postRepo = new \BtyBugHook\Blog\Repository\PostsRepository();
$post = $postRepo->first()->toArray();
$blogs = $blogRepository->pluck('title', 'id');
$columns = null;
if (isset($settings['blog'])) {

    $table =  str_replace('-','_',$blogRepository->find($settings['blog'])->slug);
    $columns = \DB::select("SHOW COLUMNS FROM $table");
}
?>

<div class="row">
    <div class="col-xs-12 ">
        <div class="bty-panel-collapse">
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
                        <div class="grid-list">
                            <div>
                                <input name="grid_system" value="1" type="radio" class="bty-input-radio-1"
                                       id="bty-sort-grid" {{(isset($settings["grid_system"]) && $settings["grid_system"] === "grid")?"checked":""}} {{ !isset($settings["grid_system"])?"checked":"" }}>
                                <label for="bty-sort-grid">version 1</label>
                            </div>
                            <div>
                                <input name="grid_system" value="2" type="radio" class="bty-input-radio-1"
                                       id="bty-sort-list" {{(isset($settings["grid_system"]) && $settings["grid_system"] === "list")?"checked":""}}>
                                <label for="bty-sort-list">version 2</label>
                            </div>
                        </div>
                        <div class="grid-list">
                            <div>
                                <label for="">Select Blog</label>
                                {!! Form::select('blog',$blogs,isset($settings['blog'])?$settings['blog']:null,['class'=>'form-control']) !!}
                            </div>

                            <div>
                                <label for="">Columns map</label>
                                @if($columns)
                                    @foreach($columns as $column)
                                        <lable >{!! $column->Field !!}</lable>
                                        {!! Form::select('map['.$column->Field.']',['1'=>'placeholder 1','2'=>'placeholder 2','3'=>'placeholder 3'],null,['class'=>'form-control']) !!}
                                    @endforeach
                                @endif
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
