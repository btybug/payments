<?php namespace BtyBugHook\Payments\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: edo
 * Date: 08.01.2018
 * Time: 23:10
 */

class AttributeTerms extends Model
{
    protected $table='pym_attribute_terms';

    protected $guarded=['id'];

    public function attribute()
    {
        return $this->belongsTo('BtyBugHook\Payments\Models\Attributes', 'attribute_id', 'id');
    }
}