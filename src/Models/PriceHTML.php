<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 07.02.2018
 * Time: 17:14
 */

namespace BtyBugHook\Payments\Models;


class PriceHTML
{
    //{"method":"quantity_price","qty_option":"select","qty":[{"qty":"1","price":"12"},{"qty":"2","price":"19"}]}
    public static function get($jsonData,$class=null)
    {
        $data = json_decode($jsonData, true);
        $method = $data['method'];
        $_this = new self();
        if (method_exists($_this, $method)) {
            return call_user_func_array(array($_this, $method), [$data,$class]);
        }
    }

    public function quantity_price(array $array,$class)
    {
        $qty_option=$array['qty_option'];
        $qtys=$array['qty'];
        $html='';
        switch ($qty_option){
            case 'select':
                $html.="<select class='$class form-control'>";
                foreach ($qtys as $qty){
                    $html.="<option value='".$qty["qty"]."'>".$qty["qty"]."</option>";
                }
                $html.='</select>';
        }
       return $html;
    }

}