<?php

namespace BtyBugHook\Payments\Http\Requests;

use Btybug\btybug\Http\Requests\Request;

class TaxServiceRequest extends Request
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
                    'name'        => 'required|max:100',
                    'slug'        => 'required|unique:tax_services,id',
                    'amount'      => 'required|numeric',
                    'amount_type' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $id = $this->route('id');

                return [
                    'id'          => 'required|exists:tax_services,id',
                    'name'        => 'required|max:100',
                    'slug'        => 'required|unique:tax_services,id,' . $id,
                    'amount'      => 'required|numeric',
                    'amount_type' => 'required',
                ];
            }
            default:
                break;
        }

        return [];
    }
}