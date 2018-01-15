<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use BtyBugHook\Payments\Models\Attributes;
use Yajra\DataTables\DataTables;

class DataTablesConroller extends Controller
{
    public function getAttributes()
    {
        return DataTables::of(Attributes::query())->addColumn('actions', function ($attr) {
            $url= url("admin/payments/settings/attributes/{$attr->id}/edit");
            $settings_url= url("admin/payments/settings/attributes/{$attr->id}/terms");
            $delete_url= url("admin/payments/settings/attributes/{$attr->id}/delete");
            return "<a href='$url' class='btn btn-warning'><i class='fa fa-edit'></i></a>
                    <a href='$settings_url' class='btn btn-primary'><i class='fa fa-eye'></i></a>
                    <a href='$delete_url' class='btn btn-danger'><i class='fa fa-trash'></i></a>";
        },2)->editColumn('terms', function ($attr) {
            return null;
        })->rawColumns(['actions'])->make(true);
  }

  public function getMyFields()
    {
        return DataTables::of(UserFields::where('user_id',\Auth::id()))->addColumn('actions', function ($post) {
            $url= url("my-account/my-fields/edit",$post->id);
            $delete_url= url("admin/forms/field-delete",$post->id);
            return "<a href='$url' class='btn btn-warning'><i class='fa fa-edit'></i></a>
                    <a href='$delete_url' class='btn btn-danger'><i class='fa fa-trash'></i></a>";
        },2)->editColumn('name', function ($post){
            return (! isset($post->json_data['name'])) ?: $post->json_data['name'];
        })->editColumn('label', function ($post){
            return (! isset($post->json_data['label'])) ?: $post->json_data['label'];
        })->editColumn('placeholder', function ($post){
            return (! isset($post->json_data['placeholder'])) ?: $post->json_data['placeholder'];
        })->editColumn('created_at', function ($post){
            return BBgetDateFormat($post->created_at);
        })->rawColumns(['actions'])->make(true);
  }
}