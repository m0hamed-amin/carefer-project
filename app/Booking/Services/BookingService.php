<?php

namespace App\Booking\Services;


use App\Booking\DTO\BookingDataObject;
use App\Booking\Repositories\BookingRepositoryInterface;
use App\Events\Booked_five_tickets;
use App\Exceptions\FinishedBooking;
use App\Http\Constants\BussesConstants;
use App\Mail\BookingDetailsEmail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class BookingService implements BookingServiceInterface
{

    private BookingRepositoryInterface $bookingRepository;
    private UserServiceInterface $userService;


    public function __construct(
        UserServiceInterface $userService,
        BookingRepositoryInterface $bookingRepository
    ) {
        $this->userService = $userService;
        $this->bookingRepository = $bookingRepository;
    }

    /**
     * @throws FinishedBooking
     */
    public function bookTrip(BookingDataObject $bookingDataObject)
    {
        $this->bookingRepository->beginTransaction();
        $this->checkNumberOfTickets($bookingDataObject);
        $this->checkAvailableSeats($bookingDataObject);
        $this->bookingRepository->createBooking($bookingDataObject);
        $this->sendEmail($bookingDataObject->getUserId());
        $this->bookingRepository->commitTransaction();
    }

    private function checkNumberOfTickets(BookingDataObject $bookingDataObject)
    {
        if (count($bookingDataObject->getSeatIds()) > 5) {
            Booked_five_tickets::dispatch($bookingDataObject->getUserId());
        }
    }

    private function sendEmail(string $userId)
    {
        $user = $this->userService->getUser($userId);
        Mail::to($user->email)->send(new BookingDetailsEmail());
    }

    /**
     * @throws FinishedBooking
     */
    private function checkAvailableSeats(BookingDataObject $bookingDataObject)
    {
        $bookedSeats = $this->bookingRepository->checkAvailableSeats($bookingDataObject->getTripId());
        if ($bookedSeats >= BussesConstants::AVAILABLE_SEATS) {
            throw new FinishedBooking("Sorry All Seats are Booked!");
        }
    }

    /**
     * @return mixed
     */
    public function getMostFrequentTrips(): mixed
    {
        return $this->bookingRepository->getFrequentTrips();
    }

    public function getBookingList(): Collection
    {
        return $this->bookingRepository->getBookings();
    }

    public function getBookingById(int $bookingId)
    {
        return $this->bookingRepository->getBookingById($bookingId);
    }

    public function updateBooking(int $bookingId, BookingDataObject $bookingDataObject)
    {
        $this->bookingRepository->updateBooking($bookingId , $bookingDataObject);
    }

    public function deleteBooking(int $bookingId)
    {
        $this->bookingRepository->deleteBooking($bookingId);
    }
}
