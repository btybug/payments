<?php namespace BtyBugHook\Payments\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: edo
 * Date: 08.01.2018
 * Time: 23:10
 */
class Attributes extends Model
{
    protected $table = 'pym_attributes';

    protected $guarded = ['id'];

    public function terms ()
    {
        return $this->hasMany('BtyBugHook\Payments\Models\AttributeTerms', 'attribute_id', 'id');
    }

    public static function boot ()
    {
        parent::boot();
        static::deleting(function ($mode1) {
            $mode1->terms()->delete();
        });
    }
}