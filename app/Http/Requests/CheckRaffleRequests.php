<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckRaffleRequests extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'RecipientsArr' => 'required_without_all:ExtraRecipientsArr|array',
            'ExtraRecipientsArr'    => "required_without_all:RecipientsArr|array",
            'RecipientsArr.*' =>'required_without_all:ExtraRecipientsArr.*|email:rfc,dns',
            'ExtraRecipientsArr.*' => 'required_without_all:RecipientsArr.*|email:rfc,dns',
        ];
    }
}
