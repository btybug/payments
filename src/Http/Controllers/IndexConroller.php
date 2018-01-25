<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Models\Universal\Paginator;
use Illuminate\Http\Request;

class IndexConroller extends Controller
{
    public function getPayments()
    {

        return view('payments::payments.index');
    }
    public function getShoppingCatr()
    {
        return view('payments::shopping.index');
    }

    public function doFilter($table,$term,$search_by,$sort_by='id',$sort_how='ASC'){
        $table = str_replace("-","_",$table);

        $products = \DB::table($table)
            ->select("*");

        if(count($search_by)){
            foreach ($search_by as $key => $column){
                if($key === 0){
                    $products = $products->where($column,'like','%'.$term.'%');
                }else{
                    $products = $products->orWhere($column,'like','%'.$term.'%');
                }
            }
        }else{
            $products = $products->where('title','like','%'.$term.'%');
        }

        $products = $products->orderBy($sort_by,$sort_how);

        return $products;
    }

    public function search(Request $request){
        $term = $request->term;
        $search_by = json_decode($request->search_by);
        $settings_for_ajax = json_decode($request->settings_for_ajax,true);

        $sort_by = $request->sort_by;
        $sort_how = $request->sort_how;

        $table = $settings_for_ajax["blog"];

        if(!$table){
            return \Response::json(["html" => "",'all_posts' => '']);
        }

        if($sort_how && $sort_by){
            $posts = $this->doFilter($table,$term,$search_by,$sort_by,$sort_how);
        }else{
            $posts = $this->doFilter($table,$term,$search_by);
        }

        $limit_per_page = isset($request->limit_per_page_for_ajax) ? $request->limit_per_page_for_ajax : 10;
        $col_md_x = isset($request->custom_get_col) ? $request->custom_get_col : "col-md-4";

        $posts = $posts->get();
        $all_posts = json_encode($posts);
        $posts = new Paginator($limit_per_page,6,'bty-pagination-2',$posts);

        $html = \View::make('payments::_partial.render-for-post',compact('posts','col_md_x','settings_for_ajax'))->render();

        return \Response::json(["html" => $html,'all_posts' => $all_posts]);

    }
    public function findPage(Request $request){
        $all_posts = json_decode($request->all_posts);
        $col_md_x = isset($request->bootstrap_col) ? $request->bootstrap_col : "col-md-4";
        $settings_for_ajax = json_decode($request->settings_for_ajax,true);
        $limit_per_page = isset($request->limit_per_page) ? $request->limit_per_page : 10;
        $table = $request->table;

        if(!count($all_posts) && $table){
            $posts =  $products = \DB::table($table)->select("*")->get();
        }else{
            $posts = $all_posts;
        }
        $all_posts = json_encode($posts);

        $posts = new Paginator($limit_per_page,6,'bty-pagination-2',$posts);
        $html = \View::make('payments::_partial.render-for-post',compact('posts','col_md_x','settings_for_ajax'))->render();

        return \Response::json(["html" => $html,"all_posts" => $all_posts]);
    }


    public function appendPostScrollPaginator(Request $request){

        $posts = json_decode($request->all_posts);

        $limit_per_page = isset($request->custom_limit_per_page) ? $request->custom_limit_per_page : 10;
        $col_md_x = isset($request->bootstrap_col) ? $request->bootstrap_col : "col-md-4";
        $settings_for_ajax = json_decode($request->settings_for_ajax,true);
        $all_posts = json_encode($posts);
        if(!count($posts) < $limit_per_page){
            return \Response::json(["html" => '','all_posts' => $all_posts]);
        }
        $posts = new Paginator($limit_per_page,6,'bty-pagination-2',$posts);

        $html = \View::make('payments::_partial.render-for-post',compact('posts','col_md_x','settings_for_ajax'))->render();

        return \Response::json(["html" => $html,'all_posts' => $all_posts]);
    }

}