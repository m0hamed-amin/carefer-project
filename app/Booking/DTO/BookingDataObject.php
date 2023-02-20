<?php

namespace App\Booking\DTO;

use Carbon\Carbon;

class BookingDataObject
{

    /**
     * @var int
     */
    private int $bus_id;
    /**
     * @var int
     */
    private int $trip_id;

    /**
     * @var array
     */
    private array $seat_ids;

    /**
     * @var int
     */
    private int $user_id;

    /**
     * @var Carbon
     */
    private Carbon $created_at;

    /**
     * @var Carbon
     */
    private Carbon $updated_at;

    /**
     * @param  int  $user_id
     * @param  int  $bus_id
     * @param  int  $trip_id
     * @param  array  $seat_ids
     */
    public function __construct(int $user_id, int $bus_id, int $trip_id, array $seat_ids)
    {
        $this->bus_id = $bus_id;
        $this->seat_ids = $seat_ids;
        $this->trip_id = $trip_id;
        $this->user_id = $user_id;
        $this->created_at = Carbon::now();
        $this->updated_at = Carbon::now();
    }


    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @return int
     */
    public function getBusId(): int
    {
        return $this->bus_id;
    }

    /**
     * @return int
     */
    public function getTripId(): int
    {
        return $this->trip_id;
    }

    /**
     * @return array
     */
    public function getSeatIds(): array
    {
        return $this->seat_ids;
    }

    public function toArray(): array
    {
        return $this->prepareDTO($this->getSeatIds());
    }

    private function prepareDTO(array $seatIds): array
    {
        $collectionOfBookings = [[]];
        for ($i = 0; $i < count($seatIds); $i++) {
            $collectionOfBookings[$i]['bus_id'] = $this->bus_id;
            $collectionOfBookings[$i]['seat_id'] = $seatIds[$i];
            $collectionOfBookings[$i]['trip_id'] = $this->trip_id;
            $collectionOfBookings[$i]['user_id'] = $this->user_id;
            $collectionOfBookings[$i]['created_at'] = $this->created_at;
            $collectionOfBookings[$i]['updated_at'] = $this->updated_at;
        }

        return $collectionOfBookings;
    }
}
