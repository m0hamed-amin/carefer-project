<?php

namespace App\Booking\Repositories;

use App\Booking\DTO\BookingDataObject;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BookingRepository implements BookingRepositoryInterface
{
    private string $table = "booking";

    public function createBooking(BookingDataObject $bookingDataObject)
    {
        foreach ($bookingDataObject->toArray() as $bookingDataObject) {
            DB::table($this->table)->insert((array)$bookingDataObject);
        }
    }

    public function checkAvailableSeats(int $tripId): int
    {
        return DB::table($this->table)->get()->where('trip_id', '=', $tripId)->count();
    }

    public function getFrequentTrips(): Collection
    {
        return DB::table($this->table)
            ->join('trips', 'trips.id', 'booking.trip_id')
            ->join('users', 'users.id', 'booking.user_id')
            ->join('stations', 'stations.id', 'trips.destination_id')
            ->groupBy('booking.trip_id', 'booking.user_id', 'station_name')
            ->select(
                DB::raw(" count(booking.trip_id) as trip_count,
                                booking.user_id,
                                users.name as user_name,
                                CONCAT('Cairo - ',station_name)as trip_name"))
            ->get();
    }

    public function updateBooking(int $bookingId, BookingDataObject $bookingDataObject)
    {
        foreach ($bookingDataObject->toArray() as $bookingDataObject) {
            DB::table($this->table)->where('id', '=', $bookingId)->update((array)$bookingDataObject);
        }
    }

    public function getBookings()
    {
        return DB::table($this->table)->get();
    }

    public function getBookingById(int $bookingId)
    {
        return DB::table($this->table)->where('id', '=', $bookingId)->first();
    }

    public function deleteBooking(int $bookingId)
    {
        DB::table($this->table)->where('id', '=', $bookingId)->delete();
    }

    public function beginTransaction()
    {
        DB::beginTransaction();
    }

    public function commitTransaction()
    {
        DB::commit();
    }
}
