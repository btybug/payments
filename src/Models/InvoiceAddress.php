<?php namespace BtyBugHook\Payments\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: edo
 * Date: 08.01.2018
 * Time: 23:10
 */
class Orders extends Model
{
    protected $table = 'pay_invoice';

    protected $guarded = ['id'];


}