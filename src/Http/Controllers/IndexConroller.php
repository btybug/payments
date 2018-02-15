<?php

namespace BtyBugHook\Payments\Http\Controllers;

use App\Http\Controllers\Controller;
use Btybug\btybug\Models\Universal\Paginator;
use Illuminate\Http\Request;

class IndexConroller extends Controller
{
    public function getPayments ()
    {

        return view('payments::payments.index');
    }

    public function getShoppingCatr ()
    {
        return view('payments::shopping.index');
    }

    // new functionality
    public function getShoppingCartGeneral ()
    {
        return view('payments::shopping.general');
    }
    public function getShoppingCartZones ()
    {
        $zones = \DB::table("zones")->select("*")->get();

        return view('payments::shopping.zones_dir.zones',compact('zones'));
    }
    public function getShoppingCartMethods ()
    {
        return view('payments::shopping.methods');
    }
    public function getShoppingCartZonesCreate(){
        $countries = $this->countries();
        return view('payments::shopping.zones_dir.create_zone',compact("countries"));
    }
    public function getShoppingCartZonesUpdate($id){
        $zone = \DB::table('zones')->where("id",$id)->first();
        $countries = $this->countries();
        $country_index = $this->getCountryIndex($zone->name);
        $cities = $this->getCitiesByCountryId($country_index);
        $active_cities = $this->getZoneIndexes($zone->countries);
        $active_exceptions = $this->getZoneIndexes($zone->exceptions);

        return view('payments::shopping.zones_dir.update_zone',compact("countries","zone","country_index","active_cities","cities","active_exceptions"));
    }
    public function getShoppingCartZonesCreateSave(Request $request){
        $data = $request->except("_token");
        if (count($data)){
            foreach ($data["countries"] as $key => $country){
                $name = $this->countriesGetName($country["country"]);
                $cities = isset($country["zones"]) ? $this->getZoneName($country["zones"]) : null;
                $all = isset($country["all"]) ? 1 : 0;
                $exceptions = isset($country["exceptions"]) ? $this->getZoneName($country["exceptions"]) : null;
                if(!$cities && !$exceptions){
                    $all = 1;
                }
                $zones = \DB::table("zones")->insert([
                    'name' => $name,
                    'countries' => $cities,
                    'all' => $all,
                    'exceptions' => $exceptions
                ]);
            }
        }
        return redirect()->route('payments_sopping_cart_zones');
    }
    public function getShoppingCartZonesUpdateSave(Request $request,$id){
        $data = $request->except("_token");
        if (count($data)){
            foreach ($data["countries"] as $key => $country){
                $cities = isset($country["zones"]) ? $this->getZoneName($country["zones"]) : null;
                $all = isset($country["all"]) ? 1 : 0;
                $exceptions = isset($country["exceptions"]) ? $this->getZoneName($country["exceptions"]) : null;
                if(!$cities && !$exceptions){
                    $all = 1;
                }
                $zones = \DB::table("zones")->where("id",$id)->update([
                    'countries' => $cities,
                    'all' => $all,
                    'exceptions' => $exceptions
                ]);
            }
        }
        return redirect()->route('payments_sopping_cart_zones');
    }
    public function getZones(Request $request){
        $country_id = $request->id;
        $arr = [];
        $states = collect(json_decode(\File::get(plugins_path('vendor'.DS.'sahak.avatar'.DS.'payments'.DS.'src'.DS.'views'.DS.'shopping'.DS.'zones_dir'.DS.'state.json')),true))
            ->where("country_id",$country_id)
            ->map(function ($item){
                return $item["id"];
            })
            ->toArray();
        $cities = collect(json_decode(\File::get(plugins_path('vendor'.DS.'sahak.avatar'.DS.'payments'.DS.'src'.DS.'views'.DS.'shopping'.DS.'zones_dir'.DS.'cities.json')),true))
            ->whereIn("state_id",$states)
            ->toArray();
dd(6);
        foreach ($cities as $value){
            $arr[] = [
                'id' => $value['id'],
                'text' => $value['name']
            ];
        }
        return response()->json($arr);
    }
    public function deleteZone(Request $request){
        $id = $request->id;
        $deleted = \DB::table("zones")->where("id",$id)->delete();
        return response()->json($deleted);
    }
    function getCountryIndex($name){
        $countries = $this->countries();
        $index = array_search($name, $countries);
        return $index;
    }
    function getCitiesByCountryId($id){
        $states_arr = collect(json_decode(\File::get(plugins_path('vendor'.DS.'sahak.avatar'.DS.'payments'.DS.'src'.DS.'views'.DS.'shopping'.DS.'zones_dir'.DS.'state.json')),true))->where("country_id",$id)->pluck("id")->toArray();
        $cities = collect(json_decode(\File::get(plugins_path('vendor'.DS.'sahak.avatar'.DS.'payments'.DS.'src'.DS.'views'.DS.'shopping'.DS.'zones_dir'.DS.'cities.json')),true))->whereIn("state_id",$states_arr)->pluck("name","id")->toArray();
        return $cities;
    }
    function getZoneName($data){
        $str = '';
        foreach ($data as $key => $val){
            $count = count($data)-1;
            $states = collect(json_decode(\File::get(plugins_path('vendor'.DS.'sahak.avatar'.DS.'payments'.DS.'src'.DS.'views'.DS.'shopping'.DS.'zones_dir'.DS.'cities.json')),true))->where("id",$val)->first();
            if($count == $key){
                $str .= $states["name"];
            }else{
                $str .= $states["name"].", ";
            }
        }
        return $str;
    }
    function getZoneIndexes($zones){
        if(!$zones){
            return null;
        }
        $cities = collect(json_decode(\File::get(plugins_path('vendor'.DS.'sahak.avatar'.DS.'payments'.DS.'src'.DS.'views'.DS.'shopping'.DS.'zones_dir'.DS.'cities.json')),true))->pluck("name","id")->toArray();
        $zones_names = explode(", ",$zones);
        $indexes = [];
        foreach ($zones_names as $name){
            $indexes[] = array_search($name,$cities);
        }
        return $indexes;
    }
    function countries(){
        $countries = collect(json_decode(\File::get(plugins_path('vendor'.DS.'sahak.avatar'.DS.'payments'.DS.'src'.DS.'views'.DS.'shopping'.DS.'zones_dir'.DS.'countries.json')),true))->pluck("name","id")->toArray();
        return $countries;
    }
    function countriesGetName($id){
        $countries = collect(json_decode(\File::get(plugins_path('vendor'.DS.'sahak.avatar'.DS.'payments'.DS.'src'.DS.'views'.DS.'shopping'.DS.'zones_dir'.DS.'countries.json')),true))->where("id",$id)->first();
        return $countries["name"];
    }
    // end new functionality

