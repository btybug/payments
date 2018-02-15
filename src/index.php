<?php
addProvider('BtyBugHook\Payments\Providers\ModuleServiceProvider');
function get_item_data_from_listener($key)
{
    $options = \Config::get('options.listener');

    if (isset($options[$key])) return $options[$key];

    return null;
}

function get_prices_data()
{
    return \Config::get('payment.pricing');
}

function get_data_datum()
{
    return \Config::get('datum.options');
}

function find_price($slug)
{
    $prices = get_prices_data();

    if (isset($prices[$slug])) {
        return $prices[$slug];
    }

    return null;
}

//QTY functions
function get_qty_data()
{
    $settingsRepo = new \Btybug\btybug\Repositories\AdminsettingRepository();

    $settings = $settingsRepo->getSettings('pricing', 'qty');
    if ($settings && $settings->val) return json_decode($settings->val, true);

    return null;
}

function render_price_list()
{
    return \View("payments::settings.price.list")->render();
}

function render_price_form ($view_name,$data = null)
{
    return \View("payments::settings.price._partials.forms.$view_name")->with('data',$data)->render();
}

function render_datapym_list()
{

    return \View("payments::settings.datum.list")->render();
}

function render_discount_list()
{
    return \View("payments::settings.discount.discount")->render();
}

function render_links()
{
    return \View("payments::settings.links.index")->render();
}

function render_data_form($view_name)
{
    return \View("payments::settings.datum._partials.$view_name")->render();
}

function render_tax_service_list()
{
    return \View("payments::settings.tax_services.form")->render();
}

function get_tax($data)
{
    $vat = new \BtyBugHook\Payments\Repository\TaxServiceRepository();
    $query = [];
    if (isset($data['tax']) && $data['tax']) {
        $query = $vat->plunckByCondition(['amount_type' => 'vat'], 'name', 'id');
    }

    return $query;
}

function render_tax_service_form($data)
{
    $vat = new \BtyBugHook\Payments\Repository\TaxServiceRepository();

    $query = [];
    if (isset($data['services']) && $data['services']) {
        $query = $vat->plunckByCondition(['amount_type' => 'services'], 'name', 'id');
    }

    return $query;
}

function get_tax_service_data()
{
    return [
        [
            'name' => 'Tax',
            'slug' => 'tax'
        ], [
            'name' => 'Services',
            'slug' => 'services'
        ]
    ];
}


function product_price($slugOrPriceArray, $id=null)
{
    if(!is_array($slugOrPriceArray)){
        $product = \DB::table($slugOrPriceArray)->find($id);
        if (!$product) throw new \Exception('wrong product!!!');
        $priceData = json_decode($product->price, true);
    }else{
        $priceData=$slugOrPriceArray;
    }

    $price = null;
    switch ($priceData['method']) {
        case 'simple_price':
            $price = $priceData['value'];
    }
    return $price;
}

function getTax($slugOrProductArray,$id=null)
{
    if(!is_array($slugOrProductArray)) {
        $price=$slugOrProductArray;
        $product = \DB::table($slugOrProductArray)->find($id);
        $taxAndServices = @json_decode($product->tax_services_pym, true);
    }else{
        $price=json_decode($slugOrProductArray['price'],true);
        $taxAndServices =@json_decode($slugOrProductArray['tax_services_pym'],true);
    }
    $result=[];
    if($taxAndServices){
        foreach ($taxAndServices as $key=>$value){
            if($value && ! is_array($value)){
                $data = \BtyBugHook\Payments\Models\TaxService::find($value);
                if($data){
                    $fn=$data->amount_type;
                    $result[$key]=['amount'=>$data->amount,
                                   'price'=>$fn($data->amount,product_price($price,$id)),
                                   'extra' => $fn($data->amount,product_price($price,$id),false)] ;
                }
            }
        }
    };
//    $data = \BtyBugHook\Payments\Models\TaxService::where('slug', $type)->first();
    return $result;
}

function vat($vat, $price, $sum = true)
{
    if($sum){
        return $price+($price * $vat / 100);
    }else{
        return $price * $vat / 100;
    }

}
function service($vat, $price){
    return $price + $vat;
}