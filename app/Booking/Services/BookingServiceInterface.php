<?php

namespace App\Booking\Services;

use App\Booking\DTO\BookingDataObject;

interface BookingServiceInterface
{
    public function bookTrip(BookingDataObject $bookingDataObject);

    public function updateBooking(int $bookingId, BookingDataObject $bookingDataObject);

    public function deleteBooking(int $bookingId);
}
