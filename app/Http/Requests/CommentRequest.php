<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CommentRequest extends FormRequest
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
        if(Auth::check()){
            return [
                'website' => 'nullable|string',
                'comment' => 'required|string'
            ];
        }else{
            return [
                'name' => 'required|string',
                'email' => 'required|email',
                'website' => 'nullable|string',
                'comment' => 'required|string'
            ];
        }
    }
}
