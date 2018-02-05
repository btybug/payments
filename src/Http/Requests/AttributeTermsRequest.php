<?php

namespace BtyBugHook\Payments\Http\Requests;

use Btybug\btybug\Http\Requests\Request;

class AttributeTermsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize ()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules ()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'name'         => 'required',
                    'attribute_id' => 'required|exists:pym_attributes,id',
                    'slug'         => 'required|unique:pym_attribute_terms,id'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $attr_id = $this->route('id');
                $term_id = $this->route('term_id');

                return [
                    'id'           => 'required|exists:pym_attribute_terms,id',
                    'name'         => 'required',
                    'attribute_id' => 'required|exists:pym_attributes,id',
                    'slug'         => 'required|unique:pym_attribute_terms,id,' . $term_id
                ];
            }
            default:
                break;
        }

        return [];
    }
}