<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 07.02.2018
 * Time: 14:20
 */

namespace BtyBugHook\Payments\Models;


final class Calculator
{
    public static function price($jsonData, int $count = 0)
    {
        $data = json_decode($jsonData, true);
        $method = $data['method'];
        $_this = new self();
        if (method_exists($_this, $method)) {
            return call_user_func_array(array($_this, $method), [$count, $data]);
        }
    }

    public function quantity_price($count, array $array)
    {
        $qtys=$array['qty'];
        foreach ($qtys as $qty){
            if($qty['qty']==$count){
                return $qty['price'];
            }
        }
        throw new \Exception('Invalid count');
    }

}