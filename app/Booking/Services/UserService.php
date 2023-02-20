<?php

namespace App\Booking\Services;

use App\Booking\Repositories\UserRepositoryInterface;
use Illuminate\Support\Collection;

class UserService implements UserServiceInterface
{
    public UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUser(int $userId)
    {
        return $this->userRepository->getUser($userId);
    }
}
