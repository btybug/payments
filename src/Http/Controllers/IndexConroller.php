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
    public function getSoppingCartGeneral ()
    {
        return view('payments::shopping.general');
    }
    public function getSoppingCartZones ()
    {
        $zones = \DB::table("zones")->select("*")->get();

        return view('payments::shopping.zones',compact('zones'));
    }
    public function getSoppingCartMethods ()
    {
        return view('payments::shopping.methods');
    }
    public function getSoppingCartZonesCreate(){
        $countries = array(
            "Afghanistan", "Albania", "Algeria", "American Samoa",
            "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda",
            "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan",
            "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize",
            "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina",
            "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory",
            "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon",
            "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile",
            "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo",
            "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire",
            "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica",
            "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea",
            "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji",
            "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia",
            "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar",
            "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau",
            "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras",
            "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq",
            "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati",
            "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan",
            "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya",
            "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of",
            "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania",
            "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia",
            "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles",
            "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands",
            "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland",
            "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis",
            "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia",
            "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands",
            "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena",
            "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland",
            "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo",
            "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu",
            "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands",
            "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)",
            "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"
        );
        return view('payments::shopping.create_zone',compact("countries"));
    }
    public function getSoppingCartZonesCreateSave(Request $request){
        $name = $request->name;
        $countries = $request->countries;
        $zones = \DB::table("zones")->insert([
            'name' => $name,
            'countries' => $this->getCountries($countries)
        ]);
        return redirect()->route('payments_sopping_cart_zones');
    }
    function getCountries($data){
        $countries = array(
            "Afghanistan", "Albania", "Algeria", "American Samoa",
            "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda",
            "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan",
            "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize",
            "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina",
            "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory",
            "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon",
            "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile",
            "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo",
            "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire",
            "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica",
            "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea",
            "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji",
            "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia",
            "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar",
            "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau",
            "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras",
            "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq",
            "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati",
            "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan",
            "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya",
            "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of",
            "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania",
            "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia",
            "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles",
            "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands",
            "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland",
            "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis",
            "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia",
            "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands",
            "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena",
            "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland",
            "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo",
            "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu",
            "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands",
            "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)",
            "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"
        );
        $str = '';
        foreach ($data as $i => $key){
            $str .= $countries[$key]." ";
        }
        return $str;
    }

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