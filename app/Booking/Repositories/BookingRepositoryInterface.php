<?php

namespace App\Booking\Repositories;

use App\Booking\DTO\BookingDataObject;

interface BookingRepositoryInterface
{
    public function createBooking(BookingDataObject $bookingDataObject);

    public function getBookingById(int $bookingId);

    public function updateBooking(int $bookingId, BookingDataObject $bookingDataObject);

    public function checkAvailableSeats(int $tripId): int;

    public function getFrequentTrips();

    public function beginTransaction();

    public function commitTransaction();

    public function deleteBooking(int $bookingId);
}
