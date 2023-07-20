<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RestaurantController extends Controller
{
    const GOOGLE_MAP_API_KEY = 'AIzaSyAoCoVAEYsFYD5QSK0u7E_YO5zOR5toNpY';

    public function searchRestaurant(Request $request)
    {
        $place = $request->place;

        $response = Http::get('https://maps.googleapis.com/maps/api/place/textsearch/json', [
            'query' => 'restaurant in ' . $place,
            'key' => self::GOOGLE_MAP_API_KEY,
        ]);

        if ($response->ok()) {
            return $response->json();
        } else {
            return $response->status();
        }
    }
}
