<?php

namespace BtyBugHook\Payments\Http\Requests;

use Btybug\btybug\Http\Requests\Request;

class AttributesRequest extends Request
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
                    'name' => 'required',
                    'type' => 'required',
                    'slug' => 'required|unique:pym_attributes,id'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $id = $this->route('id');

                return [
                    'id'   => 'required|exists:pym_attributes,id',
                    'name' => 'required',
                    'type' => 'required',
                    'slug' => 'required|unique:pym_attributes,id,' . $id
                ];
            }
            default:
                break;
        }

        return [];
    }
}