<?php
$blogRepository = new \BtyBugHook\Membership\Repository\BlogRepository();
$table = '';
$blogs = $blogRepository->pluck('title', 'slug');
$columns = null;
if (isset($settings['blog'])) {

    $table =  $slug = implode("_",explode("-",$settings['blog']));
    $columns = \DB::select("SHOW COLUMNS FROM $table");
}
function renderOptions($columns){
    $html = '';
    if(count($columns)){
        foreach($columns as $key => $data){
            $html .= '<option value="'.$data->Field.'">'.$data->Field.'</option>';
        }
    }
    return $html;
}
?>

<div class="row">
    <div class="col-xs-12 ">
        <div class="form-group">
            <div class="col-md-6">
                <label for="">Select Blog</label>
            </div>
            <div class="col-md-6" style="margin-bottom:15px">
                <select name="blog" class="form-control">
                    <option value="">select option</option>
                    @if(count($blogs))
                        @foreach($blogs as $key => $blog)
                            <option value="{{$key}}">{{$blog}}</option>
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
                    <span class="title">Title options</span>
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
                                {!! renderOptions($columns) !!}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Content option</span>
                </a>
            </div>
            <div id="collapsetwo" class="collapse in" aria-expanded="true" style="">
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
                </div>
            </div>
        </div>
        <div class="bty-panel-collapse">
            <div>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" aria-expanded="true">
                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                    <span class="title">Description option</span>
                </a>
            </div>
            <div id="collapsetwo" class="collapse in" aria-expanded="true" style="">
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
                </div>
            </div>
        </div>

    </div>


</div>
</div>
{!!  BBstyle($_this->path.'/css/settings.css') !!}
{!!  BBstyle($_this->path.'/css/custom.css') !!}
