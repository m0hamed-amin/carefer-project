<?php

namespace App\Http\Controllers;

use App\Booking\Factories\BookingFactory;
use App\Booking\Requests\BookingRequest;
use App\Booking\Services\BookingServiceInterface;
use App\Http\Common\APIResponse;
use Illuminate\Http\JsonResponse;

class BookingController extends Controller
{
    use APIResponse;

    public BookingServiceInterface $bookingService;

    public function __construct(BookingServiceInterface $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function bookTrip(BookingRequest $bookingRequest): JsonResponse
    {
        $bookingDTO = BookingFactory::fromRequest($bookingRequest);
        $this->bookingService->bookTrip($bookingDTO);

        return $this->success([]);
    }

    public function updateBooking(BookingRequest $bookingRequest, int $order_id): JsonResponse
    {
        $bookingDTO = BookingFactory::fromRequest($bookingRequest);
        $this->bookingService->updateBooking($order_id, $bookingDTO);

        return $this->success([]);
    }

    public function getMostFrequentTrips(): JsonResponse
    {
        $trips = $this->bookingService->getMostFrequentTrips();

        return $this->success($trips);
    }

    public function listBooking(): JsonResponse
    {
        $bookingList = $this->bookingService->getBookingList();

        return $this->success($bookingList);
    }

    public function getBooking(int $order_id)
    {
        $bookingDetails = $this->bookingService->getBookingById($order_id);

        return $this->success($bookingDetails);
    }

    public function deleteBooking(int $bookingId)
    {
        $this->bookingService->deleteBooking($bookingId);
        return $this->success([]);
    }

}
