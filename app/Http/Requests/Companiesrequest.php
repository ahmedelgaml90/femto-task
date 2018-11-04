<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Companiesrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return array();
                }
            case 'POST': {
                    return array(
                        'name' => 'required|min:3',
                         'tel'=> 'required|confirmed|min:11',
                        'email' => 'required|email|unique:companies',
                        'address' => 'required',

                      );
                }
         

            case 'PATCH': {
                    return array(
                        'name' => 'required|min:3',
                        'tel'=> 'required|confirmed|min:11',
                        'address' => 'required',


                      );
                }
        }
    }
}
