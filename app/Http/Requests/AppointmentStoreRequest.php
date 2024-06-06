<?php

namespace App\Http\Requests;

use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'date' => ['required', 'date', new DateBetween, new TimeBetween],
            'tel_number' => 'required|numeric', // Assuming you want a numeric validation
            'stylist_id' => 'required|exists:stylists,id', // Ensures the stylist exists
            'service_id' => 'required|exists:services,id', // Ensures the service exists
        ];
    }
}
