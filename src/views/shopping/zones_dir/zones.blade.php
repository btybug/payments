@extends('btybug::layouts.mTabs',['index'=>'shopping_cart'])
<!-- Nav tabs -->
@section('tab')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Countries</th>
                <th>All countries</th>
                <th>Exceptions</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($zones as $zone)
                <tr>
                    <td>{{$zone->id}}</td>
                    <td>{{$zone->name}}</td>
                    <td>
                        {{$zone->countries ? $zone->countries : 'All countries'}}
                    </td>
                    <td>
                        <input type="checkbox" value="{{$zone->all}}" {{$zone->all ? 'checked' : ''}} disabled>
                    </td>
                    <td>
                        {{$zone->exceptions ? $zone->exceptions : 'No exception'}}
                    </td>
                    <td>
                        <a href="{{route('payments_sopping_cart_zones_update',$zone->id)}}" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger delete_zone" data-id="{{$zone->id}}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary pull-right" href="{{route('payments_sopping_cart_zones_create')}}">New Zone</a>

<!-- Modal -->
<div class="modal fade" id="delete-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Atention!</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary pull-right confirmed">yes</button>
            </div>
        </div>

    </div>
</div>
@stop
@section('JS')
    <script>
        window.onload = function(){
            $("body").delegate(".delete_zone","click",function(){
                $(".delete_zone").removeClass("get_data_id");
                $(this).addClass("get_data_id");
                $("#delete-modal").modal("show");
            });
            $("body").delegate(".confirmed","click",function(){
                var id = $(".get_data_id").data("id");
                var token = $("input[name=_token]").val();
                var button = $("button[data-id="+id+"]");
                $("#delete-modal").modal("hide");
                button.attr("disabled",true);
                $.ajax({
                    type:'post',
                    url:'{{route('delete_zone')}}',
                    data:{id:id,_token:token},
                    success:function(data){
                        if(data){
                            button.parents("tr").remove();
                        }else{
                            alert("Error! Please update and try again");
                        }
                    }
                });
            });
        }
    </script>
@stop