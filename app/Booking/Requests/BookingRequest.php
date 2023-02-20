<?php

namespace App\Booking\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|max:36|exists:users,id',
            'trip_id' => 'required|integer',
            'bus.bus_id' => 'required|integer',
            'bus.seat_ids' => 'required|array',
            'date' => 'required |date_equals:'.date("Y-m-d"),
        ];
    }
}
