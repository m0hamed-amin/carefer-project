<?php

namespace  App\Http\Common;;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Trait APIResponse
 * @package App\Cores\PaymentServiceCore\Helpers
 */
trait APIResponse
{
    /**
     * @param       $date
     * @param  int  $code
     * @return JsonResponse
     */
    public function success($date, int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json(
            [
                'status' => [
                    'code' => $code,
                    'message' => trans('messages.success.default'),
                ],
                'data' => $date,
            ],
            $code
        );
    }

    /**
     * @param  array   $errors
     * @param  string  $message
     * @param  int     $code
     * @return JsonResponse
     */
    public function error(array $errors, string $message, int $code): JsonResponse
    {
        return response()->json(
            [
                'status' => [
                    'code' => $code,
                    'message' => $message,
                ],
                'errors' => $errors,
            ],
            $code
        );
    }
}