    public function doFilter ($table, $term, $search_by, $sort_by = 'id', $sort_how = 'ASC')
    {
        $table = str_replace("-", "_", $table);

        $products = \DB::table($table)
            ->select("*");

        if (count($search_by)) {
            foreach ($search_by as $key => $column) {
                if ($key === 0) {
                    $products = $products->where($column, 'like', '%' . $term . '%');
                } else {
                    $products = $products->orWhere($column, 'like', '%' . $term . '%');
                }
            }
        } else {
            $products = $products->where('title', 'like', '%' . $term . '%');
        }

        $products = $products->orderBy($sort_by, $sort_how);

        return $products;
    }

    public function search (Request $request)
    {
        $term = $request->term;
        $search_by = json_decode($request->search_by);
        $settings_for_ajax = json_decode($request->settings_for_ajax, true);

        $sort_by = $request->sort_by;
        $sort_how = $request->sort_how;

        $table = $settings_for_ajax["blog"];

        if (! $table) {
            return \Response::json(["html" => "", 'all_posts' => '']);
        }

        if ($sort_how && $sort_by) {
            $posts = $this->doFilter($table, $term, $search_by, $sort_by, $sort_how);
        } else {
            $posts = $this->doFilter($table, $term, $search_by);
        }

        $limit_per_page = isset($request->limit_per_page_for_ajax) ? $request->limit_per_page_for_ajax : 10;
        $col_md_x = isset($request->custom_get_col) ? $request->custom_get_col : "col-md-4";

        $posts = $posts->get();
        $all_posts = json_encode($posts);
        $posts = new Paginator($limit_per_page, 6, 'bty-pagination-2', $posts);

        $html = \View::make('payments::_partial.render-for-post', compact('posts', 'col_md_x', 'settings_for_ajax'))->render();

        return \Response::json(["html" => $html, 'all_posts' => $all_posts]);

    }

    public function findPage (Request $request)
    {
        $all_posts = json_decode($request->all_posts);
        $col_md_x = isset($request->bootstrap_col) ? $request->bootstrap_col : "col-md-4";
        $settings_for_ajax = json_decode($request->settings_for_ajax, true);
        $limit_per_page = isset($request->limit_per_page) ? $request->limit_per_page : 10;
        $table = $request->table;

        if (! count($all_posts) && $table) {
            $posts = $products = \DB::table($table)->select("*")->get();
        } else {
            $posts = $all_posts;
        }
        $all_posts = json_encode($posts);

        $posts = new Paginator($limit_per_page, 6, 'bty-pagination-2', $posts);
        $html = \View::make('payments::_partial.render-for-post', compact('posts', 'col_md_x', 'settings_for_ajax'))->render();

        return \Response::json(["html" => $html, "all_posts" => $all_posts]);
    }


    public function appendPostScrollPaginator (Request $request)
    {

        $posts = json_decode($request->all_posts);

        $limit_per_page = isset($request->custom_limit_per_page) ? $request->custom_limit_per_page : 10;
        $col_md_x = isset($request->bootstrap_col) ? $request->bootstrap_col : "col-md-4";
        $settings_for_ajax = json_decode($request->settings_for_ajax, true);
        $all_posts = json_encode($posts);
        if (! count($posts) < $limit_per_page) {
            return \Response::json(["html" => '', 'all_posts' => $all_posts]);
        }
        $posts = new Paginator($limit_per_page, 6, 'bty-pagination-2', $posts);

        $html = \View::make('payments::_partial.render-for-post', compact('posts', 'col_md_x', 'settings_for_ajax'))->render();

        return \Response::json(["html" => $html, 'all_posts' => $all_posts]);
    }

}