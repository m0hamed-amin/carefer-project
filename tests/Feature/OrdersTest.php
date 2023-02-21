<?php

namespace Tests\Feature;

use Illuminate\Http\JsonResponse;
use Tests\TestCase;

class OrdersTest extends TestCase
{
    public string $url = '/api/orders';
    public array $headers = [];
    public array $payload = [];

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_orders_response(): void
    {
        // Then
        $response = $this->json('GET', $this->url, $this->payload, $this->headers);
        // When
        $response->assertStatus(JsonResponse::HTTP_OK);
    }

    public function test_api_structure(): void
    {
        // Given // overwrite payload and header

        // Then
        $response = $this->json('GET', $this->url, $this->payload, $this->headers);

        // When
        $response->assertStatus(JsonResponse::HTTP_OK);
        $response->assertJsonStructure(
            [
                "status" => [
                    "code",
                    "message",
                ],
                "data" => [
                    [
                        'id',
                        'user_id',
                        'bus_id',
                        'trip_id',
                        'seat_id',
                    ],
                ],
            ]
        );
    }

    public function test_single_booking()
    {
        $response = $this->json('GET', $this->url.'/4', $this->payload, $this->headers);
        $response->assertStatus(JsonResponse::HTTP_OK);
    }

    public function test_single_booking_structure()
    {
        $response = $this->json('GET', $this->url.'/4', $this->payload, $this->headers);
        $response->assertStatus(JsonResponse::HTTP_OK);
        $response->assertJsonStructure(
            [
                "status" => [
                    "code",
                    "message",
                ],
                "data" => [
                    'id',
                    'user_id',
                    'bus_id',
                    'trip_id',
                    'seat_id',
                ],
            ]
        );
    }

    public function test_most_frequent()
    {
        $this->url = 'api/most-frequent';
        $response = $this->json('GET', $this->url, $this->payload, $this->headers);
        $response->assertStatus(JsonResponse::HTTP_OK);
    }

    public function test_most_frequent_structure()
    {
        $this->url = 'api/most-frequent';
        $response = $this->json('GET', $this->url, $this->payload, $this->headers);
        $response->assertStatus(JsonResponse::HTTP_OK);
        $response->assertJsonStructure(
            [
                "status" => [
                    "code",
                    "message",
                ],
                "data" => [
                    [
                        'trip_count',
                        'user_id',
                        'user_name',
                        'trip_name',
                    ],
                ],
            ]
        );
    }



    public function test_create_booking(): void
    {

       $this->url= 'api/book';
        $this->payload = [
            "user_id" => 4,
            "trip_id" => 1,
            "bus"=>[
                "bus_id"=> 1,
                "seat_ids"=>[20]
            ],
            "date" => "2023-02-21",
        ];

        $response = $this->json('POST', $this->url, $this->payload, $this->headers);
        $response->assertOk()
            ->assertJsonStructure
            (
                [
                    "status" => [
                        "code",
                        "message"
                    ],
                    "data" => []
                ]
            );
    }

}

