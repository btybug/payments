@php
    $columns = \DB::select("SHOW COLUMNS FROM blogs");

function renderOptions($columns){
    $html = '';
    if(count($columns)){
        foreach($columns as $key => $data){
            $html .= '<option value="'.$data->Field.'">'.$data->Field.'</option>';
        }
    }
    return $html;
}
@endphp
<div class="bty-panel-collapse">
    <div>
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#general"
           aria-expanded="true">
            <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
            <span class="title">Title section</span>
        </a>
    </div>
    <div id="general" class="collapse in" aria-expanded="true" style="">
        <div class="content bty-settings-panel">
            <h6>Item</h6>
            <div class="select-search">
                <select name="custom_1_item_value" class="form-control">
                    <option value="id" selected>ID</option>
                    {!! renderOptions($columns) !!}
                </select>
            </div>
        </div>
    </div>
</div>
<div class="bty-panel-collapse">
    <div>
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#general2"
           aria-expanded="true">
            <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
            <span class="title">Title section</span>
        </a>
    </div>
    <div id="general2" class="collapse in" aria-expanded="true" style="">
        <div class="content bty-settings-panel">
            <h6>Item</h6>
            <div class="select-search">
                <select name="custom_2_item_value" class="form-control">
                    <option value="id" selected>ID</option>
                    {!! renderOptions($columns) !!}
                </select>
            </div>
        </div>
    </div>
</div>
<div class="bty-panel-collapse">
    <div>
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#general3"
           aria-expanded="true">
            <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
            <span class="title">Title section</span>
        </a>
    </div>
    <div id="general3" class="collapse in" aria-expanded="true" style="">
        <div class="content bty-settings-panel">
            <h6>Item</h6>
            <div class="select-search">
                <select name="custom_3_item_value" class="form-control">
                    <option value="id" selected>ID</option>
                    {!! renderOptions($columns) !!}
                </select>
            </div>
        </div>
    </div>
</div>