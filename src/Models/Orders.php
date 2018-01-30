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
    protected $table='pym_orders';

    protected $guarded=['id'];

    const statuses = [
        'failed' => 0,
        'success' => 1,
        'pending' => 2,
    ];
}