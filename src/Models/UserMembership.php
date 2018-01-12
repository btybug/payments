<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 11.01.2018
 * Time: 23:03
 */

namespace BtyBugHook\Payments\Models;


use Illuminate\Database\Eloquent\Model;

class UserPayments extends Model
{

    protected $table = 'user_membership';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function membership_type()
    {
        return $this->belongsTo(PaymentsTypes::class, 'membership_type_id');
    }

    public function status()
    {
        return $this->belongsTo(PaymentsStatuses::class, 'status_id');
    }
}