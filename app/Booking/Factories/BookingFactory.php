<?php

namespace App\Booking\Factories;

use App\Booking\DTO\BookingDataObject;
use App\Booking\Requests\BookingRequest;


class BookingFactory
{
    public static function fromRequest(BookingRequest $request): BookingDataObject
    {
        return new BookingDataObject(
            $request->get('user_id'),
            $request->get('bus')['bus_id'],
            $request->get('trip_id'),
            $request->get('bus')['seat_ids']
        );
    }
}
