<?php

namespace Onlinecorrection\Http\Requests;

use Onlinecorrection\Http\Requests\Request;

class ManagementDocumentRequest extends Request
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
        return [
            'user_id'=>'required',
            'document_id'=>'required',
            'package_id'=>'required',
        ];
    }
}
