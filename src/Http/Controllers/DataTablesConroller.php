<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use BtyBugHook\Payments\Models\Attributes;
use BtyBugHook\Payments\Models\AttributeTerms;
use Yajra\DataTables\DataTables;

class DataTablesConroller extends Controller
{
    public function getAttributes()
    {
        return DataTables::of(Attributes::query())->addColumn('actions', function ($attr) {
            $url= url("admin/payments/settings/attributes/{$attr->id}/edit");
            $delete_url= url("admin/payments/settings/attributes/{$attr->id}/delete");
            return "<a href='$url' class='btn btn-warning'><i class='fa fa-edit'></i></a>
                    <a href='$delete_url' class='btn btn-danger'><i class='fa fa-trash'></i></a>";
        },2)->editColumn('terms', function ($attr) {
            $url= url("admin/payments/settings/attributes/{$attr->id}/terms");
            $terms = $attr->terms()->pluck('name','id');
            $exploded = (count($terms)) ? implode(', ',$terms->toArray()) : null;
            return $exploded . "<div><a href='$url'>Configure Terms</a></div>";
        })->rawColumns(['actions','terms'])->make(true);
  }

  public function getAttributeTerms($id)
    {

        return DataTables::of(AttributeTerms::where('attribute_id',$id))->addColumn('actions', function ($term) {
            $url= url("admin/payments/settings/attributes/{$term->attribute_id}/terms/{$term->id}/edit");
            $delete_url=  url("admin/payments/settings/attributes/{$term->attribute_id}/terms/{$term->id}/delete");
            return "<a href='$url' class='btn btn-warning'><i class='fa fa-edit'></i></a>
                    <a href='$delete_url' class='btn btn-danger'><i class='fa fa-trash'></i></a>";
        },2)->editColumn('attribute', function ($term){
            return $term->attribute->name;
        })->rawColumns(['actions'])->make(true);
  }
}