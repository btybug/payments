<?php
/**
 * Created by PhpStorm.
 * User: sahak
 * Date: 22.01.2018
 * Time: 22:16
 */

namespace BtyBugHook\Payments\Http\Requests;


use Btybug\btybug\Http\Requests\Request;

class SoppingCartRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


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
                    'id' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH': {

            }
            default:
                break;
        }

        return [];
    }

}