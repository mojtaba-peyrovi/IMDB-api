<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBotoxesRequest extends FormRequest
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
            
            'botox_name' => 'required',
            'price_per_unit' => 'required',
            'reward_points' => 'max:2147483647|nullable|numeric',
            'expire' => 'nullable|date_format:'.config('app.date_format'),
            'about_package' => 'required',
        ];
    }
}
