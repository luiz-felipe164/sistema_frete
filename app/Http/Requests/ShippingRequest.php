<?php

namespace App\Http\Requests;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class ShippingRequest extends FormRequest
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
        $enums_formatted = implode(',', StatusEnum::toArray());

        return [
            'board'         => 'required|string',
            'vehicle_owner' => 'required|string',
            'amount'        => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'start_date'    => 'required|date_format:Y-m-d H:i:s',
            'end_date'      => 'required|date_format:Y-m-d H:i:s|after:start_date',
            'status'        => "required|in:{$enums_formatted}"
        ];
    }
}
